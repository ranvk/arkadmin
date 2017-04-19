<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\AcknowledgesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="acknowledges-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'acknowledgeid') ?>

    <?= $form->field($model, 'userid') ?>

    <?= $form->field($model, 'eventid') ?>

    <?= $form->field($model, 'clock') ?>

    <?= $form->field($model, 'message') ?>

    <?php // echo $form->field($model, 'action') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
