<?php

/**
 * @file
 * Display Suite landing template.
 */
?>

<div class="container content-page">
	<?php if ($title): print '<h1 class="page-header">'. $title .'</h1>'; endif; ?>
		<div class="grid">
			<div class="col16 content-page-left-column">
				<div class="content-page-left-column-wrapper">	
		                    <div>
		                        <?php if ($description): print $description; endif; ?>
		                    </div>
		                    	<h2 class="grey-header">
								Program Requirements
								</h2>
		                    <div>
		                        <?php if ($requirements): print $requirements; endif; ?>
		                    </div>
						
					
				</div>
			</div>			
			<div class="col8 content-page-sidebar">
				<?php if ($rightcolumn):?>	
				<div class="content-page-sidebar-wrapper">
				<h3>Get Started</h3>
				<a href="http://www.cptc.edu/apply?utm_source=Program-or-degree&utm_medium=Apply%20Now%20Button&utm_campaign=Apply%20Now%20Button%20Program%20Pages" class="btn btn-arrow">Apply Today</a>
                    <?php if ($rightcolumn): print $rightcolumn; endif; ?>
				</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>