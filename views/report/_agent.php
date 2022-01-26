<?php

use kartik\select2\Select2;
use yii\helpers\Html;
use yii\jui\DatePicker;
use yii\bootstrap\ActiveForm;
use yii\widgets\MaskedInput;

/* @var $this yii\web\View */
/* @var $model app\models\AgentReport */
/* @var $form yii\bootstrap\ActiveForm */

?>

<div class="agent-form">
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
                echo $form->field($model, 'agent')->widget(Select2::className(), [
                    'data' => $agent,
                    'maintainOrder' => true,
                    'options' => [
                        'placeholder' => 'Укажите поставщика документации ...',
                    ],
                    'pluginOptions' => [
                        'allowClear' => true
                    ]
                ])->label('Поставщик документации <span class="minnesota-active">*</span>');
            ?>
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Печать', ['class' => 'btn btn-shadow btn-success']) ?>
        <?= Html::a('Закрыть', ['/site/report'], ['class' => 'btn btn-info']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>