<?php
    /* @var $this yii\web\View */
    /* @var $searchModel app\models\AgentSearch */
    /* @var $dataProvider yii\data\ActiveDataProvider */

    $this->title = 'Генератор отчетов';
    $this->params['breadcrumbs'][] = ['label' => 'Ведение МКФ', 'url' => ['sheet/index']];
    $this->params['breadcrumbs'][] = $this->title;
?>

<div style="display: none;">
    <?php
        use app\models\Agent;
        use app\models\Index;
        use yii\helpers\ArrayHelper;
        include 'entrancereport.php';
    ?>
</div>

<div style="margin-top: 50px; margin-bottom: 50px;">
    <form action="generatorreport" method="get">
        <table>
            <tr>
                <td>
                    <b>Вид МКФ</b>
                </td>
                <td style="width: 15px"> </td>
                <td>
                    <select name="f_01" style="width: 860px">
                        <option disabled selected> Выберите вид МКФ </option>
                        <option> Рулонный микрофильм </option>
                        <option> Микрофиша </option>
                    </select>
                </td>
            </tr>
            <tr>
                <td> <span style="position: relative; left: -2001px; width: 2001px"> 8 </span> </td>
                <td style="width: 15px"> </td>
                <td style="width: 860px"> </td>
            </tr>
            <tr>
                <td>
                    <b>Номер МКФ</b>
                </td>
                <td style="width: 15px"> </td>
                <td>
                    <input type="text" size="137" name="f_02">
                </td>
            </tr>
            <tr>
                <td> <span style="position: relative; left: -2001px; width: 2001px"> 8 </span> </td>
                <td style="width: 15px"> </td>
                <td style="width: 860px"> </td>
            </tr>
            <tr>
                <td>
                    <b>Гриф секретности МКФ</b>
                </td>
                <td style="width: 15px"> </td>
                <td>
                    <select name="f_03" style="width: 860px">
                        <option disabled selected> Выберите гриф секретности МКФ </option>
                        <option> ОВ </option>
                        <option> СС </option>
                        <option> С </option>
                        <option> Н/С </option>
                        <option> ДСП </option>
                        <option> К </option>
                        <option> КТ </option>
                        <option> СК </option>
                    </select>
                </td>
            </tr>
            <tr>
                <td> <span style="position: relative; left: -2001px; width: 2001px"> 8 </span> </td>
                <td style="width: 15px"> </td>
                <td style="width: 860px"> </td>
            </tr>
            <tr>
                <td>
                    <b>Оригинальный номер</b>
                </td>
                <td style="width: 15px"> </td>
                <td>
                    <input type="text" size="137" name="f_04">
                </td>
            </tr>
            <tr>
                <td> <span style="position: relative; left: -2001px; width: 2001px"> 8 </span> </td>
                <td style="width: 15px"> </td>
                <td style="width: 860px"> </td>
            </tr>
            <tr>
                <td>
                    <b>Изготовитель МКФ</b>
                </td>
                <td style="width: 15px"> </td>
                <td>
                    <select name="f_05" style="width: 860px">
                        <?php
                            echo '<option disabled selected>' . 'Выберите изготовителя МКФ' . '</option>';
                            $query = Agent::find()->orderBy('number_agent ASC')->all();
                            $agent = ArrayHelper::getColumn($query, 'number_agent');
                            foreach ($agent as $i) {
                                echo '<option>' . $i . '</option>';
                            }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td> <span style="position: relative; left: -2001px; width: 2001px"> 8 </span> </td>
                <td style="width: 15px"> </td>
                <td style="width: 860px"> </td>
            </tr>
            <tr>
                <td>
                    <b>Инвентарный номер техпаспорта</b>
                </td>
                <td style="width: 15px"> </td>
                <td>
                    <input type="text" size="137" name="f_06">
                </td>
            </tr>
            <tr>
                <td> <span style="position: relative; left: -2001px; width: 2001px"> 8 </span> </td>
                <td style="width: 15px"> </td>
                <td style="width: 860px"> </td>
            </tr>
            <tr>
                <td>
                    <b>Поставщик документации</b>
                </td>
                <td style="width: 15px"> </td>
                <td>
                    <select name="f_07" style="width: 860px">
                        <?php
                        echo '<option disabled selected>' . 'Выберите поставщика документации' . '</option>';
                        $query = Agent::find()->orderBy('number_agent ASC')->all();
                        $agent = ArrayHelper::getColumn($query, 'number_agent');
                        foreach ($agent as $i) {
                            echo '<option>' . $i . '</option>';
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td> <span style="position: relative; left: -2001px; width: 2001px"> 8 </span> </td>
                <td style="width: 15px"> </td>
                <td style="width: 860px"> </td>
            </tr>
            <tr>
                <td>
                    <b>Индекс изделия</b>
                </td>
                <td style="width: 15px"> </td>
                <td>
                    <select name="f_08" style="width: 860px">
                        <?php
                        echo '<option disabled selected>' . 'Выберите индекс изделия' . '</option>';
                        $query = Index::findBySql("SELECT DISTINCT index FROM table_index ORDER BY index")->all();
                        $index = ArrayHelper::getColumn($query, 'index');
                        foreach ($index as $i) {
                            echo '<option>' . $i . '</option>';
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td> <span style="position: relative; left: -2001px; width: 2001px"> 8 </span> </td>
                <td style="width: 15px"> </td>
                <td style="width: 860px"> </td>
            </tr>
            <tr>
                <td>
                    <b>Обозначение изделия</b>
                </td>
                <td style="width: 15px"> </td>
                <td>
                    <select name="f_09" style="width: 860px">
                        <?php
                        echo '<option disabled selected>' . 'Выберите обозначение изделия' . '</option>';
                        $query = Index::findBySql("SELECT DISTINCT litera FROM table_index ORDER BY litera")->all();
                        $indication = ArrayHelper::getColumn($query, 'litera');
                        foreach ($indication as $i) {
                            echo '<option>' . $i . '</option>';
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td> <span style="position: relative; left: -2001px; width: 2001px"> 8 </span> </td>
                <td style="width: 15px"> </td>
                <td style="width: 860px"> </td>
            </tr>
            <tr>
                <td>
                    <b>Входящий номер письма</b>
                </td>
                <td style="width: 15px"> </td>
                <td>
                    <input type="text" size="137" name="f_10">
                </td>
            </tr>
            <tr>
                <td> <span style="position: relative; left: -2001px; width: 2001px"> 8 </span> </td>
                <td style="width: 15px"> </td>
                <td style="width: 860px"> </td>
            </tr>
            <tr>
                <td>
                    <b>Наименование МКФ</b>
                </td>
                <td style="width: 15px"> </td>
                <td>
                    <input type="text" size="137" name="f_11">
                </td>
            </tr>
            <tr>
                <td> <span style="position: relative; left: -2001px; width: 2001px"> 8 </span> </td>
                <td style="width: 15px"> </td>
                <td style="width: 860px"> </td>
            </tr>
            <tr>
                <td>
                    <b>Номер сопроводительного перечня</b>
                </td>
                <td style="width: 15px"> </td>
                <td>
                    <input type="text" size="137" name="f_12">
                </td>
            </tr>
            <tr>
                <td> <span style="position: relative; left: -2001px; width: 2001px"> 8 </span> </td>
                <td style="width: 15px"> </td>
                <td style="width: 860px"> </td>
            </tr>
            <tr>
                <td>
                    <b>Вид задания</b>
                </td>
                <td style="width: 15px"> </td>
                <td>
                    <select name="f_13" style="width: 860px">
                        <option disabled selected> Выберите вид задания </option>
                        <option> Принять на хранение </option>
                        <option> Переслать </option>
                        <option> Уничтожить </option>
                    </select>
                </td>
            </tr>
            <tr>
                <td> <span style="position: relative; left: -2001px; width: 2001px"> 8 </span> </td>
                <td style="width: 15px"> </td>
                <td style="width: 860px"> </td>
            </tr>
            <tr>
                <td>
                    <b>Инвентарный номер</b>
                </td>
                <td style="width: 15px"> </td>
                <td>
                    <input type="text" size="137" name="f_14">
                </td>
            </tr>
        </table>
        <br>
        <p><input type="submit" value="Печать" class="btn btn-success"></p>
    </form>
</div>