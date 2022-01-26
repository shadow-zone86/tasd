<?php

namespace app\models;

use app\models\base\EntranceReportBase;
use yii\helpers\ArrayHelper;

class EntranceReport extends EntranceReportBase
{
    private $_checkList = ['ОВ', 'С', 'ДСП', 'КТ', 'СС', 'Н/С', 'К', 'СК'];
    private $_list = [
        'ОВ' => 'ОВ',
        'С' => 'С',
        'ДСП' => 'ДСП',
        'КТ' => 'КТ',
        'СС' => 'СС',
        'Н/С' => 'Н/С',
        'К' => 'К',
        'СК' => 'СК',
    ];
    private $_checkType = [1, 2, 3, 4, 5, 6, 7, 8];
    private $_type = [
        1 => 'Конструкторская',
        2 => 'Технологическая',
        3 => 'НТД',
        4 => 'Проектная',
        5 => 'НО',
        6 => 'Ремонтная',
        7 => 'УОЦД',
        8 => 'АК',
    ];

    /**
     * @inheritdoc
     */
    public function getCheckList()
    {
        return $this->_checkList;
    }

    /**
     * @inheritdoc
     */
    public function getList()
    {
        return $this->_list;
    }

    /**
     * @inheritdoc
     */
    public function getCheckType()
    {
        return $this->_checkType;
    }

    /**
     * @inheritdoc
     */
    public function getType()
    {
        return $this->_type;
    }

    /**
     * @inheritdoc
     */
    public function getSheet($date_begin, $date_end, $xxx, $type, $print)
    {
        switch ($print) {
            case 0:
                return Sheet::findBySql("
                  SELECT * 
                  FROM table_sheet 
                  WHERE (data_made BETWEEN '$date_begin' AND '$date_end') 
                  AND xxx IN ('".implode("', '", $xxx)."') 
                  AND key5 IN ('".implode("', '", $type)."')
                  AND original_number != '' 
                  ORDER BY xxx
                ")->all();
                break;
            case 1:
                return Sheet::findBySql("
                  SELECT * 
                  FROM table_sheet 
                  WHERE (data_made BETWEEN '$date_begin' AND '$date_end') 
                  AND xxx IN ('".implode("', '", $xxx)."') 
                  AND key5 IN ('".implode("', '", $type)."')
                  AND original_number = '' 
                  ORDER BY xxx
                ")->all();
                break;
        }
    }

    /**
     * @inheritdoc
     */
    public function getAgent($agent)
    {
        $query = Agent::find()->select('name_agent')->where(['number_agent' => $agent])->all();
        return ArrayHelper::getColumn($query, 'name_agent');
    }
}
