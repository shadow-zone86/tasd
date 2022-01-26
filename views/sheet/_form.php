<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;
use yii\jui\DatePicker;
use yii\widgets\Pjax;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Sheet */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sheet-form" xmlns="http://www.w3.org/1999/html">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-2 unvisible_input">
            <!-- Данные поля нужно обязательно отображать на форме для корректной работы JavaScript -->
            <?= $form->field($model, 'form')->textInput(['id' => 'minnesotaForm', 'disabled' => false]) ?>
            <?= $form->field($model, 'key1')->textInput(['id' => 'minnesotaKey1', 'disabled' => true]) ?>
            <?= $form->field($model, 'key2')->textInput(['id' => 'minnesotaKey2', 'disabled' => false]) ?>
            <?= $form->field($model, 'key3')->textInput(['id' => 'minnesotaKey3', 'disabled' => true]) ?>
            <?= $form->field($model, 'key4')->textInput(['id' => 'minnesotaKey4', 'disabled' => true]) ?>
            <?= $form->field($model, 'key5')->textInput(['id' => 'minnesotaKey5', 'disabled' => true]) ?>
        </div>

        <div class="col-md-2">
            <?php
                switch ($type) {
                    case 0:
                        echo $form->field($model, 'number_form')->widget(MaskedInput::className(), [
                            'mask' => '999.999999-999-9-A',
                            'options' => [
                                'id' => 'minnesotaNumberForm',
                                'disabled' => $disable,
                            ],
                        ]);
                        break;
                    case 1:
                        echo $form->field($model, 'number_form')->widget(MaskedInput::className(), [
                            'mask' => '999.999999-999-999-9-A',
                            'options' => [
                                'id' => 'minnesotaNumberForm',
                                'disabled' => $disable,
                            ],
                        ]);
                        break;
                    default:
                        echo $form->field($model, 'number_form')->textInput([
                            'id' => 'minnesotaNumberForm',
                            'maxlength' => true,
                            'disabled' => $disable,
                        ]);
                        break;
                }
            ?>
        </div>

        <div class="col-md-2">
            <?php
                echo $form->field($model, 'number_copy')->widget(Select2::className(), [
                    'data' => $number,
                    'maintainOrder' => true,
                    'options' => [
                        'placeholder' => 'Укажите номер экземпляра ...',
                        'disabled' => $disable,
                        'id' => 'minnesotaNumberCopy',
                    ],
                    'pluginOptions' => [
                        'allowClear' => true,
                    ],
                ])->label('Номер экземпляра <span class="minnesota-active">*</span>');
            ?>
        </div>

        <div class="col-md-2">
            <?= $form->field($model, 'original_number')->textInput(['disabled' => $disable]) ?>
        </div>

        <div class="col-md-2">
            <?php
                echo $form->field($model, 'xxx')->widget(Select2::className(), [
                    'data' => $secrecy,
                    'maintainOrder' => true,
                    'options' => [
                        'placeholder' => 'Укажите гриф секретности МКФ ...',
                        'disabled' => $disable,
                    ],
                    'pluginOptions' => [
                        'allowClear' => true,
                    ],
                ])->label('Гриф МКФ <span class="minnesota-active">*</span>');
            ?>
        </div>

        <div class="col-md-2">
            <?php
                echo $form->field($model, 'made_form')->widget(Select2::className(), [
                    'data' => $agent,
                    'maintainOrder' => true,
                    'options' => [
                        'placeholder' => 'Укажите изготовителя МКФ ...',
                        'disabled' => $disable,
                    ],
                    'pluginOptions' => [
                        'allowClear' => true,
                    ],
                ]);
            ?>
        </div>

        <div class="col-md-2">
            <?php
                echo $form->field($model, 'agent')->widget(Select2::className(), [
                    'data' => $agent,
                    'maintainOrder' => true,
                    'options' => [
                        'placeholder' => 'Укажите поставщика документации ...',
                        'disabled' => $disable,
                        'id' => 'minnesotaAgent',
                    ],
                    'pluginOptions' => [
                        'allowClear' => true,
                    ],
                ]);
            ?>
        </div>

        <div class="col-md-2">
            <?= $form->field($model, 'copy')->textInput(['disabled' => $disable, 'type' => 'number']) ?>
        </div>

        <div class="col-md-2">
            <?= $form->field($model, 'roll')->textInput(['disabled' => $disable, 'type' => 'number']) ?>
        </div>

        <div class="col-md-2">
            <?= $form->field($model, 'passport')->textInput(['disabled' => $disable]) ?>
        </div>

        <div class="col-md-2">
            <?= $form->field($model, 'date_made')->widget(MaskedInput::className(), ['mask' => '99.99.9999'])
                                                 ->widget(DatePicker::className(), [
                                                     'options' => [
                                                         'class' => 'form-control',
                                                         'disabled' => $disable,
                                                     ],
                                                     'language' => 'ru',
                                                     'dateFormat' => 'dd.MM.yyyy',
                                                 ]);
            ?>
        </div>

        <div class="col-md-2">
            <?= $form->field($model, 'date_check')->widget(MaskedInput::className(), ['mask' => '99.99.9999'])
                                                  ->widget(DatePicker::className(), [
                                                      'options' => [
                                                          'class'=>'form-control',
                                                          'disabled' => $disable,
                                                      ],
                                                      'language' => 'ru',
                                                      'dateFormat' => 'dd.MM.yyyy',
                                                  ]);
            ?>
        </div>

        <div class="col-md-2">
            <?= $form->field($model, 'number_check')->textInput(['disabled' => $disable, 'type' => 'number']) ?>
        </div>
    </div>

    <div class="row coca_cola">
        <div class="col-md-4">
            <?= $form->field($model, 'density')->textInput()->widget(MaskedInput::className(), [
                'name' => 'masked-input',
                'clientOptions' => [
                    'alias' => 'decimal',
                    'digits' => 4,
                    'digitsOptional' => false,
                    'radixPoint' => '.',
                    'autoGroup' => true,
                    'removeMaskOnSubmit' => true,
                ],
                'options' => [
                    'disabled' => $disable,
                ],
            ]); ?>
        </div>

        <div class="col-md-4">
            <?= $form->field($model, 'na2so3')->textInput()->widget(MaskedInput::className(), [
                'name' => 'masked-input',
                'clientOptions' => [
                    'alias' => 'decimal',
                    'digits' => 4,
                    'digitsOptional' => false,
                    'radixPoint' => '.',
                    'autoGroup' => true,
                    'removeMaskOnSubmit' => true,
                ],
                'options' => [
                    'disabled' => $disable,
                ],
            ]); ?>
        </div>

        <div class="col-md-4">
            <?= $form->field($model, 'ag')->textInput()->widget(MaskedInput::className(), [
                'name' => 'masked-input',
                'clientOptions' => [
                    'alias' => 'decimal',
                    'digits' => 4,
                    'digitsOptional' => false,
                    'radixPoint' => '.',
                    'autoGroup' => true,
                    'removeMaskOnSubmit' => true,
                ],
                'options' => [
                    'disabled' => $disable,
                ],
            ]); ?>
        </div>
    </div>

    <div class="row seven_up">
        <div class="col-md-3">
            <?= $form->field($model, 'ov')->textInput(['disabled' => $disable, 'type' => 'number']) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'ss')->textInput(['disabled' => $disable, 'type' => 'number']) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 's')->textInput(['disabled' => $disable, 'type' => 'number']) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'n_s')->textInput(['disabled' => $disable, 'type' => 'number']) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'dsp')->textInput(['disabled' => $disable, 'type' => 'number']) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'k')->textInput(['disabled' => $disable, 'type' => 'number']) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'kt')->textInput(['disabled' => $disable, 'type' => 'number']) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'sk')->textInput(['disabled' => $disable, 'type' => 'number']) ?>
        </div>
    </div>

    <div class="row pepsi">
        <div class="col-md-2">
            <?= $form->field($model, 'hiccupped')->textInput(['disabled' => $disable, 'type' => 'number']) ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'ctencil')->textInput(['disabled' => $disable, 'type' => 'number']) ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'work_ctencil')->textInput(['disabled' => $disable, 'type' => 'number']) ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'defective_ctencil')->textInput(['disabled' => $disable, 'type' => 'number']) ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'glue')->textInput(['disabled' => $disable, 'type' => 'number']) ?>
        </div>
    </div>

    <div class="row sprite">
        <div class="col-md-3">
            <?= $form->field($model, 'block')->textInput(['disabled' => $disable, 'type' => 'number']) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'gloset')->textInput(['disabled' => $disable, 'type' => 'number']) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'shelf')->textInput(['disabled' => $disable, 'type' => 'number']) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'cell')->textInput(['disabled' => $disable, 'type' => 'number']) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-2">
            <?= $form->field($model, 'number_letter')->textInput(['disabled' => $disable]) ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'cover_letter')->textInput(['disabled' => $disable]) ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'accomp_letter')->textInput(['disabled' => $disable]) ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'fasc')->textInput(['disabled' => $disable]) ?>
        </div>

        <?php Pjax::begin(['id' => 'pjaxContent1']); ?>
            <div class="col-md-2">
                <?php
                    echo $form->field($model, 'index')->widget(Select2::className(), [
                        'data' => $index,
                        'maintainOrder' => true,
                        'options' => [
                            'placeholder' => 'Укажите индекс изделия ...',
                            'disabled' => $disable,
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
                    ])->label('Индекс <span class="minnesota-active">*</span>');
                ?>
            </div>
            <div class="col-md-2">
                <?php
                    echo $form->field($model, 'indication')->widget(Select2::className(), [
                        'data' => $indication,
                        'maintainOrder' => true,
                        'options' => [
                            'placeholder' => 'Укажите обозначение ...',
                            'disabled' => $disable,
                        ],
                        'pluginOptions' => [
                            'allowClear' => true
                        ]
                    ]);
                ?>
            </div>
        <?php Pjax::end(); ?>

        <div class="col-md-2">
            <?= $form->field($model, 'nama_mkf')->textInput(['disabled' => $disable]) ?>
        </div>

        <div class="col-md-2">
            <?php
                echo $form->field($model, 'action')->widget(Select2::className(), [
                    'data' => $action,
                    'maintainOrder' => true,
                    'options' => [
                        'placeholder' => 'Укажите вид задания ...',
                        'disabled' => $disable,
                    ],
                    'pluginOptions' => [
                        'allowClear' => true,
                    ],
                ])->label('Вид задания <span class="minnesota-active">*</span>');
            ?>
        </div>

        <div class="col-md-2">
            <?php
                echo $form->field($model, 'adress')->widget(Select2::className(), [
                    'data' => $agent,
                    'maintainOrder' => true,
                    'options' => [
                        'placeholder' => 'Укажите адрес ...',
                        'disabled' => $disable,
                    ],
                    'pluginOptions' => [
                        'allowClear' => true,
                    ],
                ]);
            ?>
        </div>

        <div class="col-md-2">
            <?= $form->field($model, 'data_made')->widget(MaskedInput::className(), ['mask' => '99.99.9999'])
                                                 ->widget(DatePicker::className(), [
                                                     'options' => [
                                                         'class' => 'form-control',
                                                         'disabled' => $disable,
                                                     ],
                                                     'language' => 'ru',
                                                     'dateFormat' => 'dd.MM.yyyy',
                                                 ]);
            ?>
        </div>

        <div class="col-md-2">
            <?= $form->field($model, 'note')->textInput(['disabled' => $disable]) ?>
        </div>

        <div class="col-md-2">
            <?php
                echo $form->field($model, 'prizn_document')->dropDownList($attribute, [
                    'prompt' => 'Укажите признак документации ...',
                    'disabled' => $disable,
                    'id' => 'minnesotaDocumentationAttribute',
                ]);
            ?>
        </div>
    </div>

    <div class="form-group">
        <?php
            if (!$disable) {
                Pjax::begin(['id' => 'pjaxContent1']);
                    echo Html::submitButton('Сохранить', ['class' => 'btn btn-success']);
                    echo ' ';
                    switch ($window){
                        case 'index':
                            echo Html::a('Закрыть', ['index'], ['class' => 'btn btn-info']);
                            break;
                        case 'bigger':
                            echo Html::a('Закрыть', ['bigger'], ['class' => 'btn btn-info']);
                            break;
                        default:
                            echo Html::a('Закрыть', ['index'], ['class' => 'btn btn-info']);
                            break;
                    }
                    echo ' ';
                    echo Html::a('<span class="glyphicon glyphicon-refresh"></span>', ['sheet/create', 'type' => $type, 'window' => $window], ['class' => 'btn btn-falcon', 'title' => \Yii::t('yii', 'Обновить')]);
                    echo ' ';
                    echo Html::button('<span class="glyphicon glyphicon-share"></span>', ['value' => Url::to(['sheet/modal']), 'title' => 'Ведение справочника индексов изделий', 'class' => 'showModalButton btn btn-falcon']);
                Pjax::end();
            }
        ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>