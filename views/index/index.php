<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\bootstrap\ButtonDropdown;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\IndexSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ведение справочника индексов изделий';
?>
<div class="index-index minnesota-margin">
    <input class="unvisible_input" id="window_page" value="index" />
    <input class="unvisible_input" id="rows_count" value="<?=$rowsCount?>" />
    <ol class="breadcrumb">
        <li><a href="/">Главная</a></li>
        <li><a href="<?= Url::toRoute("/site/manual")?>">Справочники</a></li>
        <li class="minnesota-active"><?= Html::encode($this->title) ?></li>
    </ol>

    <p>
        <?= Html::a('Добавить', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Очистить фильтр', ['clear-filter'], ['class' => 'btn btn-danger']) ?>
        <?= Html::a('Закрыть', ['/site/manual'], ['class' => 'btn btn-info']) ?>
    </p>

    <?= \Yii::$app->session->getFlash('report_message') ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'index',
                'format' => 'raw',
                'contentOptions' => [
                    'class' => 'minnesota-column-percent-48',
                ],
                'value' => function ($data) use ($model) {
                    $arr = $model->getIndexLitera($data['id']);
                    $check = $model->getIndexIndication($arr);

                    if (empty($check)) {
                        return '<i class="glyphicon glyphicon-exclamation-sign minnesota-active" title="Индекс не используется"></i>' . ' ' . Html::a($data['index'], Url::toRoute(['view', 'id' => $data['id']]), [
                            'title' => Yii::t('app', 'Просмотр'),
                            'class' => 'all-blacks',
                        ]);
                    } else {
                        return Html::a($data['index'], Url::toRoute(['view', 'id' => $data['id']]), [
                            'title' => Yii::t('app', 'Просмотр'),
                            'class' => 'all-blacks',
                        ]);
                    }
                }
            ],
            [
                'attribute' => 'litera',
                'format' => 'raw',
                'contentOptions' => [
                    'class' => 'minnesota-column-percent-48',
                ],
                'value' => function ($data) {
                    return $data['litera'];
                }
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'contentOptions' => [
                    'class' => 'minnesota-column-percent-3',
                ],
                'buttons' => [
                    'all' => function ($url, $model, $key) {
                        return '<div class="btn-group">' . ButtonDropdown::widget([
                            'label' => '...',
                            'options' => ['class' => 'nautilus-pompilius btn-falcon'],
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
                                    [
                                        'label' => '<i class="glyphicon glyphicon-trash"></i> Удалить',
                                        'encode' => false,
                                        'url' => ['delete', 'id' => $key],
                                        'linkOptions' => [
                                            'data' => [
                                                'confirm' => Yii::t('app', 'Вы уверены, что хотите удалить этот элемент?'),
                                                'method' => 'post',
                                            ],
                                        ]
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
