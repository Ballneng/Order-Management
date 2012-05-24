<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('attribute_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->attribute_id),array('view','id'=>$data->attribute_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('attribute_name')); ?>:</b>
	<?php echo CHtml::encode($data->attribute_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('attribute_status')); ?>:</b>
	<?php echo CHtml::encode($data->attribute_status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('attribute_group_id')); ?>:</b>
	<?php echo CHtml::encode($data->attribute_group_id); ?>
	<br />


</div>