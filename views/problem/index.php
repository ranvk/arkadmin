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
        <h3 class="header-title">当前故障</h3>
        <p class="header-info">在此页面您可以查看故障历史</p>
    </div>
</div>
<div class="main-content">
    <div class="row">
        <?= Html::a('历史', ['history'], ['class' => 'btn btn-primary', 'style' => '']) ?>
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
                return \app\models\Triggers::getPriority($model['priority']);
            }
        ],
        [
            'label' => '主机名称',
            'value' => function ($model) {
                return $model['name'];
            }
        ],
        [
            'format' => 'raw',
            'label' => '故障',
            'value' => function ($model) {
                $description = str_replace('{HOST.NAME}', $model['name'], $model['description']);
//                return $description;
                return Html::a($description,
                    ['view', 'eventid' => $model['eventid']],
                    ['data-title' => $description, 'data-toggle' => 'modal', 'data-target' => '#view_modal']);
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
            'format' => 'raw',
            'attribute' => 'acknowledgeid',
            'label' => '跟进',
            'value' => function ($model) {
                if (!isset($model['acknowledgecount'])) {
                    $result = '<span class="label label-danger arrowed arrow-left-in">未跟进</span>';
                } else {
                    $result = '<span class="label label-success arrowed arrow-right">已跟进&nbsp;<span class="">' .
                        $model['acknowledgecount'] . '</span></span>';
                }
                $description = str_replace('{HOST.NAME}', $model['name'], $model['description']);

                return Html::a($result,
//                    ['acknowledge', 'eventid' => $model['eventid']],
                    '#',
                    [
                        'data-title' => $description,
                        'data-eventid' =>$model['eventid'],
                        'data-toggle' => 'modal',
                        'data-target' => '#ack_modal',
                    ]);


            }
        ],

        ['class' => 'yii\grid\ActionColumn'],
    ],
]); ?>

<?= \app\widgets\ModalWidget::widget(['modalid' => 'view_modal']) ?>
<?= \app\widgets\AckModalWidget::widget(['modalid' => 'ack_modal','title' => '问题跟进']) ?>

