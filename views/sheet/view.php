<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Sheet */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Ведение МКФ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sheet-view" style="margin-top: 20px;">

    <ol class="breadcrumb">
        <li><a href="/">Главная</a></li>
        <li><a href="<?= Url::toRoute("/sheet/index")?>">Ведение МКФ</a></li>
        <li class="active" style="color: #ff5b23;"><?= Html::encode($this->title) ?></li>
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
        <?= Html::a('Печать 1 карточки', ['report/card1', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Печать 2 карточки', ['report/card2', 'id' => $model->id], ['class' => 'btn btn-warning']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'form:ntext',
            'number_form:ntext',
            'original_number:ntext',
            'xxx:ntext',
            'made_form:ntext',
            'agent:ntext',
            'copy:ntext',
            'roll:ntext',
            'number_copy:ntext',
            'block:ntext',
            'gloset:ntext',
            'shelf:ntext',
            'cell:ntext',
            'passport:ntext',
            [
                'attribute' => 'date_made',
                'format' => ['date', 'dd.MM.Y'],
                'options' => ['width' => '200']
            ],
            [
                'attribute' => 'date_check',
                'format' => ['date', 'dd.MM.Y'],
                'options' => ['width' => '200']
            ],
            'number_check:ntext',
            [
                'attribute' => 'data_made',
                'format' => ['date', 'dd.MM.Y'],
                'options' => ['width' => '200']
            ],
            'density:ntext',
            'na2so3:ntext',
            'ag:ntext',
            'ov:ntext',
            'ss:ntext',
            's:ntext',
            'n_s:ntext',
            'dsp:ntext',
            'k:ntext',
            'kt:ntext',
            'sk:ntext',
            'hiccupped:ntext',
            'ctencil:ntext',
            'work_ctencil:ntext',
            'defective_ctencil:ntext',
            'glue:ntext',
            'number_letter:ntext',
            'cover_letter:ntext',
            'accomp_letter:ntext',
            'fasc:ntext',
            'index:ntext',
            'indication:ntext',
            'nama_mkf:ntext',
            'action:ntext',
            'adress:ntext',
            'note:ntext',
            'prizn_document:ntext',
        ],
    ]) ?>

</div>
