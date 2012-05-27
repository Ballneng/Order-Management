<?php $form=$this->beginWidget('bootstrap.widgets.BootActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'order_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'order_site_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'invoice_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'customer_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'order_subtotal',array('class'=>'span5','maxlength'=>6)); ?>

	<?php echo $form->textFieldRow($model,'order_trackingtotal',array('class'=>'span5','maxlength'=>6)); ?>

	<?php echo $form->textFieldRow($model,'order_promo_free',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'order_coupon',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'order_grandtotal',array('class'=>'span5','maxlength'=>6)); ?>

	<?php echo $form->textFieldRow($model,'order_currency_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'order_payment_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'order_carrier_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'order_address_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'order_ship_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'order_discount_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'order_status',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'order_valid',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'order_export',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'order_qty',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'order_ip',array('class'=>'span5','maxlength'=>15)); ?>

	<?php echo $form->textFieldRow($model,'order_salt',array('class'=>'span5','maxlength'=>32)); ?>

	<?php echo $form->textFieldRow($model,'order_comment',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'order_create_at',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'order_payment_at',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.BootButton', array(
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
