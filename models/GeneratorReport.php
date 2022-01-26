<?php

namespace app\models;

use app\models\base\GeneratorReportBase;
use yii\helpers\ArrayHelper;

class GeneratorReport extends GeneratorReportBase
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

    private $_type = [
        'Микрофиша' => 'Микрофиша',
        'Рулонный микрофильм' => 'Рулонный микрофильм',
    ];

    private $_arr = [];

    /**
     * @inheritdoc
     */
    public function getList()
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
    public function getIndication()
    {
        $query = Index::find()->orderBy('litera ASC')->all();
        return ArrayHelper::map($query, 'litera', 'litera');
    }

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
    public function getAction()
    {
        return $this->_action;
    }

    /**
     * @inheritdoc
     */
    public function getType()
    {
        return $this->_type;
    }

    /**
     * @inheritdoc
     */
    public function getSheet($type, $number, $xxx, $origin_number, $made, $passport, $provider, $index, $indication, $incoming_number, $name, $list_number, $task, $inventory_number)
    {
        if (!empty($type)) {
            $this->_arr['form'] = $type;
        }
        if (!empty($number)) {
            $this->_arr['number_form'] = $number;
        }
        if (!empty($xxx)) {
            $this->_arr['xxx'] = $xxx;
        }
        if (!empty($origin_number)) {
            $this->_arr['original_number'] = $origin_number;
        }
        if (!empty($made)) {
            $this->_arr['made_form'] = $made;
        }
        if (!empty($passport)) {
            $this->_arr['passport'] = $passport;
        }
        if (!empty($provider)) {
            $this->_arr['agent'] = $provider;
        }
        if (!empty($index)) {
            $this->_arr['index'] = $index;
        }
        if (!empty($indication)) {
            $this->_arr['indication'] = $indication;
        }
        if (!empty($incoming_number)) {
            $this->_arr['number_letter'] = $incoming_number;
        }
        if (!empty($name)) {
            $this->_arr['nama_mkf'] = $name;
        }
        if (!empty($list_number)) {
            $this->_arr['accomp_letter'] = $list_number;
        }
        if (!empty($task)) {
            $this->_arr['action'] = $task;
        }
        if (!empty($inventory_number)) {
            $this->_arr['fasc'] = $inventory_number;
        }
        return Sheet::find()->where($this->_arr)->all();
    }

    /**
     * @inheritdoc
     */
    public function getAgent($agent)
    {
        $query = Agent::find()->select(['name_agent'])->where(['number_agent' => $agent])->all();
        return ArrayHelper::getColumn($query, 'name_agent');
    }
}