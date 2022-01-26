<?php
use yii\helpers\Url;

/* @var $this yii\web\View */

$this->title = 'Справочники';
?>

<div class="minnesota-excel-center" align="center">

    <div id="body_button">
        <div class="button_hola"><a class="falcon" href="<?= Url::toRoute("/agent/index");?>"><span>Ведение справочника предприятий</span></a></div>
        <div class="button_hola"><a class="falcon" href="<?= Url::toRoute("/index/index");?>"><span>Ведение справочника индексов изделий</span></a></div>
    </div>

</div>
