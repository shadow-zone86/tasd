<?php

namespace app\models;

use Yii;

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
class Inspector extends \yii\db\ActiveRecord
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
            [['id', 'form', 'number_copy', 'number_form', 'action', 'xxx', 'index', 'indication'], 'required'],
            [['id'], 'default', 'value' => null],
            [['id'], 'integer'],
            [['user', 'date_time', 'form', 'number_form', 'original_number', 'made_form', 'roll', 'copy', 'number_copy', 'scene', 'date_made', 'date_check', 'number_check', 'passport', 'agent', 'density', 'read', 'na2so3', 'ag', 'ov', 'ss', 's', 'n_s', 'dsp', 'k', 'kt', 'sk', 'hiccupped', 'ctencil', 'work_ctencil', 'defective_ctencil', 'glue', 'block', 'gloset', 'shelf', 'cell', 'index', 'indication', 'xxx', 'number_letter', 'prizn_document', 'cover_letter', 'accomp_letter', 'fasc', 'adress', 'data_made', 'nama_mkf', 'note', 'action', 'key1', 'key2', 'key3', 'key4', 'key5'], 'string'],
            [['id'], 'unique'],
//            [['number_form'], 'unique', 'targetAttribute' => ['key1', 'key2', 'key3'], 'message' => 'Данный номер МКФ уже заведен в базу данных!'],
            [['number_form'], 'unique', 'targetAttribute' => ['key1', 'key2', 'key3', 'key5', 'number_copy'], 'message' => 'Данный номер МКФ уже заведен в базу данных!'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ИД-операции',
            'user' => 'Пользователь',
            'date_time' => 'Дата и время формирования',
            'form' => 'Вид МКФ',
            'number_form' => 'Номер МКФ',
            'original_number' => 'Оригинальный №',
            'made_form' => 'Изготовитель МКФ',
            'roll' => 'Общее количество рулонов (листов) в МКФ',
            'copy' => 'Общее количество экземпляров',
            'number_copy' => 'Номер экземпляра',
            'scene' => 'Вид изображения',
            'date_made' => 'Дата изготовления',
            'date_check' => 'Дата последней проверки',
            'number_check' => 'Номер последней проверки',
            'passport' => 'Инв. № тех. паспорта',
            'agent' => 'Поставщик док.',
            'density' => 'Оптическая плотность фона микроизображения',
            'read' => 'Читаемость (разрешающая способность)',
            'na2so3' => 'Остаточный тиосульфат (Na2SO3 в мг/см2)',
            'ag' => 'Содержание серебра (Ag)',
            'ov' => 'Количество физических листов по грифом ОВ',
            'ss' => 'Количество физических листов по грифом СС',
            's' => 'Количество физических листов по грифом С',
            'n_s' => 'Количество физических листов по грифом Н/С',
            'dsp' => 'Количество физических листов по грифом ДСП',
            'k' => 'Количество физических листов по грифом К',
            'kt' => 'Количество физических листов по грифом КТ',
            'sk' => 'Количество физических листов по грифом СК',
            'hiccupped' => 'Общее количество листов формата А4',
            'ctencil' => 'Кадры, содержащие трафарет',
            'work_ctencil' => 'Рабочие кадры',
            'defective_ctencil' => 'Бракованные кадры',
            'glue' => 'Количество склеек в рулоне',
            'block' => 'Обозначение блока хранилища',
            'gloset' => 'Номер шкафа в блоке хранилища',
            'shelf' => 'Номер полки в шкафу',
            'cell' => 'Номер ячейки на полке',
            'index' => 'Индекс',
            'indication' => 'Обозначение',
            'xxx' => 'Гриф секретности МКФ',
            'number_letter' => 'Входящий номер письма',
            'prizn_document' => 'Признак документации',
            'cover_letter' => '№ сопр. письма',
            'accomp_letter' => '№ сопр. перечня',
            'fasc' => 'Инвентарный номер',
            'adress' => 'Адрес',
            'data_made' => 'Дата исполнения',
            'nama_mkf' => 'Наименование',
            'note' => 'Примечание',
            'action' => 'Вид задания',
            'key1' => 'Номер МКФ (код предприятия/отрасли)',
            'key2' => 'Номер МКФ (диапазон микрофильмирующей лаборатории)',
            'key3' => 'Номер МКФ (номер рулона "с")',
            'key4' => 'Номер МКФ (номер рулона "по")',
            'key5' => 'Номер МКФ (признак документации)',
        ];
    }
}
