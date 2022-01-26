<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Sheet */
?>
<div class="sheet-create minnesota-margin">

    <ol class="breadcrumb">
        <li><a href="/">Главная</a></li>
        <li><a href="<?= Url::toRoute("index")?>">Ведение МКФ</a></li>
        <li class="minnesota-active"><?= Html::encode($title) ?></li>
    </ol>

    <?= $this->render('_form', [
        'model' => $model,
        'disable' => $disable,
        'indication' => $indication,
        'number' => $number,
        'secrecy' => $secrecy,
        'agent' => $agent,
        'index' => $index,
        'action' => $action,
        'attribute' => $attribute,
        'type' => $type,
        'window' => $window,
        'modelIndex' => $modelIndex,
    ]) ?>

</div>
