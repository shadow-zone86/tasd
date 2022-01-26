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

            'number_agent:ntext',
            'name_agent:ntext',
            'address:ntext',

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
