<?php

namespace app\models\base;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "table_sheet".
 *
 * @property string $id Id-операции
 * @property string $user Пользователь
 * @property string $date_time Дата и время формирования
 * @property string $form Вид МКФ
 * @property string $number_form Номер МКФ
 * @property string $original_number Оригинальный номер
 * @property string $made_form Изготовитель МКФ
 * @property string $roll Общее количество рулонов (листов) в МКФ
 * @property string $copy Общее количество экземпляров
 * @property string $number_copy Номер экземпляра
 * @property string $scene Вид изображения
 * @property string $date_made Дата изготовления
 * @property string $date_check Дата последней проверки
 * @property string $number_check Номер последней проверки
 * @property string $passport Инвентарный номер технического паспорта
 * @property string $agent Поставщик документации
 * @property string $density Оптическая плотность фона микроизображения
 * @property string $read Читаемость (разрешающая способность)
 * @property string $na2so3 Остаточный тиосульфат (Na2SO3 в мг/см2)
 * @property string $ag Содержание серебра (Ag)
 * @property string $ov Количество физических листов по грифом ОВ
 * @property string $ss Количество физических листов по грифом СС
 * @property string $s Количество физических листов по грифом С
 * @property string $n_s Количество физических листов по грифом Н/С
 * @property string $dsp Количество физических листов по грифом ДСП
 * @property string $k Количество физических листов по грифом К
 * @property string $kt Количество физических листов по грифом KT
 * @property string $sk Количество физических листов по грифом SK
 * @property string $hiccupped Общее количество листов формата А4
 * @property string $ctencil Кадры, содержащие трафарет
 * @property string $work_ctencil Рабочие кадры
 * @property string $defective_ctencil Бракованные кадры
 * @property string $glue Количество склеек в рулоне
 * @property string $block Обозначение блока хранилища
 * @property string $gloset Номер шкафа в блоке хранилища
 * @property string $shelf Номер полки в шкафу
 * @property string $cell Номер ячейки на полке
 * @property string $index Индекс изделия
 * @property string $indication Обозначение изделия
 * @property string $xxx Гриф секретности МКФ
 * @property string $number_letter Входящий номер письма
 * @property string $prizn_document Признак документации
 * @property string $cover_letter Номер сопроводительного письма
 * @property string $accomp_letter Номер сопроводительного перечня
 * @property string $fasc Инвентарный номер
 * @property string $adress Адрес
 * @property string $data_made Дата исполнения
 * @property string $nama_mkf Наименование
 * @property string $note Примечание
 * @property string $action Вид задания
 * @property string $key1 Номер МКФ (код предприятия/отрасли)
 * @property string $key2 Номер МКФ (диапазон микрофильмирующей лаборатории)
 * @property string $key3 Номер МКФ (номер рулона "с")
 * @property string $key4 Номер МКФ (номер рулона "по")
 * @property string $key5 Номер МКФ (признак документации)
 */
class SheetBase extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'table_sheet';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['form', 'number_copy', 'number_form', 'action', 'xxx', 'index', 'indication'], 'required'],
            [['roll', 'copy', 'number_check', 'ov', 'ss', 's', 'n_s', 'dsp', 'k', 'kt', 'sk', 'hiccupped', 'ctencil', 'work_ctencil', 'defective_ctencil', 'glue', 'block', 'gloset', 'shelf', 'cell'], 'number'],
            [['user', 'date_time', 'form', 'number_form', 'original_number', 'made_form', 'number_copy', 'scene', 'date_made', 'date_check', 'passport', 'agent', 'density', 'read', 'na2so3', 'ag', 'index', 'indication', 'xxx', 'number_letter', 'prizn_document', 'cover_letter', 'accomp_letter', 'fasc', 'adress', 'data_made', 'nama_mkf', 'note', 'action', 'key1', 'key2', 'key3', 'key4', 'key5'], 'string'],
            [['number_form'], 'unique', 'targetAttribute' => ['key1', 'key2', 'key3', 'key5', 'number_copy', 'action'], 'message' => 'Данный номер МКФ уже заведен в базу данных!'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ИД-операции'),
            'user' => Yii::t('app', 'Пользователь'),
            'date_time' => Yii::t('app', 'ата и время формирования'),
            'form' => Yii::t('app', 'Вид МКФ'),
            'number_form' => Yii::t('app', 'Номер МКФ'),
            'original_number' => Yii::t('app', 'Оригинальный номер'),
            'made_form' => Yii::t('app', 'Изготовитель МКФ'),
            'roll' => Yii::t('app', 'Общее кол-во рулонов (листов)'),
            'copy' => Yii::t('app', 'Общее количество экземпляров'),
            'number_copy' => Yii::t('app', 'Номер экземпляра'),
            'scene' => Yii::t('app', 'Вид изображения'),
            'date_made' => Yii::t('app', 'Дата изготовления'),
            'date_check' => Yii::t('app', 'Дата последней проверки'),
            'number_check' => Yii::t('app', 'Номер последней проверки'),
            'passport' => Yii::t('app', 'Инв. № техпаспорта'),
            'agent' => Yii::t('app', 'Поставщик док.'),
            'density' => Yii::t('app', 'Оптическая плотность фона микроизображения'),
            'read' => Yii::t('app', 'Читаемость (разрешающая способность)'),
            'na2so3' => Yii::t('app', 'Остаточный тиосульфат (Na2SO3 в мг/см2)'),
            'ag' => Yii::t('app', 'Содержание серебра (Ag)'),
            'ov' => Yii::t('app', 'Количество физических листов ОВ'),
            'ss' => Yii::t('app', 'Количество физических листов СС'),
            's' => Yii::t('app', 'Количество физических листов С'),
            'n_s' => Yii::t('app', 'Количество физических листов Н/С'),
            'dsp' => Yii::t('app', 'Количество физических листов ДСП'),
            'k' => Yii::t('app', 'Количество физических листов К'),
            'kt' => Yii::t('app', 'Количество физических листов КТ'),
            'sk' => Yii::t('app', 'Количество физических листов СК'),
            'hiccupped' => Yii::t('app', 'Общее кол-во листов формата А4'),
            'ctencil' => Yii::t('app', 'Трафареты'),
            'work_ctencil' => Yii::t('app', 'Рабочие кадры'),
            'defective_ctencil' => Yii::t('app', 'Браки'),
            'glue' => Yii::t('app', 'Склейки'),
            'block' => Yii::t('app', 'Помещение'),
            'gloset' => Yii::t('app', 'Шкаф'),
            'shelf' => Yii::t('app', 'Полка'),
            'cell' => Yii::t('app', 'Ячейка'),
            'index' => Yii::t('app', 'Индекс'),
            'indication' => Yii::t('app', 'Обозначение'),
            'xxx' => Yii::t('app', 'Гриф МКФ'),
            'number_letter' => Yii::t('app', 'Вх. № письма'),
            'prizn_document' => Yii::t('app', 'Признак документации'),
            'cover_letter' => Yii::t('app', '№ с/письма'),
            'accomp_letter' => Yii::t('app', 'Номер сопр. перечня'),
            'fasc' => Yii::t('app', 'Инвентарный номер'),
            'adress' => Yii::t('app', 'Адрес'),
            'data_made' => Yii::t('app', 'Дата исполнения'),
            'nama_mkf' => Yii::t('app', 'Наименование'),
            'note' => Yii::t('app', 'Примечание'),
            'action' => Yii::t('app', 'Вид задания'),
            'key1' => Yii::t('app', 'Номер МКФ (код предприятия/отрасли)'),
            'key2' => Yii::t('app', 'Номер МКФ (диапазон микрофильмирующей лаборатории)'),
            'key3' => Yii::t('app', 'Номер МКФ (номер рулона "с")'),
            'key4' => Yii::t('app', 'Номер МКФ (номер рулона "по")'),
            'key5' => Yii::t('app', 'Номер МКФ (признак документации)'),
        ];
    }
}