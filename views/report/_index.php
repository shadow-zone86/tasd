<?php

use kartik\select2\Select2;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\IndexReport */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $index array */

?>

<div class="index-form">
    <?php  $form = ActiveForm::begin(); ?>

    <div class="row">
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
                ])->label('Индекс изделия <span class="minnesota-active">*</span>');
            ?>
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Печать', ['class' => 'btn btn-shadow btn-success']) ?>
        <?= Html::a('Закрыть', ['/site/report'], ['class' => 'btn btn-info']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>