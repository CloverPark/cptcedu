
<?php

/**
 * @file
 * Display Suite single column template.
 */
?>

<div class="container content-page">
	<?php if ($title): print '<h1 class="page-header">'. $title .'</h1>'; endif; ?>
		<div class="grid">
			<div class="col16 content-page-left-column">
				<div class="content-page-left-column-wrapper">	
				<?php print $breadcrumb; ?>
				<?php print $leftcolumn; ?>
				<?php 
				/* include stories from the blog if we have them */
				   $path = $_SERVER['DOCUMENT_ROOT'];
				   $path .= "/sites/all/themes/jem/president-rss-filter.php";
				   include_once($path);
				?>
				
				
				<p><a href="http://www.blog.cptc.edu/category/president">View All President's Blog Posts</a></p>
				</div>
		
				</div>	
		
			
			<div class="col8 content-page-sidebar">
				<?php if ($rightcolumn):?>	
				<div class="content-page-sidebar-wrapper">
				<?php print $rightcolumn; ?>
				</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
				