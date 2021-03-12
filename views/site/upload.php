<?php
    use yii\widgets\ActiveForm;
    use yii\helpers\Html;
    use kartik\file\FileInput;
    use yii\helpers\Url;
    use yii\helpers\FileHelper;

    /* @var $this yii\web\View */
    /* @var $model app\models\UploadForm */
    /* @var $dataProvider yii\data\ActiveDataProvider */

    $this->title = 'Загрузка файлов';
    $this->params['breadcrumbs'][] = ['label' => 'Ведение МКФ', 'url' => ['sheet/index']];
    $this->params['breadcrumbs'][] = $this->title;
?>

    <div style="margin-bottom: 20px; margin-top: 20px;">
        <ol class="breadcrumb">
            <li><a href="/">Главная</a></li>
            <li><a href="<?= Url::toRoute("/sheet/index")?>">Ведение МКФ</a></li>
            <li class="active" style="color: #ff5b23;"><?= Html::encode($this->title) ?></li>
        </ol>
    </div>

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?php echo $form->field($model,'imageFiles[]')->widget(FileInput::classname(),['options'=>['multiple' => true, 'accept'=>'image/*'],]); ?>

    <?//= $form->field($model, 'imageFiles[]')->fileInput(['multiple' => true, 'accept' => 'image/*']) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

<!--    --><?php //if ($model->imageFiles): ?>
<!--        <img src="../uploads/--><?//= $model->imageFiles; ?><!--"/>-->
<!--        <img src="../uploads/vBfu3sjqNR7Esaw.jpg"/>-->
<!--    --><?php //endif; ?>

    <?php
        $files = FileHelper::findFiles('uploads/');
        if (isset($files[0])) {
            foreach ($files as $index => $file) {
                $nameFicheiro = substr($file, strrpos($file, '/')+1);
                echo Html::a($nameFicheiro, Url::base().'/uploads/'.$nameFicheiro) . "<br/>" . "</br>";
            }
        } else {
            echo "There are no files available fordownload.";
        }
    ?>

    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 catalog">
        <div class="row content">
            <?php foreach ($files as $index => $file): ?>
                <div class="col-lg-4 col-md-6 col-sm-4 col-xs-12 catalog_category">
<!--                    <a href="--><?//= Url::toRoute(['page/listproducts', 'id' => $category['id']]); ?><!--"><img src="images/--><?php //echo $category['img'];?><!--"></a>-->
<!--                    <a href=""><img src="../uploads/--><?php //echo substr($file, strrpos($file, '/')+1);?><!--"></a>-->
                    <a href="<?= Url::toRoute(Url::base().'/uploads/'.substr($file, strrpos($file, '/')+1)); ?>"><img height="220px" width="220px" src="../uploads/<?php echo substr($file, strrpos($file, '/')+1);?>"></a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>
