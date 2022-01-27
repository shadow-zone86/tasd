<?php

use yii\bootstrap\ButtonDropdown;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\InspectorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ведение МКФ';
?>
<div class="inspector-index minnesota-margin">
    <input class="unvisible_input" id="window_page" value="inspector" />
    <input class="unvisible_input" id="rows_count" value="<?=$rowsCount?>" />
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
            [
                'attribute' => 'number_form',
                'format' => 'raw',
                'contentOptions' => [
                    'class' => 'minnesota-column-percent-24',
                ],
                'value' => function ($data) {
                    return Html::a($data['number_form'], Url::toRoute(['view', 'id' => $data['id']]), [
                        'title' => Yii::t('app', 'Просмотр'),
                        'class' => 'all-blacks',
                    ]);
                }
            ],
            [
                'attribute' => 'date_check',
                'format' => ['date', 'dd.MM.Y'],
                'contentOptions' => [
                    'class' => 'minnesota-column-percent-24',
                ],
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
            [
                'attribute' => 'number_check',
                'format' => 'raw',
                'contentOptions' => [
                    'class' => 'minnesota-column-percent-24',
                ],
                'value' => function ($data) {
                    return $data['number_check'];
                }
            ],
            [
                'attribute' => 'number_letter',
                'format' => 'raw',
                'contentOptions' => [
                    'class' => 'minnesota-column-percent-24',
                ],
                'value' => function ($data) {
                    return $data['number_letter'];
                }
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'contentOptions' => [
                    'class' => 'minnesota-column-percent-4',
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
