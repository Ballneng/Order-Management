<?php
$this->breadcrumbs=array(
	'Sites'=>array('index'),
	'Create',
);
?>

<h2>创建 Site 项目</h2>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>