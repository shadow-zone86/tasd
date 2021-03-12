<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\IndexSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ведение справочника индексов изделий';
$this->params['breadcrumbs'][] = ['label' => 'Ведение МКФ', 'url' => ['sheet/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="index-index" style="margin-top: 20px;">

    <ol class="breadcrumb">
        <li><a href="/">Главная</a></li>
        <li><a href="<?= Url::toRoute("/site/manual")?>">Справочники</a></li>
        <li class="active" style="color: #ff5b23;"><?= Html::encode($this->title) ?></li>
    </ol>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'index:ntext',
            'litera:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
