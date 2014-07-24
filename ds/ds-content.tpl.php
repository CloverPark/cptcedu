<?php
/**
 * @file
 * Display Suite landing template.
 * This is the template for content pages. It pulls the title, breadcrumb, and left column regions and puts them in the left column, and it pulls the right column and puts it in the right column region. 
 */
?>
<div class="container content-page">
	<?php if ($title): print '<h1 class="page-header">'. $title .'</h1>'; endif; ?>
		<div class="grid">
			<div class="col16 content-page-left-column">
				<div class="content-page-left-column-wrapper">	
							<?php print $breadcrumb; ?>
							<?php print $leftcolumn; ?>
						
					
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
