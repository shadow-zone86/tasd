<?php
    /* @var $this yii\web\View */
    /* @var $searchModel app\models\AgentSearch */
    /* @var $dataProvider yii\data\ActiveDataProvider */

    $this->title = 'Подбор МКФ по индексу изделия';
    $this->params['breadcrumbs'][] = ['label' => 'Ведение МКФ', 'url' => ['sheet/index']];
    $this->params['breadcrumbs'][] = $this->title;
?>

<div style="display: none;">
    <?php
        use app\models\Index;
        use yii\helpers\ArrayHelper;
        include 'indexreport.php';
    ?>
</div>

<div style="margin-top: 50px; margin-bottom: 50px;">
    <form action="indexreport" method="get">
        <b>Индекс изделия</b>
        <select name="f_index">
            <?php
                $query = Index::findBySql("SELECT DISTINCT index FROM table_index ORDER BY index")->all();
                $index = ArrayHelper::getColumn($query, 'index');
                foreach ($index as $i) {
                    echo '<option>' . $i . '</option>';
                }
            ?>
        </select>
        <br>
        <br>
        <p><input type="submit" value="Печать" class="btn btn-success"></p>
    </form>
</div>