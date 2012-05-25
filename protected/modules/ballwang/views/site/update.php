<?php
$this->breadcrumbs=array(
	'Sites'=>array('index'),
	$model->site_id=>array('view','id'=>$model->site_id),
	'Update',
);
?>
<h2>更新 Site <?php echo $model->site_id; ?></h2>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>