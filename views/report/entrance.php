<?php
    /* @var $this yii\web\View */
    /* @var $searchModel app\models\AgentSearch */
    /* @var $dataProvider yii\data\ActiveDataProvider */

    $this->title = 'Перечень МКФ, поступивших за период';
    $this->params['breadcrumbs'][] = ['label' => 'Ведение МКФ', 'url' => ['sheet/index']];
    $this->params['breadcrumbs'][] = $this->title;
?>

<div style="display: none;">
    <?php
        include 'entrancereport.php';

        $date = date("d.m.Y");
    ?>
</div>

<div style="margin-top: 50px; margin-bottom: 50px;">
    <form action="entrancereport" method="get">
        <p><b>Дата поступления МКФ с </b><input type="text" size="12" name="f_date1" value="<?php echo $date ?>"><b> по </b><input type="text" size="12" name="f_date2" value="<?php echo $date ?>"> </p>
        <br>
        <table>
            <tr>
                <td colspan="2"><b> Гриф секретности: </b></td>
            </tr>
            <tr>
                <td width="100"> <input type="checkbox" name="f_xxxOV" checked> ОВ </td>
                <td> <input type="checkbox" name="f_xxxSS" checked> СС </td>
            </tr>
            <tr>
                <td> <input type="checkbox" name="f_xxxS" checked> C </td>
                <td> <input type="checkbox" name="f_xxxNS" checked> H/С </td>
            </tr>
            <tr>
                <td> <input type="checkbox" name="f_xxxDSP" checked> ДСП </td>
                <td> <input type="checkbox" name="f_xxxK" checked> К </td>
            </tr>
            <tr>
                <td> <input type="checkbox" name="f_xxxKT" checked> КТ </td>
                <td> <input type="checkbox" name="f_xxxSK" checked> СК </td>
            </tr>
        </table>
        <br>
        <table>
            <tr>
                <td colspan="2"><b> Вид документации: </b></td>
            </tr>
            <tr>
                <td width="150"> <input type="checkbox" name="f_vid1" checked> Конструкторская </td>
                <td> <input type="checkbox" name="f_vid2" checked> Технологическая </td>
            </tr>
            <tr>
                <td> <input type="checkbox" name="f_vid3" checked> НТД </td>
                <td> <input type="checkbox" name="f_vid4" checked> Проектная </td>
            </tr>
            <tr>
                <td> <input type="checkbox" name="f_vid5" checked> НО </td>
                <td> <input type="checkbox" name="f_vid6" checked> Ремонтная </td>
            </tr>
            <tr>
                <td> <input type="checkbox" name="f_vid7" checked> УОЦД </td>
                <td> <input type="checkbox" name="f_vid8" checked> АК </td>
            </tr>
        </table>
        <br>
        <input type="checkbox" name="f_original"><b> Печать перечня МКФ без оригинального номера </b>
        <br>
        <br>
        <p><input type="submit" value="Печать" class="btn btn-success"></p>
    </form>
</div>
