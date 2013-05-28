
	<?php $this->title('Activities – Wild Time API'); ?>

	<h1>Activities</h1>
	
	<p>JSON URL: <code>/activities.json</code></p>
	
	<ul>
	
		<?php foreach ($activities as $activity) { ?>
		
			<li><?= $this->html->link($activity->title, array('Activities::view', 'id' => $activity->id)); ?></li>
		
		<?php } ?>
	
	</ul>
	