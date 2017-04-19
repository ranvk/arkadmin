<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Hosts */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hosts-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'hostid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'proxy_hostid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'host')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'disable_until')->textInput() ?>

    <?= $form->field($model, 'error')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'available')->textInput() ?>

    <?= $form->field($model, 'errors_from')->textInput() ?>

    <?= $form->field($model, 'lastaccess')->textInput() ?>

    <?= $form->field($model, 'ipmi_authtype')->textInput() ?>

    <?= $form->field($model, 'ipmi_privilege')->textInput() ?>

    <?= $form->field($model, 'ipmi_username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ipmi_password')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ipmi_disable_until')->textInput() ?>

    <?= $form->field($model, 'ipmi_available')->textInput() ?>

    <?= $form->field($model, 'snmp_disable_until')->textInput() ?>

    <?= $form->field($model, 'snmp_available')->textInput() ?>

    <?= $form->field($model, 'maintenanceid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'maintenance_status')->textInput() ?>

    <?= $form->field($model, 'maintenance_type')->textInput() ?>

    <?= $form->field($model, 'maintenance_from')->textInput() ?>

    <?= $form->field($model, 'ipmi_errors_from')->textInput() ?>

    <?= $form->field($model, 'snmp_errors_from')->textInput() ?>

    <?= $form->field($model, 'ipmi_error')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'snmp_error')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jmx_disable_until')->textInput() ?>

    <?= $form->field($model, 'jmx_available')->textInput() ?>

    <?= $form->field($model, 'jmx_errors_from')->textInput() ?>

    <?= $form->field($model, 'jmx_error')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'flags')->textInput() ?>

    <?= $form->field($model, 'templateid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'tls_connect')->textInput() ?>

    <?= $form->field($model, 'tls_accept')->textInput() ?>

    <?= $form->field($model, 'tls_issuer')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tls_subject')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tls_psk_identity')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tls_psk')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
