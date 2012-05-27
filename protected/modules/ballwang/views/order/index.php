<?php
$this->breadcrumbs=array(
	'Orders',
);

?> 
<h1>Orders</h1>

<?php $this->widget('bootstrap.widgets.BootListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
