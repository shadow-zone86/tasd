<?php
    use app\models\Agent;
    use yii\helpers\ArrayHelper;

    $per_03 = $_GET['f_03'];
    $per_13 = $_GET['f_13'];
?>

<table>
    <tr>
        <td align="center" colspan="11"> Генератор отчетов </td>
    </tr>
    <tr>
        <td align="center" style="border: 1px solid black" rowspan="2"> № п/п </td>
        <td align="center" style="border: 1px solid black"> Номер микроформы </td>
        <td align="center" style="border: 1px solid black" rowspan="2"> Гриф </td>
        <td align="center" style="border: 1px solid black" rowspan="2"> Индекс </td>
        <td align="center" style="border: 1px solid black" rowspan="2"> Обозначение </td>
        <td align="center" style="border: 1px solid black" colspan="4"> Количество кадров </td>
        <td align="center" style="border: 1px solid black" rowspan="2"> Общее кол-во листов формата А4 </td>
        <td align="center" style="border: 1px solid black" rowspan="2"> Изготовитель МКФ </td>
    </tr>
    <tr>
        <td align="center" style="border: 1px solid black"> Оригинальный номер </td>
        <td align="center" style="border: 1px solid black; writing-mode:vertical-rl"> трафарет </td>
        <td align="center" style="border: 1px solid black; writing-mode:vertical-rl"> рабочие </td>
        <td align="center" style="border: 1px solid black; writing-mode:vertical-rl"> брак </td>
        <td align="center" style="border: 1px solid black; writing-mode:vertical-rl"> всего </td>
    </tr>
    <?php
        $itogCtencil = 0;
        $itogWorkCtencil = 0;
        $itogDefectiveCtencil = 0;
        $itogTotal = 0;
        $itogHiccupped = 0;
        $nn = 0;

        for ($i=0; $i<count($number_form); $i++) {
            if ($ctencil[$i] == "") {
                $ctencil[$i] = 0;
            }
            if ($work_ctencil[$i] == "") {
                $work_ctencil[$i] = 0;
            }
            if ($defective_ctencil[$i] == "") {
                $defective_ctencil[$i] = 0;
            }
            if ($hiccupped[$i] == "") {
                $hiccupped[$i] = 0;
            }

            if ($per_03) {
                if ($xxx[$i] == $per_03) {
                } else continue;
            }

            if ($per_13) {
                if ($action[$i] == $per_13) {
                } else continue;
            }
            $nn = $nn + 1;
            $total = 0;

            $total = $ctencil[$i] + $work_ctencil[$i] + $defective_ctencil[$i];

            $tt = $made_form[$i];
            $query1 = Agent::find()->select(['name_agent'])->where(['number_agent' => $tt])->all();
            $agent = ArrayHelper::getColumn($query1, 'name_agent');

            $itogCtencil = $itogCtencil + $ctencil[$i];
            $itogWorkCtencil = $itogWorkCtencil + $work_ctencil[$i];
            $itogDefectiveCtencil = $itogDefectiveCtencil + $defective_ctencil[$i];
            $itogTotal = $itogTotal + $total;
            $itogHiccupped = $itogHiccupped + $hiccupped[$i];

            echo '<tr>'
                . '<td align="center" style="border: 1px solid black" rowspan="2">' . $nn . '</td>'
                . '<td align="center" style="border: 1px solid black; width: 12em">' . $number_form[$i] . '</td>'
                . '<td align="center" style="border: 1px solid black; width: 3em" rowspan="2">' . $xxx[$i] . '</td>'
                . '<td align="center" style="border: 1px solid black; width: 7em" rowspan="2">' . $index[$i] . '</td>'
                . '<td align="center" style="border: 1px solid black; width: 7em" rowspan="2">' . $indication[$i] . '</td>'
                . '<td align="center" style="border: 1px solid black; width: 3em" rowspan="2">' . $ctencil[$i] . '</td>'
                . '<td align="center" style="border: 1px solid black; width: 3em" rowspan="2">' . $work_ctencil[$i] . '</td>'
                . '<td align="center" style="border: 1px solid black; width: 3em" rowspan="2">' . $defective_ctencil[$i] . '</td>'
                . '<td align="center" style="border: 1px solid black; width: 3em" rowspan="2">' . $total . '</td>'
                . '<td align="center" style="border: 1px solid black; width: 3em" rowspan="2">' . $hiccupped[$i] . '</td>'
                . '<td align="center" style="border: 1px solid black; width: 24em" rowspan="2">' . $agent[0] . '</td>'
                . '</tr>';
            echo '<tr>'
                . '<td align="center" style="border: 1px solid black; height: 1.5em">' . $original_number[$i] . '</td>'
                . '</tr>';
        }
    ?>
    <tr>
        <td align="right" colspan="5"> Итого </td>
        <td align="center"> <?=$itogCtencil?> </td>
        <td align="center"> <?=$itogWorkCtencil?> </td>
        <td align="center"> <?=$itogDefectiveCtencil?> </td>
        <td align="center"> <?=$itogTotal?> </td>
        <td align="center"> <?=$itogHiccupped?> </td>
        <td> </td>
    </tr>
</table>