<?php

namespace app\models\base;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "table_index".
 *
 * @property int $id ИД-операции
 * @property string $index Индекс изделия
 * @property string $litera Обозначение изделия
 */
class IndexBase extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'table_index';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['index', 'litera'], 'required'],
            [['index', 'litera'], 'string', 'max' => 255],
            [['index'], 'unique', 'targetAttribute' => ['index', 'litera'], 'message' => 'Данный индекс уже заведен в базу данных!'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ИД-операции'),
            'index' => Yii::t('app', 'Индекс изделия'),
            'litera' => Yii::t('app', 'Обозначение изделия'),
        ];
    }
}