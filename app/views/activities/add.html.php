
	<?= $this->form->create($activity); ?>
		<?= $this->form->field('title'); ?>
		<?= $this->form->field('text', array('type' => 'textarea')); ?>
		<?= $this->form->field('img_url'); ?>
		<?= $this->form->submit('Save'); ?>
	<?= $this->form->end(); ?>