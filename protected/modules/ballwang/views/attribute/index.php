<?php
$this->breadcrumbs=array(
	'Attributes',
);

$this->menu=array(
	array('label'=>'Create Attribute','url'=>array('create')),
	array('label'=>'Manage Attribute','url'=>array('admin')),
);
?>

<h1>Attributes</h1>

<?php $this->widget('bootstrap.widgets.BootListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
