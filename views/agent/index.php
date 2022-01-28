<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\bootstrap\ButtonDropdown;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\AgentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Ведение справочника предприятий';
?>
<div class="agent-index minnesota-margin">
    <input class="unvisible_input" id="window_page" value="agent" />
    <input class="unvisible_input" id="rows_count" value="<?=$rowsCount?>" />
    <ol class="breadcrumb">
        <li><a href="/">Главная</a></li>
        <li><a href="<?= Url::toRoute("/site/manual")?>">Справочники</a></li>
        <li class="minnesota-active"><?= Html::encode($this->title) ?></li>
    </ol>

    <p>
        <?= Html::a('Добавить предприятие', ['create'], ['class' => 'btn btn-success']) ?>
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
                'attribute' => 'number_agent',
                'format' => 'raw',
                'contentOptions' => [
                    'class' => 'minnesota-column-percent-220',
                ],
                'value' => function ($data) use ($model) {
                    $name_agent = $model->getNameAgent($data['id']);
                    $counter = $model->getAgentCount($name_agent[0]['number_agent']);

                    if ($counter <= 0) {
                        return '<i class="glyphicon glyphicon-exclamation-sign minnesota-active" title="Предприятие не используется"></i>' . ' ' . Html::a($data['number_agent'], Url::toRoute(['view', 'id' => $data['id']]), [
                            'title' => Yii::t('app', 'Просмотр'),
                            'class' => 'all-blacks',
                        ]);
                    } else {
                        return Html::a($data['number_agent'], Url::toRoute(['view', 'id' => $data['id']]), [
                            'title' => Yii::t('app', 'Просмотр'),
                            'class' => 'all-blacks',
                        ]);
                    }
                }
            ],
            [
                'attribute' => 'name_agent',
                'format' => 'raw',
                'contentOptions' => [
                    'class' => 'minnesota-column-percent-37',
                ],
                'value' => function ($data) {
                    return $data['name_agent'];
                }
            ],
            [
                'attribute' => 'address',
                'format' => 'raw',
                'contentOptions' => [
                    'class' => 'minnesota-column-percent-37',
                ],
                'value' => function ($data) {
                    return $data['address'];
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
