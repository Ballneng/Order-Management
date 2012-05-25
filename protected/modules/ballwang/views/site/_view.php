<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('site_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->site_id),array('view','id'=>$data->site_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('site_name')); ?>:</b>
	<?php echo CHtml::encode($data->site_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('site_prefix')); ?>:</b>
	<?php echo CHtml::encode($data->site_prefix); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('site_db_host')); ?>:</b>
	<?php echo CHtml::encode($data->site_db_host); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('site_db_name')); ?>:</b>
	<?php echo CHtml::encode($data->site_db_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('site_db_password')); ?>:</b>
	<?php echo CHtml::encode($data->site_db_password); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('site_attribute_id')); ?>:</b>
	<?php echo CHtml::encode($data->site_attribute_id); ?>
	<br />


</div>