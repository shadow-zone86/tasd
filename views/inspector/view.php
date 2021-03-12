<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Inspector */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Ведение МКФ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inspector-view" style="margin-top: 20px;">

    <ol class="breadcrumb">
        <li><a href="/">Главная</a></li>
        <li><a href="<?= Url::toRoute("/inspector/index")?>">Ведение МКФ</a></li>
        <li class="active" style="color: #ff5b23;"><?= Html::encode($this->title) ?></li>
    </ol>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
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
