<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\HostsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Hosts');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hosts-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Hosts'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'hostid',
            'proxy_hostid',
            'host',
            'status',
            'disable_until',
            // 'error',
            // 'available',
            // 'errors_from',
            // 'lastaccess',
            // 'ipmi_authtype',
            // 'ipmi_privilege',
            // 'ipmi_username',
            // 'ipmi_password',
            // 'ipmi_disable_until',
            // 'ipmi_available',
            // 'snmp_disable_until',
            // 'snmp_available',
            // 'maintenanceid',
            // 'maintenance_status',
            // 'maintenance_type',
            // 'maintenance_from',
            // 'ipmi_errors_from',
            // 'snmp_errors_from',
            // 'ipmi_error',
            // 'snmp_error',
            // 'jmx_disable_until',
            // 'jmx_available',
            // 'jmx_errors_from',
            // 'jmx_error',
            // 'name',
            // 'flags',
            // 'templateid',
            // 'description:ntext',
            // 'tls_connect',
            // 'tls_accept',
            // 'tls_issuer',
            // 'tls_subject',
            // 'tls_psk_identity',
            // 'tls_psk',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
