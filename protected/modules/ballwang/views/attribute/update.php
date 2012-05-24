<?php
$this->breadcrumbs=array(
	'Attributes'=>array('index'),
	$model->attribute_id=>array('view','id'=>$model->attribute_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Attribute','url'=>array('index')),
	array('label'=>'Create Attribute','url'=>array('create')),
	array('label'=>'View Attribute','url'=>array('view','id'=>$model->attribute_id)),
	array('label'=>'Manage Attribute','url'=>array('admin')),
);
?>

<h1>Update Attribute <?php echo $model->attribute_id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>