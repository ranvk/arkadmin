<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "hosts".
 *
 * @property string $hostid
 * @property string $proxy_hostid
 * @property string $host
 * @property integer $status
 * @property integer $disable_until
 * @property string $error
 * @property integer $available
 * @property integer $errors_from
 * @property integer $lastaccess
 * @property integer $ipmi_authtype
 * @property integer $ipmi_privilege
 * @property string $ipmi_username
 * @property string $ipmi_password
 * @property integer $ipmi_disable_until
 * @property integer $ipmi_available
 * @property integer $snmp_disable_until
 * @property integer $snmp_available
 * @property string $maintenanceid
 * @property integer $maintenance_status
 * @property integer $maintenance_type
 * @property integer $maintenance_from
 * @property integer $ipmi_errors_from
 * @property integer $snmp_errors_from
 * @property string $ipmi_error
 * @property string $snmp_error
 * @property integer $jmx_disable_until
 * @property integer $jmx_available
 * @property integer $jmx_errors_from
 * @property string $jmx_error
 * @property string $name
 * @property integer $flags
 * @property string $templateid
 * @property string $description
 * @property integer $tls_connect
 * @property integer $tls_accept
 * @property string $tls_issuer
 * @property string $tls_subject
 * @property string $tls_psk_identity
 * @property string $tls_psk
 */
class Hosts extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hosts';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('zabbixdb');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['hostid', 'description'], 'required'],
            [['hostid', 'proxy_hostid', 'status', 'disable_until', 'available', 'errors_from', 'lastaccess', 'ipmi_authtype', 'ipmi_privilege', 'ipmi_disable_until', 'ipmi_available', 'snmp_disable_until', 'snmp_available', 'maintenanceid', 'maintenance_status', 'maintenance_type', 'maintenance_from', 'ipmi_errors_from', 'snmp_errors_from', 'jmx_disable_until', 'jmx_available', 'jmx_errors_from', 'flags', 'templateid', 'tls_connect', 'tls_accept'], 'integer'],
            [['description'], 'string'],
            [['host', 'name', 'tls_psk_identity'], 'string', 'max' => 128],
            [['error', 'ipmi_error', 'snmp_error', 'jmx_error'], 'string', 'max' => 2048],
            [['ipmi_username'], 'string', 'max' => 16],
            [['ipmi_password'], 'string', 'max' => 20],
            [['tls_issuer', 'tls_subject'], 'string', 'max' => 1024],
            [['tls_psk'], 'string', 'max' => 512],
            [['proxy_hostid'], 'exist', 'skipOnError' => true, 'targetClass' => Hosts::className(), 'targetAttribute' => ['proxy_hostid' => 'hostid']],
            [['maintenanceid'], 'exist', 'skipOnError' => true, 'targetClass' => Maintenances::className(), 'targetAttribute' => ['maintenanceid' => 'maintenanceid']],
            [['templateid'], 'exist', 'skipOnError' => true, 'targetClass' => Hosts::className(), 'targetAttribute' => ['templateid' => 'hostid']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'hostid' => 'Hostid',
            'proxy_hostid' => 'Proxy Hostid',
            'host' => 'Host',
            'status' => 'Status',
            'disable_until' => 'Disable Until',
            'error' => 'Error',
            'available' => 'Available',
            'errors_from' => 'Errors From',
            'lastaccess' => 'Lastaccess',
            'ipmi_authtype' => 'Ipmi Authtype',
            'ipmi_privilege' => 'Ipmi Privilege',
            'ipmi_username' => 'Ipmi Username',
            'ipmi_password' => 'Ipmi Password',
            'ipmi_disable_until' => 'Ipmi Disable Until',
            'ipmi_available' => 'Ipmi Available',
            'snmp_disable_until' => 'Snmp Disable Until',
            'snmp_available' => 'Snmp Available',
            'maintenanceid' => 'Maintenanceid',
            'maintenance_status' => 'Maintenance Status',
            'maintenance_type' => 'Maintenance Type',
            'maintenance_from' => 'Maintenance From',
            'ipmi_errors_from' => 'Ipmi Errors From',
            'snmp_errors_from' => 'Snmp Errors From',
            'ipmi_error' => 'Ipmi Error',
            'snmp_error' => 'Snmp Error',
            'jmx_disable_until' => 'Jmx Disable Until',
            'jmx_available' => 'Jmx Available',
            'jmx_errors_from' => 'Jmx Errors From',
            'jmx_error' => 'Jmx Error',
            'name' => 'Name',
            'flags' => 'Flags',
            'templateid' => 'Templateid',
            'description' => 'Description',
            'tls_connect' => 'Tls Connect',
            'tls_accept' => 'Tls Accept',
            'tls_issuer' => 'Tls Issuer',
            'tls_subject' => 'Tls Subject',
            'tls_psk_identity' => 'Tls Psk Identity',
            'tls_psk' => 'Tls Psk',
        ];
    }
}
