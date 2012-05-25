<?php $form=$this->beginWidget('bootstrap.widgets.BootActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'site_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'site_name',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'site_prefix',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'site_db_host',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'site_db_name',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'site_attribute_id',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.BootButton', array(
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
