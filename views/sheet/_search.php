<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\widgets\MaskedInput;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\search\SheetSearch */
/* @var $form yii\widgets\ActiveForm */
/* @var $mkf array */
/* @var $agent array */
/* @var $index array */
/* @var $indication array */
/* @var $attribute array */
/* @var $action array */
?>

<div class="sheet-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="row">
        <div class="col-md-3">
            <?php
                echo $form->field($model, 'form')->widget(Select2::className(), [
                    'data' => $mkf,
                    'maintainOrder' => true,
                    'options' => [
                        'placeholder' => 'Укажите вид МКФ ...',
                    ],
                    'pluginOptions' => [
                        'allowClear' => true,
                    ],
                ]);
            ?>
        </div>
        <div class="col-md-3">
            <?php echo $form->field($model, 'original_number'); ?>
        </div>
        <div class="col-md-3">
            <?php
                echo $form->field($model, 'made_form')->widget(Select2::className(), [
                    'data' => $agent,
                    'maintainOrder' => true,
                    'options' => [
                        'placeholder' => 'Укажите изготовителя МКФ ...',
                    ],
                    'pluginOptions' => [
                        'allowClear' => true,
                    ],
                ]);
            ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'date_made')->widget(MaskedInput::className(), ['mask' => '99.99.9999'])
                                                 ->widget(DatePicker::className(), [
                                                     'options' => [
                                                         'class' => 'form-control',
                                                     ],
                                                     'language' => 'ru',
                                                     'dateFormat' => 'dd.MM.yyyy',
                                                 ]);
            ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'date_check')->widget(MaskedInput::className(), ['mask' => '99.99.9999'])
                                                  ->widget(DatePicker::className(), [
                                                      'options' => [
                                                          'class' => 'form-control',
                                                      ],
                                                      'language' => 'ru',
                                                      'dateFormat' => 'dd.MM.yyyy',
                                                  ]);
            ?>
        </div>
        <div class="col-md-3">
            <?php
                echo $form->field($model, 'agent')->widget(Select2::className(), [
                    'data' => $agent,
                    'maintainOrder' => true,
                    'options' => [
                        'placeholder' => 'Укажите поставщика документации ...',
                    ],
                    'pluginOptions' => [
                        'allowClear' => true,
                    ],
                ]);
            ?>
        </div>
        <div class="col-md-3">
            <?php echo $form->field($model, 'hiccupped')->textInput(['type' => 'number']); ?>
        </div>
        <div class="col-md-3">
            <?php echo $form->field($model, 'ctencil')->textInput(['type' => 'number']); ?>
        </div>
        <div class="col-md-3">
            <?php echo $form->field($model, 'work_ctencil')->textInput(['type' => 'number']); ?>
        </div>
        <div class="col-md-3">
            <?php echo $form->field($model, 'defective_ctencil')->textInput(['type' => 'number']); ?>
        </div>
        <div class="col-md-3">
            <?php echo $form->field($model, 'block')->textInput(['type' => 'number']); ?>
        </div>
        <div class="col-md-3">
            <?php echo $form->field($model, 'gloset')->textInput(['type' => 'number']); ?>
        </div>
        <div class="col-md-3">
            <?php echo $form->field($model, 'shelf')->textInput(['type' => 'number']); ?>
        </div>
        <div class="col-md-3">
            <?php echo $form->field($model, 'cell')->textInput(['type' => 'number']); ?>
        </div>
        <div class="col-md-3">
            <?php
                echo $form->field($model, 'index')->widget(Select2::className(), [
                    'data' => $index,
                    'maintainOrder' => true,
                    'options' => [
                        'placeholder' => 'Укажите индекс изделия ...',
                        'onchange' => '
                            $.post("/sheet/lists?id='.'"+$(this).val(), function(data) {
                                $("select#sheet-indication").html(data).sort(function(a, b) { 
                                    return a.text == b.text ? 0: a.text < b.text ? -1 :1 
                                });
                            });
                        ',
                    ],
                    'pluginOptions' => [
                        'allowClear' => true
                    ]
                ]);
            ?>
        </div>
        <div class="col-md-3">
            <?php
                echo $form->field($model, 'indication')->widget(Select2::className(), [
                    'data' => $indication,
                    'maintainOrder' => true,
                    'options' => [
                        'placeholder' => 'Укажите обозначение ...',
                        'id' => 'sheet-indication',
                    ],
                    'pluginOptions' => [
                        'allowClear' => true
                    ]
                ]);
            ?>
        </div>
        <div class="col-md-3">
            <?php
                echo $form->field($model, 'prizn_document')->widget(Select2::className(), [
                    'data' => $attribute,
                    'maintainOrder' => true,
                    'options' => [
                        'placeholder' => 'Укажите признак документации ...',
                    ],
                    'pluginOptions' => [
                        'allowClear' => true,
                    ],
                ]);
            ?>
        </div>
        <div class="col-md-3">
            <?php echo $form->field($model, 'accomp_letter'); ?>
        </div>
        <div class="col-md-3">
            <?php echo $form->field($model, 'fasc'); ?>
        </div>
        <div class="col-md-3">
            <?php echo $form->field($model, 'nama_mkf'); ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Поиск', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
