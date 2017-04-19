<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "triggers".
 *
 * @property string $triggerid
 * @property string $expression
 * @property string $description
 * @property string $url
 * @property integer $status
 * @property integer $value
 * @property integer $priority
 * @property integer $lastchange
 * @property string $comments
 * @property string $error
 * @property string $templateid
 * @property integer $type
 * @property integer $state
 * @property integer $flags
 * @property integer $recovery_mode
 * @property string $recovery_expression
 * @property integer $correlation_mode
 * @property string $correlation_tag
 * @property integer $manual_close
 */
class Triggers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'triggers';
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
            [['triggerid', 'comments'], 'required'],
            [['triggerid', 'status', 'value', 'priority', 'lastchange', 'templateid', 'type', 'state', 'flags', 'recovery_mode', 'correlation_mode', 'manual_close'], 'integer'],
            [['comments'], 'string'],
            [['expression', 'recovery_expression'], 'string', 'max' => 2048],
            [['description', 'url', 'correlation_tag'], 'string', 'max' => 255],
            [['error'], 'string', 'max' => 128],
            [['templateid'], 'exist', 'skipOnError' => true, 'targetClass' => Triggers::className(), 'targetAttribute' => ['templateid' => 'triggerid']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'triggerid' => 'Triggerid',
            'expression' => 'Expression',
            'description' => 'Description',
            'url' => 'Url',
            'status' => 'Status',
            'value' => 'Value',
            'priority' => 'Priority',
            'lastchange' => 'Lastchange',
            'comments' => 'Comments',
            'error' => 'Error',
            'templateid' => 'Templateid',
            'type' => 'Type',
            'state' => 'State',
            'flags' => 'Flags',
            'recovery_mode' => 'Recovery Mode',
            'recovery_expression' => 'Recovery Expression',
            'correlation_mode' => 'Correlation Mode',
            'correlation_tag' => 'Correlation Tag',
            'manual_close' => 'Manual Close',
        ];
    }
    public static function getPriority($priority){
        $prioritys = [
            1 => '信息',
            2 => '警告',
            3=>'故障',
            4=>'严重',
            5 =>'灾难',
        ];
        return $prioritys[$priority];
    }
}
