<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SheetSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ведение МКФ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sheet-index" style="margin-top: 20px;">

    <ol class="breadcrumb">
        <li><a href="/">Главная</a></li>
        <li class="active" style="color: #ff5b23;"><?= Html::encode($this->title) ?></li>
    </ol>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить рулонный микрофильм', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Добавить микрофишу', ['create1'], ['class' => 'btn btn-warning']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'number_form:ntext',
            'xxx:ntext',
            'passport:ntext',
            'number_letter:ntext',
            'cover_letter:ntext',
            [
                'class' => yii\grid\ActionColumn::className(),
                'template' => '{view} {update} {delete} {print} {print1} {up}',
//                'template' => '{view} {update} {delete} {print} {print1}',
                'buttons' => [
                    'print' => function ($url, $model, $key) {
                        $iconName = "print";
                        $title = \Yii::t('yii', 'Печать 1 карточки');
                        $id = 'print-'.$key;
                        $options = [
                            'title' => $title,
                            'aria-label' => $title,
                            'data-pjax' => '0',
                            'id' => $id
                        ];
                        $url = \yii\helpers\Url::current(['report/card1', 'id' => $key]);
                        $icon = Html::tag('span', '', ['class' => "glyphicon glyphicon-$iconName"]);
                        return Html::a($icon, $url, $options);
                    },
                    'print1' => function ($url, $model, $key) {
                        $iconName = "print";
                        $title = \Yii::t('yii', 'Печать 2 карточки');
                        $id = 'print-'.$key;
                        $options = [
                            'title' => $title,
                            'aria-label' => $title,
                            'data-pjax' => '0',
                            'id' => $id
                        ];
                        $url = \yii\helpers\Url::current(['report/card2', 'id' => $key]);
                        $icon = Html::tag('span', '', ['class' => "glyphicon glyphicon-$iconName"]);
                        return Html::a($icon, $url, $options);
                    },
                    'up' => function ($url, $model, $key) {
                        $iconName = "paperclip";
                        $title = \Yii::t('yii', 'Загрузка файлов');
                        $id = 'up-'.$key;
                        $options = [
                            'title' => $title,
                            'aria-label' => $title,
                            'data-pjax' => '0',
                            'id' => $id
                        ];
                        $url = \yii\helpers\Url::current(['site/upload', 'id' => $key]);
                        $icon = Html::tag('span', '', ['class' => "glyphicon glyphicon-$iconName"]);
                        return Html::a($icon, $url, $options);
                    },
                ],
            ],
        ],
    ]); ?>
</div>