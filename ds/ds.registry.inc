<?php

/**
 * @file
 * Registry file for Display Suite.
 */

/**
 * Implements hook_theme().
 */
function _ds_theme() {
  $theme_functions = array();

  // Layouts
  $layouts = ds_get_layout_info();
  foreach ($layouts as $key => $layout) {

    // We don't need panel layouts to be registered.
    if (isset($layout['module']) && $layout['module'] == 'panels') {
      continue;
    }

    $theme_functions[$key] = array(
      'render element' => 'elements',
      'template' => strtr($key, '_', '-'),
      'path' => $layout['path'],
    );
  }

  // Field templates
  $field_functions = module_invoke_all('ds_field_theme_functions_info');
  foreach ($field_functions as $key => $label) {
    $theme_functions[$key] = array(
      'render element' => 'element',
      'function' => $key,
    );
  }

  return $theme_functions;
}

/**
 * Implements hook_features_api().
 */
function _ds_features_api() {
  static $api = FALSE;

  if (!$api) {
    module_load_include('inc', 'features', 'includes/features.ctools');
    $api = ctools_component_features_api('ds');
    foreach ($api as $key => $value) {
      switch ($key) {
        case 'ds_field_settings':
          $api[$key]['name'] = 'Display Suite field settings';
          break;
        case 'ds_layout_settings':
          $api[$key]['name'] = 'Display Suite layout settings';
          break;
        case 'ds_view_modes':
          $api[$key]['name'] = 'Display Suite view modes';
          break;
        case 'ds_fields':
          $api[$key]['name'] = 'Display Suite fields';
          break;
      }
    }
  }

  return $api;
}

/**
 * Remove or rename layout & field settings on entity machine name update.
 *
 * @param $entity_type
 *   The name of the entity type.
 * @param $info
 *   The entity info.
 * @param $action
 *   The action, either update or delete.
 */
function _ds_entity_type_update($entity_type, $info, $action) {

  // Delete settings.
  if ($action == 'delete') {
    db_delete('ds_layout_settings')
      ->condition('entity_type', $entity_type)
      ->condition('bundle', $info->type)
      ->execute();
    db_delete('ds_field_settings')
      ->condition('entity_type', $entity_type)
      ->condition('bundle', $info->type)
      ->execute();
  }

  // Update settings.
  if ($action == 'update') {
    $records = db_query('SELECT * FROM {ds_layout_settings} WHERE entity_type = :entity_type AND bundle = :bundle', array(':entity_type' => $entity_type, ':bundle' => $info->old_type));
    foreach ($records as $record) {
      $old_id = $entity_type . '|' . $info->old_type . '|' . $record->view_mode;
      $new_id = $entity_type . '|' . $info->type . '|' . $record->view_mode;
      db_update('ds_layout_settings')
        ->fields(array(
          'id' => $new_id,
          'bundle' => $info->type)
        )
        ->condition('id', $old_id)
        ->execute();
    }
    $records = db_query('SELECT * FROM {ds_field_settings} WHERE entity_type = :entity_type AND bundle = :bundle', array(':entity_type' => $entity_type, ':bundle' => $info->old_type));
    foreach ($records as $record) {
      $old_id = $entity_type . '|' . $info->old_type . '|' . $record->view_mode;
      $new_id = $entity_type . '|' . $info->type . '|' . $record->view_mode;
      db_update('ds_field_settings')
        ->fields(array(
          'id' => $new_id,
          'bundle' => $info->type)
        )
        ->condition('id', $old_id)
        ->execute();
    }
  }

  // Clear cache.
  cache_clear_all('ds_fields:', 'cache', TRUE);
  cache_clear_all('ds_field_settings', 'cache');
  field_info_cache_clear();
}

/**
 * Implements hook_theme_registry_alter().
 */
function _ds_theme_registry_alter(&$theme_registry) {

  // Inject ds_entity_variables in all entity theming functions.
  $entity_info = entity_get_info();
  foreach ($entity_info as $entity => $info) {
    if (isset($entity_info[$entity]['fieldable']) && $entity_info[$entity]['fieldable']) {

      // User uses user_profile for theming.
      if ($entity == 'user') $entity = 'user_profile';

      // Only add preprocess functions if entity exposes theme function.
      if (isset($theme_registry[$entity])) {
        $theme_registry[$entity]['preprocess functions'][] = 'ds_entity_variables';
      }
    }
  }

  // Support for File Entity.
  if (isset($theme_registry['file_entity'])) {
    $theme_registry['file_entity']['preprocess functions'][] = 'ds_entity_variables';
  }

  // Support for Entity API.
  if (isset($theme_registry['entity'])) {
    $theme_registry['entity']['preprocess functions'][] = 'ds_entity_variables';
  }
}

/**
 * Implements hook_entity_info_alter().
 */
function _ds_entity_info_alter(&$entity_info) {

  // Make sure ds_view_modes table exists.
  if (!db_table_exists('ds_view_modes')) {
    return;
  }

  ctools_include('export');

  // Add custom view modes to entities.
  $custom_view_modes = ctools_export_crud_load_all('ds_view_modes');
  foreach ($custom_view_modes as $view_mode_key => $view_mode_value) {
    $view_mode = array(
      'label' => check_plain($view_mode_value->label),
      'custom settings' => FALSE,
    );
    foreach ($view_mode_value->entities as $entity_type) {
      if (isset($entity_info[$entity_type])) {
        $entity_info[$entity_type]['view modes'][$view_mode_key] = $view_mode;
      }
    }
  }

  // Add layout if applicable.
  $ds_layouts = ds_get_layout_info();
  $ds_layout_settings = ctools_export_crud_load_all('ds_layout_settings');
  foreach ($ds_layout_settings as $row) {

    // Don't store any configurations with layouts that don't exist anymore.
    if (!isset($ds_layouts[$row->layout])) {
      continue;
    }

    if (!isset($entity_info[$row->entity_type])) {
      continue;
    }

    if (!isset($entity_info[$row->entity_type]['bundles'][$row->bundle])) {
      continue;
    }

    $layout = $ds_layouts[$row->layout];
    $layout['layout'] = $row->layout;
    $layout['settings'] = $row->settings;
    $entity_info[$row->entity_type]['bundles'][$row->bundle]['layouts'][$row->view_mode] = $layout;
  }


  $revision = array(
    'label' => 'Revision',
    'custom settings' => FALSE,
  );
  $entity_info['node']['view modes']['revision'] = $revision;
}

/**
 * Implements hook_ds_layout_info().
 */
function _ds_ds_layout_info() {
  $path = drupal_get_path('module', 'ds');
  $layouts = array(
    'ds_1col' => array(
      'label' => t('One column'),
      'path' => $path . '/layouts/ds_1col',
      'regions' => array(
        'ds_content' => t('Content'),
      ),
      'image' => TRUE,
    ),

   
	    'ds_landing' => array(
      'label' => t('Landing Page Template'),
      'path' => $path . '/layouts/ds_landing',
      'regions' => array(
        'leftcolumn' => t('Left Column'),
		'breadcrumb' => t('Breadcrumb'),
		'headingone' => t('Heading 1'),
        'imageone' => t('Image 1'),
        'linksone' => t('Links 1'),
        'textone' => t('Text 1'),
		'headingtwo' => t('Heading 2'),
		'imagetwo' => t('Image 2'),
        'linkstwo' => t('Links 2'),
        'texttwo' => t('Text 2'),
		'headingthree' => t('Heading 3'),
		'imagethree' => t('Image 3'),
        'linksthree' => t('Links 3'),
        'textthree' => t('Text 3'),
		'headingfour' => t('Heading 4'),
		'imagefour' => t('Image 4'),
        'linksfour' => t('Links 4'),
        'textfour' => t('Text 4'),
		'headingfive' => t('Heading 5'),
		'imagefive' => t('Image 5'),
        'linksfive' => t('Links 5'),
        'textfive' => t('Text 5'),
		'headingsix' => t('Heading 6'),
		'imagesix' => t('Image 6'),
        'linkssix' => t('Links 6'),
        'textsix' => t('Text 6'),
		'headingseven' => t('Heading 7'),
		'imageseven' => t('Image 7'),
        'linksseven' => t('Links 7'),
        'textseven' => t('Text 7'),
				'headingeight' => t('Heading 8'),
		'imageeight' => t('Image 8'),
        'linkseight' => t('Links 8'),
        'texteight' => t('Text 8'),
		'headingnine' => t('Heading 9'),
		'imagenine' => t('Image 9'),
        'linksnine' => t('Links 9'),
        'textnine' => t('Text 9'),
		'temp' => t('Temporary Spot'),
      ),

    ),
	
	
	  'ds_landingnew' => array(
      'label' => t('New Landing Page Template'),
      'path' => $path . '/layouts/ds_landingnew',
      'regions' => array(
        'leftcolumn' => t('Left Column'),
		'breadcrumb' => t('Breadcrumb'),
		'headingone' => t('Heading 1'),
        'imageone' => t('Image 1'),
        'linksone' => t('Links 1'),
        'textone' => t('Text 1'),
		'headingtwo' => t('Heading 2'),
		'imagetwo' => t('Image 2'),
        'linkstwo' => t('Links 2'),
        'texttwo' => t('Text 2'),
		'headingthree' => t('Heading 3'),
		'imagethree' => t('Image 3'),
        'linksthree' => t('Links 3'),
        'textthree' => t('Text 3'),
		'headingfour' => t('Heading 4'),
		'imagefour' => t('Image 4'),
        'linksfour' => t('Links 4'),
        'textfour' => t('Text 4'),
		'headingfive' => t('Heading 5'),
		'imagefive' => t('Image 5'),
        'linksfive' => t('Links 5'),
        'textfive' => t('Text 5'),
		'headingsix' => t('Heading 6'),
		'imagesix' => t('Image 6'),
        'linkssix' => t('Links 6'),
        'textsix' => t('Text 6'),
		'headingseven' => t('Heading 7'),
		'imageseven' => t('Image 7'),
        'linksseven' => t('Links 7'),
        'textseven' => t('Text 7'),

      ),

    ),
	
	
	 'ds_test' => array(
      'label' => t('Test Page Template'),
      'path' => $path . '/layouts/ds_test',
      'regions' => array(
      
      ),

    ),
	
	
		    'ds_onecolumn' => array(
      'label' => t('One Column Page Template'),
      'path' => $path . '/layouts/ds_onecolumn',
      'regions' => array(
        'maincontent' => t('Content'),
      ),

    ),
	
			    'ds_schedule' => array(
      'label' => t('Online Schedule Template'),
      'path' => $path . '/layouts/ds_schedule',
      'regions' => array(
        
      ),

    ),
	
			    'ds_intranet' => array(
      'label' => t('Intranet Template'),
      'path' => $path . '/layouts/ds_intranet',
      'regions' => array(
        'quicklinks' => t('Quick Links'),
		'messageboard' => t('Message Board'),
		'weeklyphoto' => t('Weekly Photo'),
		'photocaption' => t('Photo Caption'),
		'humanresources' => t('Human Resources'),
		'instruction' => t('Instruction'),
		'operations' => t('Operations'),
		'technology' => t('Technology'),
      ),

    ),
	
			    'ds_calendar' => array(
      'label' => t('Calendar Page Template'),
      'path' => $path . '/layouts/ds_calendar',
      'regions' => array(
        'breadcrumb' => t('Breadcrumb'),
		'leftcolumn' => t('Left Column'),
		'rightcolumn' => t('Right Column'),
      ),

    ),
	

	
			    'ds_directory' => array(
      'label' => t('Directory Page Template'),
      'path' => $path . '/layouts/ds_directory',
      'regions' => array(
        'maincontent' => t('Content'),
      ),

    ),
	
	
	    'ds_content' => array(
      'label' => t('Content Page Template'),
      'path' => $path . '/layouts/ds_content',
      'regions' => array(
	  'breadcrumb' => t('Breadcrumb'),
        'leftcolumn' => t('Left Column'),
		'rightcolumn' => t('Right Column'),
      ),

    ),
	

	
		    'ds_degree' => array(
      'label' => t('Degree or Certificate Page Template'),
      'path' => $path . '/layouts/ds_degree',
      'regions' => array(
        'description' => t('Description'),
		'outcomes' => t('Outcomes'),
		'requirements' => t('Requirements'),
		'rightcolumn' => t('Right Column'),
      ),

    ),
	
	
	

	
		    'ds_contact' => array(
      'label' => t('Contact Page Template'),
      'path' => $path . '/layouts/ds_contact',
      'regions' => array(
        'leftcolumn' => t('Left Column'),
		'rightcolumn' => t('Right Column'),
      ),

    ),
	
	  'ds_program' => array(
      'label' => t('Program Page Template'),
      'path' => $path . '/layouts/ds_program',
      'regions' => array(
	  'programbreadcrumb' => t('Program Breadcrumb'),
	  'programdescription' => t('Program Description'),
        'carouselimageone' => t('First Carousel Image'),
        'carouselimagetwo' => t('Second Carousel Image'),		
        'carouselimagethree' => t('Third Carousel Image'),
        'carouselimagefour' => t('Fourth Carousel Image'),
        'carouselimagefive' => t('Fifth Carousel Image'),
		'carouselcaptionone' => t('First Carousel Caption'),
		'carouselcaptiontwo' => t('Second Carousel Caption'),
		'carouselcaptionthree' => t('Third Carousel Caption'),
		'carouselcaptionfour' => t('Fourth Carousel Caption'),
		'carouselcaptionfive' => t('Fifth Carousel Caption'),
		'careersone' => t('Careers Left Section'),	
		'careerstwo' => t('Careers Right Section'),
		'getstarted' => t('Get Started'),
		'learnmore' => t('Learn More'),
		'instructoronephoto' => t('First Instructor Photo'),
		'instructortwophoto' => t('Second Instructor Photo'),		
		'instructorthreephoto' => t('Third Instructor Photo'),
		'instructoronebio' => t('First Instructor Bio'),
		'instructortwobio' => t('Second Instructor Bio'),
		'instructorthreebio' => t('Third Instructor Bio'),
		'watch' => t('Further Info'),
		'requirementsblurb' => t('Requirements Blurb'),
		'degrees' => t('Degrees'),
		'certificates' => t('Certificates'),
		'moreinfo' => t('More Info'),
'leadform' => t('Lead Form'),
      ),

	   ),
	   
   	 'ds_newprogram' => array(
         'label' => t('New Program Page Template'),
         'path' => $path . '/layouts/ds_newprogram',
         'regions' => array(
   	    'heroimagelarge' => t('Large Hero Image'),
   		'heroimagemedium' => t('Medium Hero Image'),
   		'heroimagesmall' => t('Small Hero Image'),
         	'herotext' => t('Hero Text'),
   		'signup' => t('Sign Up'),
   		'cost' => t('Cost'),
   		'length' => t('Length'),
   		'careers' => t('Careers'),
   		'learn' => t('Learn'),
   		'optionaltext' => t('Optional Text'),
   		'degrees' => t('Degrees and Certificates'),
   		'instructors' => t('Instructors'),
         ),

       ),
	   
	
	'ds_home' => array(
      'label' => t('Homepage Template'),
      'path' => $path . '/layouts/ds_home',
      'regions' => array(
        'heroimage' => t('Main Hero Image'),
		'herotitle' => t('Main Hero Title'),
		'herotext' => t('Main Hero Text'),
		'herolink' => t('Main Hero Link'),
        'subherooneimage' => t('Sub Hero One Image'),
		'subheroonetitle' => t('Sub Hero One Title'),
		'subheroonetext' => t('Sub Hero One Text'),	
		'subheroonelink' => t('Sub Hero One Link'),	
			
        'subherotwoimage' => t('Sub Hero Two Image'),
		'subherotwotitle' => t('Sub Hero Two Title'),
		'subherotwotext' => t('Sub Hero Two Text'),	
		'subherotwolink' => t('Sub Hero Two Link'),			
		'events' => t('Events'),	
		'portalform' => t('Home Portal Form'),	

		
      ),

    ),
	
	
	
	
			    'ds_event' => array(
      'label' => t('Event Template'),
      'path' => $path . '/layouts/ds_event',
      'regions' => array(
        'image' => t('Image'),	
        'eventtitle' => t('Event Title'),
		'summary' => t('Summary'),
        'startdate' => t('Start Date'),
        'enddate' => t('End Date'),
		'location' => t('Location'),
		'contact' => t('Contact'),
		'rightcolumn' => t('Right Column'),		
      ),
    ),
	
	
    'ds_reset' => array(
      'label' => t('Reset'),
      'path' => $path . '/layouts/ds_reset',
      'regions' => array(
        'ds_content' => t('Content'),
      ),
      'image' => TRUE,
    ),
  );

  // Support for panels.
  if (module_exists('panels')) {
    ctools_include('plugins', 'panels');
    $panel_layouts = panels_get_layouts();
    foreach ($panel_layouts as $key => $layout) {
      // The easy ones.
      if (isset($layout['regions'])) {
        $layouts['panels-' . $key] = array(
          'label' => $layout['title'],
          'path' => $layout['path'],
          'module' => 'panels',
          // We need the Panels plugin info array to correctly include the
          // layout and its CSS files later on.
          'panels' => $layout,
          'flexible' => FALSE,
          'regions' => $layout['regions'],
        );
        if (!empty($layout['css'])) {
          $layouts['panels-' . $key]['css'] = TRUE;
        }
      }
      // Flexible panel layouts, ignore the default flexible.
      else {
        if ($layout['name'] != 'flexible') {
          $regions = panels_flexible_panels(array(), array(), $layout);
          $layouts['panels-' . $key] = array(
            'label' => $layout['title'],
            'path' => $layout['path'],
            'module' => 'panels',
            'panels' => $layout,
            'flexible' => TRUE,
            'regions' => $regions,
          );
        }
      }
    }
  }

  // Get layouts defined in the active theme and base theme (if applicable).
  $themes = list_themes();
  $theme = variable_get('theme_default', 'bartik');

  $base_theme = array();
  $ancestor = $theme;
  while ($ancestor && isset($themes[$ancestor]->base_theme)) {
    $ancestor = $themes[$ancestor]->base_theme;
    $base_theme[] = $themes[$ancestor];
  }

  foreach (array_reverse($base_theme) as $base) {
    _ds_layouts_scan_theme($base->name, $layouts);
  }
  _ds_layouts_scan_theme($theme, $layouts);

  return $layouts;
}

function _ds_layouts_scan_theme($theme, &$layouts) {
  $theme_layouts = file_scan_directory(drupal_get_path('theme', $theme) . '/ds_layouts', '/inc$/');
  foreach ($theme_layouts as $file => $values) {
    include_once(DRUPAL_ROOT . '/' . $file);
    $function = 'ds_' . $values->name;
    $layouts[$values->name] = $function();
    $layouts[$values->name]['path'] = str_replace('/' . $values->filename, '', $file);
  }
}

/**
 * Implements hook_menu_alter().
 */
function _ds_menu_alter(&$items) {
  // Do not conflict with the revisioning module.
  if (module_exists('revisioning')) {
    $items['node/%node/revisions/%vid/view']['page callback'] = 'ds_revision_node_show';
    $items['node/%node/revisions/%vid/view']['file'] = 'includes/ds.revision.inc';
    $items['node/%node/revisions/%vid/view']['file path'] = drupal_get_path('module', 'ds');
  }
  else {
    $items['node/%node/revisions/%/view']['page callback'] = 'ds_revision_node_show';
    $items['node/%node/revisions/%/view']['file'] = 'includes/ds.revision.inc';
    $items['node/%node/revisions/%/view']['file path'] = drupal_get_path('module', 'ds');
  }
}
