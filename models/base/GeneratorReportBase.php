<?php

namespace app\models\base;

use Yii;
use yii\base\Model;

/**
 * @property string $type Вид МКФ
 * @property string $number Номер МКФ
 * @property string $xxx Гриф секретности МКФ
 * @property string $origin_number Оригинальный номер
 * @property string $made Изготовитель МКФ
 * @property string $passport Инвентарный номер техпаспорта
 * @property string $provider Поставщик документации
 * @property string $index Индекс изделия
 * @property string $indication Обозначение изделия
 * @property string $incoming_number Входящий номер письма
 * @property string $name Наименование МКФ
 * @property string $list_number Номер сопроводительного перечня
 * @property string $task Вид задания
 * @property string $inventory_number Инвентарный номер
 */
class GeneratorReportBase extends Model
{
    public $type;
    public $number;
    public $xxx;
    public $origin_number;
    public $made;
    public $passport;
    public $provider;
    public $index;
    public $indication;
    public $incoming_number;
    public $name;
    public $list_number;
    public $task;
    public $inventory_number;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type', 'number', 'xxx', 'origin_number', 'made', 'passport', 'provider', 'index', 'indication', 'incoming_number', 'name', 'list_number', 'task', 'inventory_number'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'type' => Yii::t('app', 'Вид МКФ'),
            'number' => Yii::t('app', 'Номер МКФ'),
            'xxx' => Yii::t('app', 'Гриф секретности МКФ'),
            'origin_number' => Yii::t('app', 'Оригинальный номер'),
            'made' => Yii::t('app', 'Изготовитель МКФ'),
            'passport' => Yii::t('app', 'Инвентарный номер техпаспорта'),
            'provider' => Yii::t('app', 'Поставщик документации'),
            'index' => Yii::t('app', 'Индекс изделия'),
            'indication' => Yii::t('app', 'Обозначение изделия'),
            'incoming_number' => Yii::t('app', 'Входящий номер письма'),
            'name' => Yii::t('app', 'Наименование МКФ'),
            'list_number' => Yii::t('app', 'Номер сопроводительного перечня'),
            'task' => Yii::t('app', 'Вид задания'),
            'inventory_number' => Yii::t('app', 'Инвентарный номер'),
        ];
    }
}