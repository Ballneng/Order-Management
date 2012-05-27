<?php
$this->breadcrumbs=array(
	'Orders'=>array('index'),
	'Manage',
);

 

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('order-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h2>管理 Orders 项目</h2>

<p>
你可以使用 (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) 对有关项目进行搜索。
</p>

<?php echo CHtml::link('高级搜索','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.BootGridView',array(
	'id'=>'order-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'order_id',
		'order_site_id',
		'invoice_id',
		'customer_id',
		'order_subtotal',
		'order_trackingtotal',
		/*
		'order_promo_free',
		'order_coupon',
		'order_grandtotal',
		'order_currency_id',
		'order_payment_id',
		'order_carrier_id',
		'order_address_id',
		'order_ship_id',
		'order_discount_id',
		'order_status',
		'order_valid',
		'order_export',
		'order_qty',
		'order_ip',
		'order_salt',
		'order_comment',
		'order_create_at',
		'order_payment_at',
		*/
		array(
			'class'=>'bootstrap.widgets.BootButtonColumn',
		),
	),
)); ?>
