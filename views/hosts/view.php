<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Hosts */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Hosts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>





<div class="hosts-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->hostid], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->hostid], [
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
            'hostid',
            'proxy_hostid',
            'host',
            'status',
            'disable_until',
            'error',
            'available',
            'errors_from',
            'lastaccess',
            'ipmi_authtype',
            'ipmi_privilege',
            'ipmi_username',
            'ipmi_password',
            'ipmi_disable_until',
            'ipmi_available',
            'snmp_disable_until',
            'snmp_available',
            'maintenanceid',
            'maintenance_status',
            'maintenance_type',
            'maintenance_from',
            'ipmi_errors_from',
            'snmp_errors_from',
            'ipmi_error',
            'snmp_error',
            'jmx_disable_until',
            'jmx_available',
            'jmx_errors_from',
            'jmx_error',
            'name',
            'flags',
            'templateid',
            'description:ntext',
            'tls_connect',
            'tls_accept',
            'tls_issuer',
            'tls_subject',
            'tls_psk_identity',
            'tls_psk',
        ],
    ]) ?>

</div>
