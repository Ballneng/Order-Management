<?php
$this->breadcrumbs=array(
	'Orders'=>array('index'),
	$model->order_id,
);
?>
 

<h2>查看 Order <?php echo $model->order_id; ?></h2>

<?php $this->widget('bootstrap.widgets.BootDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'order_id',
		'order_site_id',
		'invoice_id',
		'customer_id',
		'order_subtotal',
		'order_trackingtotal',
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
	),
)); ?>
