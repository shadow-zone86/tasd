<?php
    /* @var $this yii\web\View */
    /* @var $searchModel app\models\AgentSearch */
    /* @var $dataProvider yii\data\ActiveDataProvider */

    $this->title = 'Подбор МКФ по обозначению изделия';
    $this->params['breadcrumbs'][] = ['label' => 'Ведение МКФ', 'url' => ['sheet/index']];
    $this->params['breadcrumbs'][] = $this->title;
?>

<div style="display: none;">
    <?php
        use app\models\Index;
        use yii\helpers\ArrayHelper;
        include 'indicationreport.php';
    ?>
</div>

<div style="margin-top: 50px; margin-bottom: 50px;">
    <form action="indicationreport" method="get">
        <b>Обозначение изделия</b>
        <select name="f_indication">
            <?php
                $query = Index::findBySql("SELECT DISTINCT litera FROM table_index ORDER BY litera")->all();
                $indication = ArrayHelper::getColumn($query, 'litera');
                foreach ($indication as $i) {
                    echo '<option>' . $i . '</option>';
            }
            ?>
        </select>
        <br>
        <br>
        <p><input type="submit" value="Печать" class="btn btn-success"></p>
    </form>
</div>