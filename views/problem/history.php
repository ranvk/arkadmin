<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\ProblemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Problems');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="header">
    <div class="col-md-12">
        <h3 class="header-title">故障历史</h3>
        <p class="header-info">在此页面您可以查看故障历史</p>
    </div>
</div>
<div class ="main-content">
    <div class="row">
        <?=Html::a('问题',['index'],['class'=>'btn btn-primary','style'=>''])?>
    </div>
</div>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'label' => '故障产生时间',
                'value' => function ($model) {
                    return date('Y-m-d H:i:s', $model['clock']);
                }
            ],
            [
                'label' => '级别',
                'value' => function ($model) {
                    return  \app\models\Triggers::getPriority($model['priority']);
                }
            ],
            [
                'label' => '主机名称',
                'value' => function ($model) {
                    return $model['name'];
                }
            ],
            [
                'label' => '故障',
                'value' => function ($model) {
                    $description = str_replace('{HOST.NAME}', $model['name'], $model['description']);
                    return $description;
                }
            ],
            [
                'label' => '持续时间',
                'value' => function ($model) {
                    $time = time() - $model['clock'];
                    $duration = \app\components\helpers\StringHelper::formatDuration($time);
                    return $duration;
                }
            ],
            [
                'label' => '跟进情况',
                'value' => function($model){
                    $result = $model['eventid'];
                    return $result;
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

