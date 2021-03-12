<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Sheet */

$this->title = 'Микрофиша';
$this->params['breadcrumbs'][] = ['label' => 'Ведение МКФ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sheet-create" style="margin-top: 20px;">

    <ol class="breadcrumb">
        <li><a href="/">Главная</a></li>
        <li><a href="<?= Url::toRoute("/sheet/index")?>">Ведение МКФ</a></li>
        <li class="active" style="color: #ff5b23;"><?= Html::encode($this->title) ?></li>
    </ol>

    <?= $this->render('_formCreate1', [
        'model' => $model,
        'arr' => $arr,
    ]) ?>

</div>