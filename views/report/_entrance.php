<?php

use yii\helpers\Html;
use yii\jui\DatePicker;
use yii\bootstrap\ActiveForm;
use yii\widgets\MaskedInput;

/* @var $this yii\web\View */
/* @var $model app\models\EntranceReport */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $list array */
/* @var $type array */

?>

<div class="entrance-form">
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
                                                      ])
                                                      ->label('Дата поступления МКФ с <span class="minnesota-active">*</span>');
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
                                                    ])
                                                    ->label('Дата поступления МКФ по <span class="minnesota-active">*</span>');
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                <?= $form->field($model, 'xxx')->checkboxList($list) ?>
            </div>
            <div class="col-md-2">
                <?= $form->field($model, 'type_documentation')->checkboxList($type) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'print_sign')->checkbox() ?>
            </div>
        </div>
        <div class="form-group">
            <?= Html::submitButton('Печать', ['class' => 'btn btn-shadow btn-success']) ?>
            <?= Html::a('Закрыть', ['/site/report'], ['class' => 'btn btn-info']) ?>
        </div>

    <?php ActiveForm::end(); ?>

</div>