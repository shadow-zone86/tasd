<?php

namespace app\models;

use app\models\base\IndexSignReportBase;
use yii\helpers\ArrayHelper;

class IndexSignReport extends IndexSignReportBase
{
    private $_checkType = [];
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
    public function getSheet($sign)
    {
        return Sheet::findBySql("
            SELECT *
            FROM table_sheet
            WHERE key5 NOT IN ('".implode("', '", $sign)."')
            ORDER BY index
         ")->all();
    }
}