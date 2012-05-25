<?php $this->beginContent('/layouts/main'); ?>

<div class="span-19">

    <div id="content">
        <?php echo $content; ?>
    </div><!-- content -->
    <div class="span-5 last">
        <div id="sidebar">
            <?php
            $this->widget('bootstrap.widgets.BootMenu', array(
                'type' => 'list',
                'items' => $this->menu,
            ));
            ?>
        </div><!-- sidebar -->
    </div>
</div>

<?php $this->endContent(); ?>