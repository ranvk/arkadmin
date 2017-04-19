<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "maintenances".
 *
 * @property string $maintenanceid
 * @property string $name
 * @property integer $maintenance_type
 * @property string $description
 * @property integer $active_since
 * @property integer $active_till
 */
class Maintenances extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'maintenances';
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
            [['maintenanceid', 'description'], 'required'],
            [['maintenanceid', 'maintenance_type', 'active_since', 'active_till'], 'integer'],
            [['description'], 'string'],
            [['name'], 'string', 'max' => 128],
            [['name'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'maintenanceid' => 'Maintenanceid',
            'name' => 'Name',
            'maintenance_type' => 'Maintenance Type',
            'description' => 'Description',
            'active_since' => 'Active Since',
            'active_till' => 'Active Till',
        ];
    }
}
