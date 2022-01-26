<?php

namespace app\models\base;

use Yii;
use yii\base\Model;

/**
 * @property string $date_begin Дата поступления МКФ с
 * @property string $date_end Дата поступления МКФ по
 * @property string $xxx Гриф секретности
 * @property string $type_documentation Вид документации
 * @property string $print_sign Печать перечня МКФ без оригинального номера
 */
class EntranceReportBase extends Model
{
    public $date_begin;
    public $date_end;
    public $xxx = [];
    public $type_documentation = [];
    public $print_sign;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date_begin', 'date_end', 'xxx', 'type_documentation'], 'safe'],
            [['date_begin', 'date_end'], 'required'],
            [['print_sign'], 'boolean'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'date_begin' => Yii::t('app', 'Дата поступления МКФ с'),
            'date_end' => Yii::t('app', 'Дата поступления МКФ по'),
            'xxx' => Yii::t('app', 'Гриф секретности'),
            'type_documentation' => Yii::t('app', 'Вид документации'),
            'print_sign' => Yii::t('app', 'Печать перечня МКФ без оригинального номера'),
        ];
    }
}