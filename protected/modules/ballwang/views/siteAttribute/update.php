<?php
$this->breadcrumbs=array(
	'Site Attributes'=>array('index'),
	$model->attribute_id=>array('view','id'=>$model->attribute_id),
	'Update',
);
 
<h2>更新 SiteAttribute <?php echo $model->attribute_id; ?></h2>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>