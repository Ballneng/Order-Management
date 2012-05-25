<?php
$this->breadcrumbs=array(
	'Sites'=>array('index'),
	$model->site_id,
);
?>
 

<h2>查看 Site <?php echo $model->site_id; ?></h2>

<?php $this->widget('bootstrap.widgets.BootDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'site_id',
		'site_name',
		'site_prefix',
		'site_db_host',
		'site_db_name',
		'site_db_password',
		'site_attribute_id',
	),
)); ?>
