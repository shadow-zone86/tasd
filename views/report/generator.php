<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\GeneratorReport */

?>

<div class="generator-report minnesota-margin">

    <ol class="breadcrumb">
        <li><a href="/">Главная</a></li>
        <li><a href="<?= Url::toRoute("/site/report")?>">Отчеты</a></li>
        <li class="minnesota-active"><?= Html::encode($this->title) ?></li>
    </ol>

    <?= $this->render('_generator', [
        'model' => $model,
        'agent' => $agent,
        'index' => $index,
        'indication' => $indication,
        'xxx' => $xxx,
        'task' => $task,
        'type' => $type,
    ]) ?>

</div>