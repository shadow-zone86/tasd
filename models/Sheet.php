<?php

namespace app\models;

use app\models\base\SheetBase;
use yii\helpers\ArrayHelper;

class Sheet extends SheetBase
{
    private $_secrecy = [
        'ДСП' => 'Для служебного пользования',
        'К' => 'Конфиденциально',
        'КТ' => 'Комерческая тайна',
        'Н/С' => 'Не секретно',
        'ОВ' => 'Особой важности',
        'С' => 'Секретно',
        'СК' => 'Строго конфиденциально',
        'СС' => 'Совершенно секретно',
    ];

    private $_action = [
        'Принять на хранение' => 'Принять на хранение',
        'Переслать' => 'Переслать',
        'Уничтожить' => 'Уничтожить',
    ];

    private $_attribute = [
        'Аварийная документация' => 'Аварийная документация',
        'Документация на изделие' => 'Документация на изделие',
        'Документация на составную часть изделия' => 'Документация на составную часть изделия',
        'Материалы НИР и ОКР' => 'Материалы НИР и ОКР',
        'Нормативно-техническая документация' => 'Нормативно-техническая документация',
        'Проект' => 'Проект',
        'Уникальная и особо ценная документация' => 'Уникальная и особо ценная документация',
    ];

    private $_number = [
        'Основной' => 'Основной',
        'Запасной' => 'Запасной',
        'А-Дубликат основной' => 'А-Дубликат основной',
        'Б-Дубликат запасной' => 'Б-Дубликат запасной',
    ];

    private $_form = [
        'Рулонный микрофильм' => 'Рулонный микрофильм',
        'Микрофиша' => 'Микрофиша',
    ];

    private $_title;
    private $_type;

    /**
     * @inheritdoc
     */
    public function getSecrecy()
    {
        return $this->_secrecy;
    }

    /**
     * @inheritdoc
     */
    public function getAgent()
    {
        $query = Agent::find()->orderBy('name_agent ASC')->all();
        return ArrayHelper::map($query, 'number_agent', function ($one) {
            return $one->number_agent . ' - ' . $one->name_agent;
        });
    }

    /**
     * @inheritdoc
     */
    public function getIndex()
    {
        $query = Index::find()->orderBy('index ASC')->all();
        return ArrayHelper::map($query, 'index', 'index');
    }

    /**
     * @inheritdoc
     */
    public function getIndication($index)
    {
        $query = Index::find()->where(['index' => $index])->orderBy('litera ASC')->all();
        return ArrayHelper::map($query, 'litera', 'litera');
    }

    /**
     * @inheritdoc
     */
    public function getAction()
    {
        return $this->_action;
    }

    /**
     * @inheritdoc
     */
    public function getDocumentationAttribute()
    {
        return $this->_attribute;
    }

    /**
     * @inheritdoc
     */
    public function getCountIndex($id)
    {
        return Index::find()->where(['index' => $id])->count();
    }

    /**
     * @inheritdoc
     */
    public function getIndexes($id)
    {
        return Index::find()->where(['index' => $id])->orderBy('litera ASC')->all();
    }

    /**
     * @inheritdoc
     */
    public function getNumber()
    {
        return $this->_number;
    }

    /**
     * @inheritdoc
     */
    public function getTitle($type)
    {
        switch ($type) {
            case 0:
                $this->_title = 'Рулонный микрофильм';
                break;
            case 1:
                $this->_title = 'Микрофиша';
                break;
        }
        return $this->_title;
    }

    /**
     * @inheritdoc
     */
    public function getType($id)
    {
        $query = Sheet::find()->where(['id' => $id])->all();
        $form = ArrayHelper::map($query, 'id', 'form');
        switch ($form[$id]) {
            case 'Рулонный микрофильм':
                $this->_type = 0;
                break;
            case 'Микрофиша':
                $this->_type = 1;
                break;
        }
        return $this->_type;
    }

    /**
     * @inheritdoc
     */
    public function getForm()
    {
        return $this->_form;
    }
}