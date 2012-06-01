<?php
$this->widget('bootstrap.widgets.BootButton', array(
    'label' => '交易状态',
    'url' => '#myModal',
    'type' => 'primary',
    'htmlOptions' => array('data-toggle' => 'modal'),
));
?>
<br></br>
<?php
$form = $this->beginWidget('bootstrap.widgets.BootActiveForm', array(
    'id'=>'horizontalForm',
    'type'=>'inline',
    'htmlOptions'=>array('class'=>'well'),
));
echo $form->dropDownList($model, 'order_status', Lookup::items('payment_status'), array('id' => 'order_status', 'style' => 'width: 145px;'));
?>
<?php
$display = $model->order_status == Order::Shipped ? 'width: 100px;' : 'display:none;width: 100px;';
?>
<?php echo $form->textFieldRow($ship, 'ship_code', array('id' => 'ship_code', 'style' => $display,)); ?>
<?php $this->widget('bootstrap.widgets.BootButton', array('buttonType'=>'submit', 'icon'=>'ok', 'label'=>'提交')); ?>
<?php $this->endWidget(); ?>

<?php $this->beginWidget('bootstrap.widgets.BootModal', array('id' => 'myModal')); ?>
<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h3>Modal header</h3>
</div>

<div class="modal-body">
    <p>One fine body...</p>
</div>

<div class="modal-footer">
    <?php
    $this->widget('bootstrap.widgets.BootButton', array(
        'type' => 'primary',
        'label' => 'Save changes',
        'url' => '#',
        'htmlOptions' => array('data-dismiss' => 'modal'),
    ));
    ?>
    <?php
    $this->widget('bootstrap.widgets.BootButton', array(
        'label' => 'Close',
        'url' => '#',
        'htmlOptions' => array('data-dismiss' => 'modal'),
    ));
    ?>
</div>
<?php $this->endWidget(); ?>

