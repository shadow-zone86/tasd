<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Agent */

$this->title = 'Редактировать';
?>
<div class="agent-update minnesota-margin">

    <ol class="breadcrumb">
        <li><a href="/">Главная</a></li>
        <li><a href="<?= Url::toRoute("/site/manual")?>">Справочники</a></li>
        <li><a href="<?= Url::toRoute("/agent/index")?>">Ведение справочника предприятий</a></li>
        <li class="minnesota-active"><?= Html::encode($this->title) ?></li>
    </ol>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
