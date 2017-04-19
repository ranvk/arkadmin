<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Acknowledges */

$this->title = $model->acknowledgeid;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Acknowledges'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="acknowledges-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->acknowledgeid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->acknowledgeid], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'acknowledgeid',
            'userid',
            'eventid',
            'clock',
            'message',
            'action',
        ],
    ]) ?>

</div>
