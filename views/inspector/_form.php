<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Sheet */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inspector-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'number_form')->textInput(['disabled' => true]) ?>

    <?= $form->field($model, 'date_check')->widget(MaskedInput::className(), ['mask' => '99.99.9999',])
                                          ->widget(DatePicker::className(), [
                                              'options' => [
                                                  'class'=>'form-control',
                                              ],
                                              'language' => 'ru',
                                              'dateFormat' => 'dd.MM.yyyy',
                                          ]);
    ?>

    <?= $form->field($model, 'number_check')->textInput() ?>

    <?= $form->field($model, 'number_letter')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
        <?= Html::a('Закрыть', ['index'], ['class' => 'btn btn-info']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
