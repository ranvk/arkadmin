<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\search\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', '用户管理');
$this->params['breadcrumbs'][] = $this->title;

//var_dump($this->params['breadcrumbs']);die();
?>

<div class="header">
    <div class="col-md-12">
        <h3 class="header-title"><?=$this->title?></h3>
        <p class="header-info">在此页面您可以配置登录用户</p>
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
        <?php Pjax::begin(); ?>
        <div class="col-md-12">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'id',
                    'username',
                    'auth_key',
                    'password_hash',
                    'password_reset_token',
                     'email:email',
                     'status',
                     'created_at',
                     'updated_at',

                    [
                        'class' => 'yii\grid\ActionColumn',
                        'header' => '操作',
                        'template' => '{edit} {auth} {delete}',
                        //'options' => ['width' => '200px;'],
                        'buttons' => [
                            'edit' => function ($url, $model, $key) {
                                return Html::a('<i class="fa fa-edit"></i> 更新', ['update','id'=>$key], [
                                    'title' => Yii::t('app', '更新'),
                                    'class' => 'btn btn-xs red'
                                ]);
                            },
                            'auth' => function ($url, $model, $key) {
                                return Html::a('<i class="fa fa-user"></i> 授权', ['auth','id'=>$key], [
                                    'title' => Yii::t('app', '授权'),
                                    'class' => 'btn btn-xs purple'
                                ]);
                            },
                            'delete' => function ($url, $model, $key) {
                                return Html::a('<i class="fa fa-times"></i>', ['delete', 'id'=>$key], [
                                    'title' => Yii::t('app', '删除'),
                                    'class' => 'btn btn-xs red ajax-get confirm'
                                ]);
                            }
                        ],
                    ],
                ],
            ]); ?>
        </div>
        <?php Pjax::end(); ?>
    </div>
</div>
