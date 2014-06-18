<div class="widget">
	<h2>Total Number Of Users:</h2>
	<div class="inner">
	<?php
	$user_count = user_count();
	$suffix = ($user_count != 1) ? 's' : '';
	?>
	<p>User Count: <?php echo user_count(); ?></p>
	</div>
</div>