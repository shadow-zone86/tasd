<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

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
class Sheet extends \yii\db\ActiveRecord
//class Sheet extends Model
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'table_sheet';
    }

//    /**
//     * @var UploadedFile[]
//     */
//    public $imageFiles;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
//            [['id', 'form', 'number_copy', 'number_form', 'action', 'xxx', 'index', 'indication'], 'required'],
            [['form', 'number_copy', 'number_form', 'action', 'xxx', 'index', 'indication'], 'required'],
//            [['id'], 'default', 'value' => null],
//            [['id'], 'integer'],
            [['roll', 'copy', 'number_check', 'ov', 'ss', 's', 'n_s', 'dsp', 'k', 'kt', 'sk', 'hiccupped', 'ctencil', 'work_ctencil', 'defective_ctencil', 'glue', 'block', 'gloset', 'shelf', 'cell'], 'number'],
            [['user', 'date_time', 'form', 'number_form', 'original_number', 'made_form', 'number_copy', 'scene', 'date_made', 'date_check', 'passport', 'agent', 'density', 'read', 'na2so3', 'ag', 'index', 'indication', 'xxx', 'number_letter', 'prizn_document', 'cover_letter', 'accomp_letter', 'fasc', 'adress', 'data_made', 'nama_mkf', 'note', 'action', 'key1', 'key2', 'key3', 'key4', 'key5'], 'string'],
//            [['id'], 'unique'],
            [['number_form'], 'unique', 'targetAttribute' => ['key1', 'key2', 'key3', 'key5', 'number_copy', 'action'], 'message' => 'Данный номер МКФ уже заведен в базу данных!'],
//            [['imageFiles'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png', 'maxFiles' => 0, 'checkExtensionByMimeType' => false],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
//            'id' => 'ИД-операции',
            'user' => 'Пользователь',
            'date_time' => 'Дата и время формирования',
            'form' => 'Вид МКФ',
            'number_form' => 'Номер МКФ',
            'original_number' => 'Оригинальный номер',
            'made_form' => 'Изготовитель МКФ',
            'roll' => 'Общее кол-во рулонов (листов)',
            'copy' => 'Общее количество экземпляров',
            'number_copy' => 'Номер экземпляра',
            'scene' => 'Вид изображения',
            'date_made' => 'Дата изготовления',
            'date_check' => 'Дата последней проверки',
            'number_check' => 'Номер последней проверки',
            'passport' => 'Инв. № техпаспорта',
            'agent' => 'Поставщик док.',
            'density' => 'Оптическая плотность фона микроизображения',
            'read' => 'Читаемость (разрешающая способность)',
            'na2so3' => 'Остаточный тиосульфат (Na2SO3 в мг/см2)',
            'ag' => 'Содержание серебра (Ag)',
            'ov' => 'Количество физических листов ОВ',
            'ss' => 'Количество физических листов СС',
            's' => 'Количество физических листов С',
            'n_s' => 'Количество физических листов Н/С',
            'dsp' => 'Количество физических листов ДСП',
            'k' => 'Количество физических листов К',
            'kt' => 'Количество физических листов КТ',
            'sk' => 'Количество физических листов СК',
            'hiccupped' => 'Общее кол-во листов формата А4',
            'ctencil' => 'Трафареты',
            'work_ctencil' => 'Рабочие кадры',
            'defective_ctencil' => 'Браки',
            'glue' => 'Склейки',
            'block' => 'Помещение',
            'gloset' => 'Шкаф',
            'shelf' => 'Полка',
            'cell' => 'Ячейка',
            'index' => 'Индекс',
            'indication' => 'Обозначение',
            'xxx' => 'Гриф МКФ',
            'number_letter' => 'Вх. № письма',
            'prizn_document' => 'Признак документации',
            'cover_letter' => '№ с/письма',
            'accomp_letter' => 'Номер сопр. перечня',
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
//    public function upload()
//    {
//        if ($this->validate()) {
//            foreach ($this->imageFiles as $file) {
//                $file->saveAs('uploads/' . $file->baseName . '.' . $file->extension);
//            }
//            return true;
//        } else {
//            return false;
//        }
//    }
}

