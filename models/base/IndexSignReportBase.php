<?php

namespace app\models\base;

use Yii;
use yii\base\Model;

/**
 * @property string $sign Признак документации
 */
class IndexSignReportBase extends Model
{
    public $sign = [];

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sign'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'sign' => Yii::t('app', 'Признак документации'),
        ];
    }
}