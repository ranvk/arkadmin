<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "interface".
 *
 * @property string $interfaceid
 * @property string $hostid
 * @property integer $main
 * @property integer $type
 * @property integer $useip
 * @property string $ip
 * @property string $dns
 * @property string $port
 * @property integer $bulk
 */
class Hostsinterface extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'interface';
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
            [['interfaceid', 'hostid'], 'required'],
            [['interfaceid', 'hostid', 'main', 'type', 'useip', 'bulk'], 'integer'],
            [['ip', 'dns', 'port'], 'string', 'max' => 64],
            [['hostid'], 'exist', 'skipOnError' => true, 'targetClass' => Hosts::className(), 'targetAttribute' => ['hostid' => 'hostid']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'interfaceid' => 'Interfaceid',
            'hostid' => 'Hostid',
            'main' => 'Main',
            'type' => 'Type',
            'useip' => 'Useip',
            'ip' => 'Ip',
            'dns' => 'Dns',
            'port' => 'Port',
            'bulk' => 'Bulk',
        ];
    }
}
