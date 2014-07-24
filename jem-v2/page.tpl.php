<?php	
	$header = $_SERVER['DOCUMENT_ROOT'];
	$header .= "/sites/all/themes/jem/header.php";
	include_once($header);
?>

<?php if (!empty($tabs)): print '<ul class="tabs">'. render($tabs) .'</ul>'; endif; 
/* Calls the Drupal admin tabs if you're logged in */
?>
<?php readfile("http://www.cptc.edu/snowday-new/alertbox.php");  
/* Reads the snowday alert file, which puts a message box at the top or redirects to our emergency blog */
?>
<?php 
/* renders the page content. For that format, see the Display Suite templates */
print render($page['content']); 
/* renders footer */
	$footer = $_SERVER['DOCUMENT_ROOT'];
	$footer .= "/sites/all/themes/jem/footer.php";
	include_once($footer);
?>

<?php
/* Google Analytics tracking code */
?>
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-11342189-1']);
  _gaq.push(['_setDomainName', 'cptc.edu']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
  

</script>

 <?php
/* Google Remarketing tag */
?> 

<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 971525639;
var google_custom_params = window.google_tag_params;
var google_remarketing_only = true;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/971525639/?value=0&amp;guid=ON&amp;script=0"/>
</div>
</noscript>
