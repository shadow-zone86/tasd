<?php

namespace app\models\base;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "table_agent".
 *
 * @property int $id Id-операции
 * @property string $number_agent Номер предприятия
 * @property string $address Адрес предприятия
 * @property string $name_agent Наименование предприятия
 */
class AgentBase extends ActiveRecord
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
            [['number_agent', 'name_agent'], 'required'],
            [['number_agent', 'address', 'name_agent'], 'string', 'max' => 255],
            [['number_agent'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ИД-операции'),
            'number_agent' => Yii::t('app', 'Номер предприятия'),
            'address' => Yii::t('app', 'Адрес предприятия'),
            'name_agent' => Yii::t('app', 'Наименование предприятия'),
        ];
    }
}