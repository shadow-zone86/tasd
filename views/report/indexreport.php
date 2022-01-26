<table>
    <tr>
        <td align="center" colspan="9"> Подбор МКФ по индексу изделия "<?=$index?>" </td>
    </tr>
    <tr>
        <td align="center" style="border: 1px solid black"> № п/п </td>
        <td align="center" style="border: 1px solid black"> Номер МКФ </td>
        <td align="center" style="border: 1px solid black"> Обозначение изделия </td>
        <td align="center" style="border: 1px solid black"> Общее количество листов формата А4 </td>
        <td align="center" style="border: 1px solid black"> Количество кадров </td>
        <td align="center" style="border: 1px solid black"> Помещение </td>
        <td align="center" style="border: 1px solid black"> Шкаф </td>
        <td align="center" style="border: 1px solid black"> Полка </td>
        <td align="center" style="border: 1px solid black"> Ячейка </td>
    </tr>
    <?php
        $itogHiccupped = 0;
        $itogWorkCtencil = 0;
        $nn = 0;
        for ($i=0; $i<count($sheet); $i++) {
            $nn++;
            if ($sheet[$i]['work_ctencil'] == "") {
                $sheet[$i]['work_ctencil'] = 0;
            }
            if ($sheet[$i]['hiccupped'] == "") {
                $sheet[$i]['hiccupped'] = 0;
            }
            $itogHiccupped += $sheet[$i]['hiccupped'];
            $itogWorkCtencil += $sheet[$i]['work_ctencil'];

            echo '<tr>'
                . '<td align="center" style="border: 1px solid black">' . $nn . '</td>'
                . '<td align="center" style="border: 1px solid black; width: 12em">' . $sheet[$i]['number_form'] . '</td>'
                . '<td align="center" style="border: 1px solid black; width: 12em">' . $sheet[$i]['indication'] . '</td>'
                . '<td align="center" style="border: 1px solid black; width: 5em">' . $sheet[$i]['hiccupped'] . '</td>'
                . '<td align="center" style="border: 1px solid black; width: 5em">' . $sheet[$i]['work_ctencil'] . '</td>'
                . '<td align="center" style="border: 1px solid black; width: 5em">' . $sheet[$i]['block'] . '</td>'
                . '<td align="center" style="border: 1px solid black; width: 5em">' . $sheet[$i]['gloset'] . '</td>'
                . '<td align="center" style="border: 1px solid black; width: 5em">' . $sheet[$i]['shelf'] . '</td>'
                . '<td align="center" style="border: 1px solid black; width: 5em">' . $sheet[$i]['cell'] . '</td>'
                . '</tr>';
        }
    ?>
    <tr>
        <td align="right" colspan="3"> Итого </td>
        <td align="center"> <?=$itogHiccupped?> </td>
        <td align="center"> <?=$itogWorkCtencil?> </td>
        <td colspan="4"> </td>
    </tr>
</table>