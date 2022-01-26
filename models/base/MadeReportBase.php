<?php

namespace app\models\base;

use Yii;
use yii\base\Model;

/**
 * @property string $date_begin Период изготовления с
 * @property string $date_end Период изготовления по
 * @property string $made Изготовитель МКФ
 */
class MadeReportBase extends Model
{
    public $date_begin;
    public $date_end;
    public $made;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date_begin', 'date_end', 'made'], 'safe'],
            [['date_begin', 'date_end', 'made'], 'required'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'date_begin' => Yii::t('app', 'Период изготовления с'),
            'date_end' => Yii::t('app', 'Период изготовления по'),
            'made' => Yii::t('app', 'Изготовитель МКФ'),
        ];
    }
}