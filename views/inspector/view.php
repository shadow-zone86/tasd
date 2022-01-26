<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Sheet */

$this->title = $model->number_form;
?>
<div class="inspector-view minnesota-margin">

    <ol class="breadcrumb">
        <li><a href="/">Главная</a></li>
        <li><a href="<?= Url::toRoute("index")?>">Ведение МКФ</a></li>
        <li class="minnesota-active"><?= Html::encode($this->title) ?></li>
    </ol>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Закрыть', ['index'], ['class' => 'btn btn-info']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'number_form:ntext',
            [
                'attribute' => 'date_check',
                'format' => ['date', 'dd.MM.Y'],
            ],
            'number_check:ntext',
            'number_letter:ntext',
        ],
    ]) ?>

</div>
