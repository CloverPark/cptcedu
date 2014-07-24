<?php
/**
 * @file
 * Display Suite landing template.
 */
?>
<div class="container">
	<div class="grid home-hero">
		<div class="col16 home-hero-wrapper">
			<?php print $heroimage; ?> <!-- Needs class "home-hero-img"> --> 
			<a class="home-hero-cover" href="<?php print $herolink; ?>">
				<h2 class="home-hero-header"><?php print $herotitle; ?></h2>
				<p><?php print $herotext; ?></p>
			</a>
		</div>
		<div class="home-sub-hero col7">
			<div class="home-sub-hero-wrapper">
				<?php print $subherooneimage; ?> <!--Needs class "home-sub-hero-img" -->
				<a class="home-hero-cover" href="<?php print $subheroonelink; ?>">
					<h2 class="home-sub-hero-header"><?php print $subheroonetitle; ?></h2>
						<p><?php print $subheroonetext; ?></p>
				</a>
			</div>
			<div class="home-sub-hero-wrapper">
				<?php print $subherotwoimage; ?> <!--Needs class "home-sub-hero-img" -->
					<a class="home-hero-cover" href="<?php print $subherotwolink; ?>">
						<h2 class="home-sub-hero-header"><?php print $subherotwotitle; ?></h2>
						<p><?php print $subherotwotext; ?></p>
					</a>
			</div>
		</div>
		<div class="col1 stripe-decor"></div>
		</div>
	</div>
</div>	
	<div class="container home-second-row">
		<div class="grid">
			<div class="col1 shame-div">		
			</div>
			<div class="col7 enroll-wrapper">
				<a class="apply-button btn btn-arrow" href="/apply">Enroll Today</a>
			</div>
			<div class="col16 grey-bar-wrapper">
				<div class="home-grey-bar">
					<ul class="sub-nav tabs">
						<li><a href="#first">Future Students</a></li>

						<li><a href="#second">Current Students</a></li>

						<li><a href="#third">Alumni &amp; Friends</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="grid">
			<div class="col16">
				<div class="portal panes">
					<div class="tabs-1 pane">
						<div class="portal-section">
							<h4 class="portal-header">What You Can Study</h4>
							<!-- Need to add new programs -->
							<select>
								<option value="/">
									Programs
								</option>

								<option value="/programs/accounting/">
									Accounting
								</option>

								<option value="/programs/aerospace/">
									Aerospace Composite Technician
								</option>

								<option value="/programs/aviation/">
									Aviation Maintenance Technician
								</option>

								<option value="/programs/architecture/">
									Architectural Engineering Design
								</option>

								<option value="/programs/auto-collision/">
									Automotive Collision Technician
								</option>

								<option value="/programs/auto-tech/">
									Automotive Technician
								</option>

								<option value="/programs/central-service/">
									Central Service/Sterile Processing
								</option>

								<option value="/programs/it/">
									Computer Information Technology
								</option>

								<option value="/programs/cniss/">
									Computer Networking &amp; Information
									Systems Security
								</option>

								<option value="/programs/cosmetology/">
									Cosmetology
								</option>

								<option value="/programs/culinary/">
									Culinary Arts
								</option>

								<option value="/programs/dental/">
									Dental
								</option>

								<option value="/programs/ece/">
									Early Care &amp; Education
								</option>

								<option value="/programs/electrician/">
									Electrician Low Voltage Fire/Security
								</option>

								<option value="/programs/environmental/">
									Environmental Sciences &amp; Technology
								</option>

								<option value="/programs/esthetics/">
									Esthetic Sciences
								</option>

								<option value="/programs/graphic-tech/">
									Graphic Technologies
								</option>

								<option value="/programs/health-unit/">
									Health Unit Coordinator
								</option>

								<option value="/programs/hvac/">
									Heating &amp; Air
									Conditioning/Refrigeration Service
									Technician
								</option>

								<option value="/programs/hemodialysis/">
									Hemodialysis Technician
								</option>

								<option value="/programs/human-services">
									Human Services
								</option>

								<option value="/programs/interior-design/">
									Interior Design
								</option>

								<option value="/programs/manufacturing/">
									Manufacturing Technologies
								</option>

								<option value="/programs/massage/">
									Massage
								</option>

								<option value="/programs/material-science/">
									Material Science-Nondestructive Testing
								</option>

								<option value="/mechatronics">
									Mechatronics Technician
								</option>

								<option value="/programs/media-design">
									Media Design &amp; Production
								</option>

								<option value="/programs/medical-assistant">
									Medical Assistant
								</option>

								<option value="/programs/histology/">
									Medical Histology Technician
								</option>

								<option value="/programs/lab-tech/">
									Medical Laboratory Technician
								</option>

								<option value="/programs/nursing">
									Nursing
								</option>

								<option value="/programs/pharm-tech">
									Pharmacy Technician
								</option>

								<option value="/programs/pilot/">
									Professional Pilot
								</option>

								<option value="/programs/retail/cert">
									Retail Management
								</option>

								<option value="/programs/surgical-tech/">
									Surgical Technology
								</option>

								<option value="/programs/construction/">
									Sustainable Building Science
								</option>

								<option value="/programs/welding/">
									Welding Technology
								</option>
							</select>

							<h4 class="portal-header">Attend CPTC</h4>

							<ul class="portal-links">
								<li><a href="/register">Register for
								Classes</a></li>

								<li><a href="/schedule">Class Schedule</a></li>

								<li><a href="/online">Online Learning</a></li>
							</ul>

							<h4 class="portal-header">How Much it Costs</h4>

							<ul class="portal-links">
								<li><a href="/tuition">Tuition &amp;
								Fees</a></li>

								<li><a href="/financial-aid">Financial Aid
								&amp; Scholarships</a></li>

								<li><a href="/pay-for-cptc">Pay for
								CPTC</a></li>
							</ul>
						</div>

						<div class="portal-section">
							<h4 class="portal-header">Learn More</h4>

							<p class="portal-text">Fill in your info, and we'll
							be in touch!</p>
							<?php print $portalform; ?>
		

							<h4 class="portal-header">Get Started</h4>

							<ul class="portal-links">
								<li><a href="/info-sessions">Program Info
								Sessions</a></li>

								<li><a href="/tours">Tours</a></li>

								<li><a href="/advising">Talk to an
								Advisor</a></li>

								<li><a href="/get-started">Get Started
								Sessions</a></li>
							</ul>
						</div>
					</div>

					<div class="tabs-2 pane">
						<div class="portal-section">
							<h4 class="portal-header">My Clover Connection</h4>
							<ul class="portal-links">
								<li><a href="/register">Register</a></li>
								<li><a href="https://cptc.instructure.com/login">Canvas Login</a></li>
								<li><a href="https://www.google.com/a/student.cptc.edu/ServiceLogin?service=mail&amp;passive=true&amp;rm=false&amp;continue=https://mail.google.com/a/student.cptc.edu/&amp;ss=1&amp;ltmpl=default&amp;ltmplcache=2">Student Email</a></li>
								<li><a href="/financial-aid/portal">Financial Aid Portal</a></li>
								<li><a href="https://tredstone.cptc.edu/drop/">Drop Class</a></li>
								<li><a href="https://tredstone.cptc.edu/kiosk/student/waci003.html">Get Schedule</a></li>
								<li><a href="https://tredstone.cptc.edu/kiosk/schdplan/waci210base.html">Schedule Planner</a></li>
								<li><a href="https://tredstone.cptc.edu/kiosk/stuaddr/waci203.html">Change Contact Info</a></li>
								<li><a href="https://tredstone.cptc.edu/kiosk/student/waci002.html">Unofficial Transcript</a></li>
								<li><a href="/mycc">MyCC Home</a></li>
							</ul>
						</div>
				

	<div class="portal-section">
		<h4 class="portal-header">Campus Life</h4>
		<ul class="portal-links">
		<li><a href="/welcome">President's Welcome</a><br>
		<li><a href="/involvement">Office of Student Programs</a><br>
		<li><a href="/slsc">Student Leadership &amp; Service Center</a><br>
		<li><a href="/student-center">Student Center</a><br>
		<li><a href="/asg">ASG</a><br>
		<li><a href="/clubs">Clubs &amp; Activities</a><br>
		<li><a href="/library">Library</a><br>
		<li><a href="/bookstore">Bookstore</a><br>
		<li><a href="/advising">Advising &amp; Counseling</a><br>
		<li><a href="/text">Sign Up for Emergency Alerts</a><br>
		<li><a href="/work-study">Work Study</a>
	</div>
</div>

	<div class="tabs-3 pane">
		<div class="portal-section">
			<h4 class="portal-header">Events</h4><a href="/calendar">View events calendar</a>

			<h4 class="portal-header">Ways to Give</h4><a class="btn btn-arrow" href=
			"https://co.clickandpledge.com/sp/d1/default.aspx?wid=32534">Donate
			Now</a><br>
			<br>
			<a href="/foundation">Foundation homepage</a>

			<h4 class="portal-header">President's Welcome</h4><a href=
			"/welcome">President's Welcome</a><br>
			<a href="/president">President's Office</a><br>
		</div>

		<div class="portal-section">
			<h4 class="portal-header">Transcripts</h4><a href=
			"https://tredstone.cptc.edu/transcript/">Order a copy of your
			transcript</a>

			<h4 class="portal-header">Employment</h4><a href=
			"http://tredstone.cptc.edu/hr/browsejobs.aspx?type=1">Open
			positions at CPTC</a>

			<h4 class="portal-header">Community Services</h4><a href="/childcare">Childcare</a>
		</div>
	</div>
</div>
</div>




			<div class="col7 home-news">
				<div class="home-stories">
					<h3 class="home-news-header">Stories</h3>
					
					

					<div class="grid home-news-stories">
						<section class="slider home-stories-slider">
							<div class="flexslider">
								<ul class="slides home-stories-slider-thumbs">
					
									 
								 	<?php 
								 	/* include stories from the blog if we have them */
								 	   $stories = $_SERVER['DOCUMENT_ROOT'];
								 	   $stories .= "/sites/all/themes/jem/homepage-stories.php";
								 	   include_once($stories);
								 	?>
								</ul>
							</div>
						</section>
					</div>
				</div>




<?php if ($events) : ?>
	<div class="home-events">
		<h3 class="home-news-header">Events</h3>
	<?php print $events; /* need to update this with new html */?>

	</div>
<?php endif;?>
</div>
</div>
</div>


	