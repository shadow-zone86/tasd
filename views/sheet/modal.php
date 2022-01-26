<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Index */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="modal-form">

    <?php $form = ActiveForm::begin([
        'id' => 'modal-index-form',
        'enableAjaxValidation' => true,
    ]); ?>

    <?= $form->field($model, 'index')->textInput() ?>

    <?= $form->field($model, 'litera')->textInput() ?>

    <div class="modal-footer">
        <?= Html::submitButton(Yii::t('app', 'Сохранить'), ['class' => 'btn btn-success']) ?>
        <?= Html::button('Закрыть', ['type' => 'button', 'data-dismiss' => 'modal', 'class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>