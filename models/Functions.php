<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "functions".
 *
 * @property string $functionid
 * @property string $itemid
 * @property string $triggerid
 * @property string $function
 * @property string $parameter
 */
class Functions extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'functions';
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
            [['functionid', 'itemid', 'triggerid'], 'required'],
            [['functionid', 'itemid', 'triggerid'], 'integer'],
            [['function'], 'string', 'max' => 12],
            [['parameter'], 'string', 'max' => 255],
            [['itemid'], 'exist', 'skipOnError' => true, 'targetClass' => Items::className(), 'targetAttribute' => ['itemid' => 'itemid']],
            [['triggerid'], 'exist', 'skipOnError' => true, 'targetClass' => Triggers::className(), 'targetAttribute' => ['triggerid' => 'triggerid']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'functionid' => 'Functionid',
            'itemid' => 'Itemid',
            'triggerid' => 'Triggerid',
            'function' => 'Function',
            'parameter' => 'Parameter',
        ];
    }
}
