<?php
$this->breadcrumbs=array(
	'Orders'=>array('index'),
	$model->order_id,
);
?>
 
<br></br>
<h2>订单查看</h2>
<br>

<?php $this->widget('bootstrap.widgets.BootTabbable', array(
    'type'=>'tabs',
    'placement'=>'left', // 'above', 'right', 'below' or 'left'
    'tabs'=>array(
        array('label'=>'订单详情', 'content'=>$this->renderPartial('order_detail','',true), 'active'=>true),
        array('label'=>'客户留言', 'content'=>'<p>Howdy, I\'m in Section 2.</p>'),
        array('label'=>'货运查看', 'content'=>'<p>What up girl, this is Section 3.</p>'),
    ),
)); ?>
