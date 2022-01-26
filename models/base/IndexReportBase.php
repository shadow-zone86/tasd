<?php

namespace app\models\base;

use Yii;
use yii\base\Model;

/**
 * @property string $index Индекс изделия
 */
class IndexReportBase extends Model
{
    public $index;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['index'], 'safe'],
            [['index'], 'required'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'index' => Yii::t('app', 'Индекс изделия'),
        ];
    }
}