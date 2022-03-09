<?php

use kartik\select2\Select2;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\IndicationReport */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $indication array */

?>

<div class="indication-form">
    <?php  $form = ActiveForm::begin(); ?>

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
                ])->label('Обозначение изделия <span class="minnesota-active">*</span>');
            ?>
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton('Печать', ['class' => 'btn btn-shadow btn-success']) ?>
        <?= Html::a('Закрыть', ['/site/report'], ['class' => 'btn btn-info']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>