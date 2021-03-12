<?php
    /* @var $this yii\web\View */
    /* @var $searchModel app\models\AgentSearch */
    /* @var $dataProvider yii\data\ActiveDataProvider */

    $this->title = 'Подбор МКФ по изготовителю МКФ за период';
    $this->params['breadcrumbs'][] = ['label' => 'Ведение МКФ', 'url' => ['sheet/index']];
    $this->params['breadcrumbs'][] = $this->title;
?>

<div style="display: none;">
    <?php
        use app\models\Agent;
        use yii\helpers\ArrayHelper;
        include 'madereport.php';

        $date = date("d.m.Y");
    ?>
</div>

<div style="margin-top: 50px; margin-bottom: 50px;">
    <form action="madereport" method="get">
        <p><b>Период изготовления с </b><input type="text" size="12" name="f_date1" value="<?php echo $date ?>"><b> по </b><input type="text" size="12" name="f_date2" value="<?php echo $date ?>"> </p>
        <br>
        <b>Изготовитель МКФ</b>
        <select name="f_madeForm">
            <?php
                $query = Agent::findBySql("SELECT name_agent FROM table_agent ORDER BY number_agent")->all();
                $agent = ArrayHelper::getColumn($query, 'name_agent');
                foreach ($agent as $i) {
                    echo '<option>' . $i . '</option>';
                }
            ?>
        </select>
        <br>
        <br>
        <p><input type="submit" value="Печать" class="btn btn-success"></p>
    </form>
</div>