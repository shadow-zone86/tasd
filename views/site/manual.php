<?php

/* @var $this yii\web\View */
use yii\helpers\Url;

$this->title = 'Справочники';
?>
<div align="center" style="margin-top: 50px; margin-bottom: 50px;">

<!--    Вариант №1-->
<!--    --><?php
//    echo \yii\bootstrap\Carousel::widget([
//        'items' => [
//            [
//                'content' => '<img style="width: 100%" src="../images/shadow_zone.jpg">',
//                'caption' => '<a class="falcon" href="'.Url::toRoute("/agent/index").'" style="position: fixed; bottom: 144px; right: 103px; width: 500px;"><span style="padding: 35px 48px 37px 51px;">Ведение справочника предприятий</span></a>',
//                'options' => []
//            ],
//            [
//                'content' => '<img style="width: 100%" src="../images/shadow_zone.jpg">',
//                'caption' => '<a class="falcon" href="'.Url::toRoute("/index/index").'" style="position: fixed; bottom: 444px; right: 103px; width: 500px;"><span style="padding: 35px 66px 37px 69px;">Ведение справочника индексов</span></a>',
//                'options' => []
//            ],
//        ],
//        'options' => [
//            'style' => "width: 50%"
//        ]
//    ]);
//    ?>

<!--    Вариант №2-->
<!--    <div class="hover-image-8">-->
<!--        <a href="#">-->
<!--            <img src="../images/shadow_zone.jpg" alt="" />-->
<!--        </a>-->
<!--    </div>-->

<!--<!--    Вариант №3-->
<!--    <ul class="list2a">-->
<!--        <li><a class="falcon" href="--><?//= Url::toRoute("/agent/index");?><!--"><span>Ведение справочника предприятий</span></a></li>-->
<!--        <li><a class="falcon" href="--><?//= Url::toRoute("/index/index");?><!--"><span>Ведение справочника индексов изделий</span></a></li>-->
<!--    </ul>-->

<!--    Вариант №4-->
    <div id="body_button">
        <div class="button_hola"><a class="falcon" href="<?= Url::toRoute("/agent/index");?>"><span>Ведение справочника предприятий</span></a></div>
        <div class="button_hola"><a class="falcon" href="<?= Url::toRoute("/index/index");?>"><span>Ведение справочника индексов изделий</span></a></div>
    </div>

</div>
