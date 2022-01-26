<?php

namespace app\models;

use app\models\base\IndexReportBase;
use yii\helpers\ArrayHelper;

class IndexReport extends IndexReportBase
{
    /**
     * @inheritdoc
     */
    public function getIndex()
    {
        $query = Index::find()->orderBy('index ASC')->all();
        return ArrayHelper::map($query, 'index', 'index');
    }

    /**
     * @inheritdoc
     */
    public function getSheet($index)
    {
        return Sheet::find()->where(['index' => $index])->orderBy('indication ASC')->all();
    }
}