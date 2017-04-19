<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "items".
 *
 * @property string $itemid
 * @property integer $type
 * @property string $snmp_community
 * @property string $snmp_oid
 * @property string $hostid
 * @property string $name
 * @property string $key_
 * @property integer $delay
 * @property integer $history
 * @property integer $trends
 * @property integer $status
 * @property integer $value_type
 * @property string $trapper_hosts
 * @property string $units
 * @property integer $multiplier
 * @property integer $delta
 * @property string $snmpv3_securityname
 * @property integer $snmpv3_securitylevel
 * @property string $snmpv3_authpassphrase
 * @property string $snmpv3_privpassphrase
 * @property string $formula
 * @property string $error
 * @property string $lastlogsize
 * @property string $logtimefmt
 * @property string $templateid
 * @property string $valuemapid
 * @property string $delay_flex
 * @property string $params
 * @property string $ipmi_sensor
 * @property integer $data_type
 * @property integer $authtype
 * @property string $username
 * @property string $password
 * @property string $publickey
 * @property string $privatekey
 * @property integer $mtime
 * @property integer $flags
 * @property string $interfaceid
 * @property string $port
 * @property string $description
 * @property integer $inventory_link
 * @property string $lifetime
 * @property integer $snmpv3_authprotocol
 * @property integer $snmpv3_privprotocol
 * @property integer $state
 * @property string $snmpv3_contextname
 * @property integer $evaltype
 */
class Items extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'items';
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
            [['itemid', 'hostid', 'params', 'description'], 'required'],
            [['itemid', 'type', 'hostid', 'delay', 'history', 'trends', 'status', 'value_type', 'multiplier', 'delta', 'snmpv3_securitylevel', 'lastlogsize', 'templateid', 'valuemapid', 'data_type', 'authtype', 'mtime', 'flags', 'interfaceid', 'inventory_link', 'snmpv3_authprotocol', 'snmpv3_privprotocol', 'state', 'evaltype'], 'integer'],
            [['params', 'description'], 'string'],
            [['snmp_community', 'snmpv3_securityname', 'snmpv3_authpassphrase', 'snmpv3_privpassphrase', 'logtimefmt', 'username', 'password', 'publickey', 'privatekey', 'port', 'lifetime'], 'string', 'max' => 64],
            [['snmp_oid', 'name', 'key_', 'trapper_hosts', 'units', 'formula', 'delay_flex', 'snmpv3_contextname'], 'string', 'max' => 255],
            [['error'], 'string', 'max' => 2048],
            [['ipmi_sensor'], 'string', 'max' => 128],
            [['hostid', 'key_'], 'unique', 'targetAttribute' => ['hostid', 'key_'], 'message' => 'The combination of Hostid and Key has already been taken.'],
            [['hostid'], 'exist', 'skipOnError' => true, 'targetClass' => Hosts::className(), 'targetAttribute' => ['hostid' => 'hostid']],
            [['templateid'], 'exist', 'skipOnError' => true, 'targetClass' => Items::className(), 'targetAttribute' => ['templateid' => 'itemid']],
//            [['valuemapid'], 'exist', 'skipOnError' => true, 'targetClass' => Valuemaps::className(), 'targetAttribute' => ['valuemapid' => 'valuemapid']],
//            [['interfaceid'], 'exist', 'skipOnError' => true, 'targetClass' => Interface::className(), 'targetAttribute' => ['interfaceid' => 'interfaceid']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'itemid' => 'Itemid',
            'type' => 'Type',
            'snmp_community' => 'Snmp Community',
            'snmp_oid' => 'Snmp Oid',
            'hostid' => 'Hostid',
            'name' => 'Name',
            'key_' => 'Key',
            'delay' => 'Delay',
            'history' => 'History',
            'trends' => 'Trends',
            'status' => 'Status',
            'value_type' => 'Value Type',
            'trapper_hosts' => 'Trapper Hosts',
            'units' => 'Units',
            'multiplier' => 'Multiplier',
            'delta' => 'Delta',
            'snmpv3_securityname' => 'Snmpv3 Securityname',
            'snmpv3_securitylevel' => 'Snmpv3 Securitylevel',
            'snmpv3_authpassphrase' => 'Snmpv3 Authpassphrase',
            'snmpv3_privpassphrase' => 'Snmpv3 Privpassphrase',
            'formula' => 'Formula',
            'error' => 'Error',
            'lastlogsize' => 'Lastlogsize',
            'logtimefmt' => 'Logtimefmt',
            'templateid' => 'Templateid',
            'valuemapid' => 'Valuemapid',
            'delay_flex' => 'Delay Flex',
            'params' => 'Params',
            'ipmi_sensor' => 'Ipmi Sensor',
            'data_type' => 'Data Type',
            'authtype' => 'Authtype',
            'username' => 'Username',
            'password' => 'Password',
            'publickey' => 'Publickey',
            'privatekey' => 'Privatekey',
            'mtime' => 'Mtime',
            'flags' => 'Flags',
            'interfaceid' => 'Interfaceid',
            'port' => 'Port',
            'description' => 'Description',
            'inventory_link' => 'Inventory Link',
            'lifetime' => 'Lifetime',
            'snmpv3_authprotocol' => 'Snmpv3 Authprotocol',
            'snmpv3_privprotocol' => 'Snmpv3 Privprotocol',
            'state' => 'State',
            'snmpv3_contextname' => 'Snmpv3 Contextname',
            'evaltype' => 'Evaltype',
        ];
    }
}
