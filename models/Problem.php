<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "problem".
 *
 * @property string $eventid
 * @property integer $source
 * @property integer $object
 * @property string $objectid
 * @property integer $clock
 * @property integer $ns
 * @property string $r_eventid
 * @property integer $r_clock
 * @property integer $r_ns
 * @property string $correlationid
 * @property string $userid
 */
class Problem extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'problem';
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
            [['eventid', 'source', 'object', 'objectid', 'clock', 'ns', 'r_eventid', 'r_clock', 'r_ns', 'correlationid', 'userid'], 'integer'],
            [['eventid'], 'exist', 'skipOnError' => true, 'targetClass' => Events::className(), 'targetAttribute' => ['eventid' => 'eventid']],
            [['r_eventid'], 'exist', 'skipOnError' => true, 'targetClass' => Events::className(), 'targetAttribute' => ['r_eventid' => 'eventid']],
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
            'ns' => 'Ns',
            'r_eventid' => 'R Eventid',
            'r_clock' => 'R Clock',
            'r_ns' => 'R Ns',
            'correlationid' => 'Correlationid',
            'userid' => 'Userid',
        ];
    }
}
