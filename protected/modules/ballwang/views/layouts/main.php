<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />


        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    </head>

    <body>

        <div class="container" id="page">

            <div id="header">
                <div id="logo"> </div>
            </div><!-- header -->

            <div id="mainmenu">
                <?php
                $this->widget('bootstrap.widgets.BootNavbar', array(
                    'fixed' => false,
                    'brand' => '订单管理',
                    'brandUrl' => '/ballwang',
                    'collapse' => true, // requires bootstrap-responsive.css
                    'items' => array(
                        array(
                            'class' => 'bootstrap.widgets.BootMenu',
                            'items' => array(
                                 
                                array('label' => '订单管理', 'url' => '#', 'items' => array(
                                        array('label' => '订单常用管理'),
                                        array('label' => '查看订单','icon'=>'time', 'url' => '/ballwang/site/create'),
                                        array('label' => '销售统计','icon'=>'tag', 'url' => '#'),
                                        array('label' => '分析统计','icon'=>'check',   'url' => '#'),
                                        '---',
                                        array('label' => '订单及时操作'),
                                        array('label' => '订单导出','icon'=>'eye-open', 'url' => '#'),
                                        array('label' => '订单同步','icon'=>'refresh', 'url' => '#'),
                                ), 'active' => true),
                                array('label' => '网站管理', 'url' => '#', 'items' => array(
                                        array('label' => 'PRE HEADER'),
                                        array('label' => '添加网站', 'url' => '/ballwang/site/create'),
                                        array('label' => 'Another action', 'url' => '#'),
                                        array('label' => 'Something else here', 'url' => '#'),
                                        '---',
                                        array('label' => 'NAV HEADER'),
                                        array('label' => 'Separated link', 'url' => '#'),
                                        array('label' => 'One more separated link', 'url' => '#'),
                                )),
                            ),
                        ),
                        array(
                            'class' => 'bootstrap.widgets.BootMenu',
                            'htmlOptions' => array('class' => 'pull-right'),
                            'items' => array(
                                array('label' => 'Link', 'url' => '#'),
                                '---',
                                array('label' => '用户中心', 'url' => '#', 'items' => array(
                                        array('label' => 'USE HEADER'),
                                        array('label' => '修改密码', 'url' => '#'),
                                        array('label' => '管理员权限', 'url' => '#'),
                                        array('label' => '', 'url' => '#'),
                                        '---',
                                        array('label' => 'NAV HEADER'),
                                        array('label' => '退出(' . Yii::app()->user->name . ')', 'url' => '/site/logout'),
                                    ), 'visible' => !Yii::app()->user->isGuest),
                                array('label' => '登录', 'url' => '#', 'visible' => Yii::app()->user->isGuest),
                            ),
                        ),
                    ),
                ));
                ?>
            </div><!-- mainmenu -->
                <?php if (isset($this->breadcrumbs)): ?>
                <?php
                $this->widget('zii.widgets.CBreadcrumbs', array(
                    'links' => $this->breadcrumbs,
                ));
                ?><!-- breadcrumbs -->
            <?php endif ?>

            <?php echo $content; ?>

            <div class="clear"></div>

            <div id="footer" style="clear: both;text-align: center;">
                Copyright &copy; <?php echo date('Y'); ?> by Ballwang.<br/>
                All Rights Reserved.<br/>
<?php echo Yii::powered(); ?>
            </div><!-- footer -->

        </div><!-- page -->

    </body>
</html>
