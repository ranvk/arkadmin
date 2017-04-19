<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Hosts */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Hosts',
]) . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Hosts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->hostid]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="hosts-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
