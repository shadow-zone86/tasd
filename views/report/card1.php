<table style="font-size: 14pt">
    <tr>
        <td colspan="4" align="left"><p>Входящий номер письма <b><?= $numberLetter[0] ?></b></p></td>
    </tr>
    <tr>
        <td> </td>
        <td align="center" style="border-top: 1px solid black; border-right: 1px solid black">Номер МКФ</td>
        <td align="center" style="border-top: 1px solid black; border-right: 1px solid black">Вид МКФ</td>
        <td align="center" style="border-top: 1px solid black">Номер экземпляра</td>
    </tr>
    <tr>
        <td> </td>
        <?php
            $tt = $numberForm[0];
            $len = strlen($tt);
            $kk = substr($tt, 0, $len-3);
            $dd = date("d.m.Y", strtotime($dateMade[0]));

            echo '<td align="center" style="border-right: 1px solid black"><b>'. $kk . '</b></td>'
        ?>
        <td align="center" style="border-right: 1px solid black"><b><?= $form[0] ?></b></td>
        <td align="center"><b><?= $numberCopy[0] ?></b></td>
    </tr>
    <tr>
        <td> </td>
        <td align="center" style="border-top: 1px solid black; border-right: 1px solid black">Гриф секретности</td>
        <td align="center" style="border-top: 1px solid black; border-right: 1px solid black">Дата изготовления</td>
        <td align="center" style="border-top: 1px solid black">Инв. номер тех. паспорта</td>
    </tr>
    <tr>
        <td> </td>
        <td align="center" style="border-bottom: 1px solid black; border-right: 1px solid black"><b><?= $xxx[0] ?></b></td>
        <td align="center" style="border-bottom: 1px solid black; border-right: 1px solid black"><b><?= $dd ?></b></td>
        <td align="center" style="border-bottom: 1px solid black"><b><?= $passport[0] ?></b></td>
    </tr>
    <tr>
        <td colspan="4" align="left" style="padding-left: 100px">Рк - <b><?= $workCtencil[0] ?></b>     Тр - <b><?= $ctencil[0] ?></b>      Бр - <b><?= $defectiveCtencil[0] ?></b>     Л. ф А4 - <b><?= $hiccupped[0] ?></b></td>
    </tr>
    <tr>
        <td colspan="4" align="center" style="padding-left: 100px">Поставщик документации</td>
    </tr>
    <tr>
        <td colspan="4" align="center" style="padding-left: 100px"><b><?= $agent[0] ?></b></td>
    </tr>
    <tr>
        <td> </td>
        <td align="left">Индекс <b><?= $index[0] ?></b></td>
        <td colspan="2" align="left">Вид документации <b><?= $typeDocument ?></b></td>
    </tr>
    <tr>
        <td>  </td>
        <td colspan="2" align="left" style="border-top: 1px solid black; border-bottom: 1px solid black">№ сопр. перечня <b><?= $accompLetter[0] ?></b></td>
        <td align="left" style="border-top: 1px solid black; border-bottom: 1px solid black">Инв. номер <b><?= $fasc[0] ?></b></td>
    </tr>
    <tr>
        <td colspan="4" align="center">Место хранения</td>
    </tr>
    <tr>
        <td> </td>
        <td colspan="3" align="left" style="border-bottom: 1px solid black">Помещение <b><?= $block[0] ?></b>     Шкаф <b><?= $gloset[0] ?></b>      Полка <b><?= $shelf[0] ?></b>     Ячейка <b><?= $cell[0] ?></b></td>
    </tr>
    <tr>
        <td colspan="4" align="left">Примечание <b><?= $note[0] ?></b></td>
    </tr>
</table>