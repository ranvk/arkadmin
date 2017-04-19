<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $form ActiveForm */

/* ===========================以下为本页配置信息============================ */
/* 页面基本属性 */
$this->title = '角色管理';
$this->params['breadcrumbs'][] = $this->title;  // 在\yii\base\View中有$params这个可以在视图模板中共享的参数

/* 加载页面级别资源 */
//\backend\assets\TablesAsset::register($this);

?>

<div class="header">
    <div class="col-md-12">
        <h3 class="header-title">角色配置</h3>
        <p class="header-info">在此页面您可以配置角色和权限</p>
    </div>
</div>
<div class ="main-content">
    <div class="row">
        <div class="col-md-12">
            <?=Html::a('<i class="fa fa-plus"></i> 添加',['create'],['class'=>'btn btn-primary','style'=>''])?>
            <?=Html::a('<i class="fa fa-trash-o"></i> 删除',['delete'],['class'=>'btn btn-danger ajax-post confirm','target-form'=>'ids','style'=>'margin-right:10px;'])?>
            <div class="btn-group">
                <button class="btn blue btn-sm dropdown-toggle" type="button" data-toggle="dropdown">
                    工具箱
                    <i class="fa fa-angle-down"></i>
                </button>
                <ul class="dropdown-menu pull-right" role="menu">
                    <li><a href="javascript:;"><i class="fa fa-pencil"></i> 导出Excel </a></li>
                    <li class="divider"> </li>
                    <li><a href="javascript:;"> 其他 </a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <!--<form class="ids">-->

            <?= GridView::widget([
                'dataProvider' => $roles,
                'tableOptions' => ['class' => 'table table-striped table-hover'],
//                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    [
                        'class' => 'yii\grid\CheckboxColumn',
//                        'name' => 'id',
                    ],
                    'name',
                    'description',
                    'createdAt',
                    'updatedAt',
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'header' => '操作',
                        'template' => '{auth} {user} {update} {delete}',
                        //'options' => ['width' => '200px;'],
                        'buttons' => [
                            'auth' => function ($url, $model, $key) {
                                return Html::a('<i class="fa fa-user"></i> 授权', ['update','role'=>$key], [
                                    'title' => Yii::t('app', '授权'),
                                    'class' => 'btn btn-xs red'
                                ]);
                            },
                            'user' => function ($url, $model, $key) {
                                return Html::a('<i class="fa fa-edit"></i> 用户', ['update','role'=>$key], [
                                    'title' => Yii::t('app', '用户'),
                                    'class' => 'btn btn-xs red'
                                ]);
                            },
                            'update' => function ($url, $model, $key) {
                                return Html::a('<i class="fa fa-edit"></i> 编辑', ['auth','role'=>$key], [
                                    'title' => Yii::t('app', '编辑'),
                                    'class' => 'btn btn-xs purple'
                                ]);
                            },
                            'delete' => function ($url, $model, $key) {
                                return Html::a('<i class="fa fa-times"></i>', ['delete', 'role'=>$key], [
                                    'title' => Yii::t('app', '删除'),
                                    'class' => 'btn btn-xs red ajax-get confirm'
                                ]);
                            }
                        ],
                    ],
                ],
            ]); ?>

            <!--</form>-->
        </div>
    </div>
</div>


<!-- 定义数据块 -->
<?php $this->beginBlock('test'); ?>
jQuery(document).ready(function() {
    highlight_subnav('auth/index'); //子导航高亮
});
<?php $this->endBlock() ?>
<!-- 将数据块 注入到视图中的某个位置 -->
<?php $this->registerJs($this->blocks['test'], \yii\web\View::POS_END); ?>
