<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "acknowledges".
 *
 * @property string $acknowledgeid
 * @property string $userid
 * @property string $eventid
 * @property integer $clock
 * @property string $message
 * @property integer $action
 */
class Acknowledges extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'acknowledges';
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
            [['acknowledgeid', 'userid', 'eventid'], 'required'],
            [['acknowledgeid', 'userid', 'eventid', 'clock', 'action'], 'integer'],
            [['message'], 'string', 'max' => 255],
            [['userid'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['userid' => 'userid']],
            [['eventid'], 'exist', 'skipOnError' => true, 'targetClass' => Events::className(), 'targetAttribute' => ['eventid' => 'eventid']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'acknowledgeid' => 'Acknowledgeid',
            'userid' => 'Userid',
            'eventid' => 'Eventid',
            'clock' => 'Clock',
            'message' => 'Message',
            'action' => 'Action',
        ];
    }
}
