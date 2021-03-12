<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
    <?php $this->beginBody() ?>

    <div class="wrap">
        <?php
        NavBar::begin([
        'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                'class' => 'navbar-inverse navbar-fixed-top',
            ],
        ]);
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right'],
            'items' => [
            ['label' => 'Справочники', 'items' => [
                ['label' => 'Ведение справочника предприятий', 'url'=> ['/agent/index']],
                ['label' => 'Ведение справочника индексов изделий', 'url'=> ['/index/index']],
            ]],
            ['label' => 'Печать отчетов', 'items' => [
                ['label' => 'Перечень МКФ, поступивших за период', 'url'=> ['/report/entrance']],
                ['label' => 'Подбор МКФ по индексу изделия', 'url'=> ['/report/index']],
                ['label' => 'Подбор МКФ по обозначению изделия', 'url'=> ['/report/indication']],
                ['label' => 'Подбор МКФ по изготовителю МКФ за период', 'url'=> ['/report/made']],
                ['label' => 'Подбор МКФ по поставщику документации за период', 'url'=> ['/report/agent']],
                ['label' => 'Генератор отчетов', 'url'=> ['/report/generator']],
            ]],
            Yii::$app->user->isGuest ? (
            ['label' => 'Вход', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Выход (' . Yii::$app->user->identity->accessToken . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
            ],
        ]);
        NavBar::end();
        ?>

        <div class="container">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <p class="pull-left">&copy; ФГУП ГХК <?= date('Y') ?></p>
        </div>
    </footer>

    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>