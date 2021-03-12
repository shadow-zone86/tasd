<table>
    <tr>
        <td align="center" colspan="9"> Подбор МКФ по обозначению изделия "<?=$indication?>" </td>
    </tr>
    <tr>
        <td align="center" style="border: 1px solid black"> № п/п </td>
        <td align="center" style="border: 1px solid black"> Номер МКФ </td>
        <td align="center" style="border: 1px solid black"> Индекс изделия </td>
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
    for ($i=0; $i<count($number_form); $i++) {
        $nn = $nn + 1;
        if ($work_ctencil[$i] == "") {
            $work_ctencil[$i] = 0;
        }
        if ($hiccupped[$i] == "") {
            $hiccupped[$i] = 0;
        }
        $itogHiccupped = $itogHiccupped + $hiccupped[$i];
        $itogWorkCtencil = $itogWorkCtencil + $work_ctencil[$i];

        echo '<tr>'
            . '<td align="center" style="border: 1px solid black">' . $nn . '</td>'
            . '<td align="center" style="border: 1px solid black; width: 12em">' . $number_form[$i] . '</td>'
            . '<td align="center" style="border: 1px solid black; width: 12em">' . $index[$i] . '</td>'
            . '<td align="center" style="border: 1px solid black; width: 5em">' . $hiccupped[$i] . '</td>'
            . '<td align="center" style="border: 1px solid black; width: 5em">' . $work_ctencil[$i] . '</td>'
            . '<td align="center" style="border: 1px solid black; width: 5em">' . $block[$i] . '</td>'
            . '<td align="center" style="border: 1px solid black; width: 5em">' . $gloset[$i] . '</td>'
            . '<td align="center" style="border: 1px solid black; width: 5em">' . $shelf[$i] . '</td>'
            . '<td align="center" style="border: 1px solid black; width: 5em">' . $cell[$i] . '</td>'
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