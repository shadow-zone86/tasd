<?php

namespace app\models;

use app\models\base\AgentBase;
use yii\helpers\ArrayHelper;

class Agent extends AgentBase
{
    /**
     * @inheritdoc
     */
    public function getNameAgent($id)
    {
        return Agent::find()->where(['id' => $id])->all();
    }

    /**
     * @inheritdoc
     */
    public function getMadeForm($name_agent)
    {
        $query = Sheet::find()->select(['made_form'])->where(['made_form' => $name_agent])->all();
        return ArrayHelper::getColumn($query, 'made_form');
    }

    /**
     * @inheritdoc
     */
    public function getAgent($name_agent)
    {
        $query = Sheet::find()->select(['agent'])->where(['agent' => $name_agent])->all();
        return ArrayHelper::getColumn($query, 'agent');
    }

    /**
     * @inheritdoc
     */
    public function getAdress($name_agent)
    {
        $query = Sheet::find()->select(['adress'])->where(['adress' => $name_agent])->all();
        return ArrayHelper::getColumn($query, 'adress');
    }
}