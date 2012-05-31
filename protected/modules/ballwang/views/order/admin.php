<?php
$this->breadcrumbs = array(
    'Orders' => array('index'),
    'Manage',
);
 
?>

<h2>管理 Orders 项目</h2>

<p>
    你可以使用 (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
    or <b>=</b>) 对有关项目进行搜索。
</p>

 

<?php
$this->widget('bootstrap.widgets.BootGridView', array(
    'id' => 'order-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'type'=>'striped',
    'columns' => array(
        array(
            'header' => '订单号',
            'name' => 'invoice_id',
            'value' => '$data->getInvoice()',
            'htmlOptions'=>array(
                'style'=>'width: 150px;color:#090;',
            ),
        ),
//		'order_site_id',
       
        array(
            'header' => '订单状态',
            'name' => 'order_status',
            'type' => 'raw',
            'value' => 'Lookup::item("payment_status",$data->order_status)',
            'filter' => Lookup::items("payment_status"),
            'htmlOptions'=>array(
                'style'=>'width: 150px;',
            ),
        ),
      
        array(
             'header' => '订单状态',
            'name' => 'customer_id',
            'type' => 'raw',
            'value' => '$data->customer->customer_email',
            'htmlOptions'=>array(
                'style'=>'width: 150px;color:#090;',
            ),
        ),
        'order_grandtotal',
         
        array(
             'header' => '货运方式',
            'name' => 'order_carrier_id',
            'type' => 'raw',
            'value' => '$data->carrier->carrier_name',
            'filter'=>FALSE,
            'htmlOptions'=>array(
                'style'=>'width: 150px;',
            ),
        ),
    
        array(
             'header' => '操作',
            'class' => 'bootstrap.widgets.BootButtonColumn',
            'template' => '{view} {shipping}',
            'buttons' => array(
                'view' => array(
                    'url' => 'Yii::app()->controller->createUrl("order/view",array("id"=>$data->order_id))',
                    'options' => array("target" => "_blank"),
                ),
                'shipping' => array(
                    'label' => 'Shipping',
                    'imageUrl' => '/images/fam_lorry.gif',
                    'visible' => '$data->order_status==' . Order::Delived . ' OR $data->order_status==' . Order::Shipped,
                ),
            ),
        ),
    ),
));
?>
