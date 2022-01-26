<?php

namespace app\models;

use yii\base\Model;
use yii\helpers\ArrayHelper;

class Report extends Model
{
    /**
     * @inheritdoc
     */
    public function getSheet($id)
    {
        return Sheet::find()->where(['id' => $id])->all();
    }

    /**
     * @inheritdoc
     */
    public function getAgent($arr)
    {
        $query = Agent::find()->where(['number_agent' => $arr])->all();
        return ArrayHelper::getColumn($query, 'name_agent');
    }

    /**
     * @inheritdoc
     */
    public function getTypeDocument($typeDocument)
    {
        switch ($typeDocument) {
            case 1:
                return "Конструкторская";
                break;
            case 2:
                return "Технологическая";
                break;
            case 3:
                return "НТД";
                break;
            case 4:
                return "Проектная";
                break;
            case 5:
                return "НО";
                break;
            case 6:
                return "Ремонтная";
                break;
            case 7:
                return "УОЦД";
                break;
            case 8:
                return "АК";
                break;
        }
    }
}