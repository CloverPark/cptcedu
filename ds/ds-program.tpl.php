<?php
/**
 * @file
 * Display Suite landing template.
 *This is the template for the program pages
**/
?>
<div class="container program-page">
		<div class="content">
			<div class="row-fluid">
				<div class="span12">
				<h1 class="page-header"><?php print $title; ?></h1>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span4 left-top">
					<?php print $programbreadcrumb; ?>
					<?php print $programdescription; ?>

					<?php print $getstarted; ?>
<p>
					<a class="btn-arrow btn" href="http://www.cptc.edu/apply?utm_source=Program-or-degree&utm_medium=Apply%20Now%20Button&utm_campaign=Apply%20Now%20Button%20Program%20Pages">Sign Up Today</a></p>
<div>
<p>Want to learn more? Send us your info, and we’ll be in touch!</p>
<?php print $leadform; ?>
</div>
				</div>
				<div class="span8">
					<div id="myCarousel" class="carousel slide">
						<ol class="carousel-indicators">
							<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
							<?php if ($carouselimagetwo) : ?>
							<li data-target="#myCarousel" data-slide-to="1"></li>
							<?php endif;?>
							<?php if ($carouselimagethree) : ?>
							<li data-target="#myCarousel" data-slide-to="1"></li>
							<?php endif;?>
							<?php if ($carouselimagefour) : ?>
							<li data-target="#myCarousel" data-slide-to="1"></li>
							<?php endif;?>
							<?php if ($carouselimagefive) : ?>
							<li data-target="#myCarousel" data-slide-to="1"></li>
							<?php endif;?>
						</ol>
						<div class="carousel-inner">	
							<div class="active item"><?php print $carouselimageone; ?>
								<div class="carousel-caption"><?php print $carouselcaptionone; ?>
								</div>
							</div>				
							<?php if ($carouselimagetwo) : ?>
							<div class="item"><?php print $carouselimagetwo; ?>
								<div class="carousel-caption"><?php print $carouselcaptiontwo; ?>
								</div>
							</div>
							<?php endif;?>						
							<?php if ($carouselimagethree) : ?>
							<div class="item"><?php print $carouselimagethree; ?>
								<div class="carousel-caption"><?php print $carouselcaptionthree; ?>
								</div>
							</div>
							<?php endif;?>						
							<?php if ($carouselimagefour) : ?>
							<div class="item"><?php print $carouselimagefour; ?>
								<div class="carousel-caption"><?php print $carouselcaptionfour; ?>
								</div>
							</div>
							<?php endif;?>						
							<?php if ($carouselimagefive) : ?>
							<div class="item"><?php print $carouselimagefive; ?>
								<div class="carousel-caption"><?php print $carouselcaptionfive; ?>
								</div>
							</div>
							<?php endif;?>				
						</div>
						  <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
						  <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
					</div>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span4">

				<?php if ($moreinfo) : ?>	
				<h3>More Info</h3>
				<?php print $moreinfo; ?>
				<?php endif;?>	
				</div>
				<div class="span8">
					<div class="row-fluid">
						<div class="span12">
						<h3>Potential Careers</h3>
						</div>
					</div>
					<div class="row-fluid careers">
						<div class="span6">
						<?php print $careersone; ?>
						</div>
						<div class="span6">
						<?php print $careerstwo; ?>
						</div>
					</div>
				</div>		
			</div>	
			<?php if ($learnmore) : ?>	
			<div class="row-fluid">	
				<div class="span12">
				<h2 class="grey-header">Learn More</h2>
				</div>
			</div>
			<?php print $learnmore; ?>
			<?php endif;?>		
			<div class="row-fluid">
				<div class="span12">
				<h2 class="grey-header">Degrees & Certificates</h2>
				</div>
			</div>
			<div class="row-fluid degrees-certs">
				<div class="span4">
				<?php print $requirementsblurb; ?>
				</div>
				<?php if ($degrees) : ?>
				<div class="span4">
					<h5 class="line-header">Degrees</h5>
					<?php print $degrees; ?>
				</div>
				<?php endif;?>
				<?php if ($certificates) : ?>
				<div class="span4">
				<h5 class="line-header">Certificates</h5>
				<?php print $certificates; ?>
				</div>
				<?php endif;?>
			</div>
		</div>
</div>	

	