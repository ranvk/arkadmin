<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\models\Menu;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\assets\LayoutAsset;

//AppAsset::register($this);
LayoutAsset::register($this);

//$this->registerCssFile('@web/css/site.css',['depends'=>['app\assets\LayoutAsset']]);

$context = $this->context;
$route = $context->action->getUniqueId()?:$context->getUniqueId().'/'.$context->defaultAction;

$allMenu = Menu::getMenus($route); // 获取后台栏目

//var_dump($allMenu[1]);exit;
//$breadcrumbs = Menu::getBreadcrumbs($route); // 面包屑导航

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

    <link rel="shortcut icon" href="/img/ico/favicon.png"/>

</head>

<body class="cover">
<?php $this->beginBody() ?>
<div class="wrapper">
    <!-- Demo Bar -->
    <div id="layout_options">
        <a href="#" class="options-handle"><i class="fa fa-gear"></i></a>
        <h5>Layout Options</h5>
        <label>
            <input type="checkbox" id="fixed_header"/>
            Fixed header
        </label>
        <label>
            <input type="checkbox" id="fixed_container"/>
            Within a container
        </label>
    </div>
    <!-- END: Demo Bar -->

    <!-- HEAD NAV -->
    <div class="navbar navbar-default navbar-static-top navbar-main" role="navigation">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.html"><i class="fa fa-html5"></i> Ark</a>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <li class="visible-xs">
                <a href="#" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar">
                    <span class="sr-only">Toggle navigation</span>
                    <i class="fa fa-bars"></i>
                </a>
            </li>
            <li class="dropdown notification">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <span class="label label-danger arrowed arrow-left-in pull-right">12</span>
                    <i class="fa fa-bell"></i>
                </a>
                <ul class="dropdown-menu pull-right">
                    <?php echo $this->render('@app/views/layouts/public/notification.php') ?>
                    <li class="open-section">
                        <a href="#">查看所有消息</a>
                    </li>
                </ul>
            </li>
            <li class="dropdown notification">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <span class="label label-primary arrowed arrow-left-in pull-right">6</span>
                    <i class="fa fa-inbox"></i>
                </a>
                <ul class="dropdown-menu pull-right">
                    <?php echo $this->render('@app/views/layouts/public/task.php') ?>
                    <li class="open-section">
                        <a href="#">查看所有任务</a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle avatar pull-right" data-toggle="dropdown">
                    <img src="#" alt="mike" class="img-avatar"/>
                    <span class="hidden-small"><?=isset(Yii::$app->user->identity->username)?Yii::$app->user->identity->username:'未登录'?><b class="caret"></b></span>
                </a>
                <ul class="dropdown-menu pull-right">
                    <li><a href="#"><i class="fa fa-gear"></i>Account Settings</a></li>
                    <li><a href="profile.html"><i class="fa fa-user"></i>View Profile</a></li>
                    <li class="divider"></li>
                    <li>
                        <a href="<?=\yii\helpers\Url::toRoute('/site/logout')?>"  data-method="post">
                            <i class="fa fa-sign-out"></i>退出
                        </a>
                    </li>
                </ul>
            </li>
        </ul>

    </div>
    <!-- END: HEAD NAV -->

    <!-- BODY -->
    <div class="body">

        <!-- SIDEBAR -->
        <aside class="sidebar">
            <?php echo $this->render('@app/views/layouts/public/menu.php', ['allMenu'=>$allMenu]) ?>
        </aside>
        <!-- END: SIDEBAR -->
        <section class="content">
            <?= Breadcrumbs::widget([
                 'homeLink'=>[
                     'label'=>'<i class="fa fa-home fa-fw"></i> 主页',// 修改默认的Home
                     'encode' => false,
                     'url'=>\yii\helpers\Url::to(['site/index']),// 修改默认的Home指向的url地址
                 ],
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= $content ?>
        </section>

    </div>
    <!-- END: BODY -->
</div>


<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
