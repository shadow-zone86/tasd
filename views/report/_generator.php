<?php

use kartik\select2\Select2;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\GeneratorReport */
/* @var $form yii\bootstrap\ActiveForm */

?>

<div class="entrance-form">
    <?php  $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-3">
            <?php
                echo $form->field($model, 'type')->widget(Select2::className(), [
                    'data' => $type,
                    'maintainOrder' => true,
                    'options' => [
                        'placeholder' => 'Укажите вид МКФ ...',
                    ],
                    'pluginOptions' => [
                        'allowClear' => true
                    ]
                ]);
            ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'number')->textInput() ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <?php
                echo $form->field($model, 'xxx')->widget(Select2::className(), [
                    'data' => $xxx,
                    'maintainOrder' => true,
                    'options' => [
                        'placeholder' => 'Укажите гриф секретности МКФ ...',
                    ],
                    'pluginOptions' => [
                        'allowClear' => true
                    ]
                ]);
            ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'origin_number')->textInput() ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <?php
                echo $form->field($model, 'made')->widget(Select2::className(), [
                    'data' => $agent,
                    'maintainOrder' => true,
                    'options' => [
                        'placeholder' => 'Укажите изготовителя МКФ ...',
                    ],
                    'pluginOptions' => [
                        'allowClear' => true
                    ]
                ]);
            ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'passport')->textInput() ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <?php
                echo $form->field($model, 'provider')->widget(Select2::className(), [
                    'data' => $agent,
                    'maintainOrder' => true,
                    'options' => [
                        'placeholder' => 'Укажите поставщика документации ...',
                    ],
                    'pluginOptions' => [
                        'allowClear' => true
                    ]
                ]);
            ?>
        </div>
        <div class="col-md-3">
            <?php
                echo $form->field($model, 'index')->widget(Select2::className(), [
                    'data' => $index,
                    'maintainOrder' => true,
                    'options' => [
                        'placeholder' => 'Укажите индекс изделия ...',
                    ],
                    'pluginOptions' => [
                        'allowClear' => true
                    ]
                ]);
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <?php
                echo $form->field($model, 'indication')->widget(Select2::className(), [
                    'data' => $indication,
                    'maintainOrder' => true,
                    'options' => [
                        'placeholder' => 'Укажите обозначение изделия ...',
                    ],
                    'pluginOptions' => [
                        'allowClear' => true
                    ]
                ]);
            ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'incoming_number')->textInput() ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <?= $form->field($model, 'name')->textInput() ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'list_number')->textInput() ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <?php
                echo $form->field($model, 'task')->widget(Select2::className(), [
                    'data' => $task,
                    'maintainOrder' => true,
                    'options' => [
                        'placeholder' => 'Укажите вид задания ...',
                    ],
                    'pluginOptions' => [
                        'allowClear' => true
                    ]
                ]);
            ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'inventory_number')->textInput() ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Печать', ['class' => 'btn btn-shadow btn-success']) ?>
        <?= Html::a('Закрыть', ['/site/report'], ['class' => 'btn btn-info']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>