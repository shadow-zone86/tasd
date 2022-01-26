<?php

namespace app\models\base;

use Yii;
use yii\base\Model;

/**
 * @property string $indication Обозначение изделия
 */
class IndicationReportBase extends Model
{
    public $indication;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['indication'], 'safe'],
            [['indication'], 'required'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'indication' => Yii::t('app', 'Обозначение изделия'),
        ];
    }
}