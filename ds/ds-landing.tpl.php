<?php
/**
 * @file
 * Display Suite landing template.
 *This is the main template file for the landing page template. This combines with the page.tpl.php file to form the landing page template. 
 *This is set up to have seven separate sections. If there's not a heading for a section, it won't display--that's how we avoid displaying empty sections. 
 *That doesn't apply to the first two, since I can't foresee a circumstance where we'd create a landing page with only one content section. 
 */
?>
<div class="container landing-page">
	<?php if ($title): print '<h1 class="page-header">'. $title .'</h1>'; endif; ?>
	<?php print $breadcrumb; ?>
		<div class="grid">
			<div class="col6 landing-left-column">
			<?php print $leftcolumn; ?>
			</div>
			<div class="col18 landing-list">
				<h3 class="line-header"><?php print $headingone; ?></h3>
				<div class="grid landing-section">
					<div class="col4 landing-img-div">
						<?php print $imageone; ?>
					</div>
					<div class="col12 landing-section-text">
						<?php print $textone; ?>
					</div>
					<div class="col8 landing-section-links">	
						<?php print $linksone; ?>
					</div>
				</div>		
				
				<h3 class="line-header"><?php print $headingtwo; ?></h3>
				<div class="grid landing-section">
					<div class="col4 landing-img-div">
						<?php print $imagetwo; ?>
					</div>
					<div class="col12 landing-section-text">
						<?php print $texttwo; ?>
					</div>
					<div class="col8 landing-section-links">	
						<?php print $linkstwo; ?>
					</div>
				</div>
				
				<?php if ($headingthree) : ?>
				<h3 class="line-header"><?php print $headingthree; ?></h3>
				<div class="grid landing-section">
					<div class="col4 landing-img-div">
						<?php print $imagethree; ?>
					</div>
					<div class="col12 landing-section-text">
						<?php print $textthree; ?>
					</div>
					<div class="col8 landing-section-links">	
						<?php print $linksthree; ?>
					</div>
				</div>
				<?php endif;?>
				
				<?php if ($headingfour) : ?>
				<h3 class="line-header"><?php print $headingfour; ?></h3>
				<div class="grid landing-section">
					<div class="col4 landing-img-div">
						<?php print $imagefour; ?>
					</div>
					<div class="col12 landing-section-text">
						<?php print $textfour; ?>
					</div>
					<div class="col8 landing-section-links">	
						<?php print $linksfour; ?>
					</div>
				</div>
				<?php endif;?>

				<?php if ($headingfive) : ?>
				<h3 class="line-header"><?php print $headingfive; ?></h3>
				<div class="grid landing-section">
					<div class="col4 landing-img-div">
						<?php print $imagefive; ?>
					</div>
					<div class="col12 landing-section-text">
						<?php print $textfive; ?>
					</div>
					<div class="col8 landing-section-links">	
						<?php print $linksfive; ?>
					</div>
				</div>
				<?php endif;?>				
				
				<?php if ($headingsix) : ?>
				<h3 class="line-header"><?php print $headingsix; ?></h3>
				<div class="grid landing-section">
					<div class="col4 landing-img-div">
						<?php print $imagesix; ?>
					</div>
					<div class="col12 landing-section-text">
						<?php print $textsix; ?>
					</div>
					<div class="col8 landing-section-links">	
						<?php print $linkssix; ?>
					</div>
				</div>
				<?php endif;?>

				<?php if ($headingseven) : ?>
				<h3 class="line-header"><?php print $headingseven; ?></h3>
				<div class="grid landing-section">
					<div class="col4 landing-img-div">
						<?php print $imageseven; ?>
					</div>
					<div class="col12 landing-section-text">
						<?php print $textseven; ?>
					</div>
					<div class="col8 landing-section-links">	
						<?php print $linksseven; ?>
					</div>
				</div>
				<?php endif;?>										
				
				<?php if ($headingeight) : ?>
				<h3 class="line-header"><?php print $headingeight; ?></h3>
				<div class="grid landing-section">
					<div class="col4 landing-img-div">
						<?php print $imageeight; ?>
					</div>
					<div class="col12 landing-section-text">
						<?php print $texteight; ?>
					</div>
					<div class="col8 landing-section-links">	
						<?php print $linkseight; ?>
					</div>
				</div>
				<?php endif;?>			

				<?php if ($headingnine) : ?>
				<h3 class="line-header"><?php print $headingnine; ?></h3>
				<div class="grid landing-section">
					<div class="col4 landing-img-div">
						<?php print $imagenine; ?>
					</div>
					<div class="col12 landing-section-text">
						<?php print $textnine; ?>
					</div>
					<div class="col8 landing-section-links">	
						<?php print $linksnine; ?>
					</div>
				</div>
				<?php endif;?>			

			</div>
		</div>
	</div>
</div>