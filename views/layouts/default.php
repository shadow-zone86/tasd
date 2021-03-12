<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\DefaultAsset;
use yii\helpers\Url;

DefaultAsset::register($this);
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
<!--                            <a href="#"><i class="glyphicon glyphicon-map-marker"></i>Обратная связь</a>-->
<!--                            <a href="#"><i class="glyphicon glyphicon-user"></i>Личный кабинет</a>-->
                            <?php
                                if (Yii::$app->user->isGuest) {
                                    echo '<a href="'.Url::toRoute("/site/login").'"><i class="glyphicon glyphicon-lock"></i>Войти</a>';
                                } else {
                                    echo '<a data-method="post" href="'.Url::toRoute("/site/logout").'"><i class="glyphicon glyphicon-lock"></i>Выйти (' . Yii::$app->user->identity->accessToken . ')</a>';
                                }
                            ?>

<!--                            echo Nav::widget([-->
<!--                            'options' => ['class' => 'navbar-nav navbar-right'],-->
<!--                            'items' => [-->
<!--                            ['label' => 'Контактная информация', 'url' => ['/site/contact']],-->
<!--                            Yii::$app->user->isGuest ? (-->
<!--                            ['label' => 'Вход', 'url' => ['/site/login']]-->
<!--                            ) : (-->
<!--                            '<li>'-->
<!--                                . Html::beginForm(['/site/logout'], 'post')-->
<!--                                . Html::submitButton(-->
<!--                                'Выход (' . Yii::$app->user->identity->accessToken . ')',-->
<!--                                ['class' => 'btn btn-link logout']-->
<!--                                )-->
<!--                                . Html::endForm()-->
<!--                                . '</li>'-->
<!--                            )-->
<!--                            ],-->
<!--                            ]);-->

                        </div>
<!--                        <div class="search_top">-->
<!--                            <form>-->
<!--                                <input placeholder="Поиск" type="text">-->
<!--                                <button type="submit" name="submit_search">-->
<!--                                    <i class="glyphicon glyphicon-search"></i>-->
<!--                                </button>-->
<!--                            </form>-->
<!--                        </div>-->
                    </div>
<!--                    <div class="cart_top">-->
<!--                        <a href="#">-->
<!--                            <i class="glyphicon glyphicon-shopping-cart"></i>-->
<!--                            <span>0</span>-->
<!--                        </a>-->
<!--                    </div>-->
                </div>
            </div>
        </div>

        <div class="container-fluid menu_top">
            <div class="container">
                <div class="row">
                    <!--                <nav>-->
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
                    <!--                    <!-- Brand and toggle get grouped for better mobile display -->
                    <!--                    <div class="navbar-header">-->
                    <!--                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">-->
                    <!--                            <span class="sr-only">Toggle navigation</span>-->
                    <!--                            <span class="icon-bar"></span>-->
                    <!--                            <span class="icon-bar"></span>-->
                    <!--                            <span class="icon-bar"></span>-->
                    <!--                        </button>-->
                    <!--                    </div>-->
                    <!---->
                    <!--                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <!--                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">-->
                    <!--                        <ul class="nav navbar-nav">-->
                    <!--                            <li class="active"><a href="#">Одежда</a></li>-->
                    <!--                            <li><a href="#">Обувь</a></li>-->
                    <!--                            <li><a href="#">Снаряжение</a></li>-->
                    <!--                            <li><a href="#">Амуниция</a></li>-->
                    <!--                            <li><a href="#">Сувениры</a></li>-->
                    <!--                        </ul>-->
                    <!--                    </div><!-- /.navbar-collapse -->
                    <!--                </nav>-->
                </div>
            </div>
        </div>
    </header>


    <div class="container ban_block_wrap">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ban_block ban1">
                <div>
                    <img src="../images/Archiv.jpg">
<!--                    <a href="--><?php //$role = Yii::$app->user->identity->authKey; if (Yii::$app->user->isGuest) echo "#"; elseif ($role == 1) echo "#"; else echo Url::toRoute('sheet/index'); ?><!--">-->
<!--                        <h2><font color="#ff5b23">Архивист</font></h2>-->
<!--                        <p><font color="#ff5b23">Технический архив специальной документации</font></p>-->
<!--                        <span>Работать</span>-->
<!--                    </a>-->
                    <?php
                        $role = Yii::$app->user->identity->authKey;
                        if (Yii::$app->user->isGuest) {
                            echo Html::a('<h2><font color="#ff5b23">Архивист</font></h2><p><font color="#ff5b23">Технический архив специальной документации</font></p><span>Работать</span>', ['/site/login'], ['data-confirm' => 'Для продолжения работы, Вам необходимо авторизироваться']);
                        } elseif ($role == 1) {
                            echo Html::a('<h2><font color="#ff5b23">Архивист</font></h2><p><font color="#ff5b23">Технический архив специальной документации</font></p><span>Работать</span>', ['/site/login'], ['data-confirm' => Yii::t('app','У Вас нет полномочий для работы в сессии "Архивист"')]);
                        } elseif ($role == 2) {
                            echo Html::a('<h2><font color="#ff5b23">Архивист</font></h2><p><font color="#ff5b23">Технический архив специальной документации</font></p><span>Работать</span>', ['/sheet/index']);
                        } elseif ($role == 0) {
                            echo Html::a('<h2><font color="#ff5b23">Архивист</font></h2><p><font color="#ff5b23">Технический архив специальной документации</font></p><span>Работать</span>', ['/sheet/index']);
                        }
                    ?>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ban_block">
                <div>
                    <img src="../images/Insp.jpg">
<!--                    <a href="--><?php //$role = Yii::$app->user->identity->authKey; if (Yii::$app->user->isGuest) echo "#"; elseif ($role == 1) echo Url::toRoute('inspector/index'); else echo "#"; ?><!--">-->
<!--                        <h2><font color="#ff5b23">Инспектор</font></h2>-->
<!--                        <p><font color="#ff5b23">Технический архив специальной документации</font></p>-->
<!--                        <span>Работать</span>-->
<!--                    </a>-->
                    <?php
                        $role = Yii::$app->user->identity->authKey;
                        if (Yii::$app->user->isGuest) {
                            echo Html::a('<h2><font color="#ff5b23">Инспектор</font></h2><p><font color="#ff5b23">Технический архив специальной документации</font></p><span>Работать</span>', ['/site/login'], ['data-confirm' => 'Для продолжения работы, Вам необходимо авторизироваться']);
                        } elseif ($role == 1) {
                            echo Html::a('<h2><font color="#ff5b23">Инспектор</font></h2><p><font color="#ff5b23">Технический архив специальной документации</font></p><span>Работать</span>', ['/inspector/index']);
                        } elseif ($role == 2) {
                            echo Html::a('<h2><font color="#ff5b23">Инспектор</font></h2><p><font color="#ff5b23">Технический архив специальной документации</font></p><span>Работать</span>', ['/site/login'], ['data-confirm' => Yii::t('app','У Вас нет полномочий для работы в сессии "Инспектор"')]);
                        } elseif ($role == 0) {
                            echo Html::a('<h2><font color="#ff5b23">Инспектор</font></h2><p><font color="#ff5b23">Технический архив специальной документации</font></p><span>Работать</span>', ['/inspector/index']);
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <?= $content; ?>

<!--    <div class="container-fluid write_email_and_sseti">-->
<!--        <div class="container">-->
<!--            <div class="row write_email_and_sseti_wrap">-->
<!--                <div class="col-lg-6 col-md-6 col-sm-7 col-xs-12 write_email">-->
<!--                    <p>Рассылка</p>-->
<!--                    <form>-->
<!--                        <button type="submit">-->
<!--                            <i class="glyphicon glyphicon-chevron-right"></i>-->
<!--                        </button>-->
<!--                        <input type="text" placeholder="Введите E-mail">-->
<!--                    </form>-->
<!--                </div>-->
<!--                <div class="col-lg-6 col-md-6 col-sm-5 hidden-xs sseti_wrap">-->
<!--                    <div>-->
<!--                        <a href="#"><i class="fa fa-facebook"></i></a>-->
<!--                        <a href="#"><i class="fa fa-vk"></i></a>-->
<!--                        <a href="#"><i class="fa fa-instagram"></i></a>-->
<!--                    </div>-->
<!--                </div>-->
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

<!--                            <li><a href="--><?php //$role = Yii::$app->user->identity->authKey; if (Yii::$app->user->isGuest) echo "#"; elseif ($role == 1) echo "#"; else echo Url::toRoute('sheet/index'); ?><!--">Архивист</a></li>-->
<!--                            <li><a href="--><?php //$role = Yii::$app->user->identity->authKey; if (Yii::$app->user->isGuest) echo "#"; elseif ($role == 1) echo Url::toRoute('inspector/index'); else echo "#"; ?><!--">Инспектор</a></li>-->

<!--                            --><?php
//                                $role = Yii::$app->user->identity->authKey;
//                                if (Yii::$app->user->isGuest) {
//                                    if ($role == 1) {
//                                        echo '<li><a href="#">Архивист</a></li>';
//                                        echo '<li><a href="'.Url::toRoute("inspector/index").'">Инспектор</a></li>';
//                                    } else {
//                                        echo '<li><a href="'.Url::toRoute("sheet/index").'">Архивист</a></li>';
//                                        echo '<li><a href="#">Инспектор</a></li>';
//                                    }
//                                } else {
//                                    echo '<li><a href="#">Архивист</a></li>';
//                                    echo '<li><a href="#">Инспектор</a></li>';
//                                }
//                            ?>

<!--                            --><?php
//                                $username = Yii::$app->user->identity->username;
//                                $role = Yii::$app->user->identity->authKey;
//                                if ($username) {
//                                    if ($role == 1) {
////                                        echo  Html::a('Вход', ['inspector/index'], ['class' => 'btn btn-primary']);
//                                        echo '<li><a href="#">Архивист</a></li>';
//                                        echo '<li><a href="'.Url::toRoute("inspector/index").'">Инспектор</a></li>';
//                                    } else {
//                                        echo '<li><a href="'.Url::toRoute("sheet/index").'">Архивист</a></li>';
//                                        echo '<li><a href="#">Инспектор</a></li>';
//                                    }
//                                } else {
//                                    echo '<li><a href="#" onclick="alert();">Архивист</a></li>';
////                                      echo Html::a(
////                                            '<i class="glyphicon glyphicon-trash" title="Удалить файл"></i>',
////                                            ['delete-additional-file', 'file_id' => $file['id']],
////                                            ['data-confirm' => Yii::t('app','Вы действительно хотите удалить файл: "{0}"?', [$file->original_name])]
////                                        );
//
//                                    echo '<li><a href="#">Инспектор</a></li>';
//                                }
//                            ?>

<!--                            <li><a href="--><?//= Url::toRoute('sheet/index'); ?><!--">Архивист</a></li>-->
<!--                            <li><a href="--><?//= Url::toRoute('inspector/index'); ?><!--">Инспектор</a></li>-->
<!--                            <li><a href="#">Администратор</a></li>-->
<!--                            <li><a href="#">Амуниция</a></li>-->
<!--                            <li><a href="#">Сувениры</a></li>-->
                        </ul>
                    </div>
                    <div class="footer_menu">
                        <h3>Информация</h3>
                        <ul>
                            <li><a href="#">Руководство пользователя</a></li>
<!--                            <li><a href="#">Оплата</a></li>-->
<!--                            <li><a href="#">О компании</a></li>-->
<!--                            <li><a href="#">Скидки</a></li>-->
<!--                            <li><a href="#">Карта сайта</a></li>-->
                        </ul>
                    </div>
                    <div class="footer_menu">
                        <h3>Учетная запись</h3>
                        <ul>
<!--                            <li><a href="#">Войти</a></li>-->
                            <?php
                                if (Yii::$app->user->isGuest) {
                                    echo '<li><a href="'.Url::toRoute("/site/login").'">Войти</a></li>';
                                } else {
                                    echo '<li><a data-method="post" href="'.Url::toRoute("/site/logout").'">Выйти (' . Yii::$app->user->identity->accessToken . ')</a></li>';
                                }
                            ?>
<!--                            <li><a href="#">Зарегистрироваться</a></li>-->
<!--                            <li><a href="#">Мои заказы</a></li>-->
<!--                            <li><a href="#">Список желаний</a></li>-->
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 contacts">
                    <h3>Контакты</h3>
                    <p><i class="glyphicon glyphicon-map-marker"></i>Адрес: ул. Ленина 53, каб. 328 (ДИТ)</p>
                    <p><i class="glyphicon glyphicon-phone-alt"></i>Телефон: +7 (391) 975-95-26</p>
<!--                    <p><i class="glyphicon glyphicon-envelope"></i>E-mail: info@myshop.ru</p>-->
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 copy">
                    <p class="pull-left">&copy; ФГУП ГХК <?= date('Y') ?></p>
                </div>
            </div>
        </div>
    </div>

    <!--<div class="wrap">-->
    <?php
    //    NavBar::begin([
    //        'brandLabel' => Yii::$app->name,
    //        'brandUrl' => Yii::$app->homeUrl,
    //        'options' => [
    //            'class' => 'navbar-inverse navbar-fixed-top',
    //        ],
    //    ]);
    //    echo Nav::widget([
    //        'options' => ['class' => 'navbar-nav navbar-right'],
    //        'items' => [
    //            ['label' => 'Home', 'url' => ['/site/index']],
    //            ['label' => 'About', 'url' => ['/site/about']],
    //            ['label' => 'Contact', 'url' => ['/site/contact']],
    //            Yii::$app->user->isGuest ? (
    //                ['label' => 'Login', 'url' => ['/site/login']]
    //            ) : (
    //                '<li>'
    //                . Html::beginForm(['/site/logout'], 'post')
    //                . Html::submitButton(
    //                    'Logout (' . Yii::$app->user->identity->username . ')',
    //                    ['class' => 'btn btn-link logout']
    //                )
    //                . Html::endForm()
    //                . '</li>'
    //            )
    //        ],
    //    ]);
    //    NavBar::end();
    ?>

    <!--    <div class="container">-->
    <!--        --><?//= Breadcrumbs::widget([
    //            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    //        ]) ?>
    <!--        --><?//= Alert::widget() ?>
    <!--        --><?//= $content ?>
<!--    </div>-->
<!--    </div>-->

    <!--<footer class="footer">-->
    <!--    <div class="container">-->
    <!--        <p class="pull-left">&copy; My Company --><?//= date('Y') ?><!--</p>-->
    <!---->
    <!--        <p class="pull-right">--><?//= Yii::powered() ?><!--</p>-->
    <!--    </div>-->
    <!--</footer>-->

    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>