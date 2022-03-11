<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\IndexSignReport */
/* @var $type array */

?>

<div class="index-sign-report minnesota-margin">

    <ol class="breadcrumb">
        <li><a href="/">Главная</a></li>
        <li><a href="<?= Url::toRoute("/site/report")?>">Отчеты</a></li>
        <li class="minnesota-active"><?= Html::encode($this->title) ?></li>
    </ol>

    <?= $this->render('_sign', [
        'model' => $model,
        'type' => $type,
    ]) ?>

</div>