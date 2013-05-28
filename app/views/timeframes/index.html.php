
	<?php $this->title('Timeframes – Wild Time API'); ?>

	<h1>Timeframes</h1>
	
	<p>JSON URL: <code>/timeframes.json<?= (isset($this->_request->query['with'])) ? ('?with=' . $this->_request->query['with']) : ''; ?></code></p>
	
	<ul>
	
		<?php foreach ($timeframes as $timeframe) { ?>
		
			<li><?= $this->html->link($timeframe->human, '/timeframes/view/' . $timeframe->id . '?with=Activities'); ?>
				<?php if (isset($timeframe->activities)) { ?>
			
					<ul>
						<?php foreach ($timeframe->activities as $activity) { ?>
							<li><?= $this->html->link($activity->title, array('Activities::view', 'id' => $activity->id)); ?></li>
						<?php } ?>
					</ul>
					
				<?php } ?>
			</li>
			
		
		<?php } ?>
		
		
	
	</ul>
	