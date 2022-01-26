<table>
    <tr>
        <td align="center" colspan="10"> Перечень МКФ, содержащих документацию</td>
    </tr>
    <tr>
        <td align="center" colspan="10"> <?=$agent[0]?> </td>
    </tr>
    <tr>
        <td align="center" colspan="10"> за период с <?=$date1?> по <?=$date2?> </td>
    </tr>
    <tr>
        <td align="center" style="border: 1px solid black" rowspan="2"> № п/п </td>
        <td align="center" style="border: 1px solid black"> Номер микроформы </td>
        <td align="center" style="border: 1px solid black" rowspan="2"> Индекс </td>
        <td align="center" style="border: 1px solid black" rowspan="2"> Обозначение </td>
        <td align="center" style="border: 1px solid black" colspan="4"> Количество кадров </td>
        <td align="center" style="border: 1px solid black" rowspan="2"> Общее кол-во листов формата А4 </td>
        <td align="center" style="border: 1px solid black" rowspan="2"> Дата изготовления </td>
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
        for ($i=0; $i<count($sheet); $i++) {
            $nn++;
            $total = 0;
            if ($sheet[$i]['ctencil'] == "") {
                $sheet[$i]['ctencil'] = 0;
            }
            if ($sheet[$i]['work_ctencil'] == "") {
                $sheet[$i]['work_ctencil'] = 0;
            }
            if ($sheet[$i]['defective_ctencil'] == "") {
                $sheet[$i]['defective_ctencil'] = 0;
            }
            if ($sheet[$i]['hiccupped'] == "") {
                $sheet[$i]['hiccupped'] = 0;
            }
            $total = $sheet[$i]['ctencil'] + $sheet[$i]['work_ctencil'] + $sheet[$i]['defective_ctencil'];
            $itogCtencil += $sheet[$i]['ctencil'];
            $itogWorkCtencil += $sheet[$i]['work_ctencil'];
            $itogDefectiveCtencil += $sheet[$i]['defective_ctencil'];
            $itogTotal += $total;
            $itogHiccupped += $sheet[$i]['hiccupped'];
            $dd = date("d.m.Y", strtotime($sheet[$i]['date_made']));

            echo '<tr>'
                . '<td align="center" style="border: 1px solid black" rowspan="2">' . $nn . '</td>'
                . '<td align="center" style="border: 1px solid black; width: 12em">' . $sheet[$i]['number_form'] . '</td>'
                . '<td align="center" style="border: 1px solid black; width: 7em" rowspan="2">' . $sheet[$i]['index'] . '</td>'
                . '<td align="center" style="border: 1px solid black; width: 7em" rowspan="2">' . $sheet[$i]['indication'] . '</td>'
                . '<td align="center" style="border: 1px solid black; width: 3em" rowspan="2">' . $sheet[$i]['ctencil'] . '</td>'
                . '<td align="center" style="border: 1px solid black; width: 3em" rowspan="2">' . $sheet[$i]['work_ctencil'] . '</td>'
                . '<td align="center" style="border: 1px solid black; width: 3em" rowspan="2">' . $sheet[$i]['defective_ctencil'] . '</td>'
                . '<td align="center" style="border: 1px solid black; width: 3em" rowspan="2">' . $total . '</td>'
                . '<td align="center" style="border: 1px solid black; width: 3em" rowspan="2">' . $sheet[$i]['hiccupped'] . '</td>'
                . '<td align="center" style="border: 1px solid black; width: 7em" rowspan="2">' . $dd . '</td>'
                . '</tr>';
            echo '<tr>'
                . '<td align="center" style="border: 1px solid black; height: 1.5em">' . $sheet[$i]['original_number'] . '</td>'
                . '</tr>';
        }
    ?>
    <tr>
        <td align="right" colspan="4"> Итого </td>
        <td align="center"> <?=$itogCtencil?> </td>
        <td align="center"> <?=$itogWorkCtencil?> </td>
        <td align="center"> <?=$itogDefectiveCtencil?> </td>
        <td align="center"> <?=$itogTotal?> </td>
        <td align="center"> <?=$itogHiccupped?> </td>
        <td> </td>
    </tr>
</table>