<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\InspectorSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inspector-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'user') ?>

    <?= $form->field($model, 'date_time') ?>

    <?= $form->field($model, 'form') ?>

    <?= $form->field($model, 'number_form') ?>

    <?php // echo $form->field($model, 'original_number') ?>

    <?php // echo $form->field($model, 'made_form') ?>

    <?php // echo $form->field($model, 'roll') ?>

    <?php // echo $form->field($model, 'copy') ?>

    <?php // echo $form->field($model, 'number_copy') ?>

    <?php // echo $form->field($model, 'scene') ?>

    <?php // echo $form->field($model, 'date_made') ?>

    <?php // echo $form->field($model, 'date_check') ?>

    <?php // echo $form->field($model, 'number_check') ?>

    <?php // echo $form->field($model, 'passport') ?>

    <?php // echo $form->field($model, 'agent') ?>

    <?php // echo $form->field($model, 'density') ?>

    <?php // echo $form->field($model, 'read') ?>

    <?php // echo $form->field($model, 'na2so3') ?>

    <?php // echo $form->field($model, 'ag') ?>

    <?php // echo $form->field($model, 'ov') ?>

    <?php // echo $form->field($model, 'ss') ?>

    <?php // echo $form->field($model, 's') ?>

    <?php // echo $form->field($model, 'n_s') ?>

    <?php // echo $form->field($model, 'dsp') ?>

    <?php // echo $form->field($model, 'k') ?>

    <?php // echo $form->field($model, 'kt') ?>

    <?php // echo $form->field($model, 'sk') ?>

    <?php // echo $form->field($model, 'hiccupped') ?>

    <?php // echo $form->field($model, 'ctencil') ?>

    <?php // echo $form->field($model, 'work_ctencil') ?>

    <?php // echo $form->field($model, 'defective_ctencil') ?>

    <?php // echo $form->field($model, 'glue') ?>

    <?php // echo $form->field($model, 'block') ?>

    <?php // echo $form->field($model, 'gloset') ?>

    <?php // echo $form->field($model, 'shelf') ?>

    <?php // echo $form->field($model, 'cell') ?>

    <?php // echo $form->field($model, 'index') ?>

    <?php // echo $form->field($model, 'indication') ?>

    <?php // echo $form->field($model, 'xxx') ?>

    <?php // echo $form->field($model, 'number_letter') ?>

    <?php // echo $form->field($model, 'prizn_document') ?>

    <?php // echo $form->field($model, 'cover_letter') ?>

    <?php // echo $form->field($model, 'accomp_letter') ?>

    <?php // echo $form->field($model, 'fasc') ?>

    <?php // echo $form->field($model, 'adress') ?>

    <?php // echo $form->field($model, 'data_made') ?>

    <?php // echo $form->field($model, 'nama_mkf') ?>

    <?php // echo $form->field($model, 'note') ?>

    <?php // echo $form->field($model, 'action') ?>

    <?php // echo $form->field($model, 'key1') ?>

    <?php // echo $form->field($model, 'key2') ?>

    <?php // echo $form->field($model, 'key3') ?>

    <?php // echo $form->field($model, 'key4') ?>

    <?php // echo $form->field($model, 'key5') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
