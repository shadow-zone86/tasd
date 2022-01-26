<?php

use yii\bootstrap\ButtonDropdown;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\SheetSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ведение МКФ';
?>
<div class="inspector-index minnesota-margin">

    <ol class="breadcrumb">
        <li><a href="/">Главная</a></li>
        <li class="minnesota-active"><?= Html::encode($this->title) ?></li>
    </ol>

    <p>
        <?= Html::a('Очистить фильтр', ['clear-filter'], ['class' => 'btn btn-danger']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'number_form:ntext',
            [
                'attribute' => 'date_check',
                'format' => ['date', 'dd.MM.Y'],
                'filter' => DatePicker::widget([
                    'model' => $searchModel,
                    'value' => $searchModel->date_check,
                    'attribute' => 'date_check',
                    'options' => [
                        'id' => 'minnesota-inspector-date-check',
                        'class' => 'form-control',
                        'readonly' => 'readonly',
                    ],
                    'language' => 'ru',
                    'dateFormat' => 'dd.MM.yyyy',
                ]),
            ],
            'number_check:ntext',
            'number_letter:ntext',
            [
                'class' => 'yii\grid\ActionColumn',
                'contentOptions' => [
                    'style' => 'white-space: normal; width: 3%; min-width: 3%; max-width: 3%;'
                ],
                'buttons' => [
                    'all' => function ($url, $model, $key) {
                        return '<div class="btn-group">' . ButtonDropdown::widget([
                            'label' => '...',
                            'options' => ['class' => 'btn btn-falcon'],
                            'dropdown' => [
                                'options' => ['class' => 'dropdown-menu my_width_ddm'],
                                'items' => [
                                    [
                                        'label' => '<i class="glyphicon glyphicon-eye-open"></i> Просмотр',
                                        'encode' => false,
                                        'url' => ['view', 'id' => $key],
                                    ],
                                    [
                                        'label' => '<i class="glyphicon glyphicon-pencil"></i> Редактировать',
                                        'encode' => false,
                                        'url' => ['update', 'id' => $key],
                                    ],
                                ],
                            ],
                        ]) . '</div>';
                    },
                ],
                'template' => '{all}'
            ],
        ],
    ]); ?>
</div>
