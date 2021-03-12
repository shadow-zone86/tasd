<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "table_agent".
 *
 * @property int $id Id-операции
 * @property string $number_agent
 * @property string $address
 * @property string $name_agent
 */
class Agent extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'table_agent';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
//            [['id', 'number_agent', 'name_agent'], 'required'],
            [['number_agent', 'name_agent'], 'required'],
//            [['id'], 'default', 'value' => null],
//            [['id', 'number_agent'], 'integer'],
            [['number_agent'], 'integer'],
            [['address', 'name_agent'], 'string'],
//            [['id', 'number_agent'], 'unique'],
            [['number_agent'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
//            'id' => 'ИД-операции',
            'number_agent' => 'Номер предприятия',
            'address' => 'Адрес предприятия',
            'name_agent' => 'Наименование предприятия',
        ];
    }
}
