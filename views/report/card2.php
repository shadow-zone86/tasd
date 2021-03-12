<table style="font-size: 14pt">
    <tr>
        <td> </td>
        <td align="left" style="border-top: 1px solid black; border-right: 1px solid black">Индекс</td>
        <td align="left" style="border-top: 1px solid black" width="350em"><b><?= $index[0] ?></b></td>
    </tr>
    <tr>
        <td> </td>
        <td align="left" style="border-top: 1px solid black; border-right: 1px solid black">Обозначение</td>
        <td align="left" style="border-top: 1px solid black"><b><?= $indication[0] ?></b></td>
    </tr>
    <tr>
        <td> </td>
        <td align="left" style="border-top: 1px solid black; border-right: 1px solid black">№ сопр. перечня</td>
        <td align="left" style="border-top: 1px solid black"><b><?= $accompLetter[0] ?></b></td>
    </tr>
    <tr>
        <td> </td>
        <td align="left" style="border-top: 1px solid black; border-right: 1px solid black">Инв. номер</td>
        <td align="left" style="border-top: 1px solid black"><b><?= $fasc[0] ?></b></td>
    </tr>
    <tr>
        <td> </td>
        <td align="left" style="border-top: 1px solid black; border-right: 1px solid black; border-bottom: 1px solid black">Номер МКФ</td>
        <?php
            $tt = $numberForm[0];
            $len = strlen($tt);
            $kk = substr($tt, 0, $len-3);
            echo '<td align="left" style="border-top: 1px solid black; border-bottom: 1px solid black"><b>'. $kk . '</b></td>'
        ?>
    </tr>
</table>