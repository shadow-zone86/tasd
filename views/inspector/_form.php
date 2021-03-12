<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Inspector */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inspector-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'number_form')->textInput(['disabled' => true]) ?>

    <?= $form->field($model, 'date_check')->widget(MaskedInput::className(), ['mask' => '99.99.9999',])->widget(DatePicker::className(), ['options'=>['class'=>'form-control',], 'language' => 'ru', 'dateFormat' => 'dd.MM.yyyy',]); ?>

    <?= $form->field($model, 'number_check')->textInput() ?>

    <?= $form->field($model, 'number_letter')->textInput() ?>

    <div style="display: none;">

        <?= $form->field($model, 'id')->textInput() ?>

        <?= $form->field($model, 'user')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'date_time')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'form')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'original_number')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'made_form')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'roll')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'copy')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'number_copy')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'scene')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'date_made')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'passport')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'agent')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'density')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'read')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'na2so3')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'ag')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'ov')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'ss')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 's')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'n_s')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'dsp')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'k')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'kt')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'sk')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'hiccupped')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'ctencil')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'work_ctencil')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'defective_ctencil')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'glue')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'block')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'gloset')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'shelf')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'cell')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'index')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'indication')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'xxx')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'prizn_document')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'cover_letter')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'accomp_letter')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'fasc')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'adress')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'data_made')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'nama_mkf')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'note')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'action')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'key1')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'key2')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'key3')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'key4')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'key5')->textarea(['rows' => 6]) ?>

    </div>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
