<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\HostsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hosts-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'hostid') ?>

    <?= $form->field($model, 'proxy_hostid') ?>

    <?= $form->field($model, 'host') ?>

    <?= $form->field($model, 'status') ?>

    <?= $form->field($model, 'disable_until') ?>

    <?php // echo $form->field($model, 'error') ?>

    <?php // echo $form->field($model, 'available') ?>

    <?php // echo $form->field($model, 'errors_from') ?>

    <?php // echo $form->field($model, 'lastaccess') ?>

    <?php // echo $form->field($model, 'ipmi_authtype') ?>

    <?php // echo $form->field($model, 'ipmi_privilege') ?>

    <?php // echo $form->field($model, 'ipmi_username') ?>

    <?php // echo $form->field($model, 'ipmi_password') ?>

    <?php // echo $form->field($model, 'ipmi_disable_until') ?>

    <?php // echo $form->field($model, 'ipmi_available') ?>

    <?php // echo $form->field($model, 'snmp_disable_until') ?>

    <?php // echo $form->field($model, 'snmp_available') ?>

    <?php // echo $form->field($model, 'maintenanceid') ?>

    <?php // echo $form->field($model, 'maintenance_status') ?>

    <?php // echo $form->field($model, 'maintenance_type') ?>

    <?php // echo $form->field($model, 'maintenance_from') ?>

    <?php // echo $form->field($model, 'ipmi_errors_from') ?>

    <?php // echo $form->field($model, 'snmp_errors_from') ?>

    <?php // echo $form->field($model, 'ipmi_error') ?>

    <?php // echo $form->field($model, 'snmp_error') ?>

    <?php // echo $form->field($model, 'jmx_disable_until') ?>

    <?php // echo $form->field($model, 'jmx_available') ?>

    <?php // echo $form->field($model, 'jmx_errors_from') ?>

    <?php // echo $form->field($model, 'jmx_error') ?>

    <?php // echo $form->field($model, 'name') ?>

    <?php // echo $form->field($model, 'flags') ?>

    <?php // echo $form->field($model, 'templateid') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'tls_connect') ?>

    <?php // echo $form->field($model, 'tls_accept') ?>

    <?php // echo $form->field($model, 'tls_issuer') ?>

    <?php // echo $form->field($model, 'tls_subject') ?>

    <?php // echo $form->field($model, 'tls_psk_identity') ?>

    <?php // echo $form->field($model, 'tls_psk') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
