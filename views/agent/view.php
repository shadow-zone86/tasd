<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Agent */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Ведение МКФ', 'url' => ['sheet/index']];
$this->params['breadcrumbs'][] = ['label' => 'Ведение справочника предприятий', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="agent-view" style="margin-top: 20px;">

    <ol class="breadcrumb">
        <li><a href="/">Главная</a></li>
        <li><a href="<?= Url::toRoute("/site/manual")?>">Справочники</a></li>
        <li><a href="<?= Url::toRoute("/agent/index")?>">Ведение справочника предприятий</a></li>
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
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'number_agent:ntext',
            'name_agent:ntext',
            'address:ntext',
        ],
    ]) ?>

</div>
