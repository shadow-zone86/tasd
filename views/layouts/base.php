<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use app\assets\BaseAsset;
use yii\helpers\Url;

BaseAsset::register($this);
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
    <header>
        <div class="container">
            <div class="row header_top">
                <div class="logo col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <a href="<?= Url::toRoute('/site/index')?>"><img src="../images/logo2.png"></a>
                </div>
                <div class="btn_top_wrap col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="btn_and_search">
                        <div class="btn_top">
                            <?php
                                if (Yii::$app->user->isGuest) {
                                    echo '<a href="'.Url::toRoute("/site/login").'"><i class="glyphicon glyphicon-lock"></i>Войти</a>';
                                } else {
                                    echo '<a data-method="post" href="'.Url::toRoute("/site/logout").'"><i class="glyphicon glyphicon-lock"></i>Выйти (' . Yii::$app->user->identity->accessToken . ')</a>';
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid menu_top">
            <div class="container">
                <div class="row">
                    <?php
                        $role = Yii::$app->user->identity->authKey;
                        NavBar::begin([
                            'brandUrl' => Yii::$app->homeUrl,
                            'options' => [
                                'class' => ' ',
                            ],
                        ]);
                        if (Yii::$app->user->isGuest) {
                            echo Nav::widget([
                                'options' => ['class' => 'navbar-nav'],
                                'items' => [
                                    ['label' => 'Главная', 'url' => ['/site/index']],
                                    ['label' => 'Контакты', 'url' => ['/site/contact']],
                                ],
                            ]);
                        } elseif ($role == 1) {
                            echo Nav::widget([
                                'options' => ['class' => 'navbar-nav'],
                                'items' => [
                                    ['label' => 'Главная', 'url' => ['/site/index']],
                                    ['label' => 'Контакты', 'url' => ['/site/contact']],
                                ],
                            ]);
                        } else {
                            echo Nav::widget([
                                'options' => ['class' => 'navbar-nav'],
                                'items' => [
                                    ['label' => 'Главная', 'url' => ['/site/index']],
                                    ['label' => 'Справочники', 'url' => ['/site/manual']],
                                    ['label' => 'Отчеты', 'url' => ['/site/report']],
                                    ['label' => 'Контакты', 'url' => ['/site/contact']],
                                ],
                            ]);
                        }
                        NavBar::end();
                    ?>
                </div>
            </div>
        </div>
    </header>

<!--    <div class="container">-->
    <div class="shadowzone">
        <div class="row">
<!--            <div class="col-lg-12 contant_wrap">-->
<!--                <div class="navigation">-->
<!--                    <ul>-->
<!--                        <li><a href="/"><i class="glyphicon glyphicon-home"></i></a></li>-->
<!--                        <li><a href="#">Справочники</a></li>-->
<!--                        <li><span>Рюкзаки</span></li>-->
<!--                    </ul>-->
<!--                </div>-->
<!--            </div>-->
        </div>
        <div class="row">
            <?= $content; ?>
        </div>
    </div>

<!--    <div class="container-fluid write_email_and_sseti">-->
<!--        <div class="container">-->
<!--            <div class="row write_email_and_sseti_wrap">-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->

    <div class="container-fluid footer">
        <div class="container">
            <div class="row menu_footer_and_contact">
                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                    <div class="footer_menu">
                        <h3>Категории</h3>
                        <ul>
                            <?php
                                $role = Yii::$app->user->identity->authKey;
                                if (Yii::$app->user->isGuest) {
                                    echo '<li>' . Html::a('Архивист', ['/site/login'], ['data-confirm' => 'Для продолжения работы, Вам необходимо авторизироваться']) . '</li>' ;
                                    echo '<li>' . Html::a('Инспектор', ['/site/login'], ['data-confirm' => 'Для продолжения работы, Вам необходимо авторизироваться']) . '</li>' ;
                                } elseif ($role == 1) {
                                    echo '<li>' . Html::a('Архивист', ['/site/login'], ['data-confirm' => Yii::t('app','У Вас нет полномочий для работы в сессии "Архивист"')]) . '</li>' ;
                                    echo '<li>' . Html::a('Инспектор', ['/inspector/index']) . '</li>' ;
                                } elseif ($role == 2) {
                                    echo '<li>' . Html::a('Архивист', ['/sheet/index']) . '</li>' ;
                                    echo '<li>' . Html::a('Инспектор', ['/site/login'], ['data-confirm' => Yii::t('app','У Вас нет полномочий для работы в сессии "Инспектор"')]) . '</li>' ;
                                } elseif ($role == 0) {
                                    echo '<li>' . Html::a('Архивист', ['/sheet/index']) . '</li>' ;
                                    echo '<li>' . Html::a('Инспектор', ['/inspector/index']) . '</li>' ;
                                }
                            ?>
                        </ul>
                    </div>
                    <div class="footer_menu">
                        <h3>Информация</h3>
                        <ul>
                            <li><a href="#">Руководство пользователя</a></li>
                        </ul>
                    </div>
                    <div class="footer_menu">
                        <h3>Учетная запись</h3>
                        <ul>
                            <?php
                                if (Yii::$app->user->isGuest) {
                                    echo '<li><a href="'.Url::toRoute("/site/login").'">Войти</a></li>';
                                } else {
                                    echo '<li><a data-method="post" href="'.Url::toRoute("/site/logout").'">Выйти (' . Yii::$app->user->identity->accessToken . ')</a></li>';
                                }
                            ?>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 contacts">
                    <h3>Контакты</h3>
                    <p><i class="glyphicon glyphicon-map-marker"></i>Адрес: ул. Ленина 53, каб. 328 (ДИТ)</p>
                    <p><i class="glyphicon glyphicon-phone-alt"></i>Телефон: +7 (391) 975-95-26</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 copy">
                    <p class="pull-left">&copy; ФГУП ГХК <?= date('Y') ?></p>
                </div>
            </div>
        </div>
    </div>
    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>