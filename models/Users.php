<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property string $userid
 * @property string $alias
 * @property string $name
 * @property string $surname
 * @property string $passwd
 * @property string $url
 * @property integer $autologin
 * @property integer $autologout
 * @property string $lang
 * @property integer $refresh
 * @property integer $type
 * @property string $theme
 * @property integer $attempt_failed
 * @property string $attempt_ip
 * @property integer $attempt_clock
 * @property integer $rows_per_page
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'users';
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
            [['userid'], 'required'],
            [['userid', 'autologin', 'autologout', 'refresh', 'type', 'attempt_failed', 'attempt_clock', 'rows_per_page'], 'integer'],
            [['alias', 'name', 'surname'], 'string', 'max' => 100],
            [['passwd'], 'string', 'max' => 32],
            [['url'], 'string', 'max' => 255],
            [['lang'], 'string', 'max' => 5],
            [['theme'], 'string', 'max' => 128],
            [['attempt_ip'], 'string', 'max' => 39],
            [['alias'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'userid' => 'Userid',
            'alias' => 'Alias',
            'name' => 'Name',
            'surname' => 'Surname',
            'passwd' => 'Passwd',
            'url' => 'Url',
            'autologin' => 'Autologin',
            'autologout' => 'Autologout',
            'lang' => 'Lang',
            'refresh' => 'Refresh',
            'type' => 'Type',
            'theme' => 'Theme',
            'attempt_failed' => 'Attempt Failed',
            'attempt_ip' => 'Attempt Ip',
            'attempt_clock' => 'Attempt Clock',
            'rows_per_page' => 'Rows Per Page',
        ];
    }
}
