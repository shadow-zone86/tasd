<?php
    use app\models\Agent;
    use yii\helpers\ArrayHelper;

    if ($_GET['f_xxxOV'] == 'on') {
        $xxxOV = "ОВ";
    }
    if ($_GET['f_xxxSS'] == 'on') {
        $xxxSS = "СС";
    }
    if ($_GET['f_xxxS'] == 'on') {
        $xxxS = "С";
    }
    if ($_GET['f_xxxNS'] == 'on') {
        $xxxNS = "Н/С";
    }
    if ($_GET['f_xxxDSP'] == 'on') {
        $xxxDSP = "ДСП";
    }
    if ($_GET['f_xxxK'] == 'on') {
        $xxxK = "К";
    }
    if ($_GET['f_xxxKT'] == 'on') {
        $xxxKT = "КТ";
    }
    if ($_GET['f_xxxSK'] == 'on') {
        $xxxSK = "СК";
    }

    if ($_GET['f_vid1'] == 'on') {
        $vid1 = 1;
    }
    if ($_GET['f_vid2'] == 'on') {
        $vid2 = 2;
    }
    if ($_GET['f_vid3'] == 'on') {
        $vid3 = 3;
    }
    if ($_GET['f_vid4'] == 'on') {
        $vid4 = 4;
    }
    if ($_GET['f_vid5'] == 'on') {
        $vid5 = 5;
    }
    if ($_GET['f_vid6'] == 'on') {
        $vid6 = 6;
    }
    if ($_GET['f_vid7'] == 'on') {
        $vid7 = 7;
    }
    if ($_GET['f_vid8'] == 'on') {
        $vid8 = 8;
    }
?>

<table>
    <tr>
        <td align="center" colspan="11"> Перечень микроформ, поступивших за период с <?=$date1?> по <?=$date2?> </td>
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
            if ($xxx[$i] == $xxxOV) {

            } elseif ($xxx[$i] == $xxxSS) {

            } elseif ($xxx[$i] == $xxxS) {

            } elseif ($xxx[$i] == $xxxNS) {

            } elseif ($xxx[$i] == $xxxDSP) {

            } elseif ($xxx[$i] == $xxxK) {

            } elseif ($xxx[$i] == $xxxKT) {

            } elseif ($xxx[$i] == $xxxSK) {

            } else continue;

            if ($type_document[$i] == $vid1) {

            } elseif ($type_document[$i] == $vid2) {

            } elseif ($type_document[$i] == $vid3) {

            } elseif ($type_document[$i] == $vid4) {

            } elseif ($type_document[$i] == $vid5) {

            } elseif ($type_document[$i] == $vid6) {

            } elseif ($type_document[$i] == $vid7) {

            } elseif ($type_document[$i] == $vid8) {

            } else continue;

            $nn = $nn + 1;
            $total = 0;
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
            $total = $ctencil[$i] + $work_ctencil[$i] + $defective_ctencil[$i];

            $tt = $made_form[$i];
            $query1 = Agent::find()->select('name_agent')->where(['number_agent' => $tt])->all();
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


