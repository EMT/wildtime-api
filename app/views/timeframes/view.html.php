
	<?php $this->title($timeframe->title . ' – Wild Time API'); ?>

	<h1><?= $timeframe->title; ?></h1>
	
	<p>JSON URL: <code>/timeframes/view/<?= $timeframe->id; ?>.json<?= (isset($this->_request->query['with'])) ? ('?with=' . $this->_request->query['with']) : ''; ?></code></p>
	
	<ul>
	
		<?php foreach ($timeframe->data() as $key => $val) { 
			if ($key !== 'activities') { ?>
		
				<li><?= $key; ?>: <?= $val; ?></li>
		
			<?php } ?>
		<?php } ?>
		
		<?php if (isset($timeframe->activities)) { ?>
			
			<li>Activities:
				<ul>
					<?php foreach ($timeframe->activities as $activity) { ?>
						<li><?= $this->html->link($activity->title, array('Activities::view', 'id' => $activity->id)); ?></li>
					<?php } ?>
				</ul>
			</li>
			
		<?php } ?>
	
	</ul>
	