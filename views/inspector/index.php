<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\InspectorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ведение МКФ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inspector-index" style="margin-top: 20px;">

    <ol class="breadcrumb">
        <li><a href="/">Главная</a></li>
        <li class="active" style="color: #ff5b23;"><?= Html::encode($this->title) ?></li>
    </ol>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'number_form:ntext',
            [
                'attribute' => 'date_check',
                'format' => ['date', 'dd.MM.Y'],
            ],
            'number_check:ntext',
            'number_letter:ntext',
            [
                'class' => yii\grid\ActionColumn::className(),
                'template' => '{view} {update}',
            ],
        ],
    ]); ?>
</div>
