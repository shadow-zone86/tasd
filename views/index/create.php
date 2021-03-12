<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Index */

$this->title = 'Новый индекс изделия';
$this->params['breadcrumbs'][] = ['label' => 'Ведение МКФ', 'url' => ['sheet/index']];
$this->params['breadcrumbs'][] = ['label' => 'Ведение справочника индексов изделий', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="index-create" style="margin-top: 20px;">

    <ol class="breadcrumb">
        <li><a href="/">Главная</a></li>
        <li><a href="<?= Url::toRoute("/site/manual")?>">Справочники</a></li>
        <li><a href="<?= Url::toRoute("/agent/index")?>">Ведение справочника индексов изделий</a></li>
        <li class="active" style="color: #ff5b23;"><?= Html::encode($this->title) ?></li>
    </ol>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
