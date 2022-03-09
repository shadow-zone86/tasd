<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Sheet */
/* @var $modelIndex app\models\Index */
/* @var $window string */
/* @var $disable string */
/* @var $index array */
/* @var $indication array */
/* @var $number array */
/* @var $secrecy array */
/* @var $agent array */
/* @var $action array */
/* @var $attribute array */
/* @var $type number */

$this->title = $model->number_form;

?>

<div class="sheet-view minnesota-margin">

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

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id, 'window' => $window], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id, 'window' => $window], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить этот элемент?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Печать 1 карточки', ['report/card1', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Печать 2 карточки', ['report/card2', 'id' => $model->id], ['class' => 'btn btn-warning']) ?>
        <?php
            switch ($window) {
                case 'index':
                    echo Html::a('Закрыть', ['index'], ['class' => 'btn btn-info']);
                    break;
                case 'bigger':
                    echo Html::a('Закрыть', ['bigger'], ['class' => 'btn btn-info']);
                    break;
                default:
                    echo Html::a('Закрыть', ['index'], ['class' => 'btn btn-info']);
                    break;
            }
        ?>
    </p>

    <?= $this->render('_form', [
        'model' => $model,
        'disable' => $disable,
        'indication' => $indication,
        'secrecy' => $secrecy,
        'agent' => $agent,
        'index' => $index,
        'action' => $action,
        'attribute' => $attribute,
        'type' => $type,
        'modelIndex' => $modelIndex,
        'window' => $window,
    ]) ?>

</div>
