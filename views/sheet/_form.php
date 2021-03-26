<?php

use yii\helpers\Html;
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

    <div style="display: none;">
        <?= $form->field($model, 'user')->textInput() ?>
        <?= $form->field($model, 'date_time')->textInput() ?>
        <?= $form->field($model, 'form')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="row">
        <div class="col-md-2">
            <?= $form->field($model, 'number_form')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-md-2">
            <?php
                $items = [
                    'Основной'=>'Основной',
                    'Запасной'=>'Запасной',
                    //'Дубликат'=>'Дубликат',
                    'А-Дубликат основной'=>'А-Дубликат основной',
                    'Б-Дубликат запасной'=>'Б-Дубликат запасной'
                ];
                $params = [
                    'prompt' => 'Укажите номер экземпляра'
                ];
                echo $form->field($model, 'number_copy')->dropDownList($items, $params);
            ?>
        </div>

        <?php
        $this->registerJs('
                    jQuery(document).on("change" ,"#'. Html::getInputId($model, 'form') . '" , function(){
                        var first = $("#'. Html::getInputId($model, 'number_form').'").val();
                        var form = $("#'. Html::getInputId($model, 'form').'").val();
                        var second = "";
                        if (form == "Рулонный микрофильм") {
                            $("#'.Html::getInputId($model, 'key1').'").val(first.substr(0,3));
                            $("#'.Html::getInputId($model, 'key2').'").val(first.substr(4,6));
                            $("#'.Html::getInputId($model, 'key3').'").val(first.substr(11,3));
                            $("#'.Html::getInputId($model, 'key4').'").val(second);
                            $("#'.Html::getInputId($model, 'key5').'").val(first.substr(15,1));
                        } else {
                            $("#'.Html::getInputId($model, 'key1').'").val(first.substr(0,3));
                            $("#'.Html::getInputId($model, 'key2').'").val(first.substr(4,6));
                            $("#'.Html::getInputId($model, 'key3').'").val(first.substr(11,3));
                            $("#'.Html::getInputId($model, 'key4').'").val(first.substr(15,3));
                            $("#'.Html::getInputId($model, 'key5').'").val(first.substr(19,1));
                        }
                    });
                    jQuery(document).on("change" ,"#'. Html::getInputId($model, 'number_form') . '" , function(){
                        var first = $("#'. Html::getInputId($model, 'number_form').'").val();
                        var form = $("#'. Html::getInputId($model, 'form').'").val();
                        var second = "";
                        if (form == "Рулонный микрофильм") {
                            $("#'.Html::getInputId($model, 'key1').'").val(first.substr(0,3));
                            $("#'.Html::getInputId($model, 'key2').'").val(first.substr(4,6));
                            $("#'.Html::getInputId($model, 'key3').'").val(first.substr(11,3));
                            $("#'.Html::getInputId($model, 'key4').'").val(second);
                            $("#'.Html::getInputId($model, 'key5').'").val(first.substr(15,1));
                        } else {
                            $("#'.Html::getInputId($model, 'key1').'").val(first.substr(0,3));
                            $("#'.Html::getInputId($model, 'key2').'").val(first.substr(4,6));
                            $("#'.Html::getInputId($model, 'key3').'").val(first.substr(11,3));
                            $("#'.Html::getInputId($model, 'key4').'").val(first.substr(15,3));
                            $("#'.Html::getInputId($model, 'key5').'").val(first.substr(19,1));
                        }
                        var key5 = $("#'. Html::getInputId($model, 'key5').'").val();
                        var pp1 = "Документация на изделие";
                        var pp2 = "Документация на изделие";
                        var pp3 = "Нормативно-техническая документация";
                        var pp4 = "Нормативно-техническая документация";
                        var pp5 = "Нормативно-техническая документация";
                        var pp6 = "Нормативно-техническая документация";
                        var pp7 = "Уникальная и особо ценная документация";
                        var pp8 = "Аварийная документация";
                        switch(key5) {
                            case "1":
                                $("#'.Html::getInputId($model, 'prizn_document').'").val(pp1);
                                break;
                            case "2":
                                $("#'.Html::getInputId($model, 'prizn_document').'").val(pp2);
                                break;                              
                            case "3":
                                $("#'.Html::getInputId($model, 'prizn_document').'").val(pp3);
                                break;                             
                            case "4":
                                $("#'.Html::getInputId($model, 'prizn_document').'").val(pp4);
                                break;                                  
                            case "5":
                                $("#'.Html::getInputId($model, 'prizn_document').'").val(pp5);
                                break;                             
                            case "6":
                                $("#'.Html::getInputId($model, 'prizn_document').'").val(pp6);
                                break;                                 
                            case "7":
                                $("#'.Html::getInputId($model, 'prizn_document').'").val(pp7);
                                break;                               
                            case "8":
                                $("#'.Html::getInputId($model, 'prizn_document').'").val(pp8);
                                break;                            
                        }
                    });
                    jQuery(document).on("change" ,"#'. Html::getInputId($model, 'number_copy') . '" , function(){
                        var nform = $("#'. Html::getInputId($model, 'number_form').'").val();
                        var ncopy = $("#'. Html::getInputId($model, 'number_copy').'").val();
                        var form = $("#'. Html::getInputId($model, 'form').'").val();
                        if (form == "Рулонный микрофильм") {
                            var plus = nform.substr(0,16) + "-" + ncopy.substr(0,1);
                        } else {
                            var plus = nform.substr(0,20) + "-" + ncopy.substr(0,1);
                        }   
                        $("#'.Html::getInputId($model, 'number_form').'").val(plus);
                    });
                ');
        ?>

        <div style="display: none;">
            <?= $form->field($model, 'key1')->textInput() ?>
            <?= $form->field($model, 'key2')->textInput() ?>
            <?= $form->field($model, 'key3')->textInput() ?>
            <?= $form->field($model, 'key4')->textInput() ?>
            <?= $form->field($model, 'key5')->textInput() ?>
            <?php
                $items = [
                    'Негатив'=>'Негатив',
                    'Позитив'=>'Позитив',
                ];
                $params = [
                    'prompt' => 'Укажите вид изображения'
                ];
                echo $form->field($model, 'scene')->dropDownList($items, $params);
            ?>
            <?= $form->field($model, 'read')->textInput()->widget(MaskedInput::className(), [
                'name' => 'masked-input',
                'clientOptions' => [
                    'alias' => 'decimal',
                    'digits' => 4,
                    'digitsOptional' => false,
                    'radixPoint' => '.',
                    'autoGroup' => true,
                    'removeMaskOnSubmit' => 'true',
                ],
            ]);
            ?>
        </div>

        <div class="col-md-2">
            <?= $form->field($model, 'original_number')->textInput() ?>
        </div>

        <div class="col-md-2">
            <?php
                $items = [
                    'ОВ'=>'Особой важности',
                    'СС'=>'Совершенно секретно',
                    'С'=>'Секретно',
                    'Н/С'=>'Не секретно',
                    'ДСП'=>'Для служебного пользования',
                    'К'=>'Конфиденциально',
                    'КТ'=>'Комерческая тайна',
                    'СК'=>'Строго конфиденциально',
                ];
                $params = [
                    'prompt' => 'Укажите гриф секретности МКФ'
                ];
                echo $form->field($model, 'xxx')->dropDownList($items, $params);
            ?>
        </div>

        <div class="col-md-2">
            <?php
                $madeForm = \app\models\Agent::find()->orderBy('name_agent ASC')->all();
                $items = \yii\helpers\ArrayHelper::map($madeForm, 'number_agent', 'name_agent');
                //$params = ['prompt' => 'Укажите изготовителя МКФ'];
                //echo $form->field($model, 'made_form')->dropDownList($items, $params);                
                echo $form->field($model, 'made_form')->widget(Select2::className(), [
                    'data' => $items,
                    'maintainOrder' => true,
                    'options' => [
                        'placeholder' => 'Укажите изготовителя МКФ ...'
                    ],
                    'pluginOptions' => [
                        'allowClear' => true
                    ]
                ]);                     
            ?>
        </div>

        <div class="col-md-2">
            <?php
                $madeForm = \app\models\Agent::find()->orderBy('name_agent ASC')->all();
                $items = \yii\helpers\ArrayHelper::map($madeForm, 'number_agent', 'name_agent');
                //$params = ['prompt' => 'Укажите поставщика документации'];
                //echo $form->field($model, 'agent')->dropDownList($items, $params);
                echo $form->field($model, 'agent')->widget(Select2::className(), [
                    'data' => $items,
                    'maintainOrder' => true,
                    'options' => [
                        'placeholder' => 'Укажите поставщика документации ...'
                    ],
                    'pluginOptions' => [
                        'allowClear' => true
                    ]
                ]);                
            ?>
        </div>

        <div class="col-md-2">
            <?= $form->field($model, 'copy')->textInput() ?>
        </div>

        <div class="col-md-2">
            <?= $form->field($model, 'roll')->textInput() ?>
        </div>

        <div class="col-md-2">
            <?= $form->field($model, 'passport')->textInput() ?>
        </div>

        <div class="col-md-2">
            <?= $form->field($model, 'date_made')->widget(MaskedInput::className(), ['mask' => '99.99.9999',])->widget(DatePicker::className(), ['options'=>['class'=>'form-control',], 'language' => 'ru', 'dateFormat' => 'dd.MM.yyyy',]); ?>
        </div>

        <div class="col-md-2">
            <?= $form->field($model, 'date_check')->widget(MaskedInput::className(), ['mask' => '99.99.9999',])->widget(DatePicker::className(), ['options'=>['class'=>'form-control',], 'language' => 'ru', 'dateFormat' => 'dd.MM.yyyy',]); ?>
        </div>

        <div class="col-md-2">
            <?= $form->field($model, 'number_check')->textInput() ?>
        </div>
    </div>

    <div class="row" style="border-width: 1px; border-color: red; border-style: solid; margin: 5px; background-color: #dca7a7">
        <div class="col-md-4">
            <?= $form->field($model, 'density')->textInput()->widget(MaskedInput::className(), [
                'name' => 'masked-input',
                'clientOptions' => [
                    'alias' => 'decimal',
                    'digits' => 4,
                    'digitsOptional' => false,
                    'radixPoint' => '.',
                    'autoGroup' => true,
                    'removeMaskOnSubmit' => 'true',
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
                    'removeMaskOnSubmit' => 'true',
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
                    'removeMaskOnSubmit' => 'true',
                ],
            ]); ?>
        </div>
    </div>

    <div class="row" style="border-width: 1px; border-color: mediumspringgreen; border-style: solid; margin: 5px; background-color: #93c3cd">
        <div class="col-md-3">
            <?= $form->field($model, 'ov')->textInput() ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'ss')->textInput() ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 's')->textInput() ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'n_s')->textInput() ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'dsp')->textInput() ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'k')->textInput() ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'kt')->textInput() ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'sk')->textInput() ?>
        </div>
    </div>

    <div class="row" style="border-width: 1px; border-color: blue; border-style: solid; margin: 5px; background-color: #c5ddfc">
        <div class="col-md-2">
            <?= $form->field($model, 'hiccupped')->textInput() ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'ctencil')->textInput() ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'work_ctencil')->textInput() ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'defective_ctencil')->textInput() ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'glue')->textInput() ?>
        </div>
    </div>

    <div class="row" style="border-width: 1px; border-color: #00aa00; border-style: solid; margin: 5px; background-color: #ddffdd">
        <div class="col-md-3">
            <?= $form->field($model, 'block')->textInput() ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'gloset')->textInput() ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'shelf')->textInput() ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'cell')->textInput() ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-2">
            <?= $form->field($model, 'number_letter')->textInput() ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'cover_letter')->textInput() ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'accomp_letter')->textInput() ?>
        </div>
        <div class="col-md-2">
            <?= $form->field($model, 'fasc')->textInput() ?>
        </div>

        <?php Pjax::begin(['id' => 'pjaxContent1']); ?>
        <div class="col-md-2">
            <table>
                <tr>
                    <td style="width: 500px">
                        <?php 
                            /*
                            echo $form->field($model, 'index')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Index::find()->orderBy('index ASC')->all(), 'index', 'index'),
                                [
                                    'prompt' => 'Укажите индекс изделия',
                                    'onchange' => '
                                                $.post("/sheet/lists?id='.'"+$(this).val(), function(data) {
                                                    $("select#sheet-indication").html(data).sort(function(a, b) { return a.text == b.text ? 0: a.text < b.text ? -1 :1 });
                                                });'
                                ]
                            );
                            */
                            $madeForm = \app\models\Index::find()->orderBy('index ASC')->all();
                            $items = \yii\helpers\ArrayHelper::map($madeForm, 'index', 'index');
                            echo $form->field($model, 'index')->widget(Select2::className(), [
                                'data' => $items,
                                'maintainOrder' => true,
                                'options' => [
                                    'placeholder' => 'Укажите индекс изделия ...',
                                    'onchange' => '
                                                $.post("/sheet/lists?id='.'"+$(this).val(), function(data) {
                                                    $("select#sheet-indication").html(data).sort(function(a, b) { return a.text == b.text ? 0: a.text < b.text ? -1 :1 });
                                                });'   
                                ],
                                'pluginOptions' => [
                                    'allowClear' => true
                                ]                             
                            ]);
                        ?>
                    </td>
                    <td style="width: 10px">
                    </td>
                    <td>
                        <?= Html::a('<span class="glyphicon glyphicon-refresh"></span>', ['sheet/create'], ['class' => 'btn btn-danger', 'title' => \Yii::t('yii', 'Обновить')]); ?>
                    </td>
                </tr>
            </table>
        </div>
        <div class="col-md-2">
            <?php 
                //echo $form->field($model, 'indication')->dropDownList($arr, ['prompt' => '']);
                echo $form->field($model, 'indication')->widget(Select2::className(), [
                    'data' => $arr,
                    'maintainOrder' => true,
                    'options' => [
                        'placeholder' => ''
                    ],
                    'pluginOptions' => [
                        'allowClear' => true
                    ]
                ]);                  
            ?>
        </div>
        <?php Pjax::end(); ?>

        <div class="col-md-2">
            <?= $form->field($model, 'nama_mkf')->textInput() ?>
        </div>

        <div class="col-md-2">
            <?php
                $items = [
                    'Принять на хранение'=>'Принять на хранение',
                    'Переслать'=>'Переслать',
                    'Уничтожить'=>'Уничтожить',
                ];
                $params = [
                    'prompt' => 'Укажите вид задания'
                ];
                echo $form->field($model, 'action')->dropDownList($items, $params);
            ?>
        </div>

        <div class="col-md-2">
            <?php
                $madeForm = \app\models\Agent::find()->orderBy('name_agent ASC')->all();
                $items = \yii\helpers\ArrayHelper::map($madeForm, 'number_agent', 'name_agent');
                //$params = ['prompt' => 'Укажите адрес'];
                //echo $form->field($model, 'adress')->dropDownList($items, $params);
                echo $form->field($model, 'adress')->widget(Select2::className(), [
                    'data' => $items,
                    'maintainOrder' => true,
                    'options' => [
                        'placeholder' => 'Укажите адрес ...'
                    ],
                    'pluginOptions' => [
                        'allowClear' => true
                    ]
                ]);                
            ?>
        </div>

        <div class="col-md-2">
            <?= $form->field($model, 'data_made')->widget(MaskedInput::className(), ['mask' => '99.99.9999',])->widget(DatePicker::className(), ['options'=>['class'=>'form-control',], 'language' => 'ru', 'dateFormat' => 'dd.MM.yyyy',]); ?>
        </div>

        <div class="col-md-2">
            <?= $form->field($model, 'note')->textInput() ?>
        </div>

        <div class="col-md-2">
            <?php
                $items = [
                    'Документация на изделие'=>'Документация на изделие',
                    'Нормативно-техническая документация'=>'Нормативно-техническая документация',
                    'Документация на составную часть изделия'=>'Документация на составную часть изделия',
                    'Материалы НИР и ОКР'=>'Материалы НИР и ОКР',
                    'Проект'=>'Проект',
                    'Уникальная и особо ценная документация'=>'Уникальная и особо ценная документация',
                    'Аварийная документация'=>'Аварийная документация',
                ];
                $params = [
                    'prompt' => 'Укажите признак документации'
                ];
                echo $form->field($model, 'prizn_document')->dropDownList($items, $params);
            ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>