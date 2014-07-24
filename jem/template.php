<?php
/**
* Implements hook_preprocess_html().
**/
function YOURTHEMENAME_preprocess_html(&$vars) {
  $vars['doctype'] = '<!DOCTYPE html>' . "\n";
  $vars['rdf'] = new stdClass;
  $vars['rdf']->version = '';
  $vars['rdf']->namespaces = '';
  $vars['rdf']->profile = '';
  /* Serialize RDF Namespaces into an RDFa 1.1 prefix attribute. */
  if ($vars['rdf_namespaces']) {
    $prefixes = array();
    foreach (explode("\n  ", ltrim($vars['rdf_namespaces'])) as $namespace) {
// Remove xlmns: and ending quote and fix prefix formatting.
      $prefixes[] = str_replace('="', ': ', substr($namespace, 6, -1));
    }
    $vars['rdf']->namespaces = ' prefix="' . implode(' ', $prefixes) . '"';
  }
}
/* remove the width and height attributes from images so that responsive design works */
function jem_preprocess_image(&$variables) {
  $attributes = &$variables['attributes'];

  foreach (array('width', 'height') as $key) {
    unset($attributes[$key]);
    unset($variables[$key]);
  }
}
/**
 * implements hook_page_alter()
 *
 * Alter the page output before render.
*/
function jem_page_alter(&$page) {
  // kpr($page); //use this to find the item you want to remove - you need the devel running.
  // Remove the search form from the search results page.
  if (arg(0) == 'search') {
    if (!empty($page['content']['system_main']['search_form'])) {
      hide($page['content']['system_main']['search_form']);
    }
  }
// Add the correct viewport info to the head  
  $viewport = array(
'#type' => 'html_tag',
'#tag' => 'meta',
'#attributes' => array(
'name' =>  'viewport',
'content' =>  'width=device-width, initial-scale=1, maximum-scale=1'
)
);
drupal_add_html_head($viewport, 'viewport');
/* Add html5shiv to head. This makes older versions of IE recognize HTML5 tags */
$html5shiv = array(
  '#tag' => 'script',
  '#tag' => 'script',
  '#attributes' => array( // Set up an array of attributes inside the tag
    'src' => '/sites/all/themes/jem/js/html5shiv.js', 
  ),
  '#prefix' => '<!--[if lte IE 8]>',
  '#suffix' => '</script><![endif]-->',
);
drupal_add_html_head($html5shiv, 'html5shiv');
}







?>