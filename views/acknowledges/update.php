<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Acknowledges */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Acknowledges',
]) . $model->acknowledgeid;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Acknowledges'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->acknowledgeid, 'url' => ['view', 'id' => $model->acknowledgeid]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="acknowledges-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
