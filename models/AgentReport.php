<?php

namespace app\models;

use app\models\base\AgentReportBase;
use yii\helpers\ArrayHelper;

class AgentReport extends AgentReportBase
{
    /**
     * @inheritdoc
     */
    public function getList()
    {
        $query = Agent::find()->orderBy('name_agent ASC')->all();
        return ArrayHelper::map($query, 'number_agent', function ($one) {
            return $one->number_agent . ' - ' . $one->name_agent;
        });
    }

    /**
     * @inheritdoc
     */
    public function getSheet($date_begin, $date_end, $agent)
    {
        return Sheet::findBySql("SELECT * FROM table_sheet WHERE (date_made BETWEEN '$date_begin' AND '$date_end') AND made_form = '$agent' ORDER BY date_made")->all();
    }

    /**
     * @inheritdoc
     */
    public function getAgent($agent)
    {
        $query = Agent::findBySql("SELECT * FROM table_agent WHERE number_agent = '$agent'")->all();
        return ArrayHelper::getColumn($query, 'name_agent');
    }
}