<?php

use kartik\select2\Select2;
use yii\helpers\Html;
use yii\jui\DatePicker;
use yii\bootstrap\ActiveForm;
use yii\widgets\MaskedInput;

/* @var $this yii\web\View */
/* @var $model app\models\MadeReport */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $made array */

?>

<div class="made-form">
    <?php  $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-2">
            <?= $form->field($model, 'date_begin')->widget(MaskedInput::className(), ['mask' => '99.99.9999'])
                                                  ->widget(DatePicker::className(), [
                                                      'options' => [
                                                          'class'=>'form-control',
                                                      ],
                                                      'language' => 'ru',
                                                      'dateFormat' => 'dd.MM.yyyy',
                                                  ])->label('Период изготовления с <span class="minnesota-active">*</span>');
            ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'date_end')->widget(MaskedInput::className(), ['mask' => '99.99.9999'])
                                                ->widget(DatePicker::className(), [
                                                    'options' => [
                                                        'class'=>'form-control',
                                                    ],
                                                    'language' => 'ru',
                                                    'dateFormat' => 'dd.MM.yyyy',
                                                ])->label('Период изготовления по <span class="minnesota-active">*</span>');
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <?php
                echo $form->field($model, 'made')->widget(Select2::className(), [
                    'data' => $made,
                    'maintainOrder' => true,
                    'options' => [
                        'placeholder' => 'Укажите изготовителя МКФ ...',
                    ],
                    'pluginOptions' => [
                        'allowClear' => true
                    ]
                ])->label('Изготовитель МКФ <span class="minnesota-active">*</span>');
            ?>
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Печать', ['class' => 'btn btn-shadow btn-success']) ?>
        <?= Html::a('Закрыть', ['/site/report'], ['class' => 'btn btn-info']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>