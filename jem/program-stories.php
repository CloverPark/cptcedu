<?php
/* connect to blog feed */
	$curl = curl_init();
	curl_setopt_array($curl, Array(
		CURLOPT_URL            => 'http://feeds.feedburner.com/cptc/NMVI',
		CURLOPT_USERAGENT      => 'spider',
		CURLOPT_TIMEOUT        => 120,
		CURLOPT_CONNECTTIMEOUT => 30,
		CURLOPT_RETURNTRANSFER => TRUE,
		CURLOPT_ENCODING       => 'UTF-8'
		));
		$data = curl_exec($curl);
		curl_close($curl);
		$xml = simplexml_load_string($data, 'SimpleXMLElement', LIBXML_NOCDATA);


		/* set the $program variable depending on the URL of the page we're on */
		  $url  = @( $_SERVER["HTTPS"] != 'on' ) ? 'http://'.$_SERVER["SERVER_NAME"] :  'https://'.$_SERVER["SERVER_NAME"];
		  $url .= ( $_SERVER["SERVER_PORT"] !== 80 ) ? ":".$_SERVER["SERVER_PORT"] : "";
		  $url .= $_SERVER["REQUEST_URI"];
		  
		  
		  $program = null; /* this just keeps Drupal from giving me undefined variable warnings */
		  
		  if (strpos($url, 'accounting') !== FALSE) {
			  $program ="Accounting";
		  }
		  
		  if (strpos($url, 'aerospace') !== FALSE) {
			  $program ="Aerospace Composite Technician";
		  }
		  
		  if (strpos($url, 'archit') !== FALSE) {
			  $program ="Architectural Engineering";
		  }
		  
		  if (strpos($url, 'collision') !== FALSE) {
			  $program ="Automotive Collision & Restoration";
		  }
		  
		  if (strpos($url, 'auto-t') !== FALSE) {
			  $program ="Automotive Technician";
		  }
		  
		  if (strpos($url, 'aviation') !== FALSE) {
			  $program ="Aviation Maintenance";
		  }
		  
		  if (strpos($url, 'central') !== FALSE) {
			  $program ="Central Service Sterile Processing";
		  }
		  
		  if (strpos($url, 'programs/it') !== FALSE) {
			  $program ="Computer Information Technology";
		  }
		  
		  if (strpos($url, 'cniss') !== FALSE) {
			  $program ="Computer Networking & Information Systems Security";
		  }
		  
		  if (strpos($url, 'cosmetology') !== FALSE) {
			  $program ="Cosmetology";
		  }
		  
		  if (strpos($url, 'culinary') !== FALSE) {
			  $program ="Culinary Arts";
		  }
		  
		  if (strpos($url, 'dental') !== FALSE) {
			  $program ="Dental";
		  }
		  
		  if (strpos($url, 'programs/ece') !== FALSE) {
			  $program ="Early Care and Education";
		  }
		  
		  if (strpos($url, 'electrician') !== FALSE) {
			  $program ="Electrician Low Voltage Fire/Security";
		  }
		  
		  if (strpos($url, 'environmental') !== FALSE) {
			  $program ="Environmental Sciences & Technologies";
		  }
		  
		  if (strpos($url, 'esthetic') !== FALSE) {
			  $program ="Esthetic Sciences";
		  }
		  
		  if (strpos($url, 'graphic') !== FALSE) {
			  $program ="Graphic Technologies";
		  }
		  
		  if (strpos($url, 'unit') !== FALSE) {
			  $program ="Health Unit Coordinator";
		  }
		  
		  if (strpos($url, 'hemo') !== FALSE) {
			  $program ="Hemodialysis";
		  }
		  
		  if (strpos($url, 'hvac') !== FALSE) {
			  $program ="HVAC";
		  }
		  
		  if (strpos($url, 'interior') !== FALSE) {
			  $program ="Interior Design";
		  }
		  
		  if (strpos($url, 'manuf') !== FALSE) {
			  $program ="Manufacturing Technologies";
		  }
		  
		  if (strpos($url, 'massage') !== FALSE) {
			  $program ="Massage Studies";
		  }
		  
		  if (strpos($url, 'material') !== FALSE) {
			  $program ="Material Science";
		  }
		  
		  if (strpos($url, 'mechatronics') !== FALSE) {
			  $program ="Mechatronics";
		  }
		  
		  if (strpos($url, 'medical-assistant') !== FALSE) {
			  $program ="Medical Assistant";
		  }
		  
		  if (strpos($url, 'histology') !== FALSE) {
			  $program ="Medical Histology";
		  }
		  
		  if (strpos($url, 'lab-tech') !== FALSE) {
			  $program ="Medical Lab Technician";
		  }
		  
		  if (strpos($url, 'nursing') !== FALSE) {
			  $program ="Nursing";
		  }
		  
		  if (strpos($url, 'pharm-tech') !== FALSE) {
			  $program ="Pharmacy Technician";
		  }
		  
		  if (strpos($url, 'pilot') !== FALSE) {
			  $program ="Professional Pilot";
		  }
		  
		  if (strpos($url, 'surgical-tech') !== FALSE) {
			  $program ="Surgical Tech";
		  }
		  
		  if (strpos($url, 'construction') !== FALSE) {
			  $program ="Sustainable Building Sciences";
		  }
		  
		  if (strpos($url, 'welding') !== FALSE) {
			  $program ="Welding";
		  }
		  
		  
		  
					

				/* declare the variables */
				$i=0;
				$sortedarray = array ();
				
				foreach ($xml->channel->item as $item) {					
					/* pull just the posts for the category corresponding to the page we're on */
					if ($item->category1 == $program || $item->category2 == $program || $item->category3 == $program || $item->category4 == $program) {
						/* write the info from the first three posts in that category to an array */
							$sortedarray[$i][url] =  $item->link;
							$sortedarray[$i][title] = $item->title;
							$sortedarray[$i][image] = $item->description->img['src'];
							$sortedarray[$i][imagealt] = $item->description->img['alt'];
							$sortedarray[$i][teaser] = $item->content;		
							$i++;
							/* limit it to just three posts */
							if($i > 2){
								break;
							}
						}
					}
					
			/* print posts */		
			if ($i > 0) {
				/* if there are posts, set the value for the column html */
				if ($i == 1){
					$colval = col24;
				}
				
				if ($i == 2){
					$colval = col12;
				}
				
				if ($i == 3){
					$colval = col8;
				}
				 /* display wrapper html */				
				?>
				<section class="program-page-stories">
						<h2 class="program-page-stories-title">Stories About Our <?php echo $program; ?> Program</h2>
							<div class="program-page-stories-wrapper">
								<div class="grid">
									<?php
									/* loop through first three posts with proper html */
									
									foreach($sortedarray as $story) { 
			
										?>
										
									<div class="<?php echo $colval; ?>">
										<div class="program-page-stories-item">
										<h3 class="program-page-stories-item-title"><?php echo $story[title]; ?></h3>	
											<a href="<?php echo $story[url]; ?>">
											<img src="<?php echo $story[image]; ?>" class="program-page-stories-image" alt="<?php echo $story[imagealt]; ?>">
											</a>
											<p><?php echo $story[teaser]; ?></p>
											<p><a href="<?php echo $story[url]; ?>">Read More</a></p>
										</div>
									</div>
					
				
				
									<?php
									
								}
									?>
								</div>
							</div>
				</section>
				<?php	
				}
				?>


				
				
