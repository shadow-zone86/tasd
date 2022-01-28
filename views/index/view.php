<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Index */

$this->title = $model->index;
?>
<div class="index-view minnesota-margin">

    <ol class="breadcrumb">
        <li><a href="/">Главная</a></li>
        <li><a href="<?= Url::toRoute("/site/manual")?>">Справочники</a></li>
        <li><a href="<?= Url::toRoute("/index/index")?>">Ведение справочника индексов изделий</a></li>
        <li class="minnesota-active"><?= Html::encode($this->title) ?></li>
    </ol>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить этот элемент?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Закрыть', ['index'], ['class' => 'btn btn-info']) ?>
        <?= Html::a('<span id="minnesota-vue" class="glyphicon glyphicon-list-alt"></span>', '#', ['class' => 'btn btn-falcon list-button', 'title' => \Yii::t('yii', 'Перечень МКФ, где используется индекс')]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'index:ntext',
            'litera:ntext',
        ],
    ]) ?>

    <div class="list-form">
        <p>
            <?php
                echo $this->render('_list', [
                    'model' => $model,
                    'index' => $model->index,
                    'indication' => $model->litera,
                ]);
            ?>
        </p>
    </div>

</div>
