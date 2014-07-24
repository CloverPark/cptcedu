<?php

/**
 * @file
 * Display Suite single column template.
 */
?>
<div class="container content-page">
	<div class="grid">
		<div class="col24">
		<?php if ($title): print '<h1 class="headline3">'. $title .'</h1>'; endif; ?>
		<?php print $content; ?>		
		</div>
	</div>
</div>

