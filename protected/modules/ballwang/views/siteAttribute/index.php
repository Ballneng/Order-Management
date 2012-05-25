<?php
$this->breadcrumbs=array(
	'Site Attributes',
);
 
<h1>Site Attributes</h1>

<?php $this->widget('bootstrap.widgets.BootListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
