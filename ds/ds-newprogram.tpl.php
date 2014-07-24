



<div class="program-page-container">
	
	
	

	<style type="text/css">
	@media (max-width: 767px){
		.program-page-hero-container{
			background-image: url(<?php print file_create_url($node->field_small_hero_image['und'][0]['uri']); ?>);
		}
		.program-page-degrees {
			background-image: url(<?php print file_create_url($node->field_small_degrees_image['und'][0]['uri']); ?>);
			}
	}
	
	@media (min-width: 768px) and (max-width: 991px) {
		.program-page-hero-container{
			background-image: url(<?php print file_create_url($node->field_medium_hero_image['und'][0]['uri']); ?>);
		}	
		.program-page-degrees {
			background-image: url(<?php print file_create_url($node->field_medium_degrees_image['und'][0]['uri']); ?>);
			}
	}
	
	@media (min-width: 992px){
		.program-page-hero-container{
			background-image: url(<?php print file_create_url($node->field_large_hero_image['und'][0]['uri']); ?>);
		}
		
		.program-page-degrees {
			background-image: url(<?php print file_create_url($node->field_large_degrees_image['und'][0]['uri']); ?>);
			}
		}
	</style>
	
	<section class="program-page-hero-container" 
	data-0="height: 600px;"
	data-600="height: 0px;"	
>






		<div class="program-page-hero-frame" data-200="opacity: 1;" data-300=
		"opacity: 0;">
			<h2 class="program-page-hero-title"><?php print $title; ?></h2>

			<p class="program-page-hero-text"><?php print $herotext; ?></p>
		</div>
	</section>

	




	<section class="program-page-cta">
		<span class="program-page-cta-triangle"></span>
		<div class="grid">
			<div class="program-page-cta-div col8">
				<h2>Get More Info</h2>

				<form class="program-cta-form">
					<div class="program-cta-form-inner">
						<label>First Name</label> <input> <label>Last
						Name</label> <input> <label>Email</label> <input>
						<button>Submit</button>
					</div>
				</form>
			</div>

			<div class="program-page-cta-div col8">
				<h2>Visit the Program</h2>

				<p>Our next program info session for <?php print $title; ?> is 
					<?php
					/* Pulls the date of the next program info session: 
					set array of all the upcoming program info sessions 
					format: yyyy-mm-dd
					make sure to put these in chronological order
					*/
					$datearray = array(
						'2014-07-14',
						'2014-07-23',
						'2014-08-13',
						'2014-08-27',
						'2014-09-10'	
					);

					/* go through the array, find the first date that's not in the past */
					// set timezone, find today's date 
					date_default_timezone_set('America/Los_Angeles');
					$today = date("Y-m-d", strtotime('now')); 

					//find the first date greater than today
					foreach($datearray as $date) {
						if ($date > $today) {
							$nextsession = $date;
							break;
						}	
					}
					/* convert that date to AP style (not abbreviated), echo it */
					$nextsession = strtotime($nextsession);
					echo date("F j", $nextsession)
					?>
					
					
					 at 3
				p.m. in Building 15. Come meet the instructors, see the
				classrooms, and learn how you can get started!</p>
			</div>

			<div class="program-page-cta-div col8">
				<h2>Sign Up</h2>

				<p><?php print $signup; ?></p>
				
				<a href="/apply" class="btn btn-arrow">Enroll Today</a>
			</div>
		</div>
	</section>

	<section class="program-page-selling-points">
		<div class="program-page-selling-points-bg">
			<div class="grid">
				<div class="program-page-selling-points-row-bg">
					<div class="col6">
						
						
						<div class="program-page-selling-point-wrapper">
							<img class="program-page-selling-points-image" src=
							"<?php print base_path() . path_to_theme(); ?>/images/dollar.png">

							<h3 class="program-page-selling-points-heading">How
							Much It Costs</h3>

							<p><?php print $cost; ?> You can <a href="/financial-aid">learn
							more about financial aid and scholarships right
							here</a>. Or view our full <a href="/tuition">tuition
							&amp; fees breakdown</a>.</p>
						</div>
					</div>

					<div class="col6">
						<div class="program-page-selling-point-wrapper">
							<img class="program-page-selling-points-image" src=
							"<?php print base_path() . path_to_theme(); ?>/images/clock.png">

							<h3 class="program-page-selling-points-heading">How
							Long It Takes</h3>
							<?php print $length; ?>
						</div>
					</div>
				</div>

				<div class="program-page-selling-points-row-bg">
					<div class="col6">
						<div class="program-page-selling-point-wrapper">
							<img class="program-page-selling-points-image" src=
							"<?php print base_path() . path_to_theme(); ?>/images/hiring.png">

							<h3 class="program-page-selling-points-heading">
							Potential Careers</h3>

							<?php print $careers; ?>

							<p class="small-text">This is not a guarantee of
							employment or a certain wage. Full career data
							available at careerinfo.net</p>
						</div>
					</div>

					<div class="col6">
						<div class="program-page-selling-point-wrapper">
							<img class="program-page-selling-points-image" src=
							"<?php print base_path() . path_to_theme(); ?>/images/book.png">

							<h3 class="program-page-selling-points-heading">
							What You'll Learn</h3>
							<?php print $learn; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php if ($optionaltext) : ?>
		<div class="program-page-selling-point-text">
			<?php print $optionaltext; ?>
		</div>
		<?php endif;?>
	</section>
	
	
	<?php 
	/* include stories from the blog if we have them */
	   $path = $_SERVER['DOCUMENT_ROOT'];
	   $path .= "/sites/all/themes/jem/program-stories.php";
	   include_once($path);
	?>
	
	


	<section class="program-page-degrees">
		<h2 class="program-page-degree-title">Degrees &amp; Certificates</h2>

		<div class="program-page-degrees-content">
				<?php print $degrees; ?>
		</div>
	</section>
	
	<?php if ($instructors) : ?>
	<section class="program-page-instructors">
		<span class="program-page-instructors-triangle">
		</span>
		<h2 class="program-page-instructors-title">Meet the Instructors</h2>
		<div class="container">
			<div class="grid">
				<?php print $instructors; ?>
			</div>
		</div>
	</section>
	<?php endif;?>
</div>
