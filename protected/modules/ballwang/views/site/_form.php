<?php $form=$this->beginWidget('bootstrap.widgets.BootActiveForm',array(
	'id'=>'site-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">带有 <span class="required">*</span> 为必填项.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'site_name',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'site_prefix',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'site_db_host',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'site_db_name',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'site_db_password',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'site_attribute_id',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.BootButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
