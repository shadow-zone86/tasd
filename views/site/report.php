<?php
use yii\helpers\Url;

/* @var $this yii\web\View */

$this->title = 'Отчеты';
?>

<div class="minnesota-excel-center" align="center">

    <div id="body_button">
        <div class="button_hola"><a class="falcon" href="<?= Url::toRoute("/report/entrance");?>"><span>Перечень МКФ, поступивших за период</span></a></div>
        <div class="button_hola"><a class="falcon" href="<?= Url::toRoute("/report/index");?>"><span>Подбор МКФ по индексу изделия</span></a></div>
        <div class="button_hola"><a class="falcon" href="<?= Url::toRoute("/report/indication");?>"><span>Подбор МКФ по обозначению изделия</span></a></div>
        <div class="button_hola"><a class="falcon" href="<?= Url::toRoute("/report/made");?>"><span>Подбор МКФ по изготовителю за период</span></a></div>
        <div class="button_hola"><a class="falcon" href="<?= Url::toRoute("/report/agent");?>"><span>Подбор МКФ по поставщику документации за период</span></a></div>
        <div class="button_hola"><a class="falcon" href="<?= Url::toRoute("/report/generator");?>"><span>Генератор отчетов</span></a></div>
        <div class="button_hola"><a class="falcon" href="<?= Url::toRoute("/report/count-index");?>"><span>Подсчет индексов изделий</span></a></div>
    </div>

</div>