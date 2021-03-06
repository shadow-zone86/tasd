<?php

use yii\bootstrap\ButtonDropdown;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\SheetSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $mkf array */
/* @var $agent array */
/* @var $index array */
/* @var $indication array */
/* @var $attribute array */
/* @var $action array */
/* @var $rowsCount number */
/* @var $window string */
/* @var $secrecy array */

$this->title = 'Ведение МКФ';
?>
<div class="sheet-index minnesota-margin">
    <input class="unvisible_input" id="window_page" value="sheet" />
    <input class="unvisible_input" id="rows_count" value="<?=$rowsCount?>" />
    <ol class="breadcrumb">
        <li><a href="/">Главная</a></li>
        <li class="minnesota-active"><?= Html::encode($this->title) ?></li>
    </ol>

    <p>
        <?= Html::a('Добавить рулонный микрофильм', ['create', 'type' => 0, 'window' => 'index'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Добавить микрофишу', ['create', 'type' => 1, 'window' => 'index'], ['class' => 'btn btn-warning']) ?>
        <?= Html::a('Расширенный поиск', '#', ['class' => 'btn btn-info search-button']) ?>
        <?= Html::a('Очистить фильтр', ['clear-filter', 'window' => 'index'], ['class' => 'btn btn-danger']) ?>
        <?= Html::a('<span id="minnesota-vue" class="glyphicon glyphicon-resize-small"></span>', ['bigger'], ['class' => 'btn btn-falcon vue-button', 'title' => \Yii::t('yii', 'Крупный табличный вид')]); ?>
    </p>

    <?= \Yii::$app->session->getFlash('report_message') ?>

    <div class="search-form">
        <p>
            <?php
                echo $this->render('_search', [
                    'model' => $searchModel,
                    'mkf' => $mkf,
                    'agent' => $agent,
                    'index' => $index,
                    'indication' => $indication,
                    'attribute' => $attribute,
                    'action' => $action,
                ]);
            ?>
        </p>
    </div>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                [
                    'attribute' => 'number_form',
                    'format' => 'raw',
                    'contentOptions' => [
                        'class' => 'minnesota-column-percent-18',
                    ],
                    'value' => function ($data) use ($window) {
                        return Html::a($data['number_form'], Url::toRoute(['view', 'id' => $data['id'], 'window' => $window]), [
                            'title' => Yii::t('app', 'Просмотр'),
                            'class' => 'all-blacks',
                        ]);
                    }
                ],
                [
                    'attribute' => 'original_number',
                    'format' => 'raw',
                    'contentOptions' => [
                        'class' => 'minnesota-column-percent-18',
                    ],
                    'value' => function ($data) {
                        return $data['original_number'];
                    }
                ],
                [
                    'attribute' => 'xxx',
                    'format' => 'raw',
                    'contentOptions' => [
                        'class' => 'minnesota-column-percent-7',
                    ],
                    'filter' => $secrecy,
                    'value' => function ($data) {
                        return $data['xxx'];
                    }
                ],
                [
                    'attribute' => 'passport',
                    'format' => 'raw',
                    'contentOptions' => [
                        'class' => 'minnesota-column-percent-18',
                    ],
                    'value' => function ($data) {
                        return $data['passport'];
                    }
                ],
                [
                    'attribute' => 'number_letter',
                    'format' => 'raw',
                    'contentOptions' => [
                        'class' => 'minnesota-column-percent-18',
                    ],
                    'value' => function ($data) {
                        return $data['number_letter'];
                    }
                ],
                [
                    'attribute' => 'cover_letter',
                    'format' => 'raw',
                    'contentOptions' => [
                        'class' => 'minnesota-column-percent-18',
                    ],
                    'value' => function ($data) {
                        return $data['cover_letter'];
                    }
                ],
                [
                    'class' => 'yii\grid\ActionColumn',
                    'contentOptions' => [
                        'class' => 'minnesota-column-percent-3',
                    ],
                    'buttons' => [
                        'all' => function ($url, $model, $key) use ($window)  {
                            return '<div class="btn-group">' . ButtonDropdown::widget([
                                'label' => '...',
                                'options' => ['class' => 'nautilus-pompilius btn-falcon'],
                                'dropdown' => [
                                    'options' => ['class' => 'dropdown-menu my_width_ddm'],
                                    'items' => [
                                        [
                                            'label' => '<i class="glyphicon glyphicon-eye-open"></i> Просмотр',
                                            'encode' => false,
                                            'url' => ['view', 'id' => $key, 'window' => $window],
                                        ],
                                        [
                                            'label' => '<i class="glyphicon glyphicon-pencil"></i> Редактировать',
                                            'encode' => false,
                                            'url' => ['update', 'id' => $key, 'window' => $window],
                                        ],
                                        [
                                            'label' => '<i class="glyphicon glyphicon-trash"></i> Удалить',
                                            'encode' => false,
                                            'url' => ['delete', 'id' => $key, 'window' => $window],
                                            'linkOptions' => [
                                                'data' => [
                                                    'confirm' => Yii::t('app', 'Вы уверены, что хотите удалить этот элемент?'),
                                                    'method' => 'post',
                                                ],
                                            ]
                                        ],
                                        [
                                            'label' => '<i class="glyphicon glyphicon-print"></i> 1 карточка',
                                            'encode' => false,
                                            'url' => ['report/card1', 'id' => $key],
                                        ],
                                        [
                                            'label' => '<i class="glyphicon glyphicon-print"></i> 2 карточка',
                                            'encode' => false,
                                            'url' => ['report/card2', 'id' => $key],
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