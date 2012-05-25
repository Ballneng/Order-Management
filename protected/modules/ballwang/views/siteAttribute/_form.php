<?php $form=$this->beginWidget('bootstrap.widgets.BootActiveForm',array(
	'id'=>'site-attribute-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">带有 <span class="required">*</span> 为必填项.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'attribute_name',array('class'=>'span5','maxlength'=>50)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.BootButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
