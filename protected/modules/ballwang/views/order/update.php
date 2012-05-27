<?php
$this->breadcrumbs=array(
	'Orders'=>array('index'),
	$model->order_id=>array('view','id'=>$model->order_id),
	'Update',
);

?> 
<h2>更新 Order <?php echo $model->order_id; ?></h2>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>