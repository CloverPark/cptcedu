<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language; ?>" version="XHTML+RDFa 1.0" dir="<?php print $language->dir; ?>"<?php print $rdf_namespaces; ?>>

<head profile="<?php print $grddl_profile; ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php print $head; ?>
  <title><?php print $head_title; ?></title>
  <?php print $styles; ?>
  <?php print $scripts; ?>
      <script src="//use.typekit.net/tyq0gtg.js" type="text/javascript"></script>
      <script type="text/javascript">
  try{Typekit.load();}catch(e){}
      </script>
	  <script src="/sites/all/themes/jem/js/production.min.js"></script>
	  <!--[if lte IE 8]><script src="/sites/all/themes/jem/js/html5shiv.js" />
	  </script><![endif]-->
	<script src="/sites/all/themes/jem/js/respond.js" /> </script>
	<!--[if lte IE 8]>
	<link type="text/css" rel="stylesheet" href="/sites/all/themes/jem/ie8.css" media="all" />
	<![endif]-->	
	<!--[if lte IE 7]>	
		<link type="text/css" rel="stylesheet" href="/sites/all/themes/jem/ie7.css" media="all" />
	<![endif]-->	
</head>
<body class="<?php print $classes; ?>" <?php print $attributes;?>>
  <div id="skip-link">
    <a href="#main-content" class="element-invisible element-focusable tesst"><?php print t('Skip to main content'); ?></a>
  </div>
  <?php print $page_top; ?>
  <?php print $page; ?>
  <?php print $page_bottom; ?> 
   
</body>
</html>
