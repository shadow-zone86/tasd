<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Inspector */

$this->title = 'Create Inspector';
$this->params['breadcrumbs'][] = ['label' => 'Inspectors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inspector-create" style="margin-top: 20px;">

    <ol class="breadcrumb">
        <li><a href="/">Главная</a></li>
        <li><a href="<?= Url::toRoute("/inspector/index")?>">Ведение МКФ</a></li>
        <li class="active" style="color: #ff5b23;"><?= Html::encode($this->title) ?></li>
    </ol>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
