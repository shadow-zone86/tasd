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

    public function getAgentCount($name_agent)
    {
        return Sheet::find()->select(['made_form', 'agent', 'adress'])->where(['made_form' => $name_agent])->orWhere(['agent' => $name_agent])->orWhere(['adress' => $name_agent])->count();
    }

    /**
     * @inheritdoc
     */
    public function getRows()
    {
        return Agent::find()->count();
    }

    /**
     * @inheritdoc
     */
    public function getListSheet($agent)
    {
        $query = Sheet::find()->select(['number_form', 'made_form', 'agent', 'adress'])->where(['made_form' => $agent])->orWhere(['agent' => $agent])->orWhere(['adress' => $agent])->all();
        return ArrayHelper::getColumn($query, 'number_form');
    }
}