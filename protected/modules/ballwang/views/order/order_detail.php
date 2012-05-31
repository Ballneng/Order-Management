



<?php $this->beginWidget('bootstrap.widgets.BootModal', array('id'=>'myModal')); ?>
<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h3>Modal header</h3>
</div>
 
<div class="modal-body">
    <p>One fine body...</p>
</div>
 
<div class="modal-footer">
    <?php $this->widget('bootstrap.widgets.BootButton', array(
        'type'=>'primary',
        'label'=>'Save changes',
        'url'=>'#',
        'htmlOptions'=>array('data-dismiss'=>'modal'),
    )); ?>
    <?php $this->widget('bootstrap.widgets.BootButton', array(
        'label'=>'Close',
        'url'=>'#',
        'htmlOptions'=>array('data-dismiss'=>'modal'),
    )); ?>
</div>
<?php $this->endWidget(); ?>
<?php $this->widget('bootstrap.widgets.BootButton', array(
    'label'=>'Click me',
    'url'=>'#myModal',
    'type'=>'primary',
    'htmlOptions'=>array('data-toggle'=>'modal'),
)); ?>
