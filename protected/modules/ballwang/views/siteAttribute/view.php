<?php
$this->breadcrumbs=array(
	'Site Attributes'=>array('index'),
	$model->attribute_id,
);

 

<h2>查看 SiteAttribute <?php echo $model->attribute_id; ?></h2>

<?php $this->widget('bootstrap.widgets.BootDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'attribute_id',
		'attribute_name',
	),
)); ?>
