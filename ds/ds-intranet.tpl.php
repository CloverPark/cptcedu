<?php

/**
 * @file
 * Display Suite single column template.
 */
?>
<div class="container intranet">
    <div class="grid">
        <div class="col24">
            <div class="grid">
                <div class="col12">
                    	<h2 class="line-header staff-quick-links">Quick Links</h4>
					<?php print $quicklinks; ?>
				</div>
				<div class="col12">
					<h2 class="line-header">Weekly-ish Staff Photo</h2>
                    <?php print $weeklyphoto; ?>
                    <?php print $photocaption; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="grid">
        	<h2 class="grey-header span12">
				Human Resources
				</h2>
    </div>
    <div class="grid">
        <?php print $humanresources; ?>
    </div>
    <div class="grid">
        	<h2 class="grey-header span12">
				Instruction
				</h2>

    </div>
    <div class="grid">
        <?php print $instruction; ?>
    </div>
    <div class="grid">
        	<h2 class="grey-header span12">
				Operations
				</h2>

    </div>
    <div class="grid">
        <?php print $operations; ?>
    </div>
    <div class="grid">
        	<h2 class="grey-header">
				Technology Center
				</h2>

    </div>
    <div class="grid">
        <?php print $technology; ?>
    </div>
    <div class="grid">
        <div class="col24">
            	<h2 class="grey-header">Message Board</h2>
            <?php print $messageboard; ?>
        </div>
    </div>
</div>
