<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "table_index".
 *
 * @property int $id
 * @property string $index
 * @property string $litera
 */
class Index extends \yii\db\ActiveRecord
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
//            [['id', 'index', 'litera'], 'required'],
            [['index', 'litera'], 'required'],
//            [['id'], 'default', 'value' => null],
//            [['id'], 'integer'],
            [['index', 'litera'], 'string'],
//            [['id'], 'unique'],
            [['index'], 'unique', 'targetAttribute' => ['index', 'litera'], 'message' => 'Данный индекс уже заведен в базу данных!'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
//            'id' => 'ИД-операции',
            'index' => 'Индекс изделия',
            'litera' => 'Обозначение изделия',
        ];
    }

    public static function getDataByIndex($index)
    {
        $model = self::find(['index' => $index]);
        if ($model) {
            return $model->data;
        }

        return null;
    }


}
