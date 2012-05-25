<?php
$this->breadcrumbs=array(
	'Sites',
);
?>
<h1>Sites</h1>

<?php $this->widget('bootstrap.widgets.BootListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
