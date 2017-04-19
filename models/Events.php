<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "events".
 *
 * @property string $eventid
 * @property integer $source
 * @property integer $object
 * @property string $objectid
 * @property integer $clock
 * @property integer $value
 * @property integer $acknowledged
 * @property integer $ns
 */
class Events extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'events';
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
            [['eventid'], 'required'],
            [['eventid', 'source', 'object', 'objectid', 'clock', 'value', 'acknowledged', 'ns'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'eventid' => 'Eventid',
            'source' => 'Source',
            'object' => 'Object',
            'objectid' => 'Objectid',
            'clock' => 'Clock',
            'value' => 'Value',
            'acknowledged' => 'Acknowledged',
            'ns' => 'Ns',
        ];
    }
}
