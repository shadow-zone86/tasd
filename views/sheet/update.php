<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Sheet */

$this->title = 'Редактировать';
?>
<div class="sheet-update minnesota-margin">

    <ol class="breadcrumb">
        <li><a href="/">Главная</a></li>
        <li>
            <a href="
                <?php
                    switch ($window) {
                        case 'index':
                            echo Url::toRoute("index");
                            break;
                        case 'bigger':
                            echo Url::toRoute("bigger");
                            break;
                        default:
                            echo Url::toRoute("index");
                            break;
                    }
                ?>
            ">Ведение МКФ</a>
        </li>
        <li class="minnesota-active"><?= Html::encode($this->title) ?></li>
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
