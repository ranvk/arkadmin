<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "trigger_depends".
 *
 * @property string $triggerdepid
 * @property string $triggerid_down
 * @property string $triggerid_up
 */
class TriggerDepends extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'trigger_depends';
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
            [['triggerdepid', 'triggerid_down', 'triggerid_up'], 'required'],
            [['triggerdepid', 'triggerid_down', 'triggerid_up'], 'integer'],
            [['triggerid_down', 'triggerid_up'], 'unique', 'targetAttribute' => ['triggerid_down', 'triggerid_up'], 'message' => 'The combination of Triggerid Down and Triggerid Up has already been taken.'],
            [['triggerid_down'], 'exist', 'skipOnError' => true, 'targetClass' => Triggers::className(), 'targetAttribute' => ['triggerid_down' => 'triggerid']],
            [['triggerid_up'], 'exist', 'skipOnError' => true, 'targetClass' => Triggers::className(), 'targetAttribute' => ['triggerid_up' => 'triggerid']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'triggerdepid' => 'Triggerdepid',
            'triggerid_down' => 'Triggerid Down',
            'triggerid_up' => 'Triggerid Up',
        ];
    }
}
