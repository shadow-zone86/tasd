<?php

namespace app\models;

use app\models\base\MadeReportBase;
use yii\helpers\ArrayHelper;

/**
 * @property string $date_begin Период изготовления с
 * @property string $date_end Период изготовления по
 * @property string $made Изготовитель МКФ
 */
class MadeReport extends MadeReportBase
{
    /**
     * @inheritdoc
     */
    public function getMade()
    {
        $query = Agent::find()->orderBy('name_agent ASC')->all();
        return ArrayHelper::map($query, 'number_agent', function ($one) {
            return $one->number_agent . ' - ' . $one->name_agent;
        });
    }

    /**
     * @inheritdoc
     */
    public function getSheet($date_begin, $date_end, $made)
    {
        return Sheet::findBySql("
            SELECT * 
            FROM table_sheet 
            WHERE (data_made BETWEEN '$date_begin' AND '$date_end') 
            AND made_form = '$made' 
            ORDER BY date_made
        ")->all();
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