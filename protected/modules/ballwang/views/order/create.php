<?php
$this->breadcrumbs=array(
	'Orders'=>array('index'),
	'Create',
);

?> 

<h2>创建 Order 项目</h2>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>