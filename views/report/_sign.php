<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\IndexSignReport */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $type array */

?>

<div class="entrance-form">
    <?php  $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-2">
            <?= $form->field($model, 'sign')->checkboxList($type) ?>
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Печать', ['class' => 'btn btn-shadow btn-success']) ?>
        <?= Html::a('Закрыть', ['/site/report'], ['class' => 'btn btn-info']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>