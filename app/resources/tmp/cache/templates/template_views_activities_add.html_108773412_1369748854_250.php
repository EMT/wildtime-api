
	<?php echo $this->form->create($activity); ?>
		<?php echo $this->form->field('title'); ?>
		<?php echo $this->form->field('text', array('type' => 'textarea')); ?>
		<?php echo $this->form->field('img_url'); ?>
		<?php echo $this->form->submit('Save'); ?>
	<?php echo $this->form->end(); ?>