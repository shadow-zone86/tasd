<?php

/* @var $this yii\web\View */
use yii\helpers\Url;

$this->title = 'Отчеты';
?>
<div align="center" style="margin-top: 50px; margin-bottom: 50px;">
<!--    Вериант №1-->
<!--    --><?php
//    echo \yii\bootstrap\Carousel::widget([
//        'items' => [
//            [
//                'content' => '<img style="width: 100%" src="../images/shadow_zone.jpg">',
//                'caption' => '<a class="falcon" href="'.Url::toRoute("/report/entrance").'" style="position: fixed; bottom: 444px; right: 103px; width: 500px;"><span style="padding: 35px 30px 37px 33px;">Перечень МКФ, поступивших за период</span></a>',
//                'options' => []
//            ],
//            [
//                'content' => '<img style="width: 100%" src="../images/shadow_zone.jpg">',
//                'caption' => '<a class="falcon" href="'.Url::toRoute("/report/index").'" style="position: fixed; bottom: 444px; right: 103px; width: 500px;"><span style="padding: 35px 65px 37px 67px;">Подбор МКФ по индексу изделия</span></a>',
//                'options' => []
//            ],
//            [
//                'content' => '<img style="width: 100%" src="../images/shadow_zone.jpg">',
//                'caption' => '<a class="falcon" href="'.Url::toRoute("/report/indication").'" style="position: fixed; bottom: 444px; right: 103px; width: 500px;"><span style="padding: 35px 34px 37px 37px;">Подбор МКФ по обозначению изделия</span></a>',
//                'options' => []
//            ],
//            [
//                'content' => '<img style="width: 100%" src="../images/shadow_zone.jpg">',
//                'caption' => '<a class="falcon" href="'.Url::toRoute("/report/made").'" style="position: fixed; bottom: 444px; right: 103px; width: 500px;"><span style="padding: 35px 21px 37px 25px;">Подбор МКФ по изготовителю за период</span></a>',
//                'options' => []
//            ],
//            [
//                'content' => '<img style="width: 100%" src="../images/shadow_zone.jpg">',
//                'caption' => '<a class="falcon" href="'.Url::toRoute("/report/agent").'" style="position: fixed; bottom: 444px; right: 103px; width: 500px;"><span style="padding: 35px 35px 37px 37px;">Подбор МКФ по поставщику за период</span></a>',
//                'options' => []
//            ],
//            [
//                'content' => '<img style="width: 100%" src="../images/shadow_zone.jpg">',
//                'caption' => '<a class="falcon" href="'.Url::toRoute("/report/generator").'" style="position: fixed; bottom: 444px; right: 103px; width: 500px;"><span style="padding: 35px 137px 37px 137px;">Генератор отчетов</span></a>',
//                'options' => []
//            ],
//        ],
//        'options' => [
//            'style' => "width: 50%"
//        ]
//    ]);
//    ?>

    <!--    Вариант №3-->
<!--    <ul class="list2a">-->
<!--        <li><a class="falcon" href="--><?//= Url::toRoute("/report/entrance");?><!--"><span>Перечень МКФ, поступивших за период</span></a></li>-->
<!--        <li><a class="falcon" href="--><?//= Url::toRoute("/report/index");?><!--"><span>Подбор МКФ по индексу изделия</span></a></li>-->
<!--        <li><a class="falcon" href="--><?//= Url::toRoute("/report/indication");?><!--"><span>Подбор МКФ по обозначению изделия</span></a></li>-->
<!--        <li><a class="falcon" href="--><?//= Url::toRoute("/report/made");?><!--"><span>Подбор МКФ по изготовителю за период</span></a></li>-->
<!--        <li><a class="falcon" href="--><?//= Url::toRoute("/report/agent");?><!--"><span>Подбор МКФ по поставщику документации за период</span></a></li>-->
<!--        <li><a class="falcon" href="--><?//= Url::toRoute("/report/generator");?><!--"><span>Генератор отчетов</span></a></li>-->
<!--    </ul>-->

    <!--    Вариант №4-->
    <div id="body_button">
        <div class="button_hola"><a class="falcon" href="<?= Url::toRoute("/report/entrance");?>"><span>Перечень МКФ, поступивших за период</span></a></div>
        <div class="button_hola"><a class="falcon" href="<?= Url::toRoute("/report/index");?>"><span>Подбор МКФ по индексу изделия</span></a></div>
        <div class="button_hola"><a class="falcon" href="<?= Url::toRoute("/report/indication");?>"><span>Подбор МКФ по обозначению изделия</span></a></div>
        <div class="button_hola"><a class="falcon" href="<?= Url::toRoute("/report/made");?>"><span>Подбор МКФ по изготовителю за период</span></a></div>
        <div class="button_hola"><a class="falcon" href="<?= Url::toRoute("/report/agent");?>"><span>Подбор МКФ по поставщику документации за период</span></a></div>
        <div class="button_hola"><a class="falcon" href="<?= Url::toRoute("/report/generator");?>"><span>Генератор отчетов</span></a></div>
    </div>

</div>