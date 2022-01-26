<?php

namespace app\models;

use app\models\base\IndicationReportBase;
use yii\helpers\ArrayHelper;

class IndicationReport extends IndicationReportBase
{
    /**
     * @inheritdoc
     */
    public function getIndication()
    {
        $query = Index::find()->orderBy('litera ASC')->all();
        return ArrayHelper::map($query, 'litera', 'litera');
    }

    /**
     * @inheritdoc
     */
    public function getSheet($indication)
    {
        return Sheet::find()->where(['indication' => $indication])->orderBy('indication ASC')->all();
    }
}