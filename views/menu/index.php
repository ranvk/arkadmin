<?php

use yii\widgets\Pjax;
use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Menu;

/* @var $model app\models\Menu */
/* @var $dataProvider yii\data\ActiveDataProvider  */
/* @var $searchModel app\models\search\MenuSearch */

/* ===========================以下为本页配置信息================================= */
/* 页面基本属性 */
$this->title = Yii::t('app', '菜单管理');
$this->params['breadcrumbs'][] = $this->title; // 在\yii\base\View中有$params这个可以在视图模板中共享的参数
/* 加载页面级别资源 */
//\backend\assets\TablesAsset::register($this);

$columns = [
//    [
//        'class' => 'yii\grid\CheckboxColumn',
//        'name' => 'id',
//    ],
    [
        'header' => 'ID',
        'attribute' => 'id',
        'options' => ['width' => '50px;']
    ],
    [
        'header' => '名称',
        'attribute' => 'title'
    ],
    [
        'header' => '菜单路径',
        'options' => ['width' => '300px;'],
        'content' => function($model, $key){
            if($model['pid'] == 0){
                return '无';
            } else {
                $nav = Menu::getParentMenus($key);
                $nav_title = '';
                foreach ($nav as $value) {
                    $nav_title .= Html::a($value['title'], ['index', 'id'=>$value['id']]).' > ';
                }
                $nav_title = trim($nav_title, ' > ');
                return $nav_title;
            }
        }
    ],
    [
        'label' => '分组',
        'value' => function($model){
            return $model['group'] ? $model['group'] : '';
        }
    ],
    [
        'label' => 'URL',
        'value' => 'url'
    ],
    [
        'label' => '排序',
        'value' => 'sort',
        'options' => ['width' => '50px;'],
    ],
    [
        'label' => '是否隐藏',
        'options' => ['width' => '100px;'],
        'content' => function($model){
            return $model['hide'] ? Html::tag('span','隐藏',['style'=>'color:#f00;']) : '正常';
        }
    ],
    [
        'class' => 'yii\grid\ActionColumn',
        'header' => '操作',
        'template' => '{view} {edit} {delete}',
        'options' => ['width' => '200px;'],
        'buttons' => [
            'view' => function ($url, $model, $key) {
                return Html::a('<i class="fa fa-eye"></i>', ['index', 'pid'=>$key], [
                    'title' => Yii::t('app', '下级菜单'),
                    'class' => 'btn btn-xs blue'
                ]);
            },
            'edit' => function ($url, $model, $key) {
                return Html::a('<i class="fa fa-edit"></i>', ['update', 'id'=>$key], [
                    'title' => Yii::t('app', '更新'),
                    'class' => 'btn btn-xs purple'
                ]);
            },
            'delete' => function ($url, $model, $key) {
                return Html::a('<i class="fa fa-times"></i>', $url, [
                    'title' => Yii::t('app', '删除'),
                    'class' => 'btn btn-xs red ajax-get confirm'
                ]);
            }
        ],
    ],
];

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
            <?php echo $this->render('_search', ['model' => $searchModel]); ?> <!-- 条件搜索-->
        </div>
        <div class="col-md-12">
            <?= GridView::widget([
                'dataProvider' => $dataProvider, // 列表数据
                //'filterModel' => $searchModel, // 搜索模型
                'options' => ['class' => 'grid-view table-scrollable'],
                /* 表格配置 */
                'tableOptions' => ['class' => 'table table-striped table-bordered table-hover table-checkable order-column dataTable no-footer'],
                /* 重新排版 摘要、表格、分页 */
                'layout' => '{items}<div class=""><div class="col-md-5 col-sm-5">{summary}</div><div class="col-md-7 col-sm-7"><div class="dataTables_paginate paging_bootstrap_full_number" style="text-align:right;">{pager}</div></div></div>',
                /* 配置摘要 */
                'summaryOptions' => ['class' => 'pagination'],
                /* 配置分页样式 */
                'pager' => [
                    'options' => ['class'=>'pagination','style'=>'visibility: visible;'],
                    'nextPageLabel' => '下一页',
                    'prevPageLabel' => '上一页',
                    'firstPageLabel' => '第一页',
                    'lastPageLabel' => '最后页'
                ],
                /* 定义列表格式 */
                'columns' => $columns,
            ]); ?>
        </div>
        <?php Pjax::end(); ?>
    </div>
</div>



<!-- 定义数据块 -->
<?php $this->beginBlock('test'); ?>
jQuery(document).ready(function() {
    highlight_subnav('menu/index'); //子导航高亮
});
<?php $this->endBlock() ?>
<!-- 将数据块 注入到视图中的某个位置 -->
<?php $this->registerJs($this->blocks['test'], \yii\web\View::POS_END); ?>
