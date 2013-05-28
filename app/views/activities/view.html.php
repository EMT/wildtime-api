
	<?php $this->title($activity->title . ' – Wild Time API'); ?>

	<h1><?= $activity->title; ?></h1>
	
	<p>JSON URL: <code>/activities/view/<?= $activity->id; ?>.json</code></p>
	
	<ul>
	
		<?php foreach ($activity->data() as $key => $val) {
			if ($key !== 'timeframe') { ?>
		
				<li><?= $key; ?>: <?= $val; ?></li>
			
			<?php } ?>
		<?php } ?>
		
		<?php if (isset($activity->timeframe)) { ?>
			
			<li><?= $this->html->link('Timeframe', '/timeframes/view/' . $activity->timeframe->id . '?with=Activities'); ?>: 
				<ul>
					<?php foreach ($activity->timeframe->data() as $key => $val) { ?>
						<li><?= $key; ?>: <?= $val; ?></li>
					<?php } ?>
				</ul>
			</li>
			
		<?php } ?>
	
	</ul>
	