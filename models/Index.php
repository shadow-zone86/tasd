<?php

namespace app\models;

use app\models\base\IndexBase;
use yii\helpers\ArrayHelper;

class Index extends IndexBase
{
    /**
     * @inheritdoc
     */
    public static function getDataByIndex($index)
    {
        $model = self::find(['index' => $index]);
        if ($model) {
            return $model->data;
        }

        return null;
    }

    /**
     * @inheritdoc
     */
    public function getIndexLitera($id)
    {
        return Index::find()->where(['id' => $id])->all();
    }

    /**
     * @inheritdoc
     */
    public function getIndexIndication($arr)
    {
        $query = Sheet::find()->select(['id'])->where(['index' => $arr[0]['index']])->andWhere(['indication' => $arr[0]['litera']])->all();
        return ArrayHelper::getColumn($query, 'id');
    }

    /**
     * @inheritdoc
     */
    public function getRows()
    {
        return Index::find()->count();
    }

    /**
     * @inheritdoc
     */
    public function getListSheet($index, $indication)
    {
        $query = Sheet::find()->select(['number_form'])->where(['index' => $index])->andWhere(['indication' => $indication])->all();
        return ArrayHelper::getColumn($query, 'number_form');
    }
}
