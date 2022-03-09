<?php

/* @var $index string */
/* @var $indication string */
/* @var $accompLetter string */
/* @var $fasc string */
/* @var $numberForm string */

?>

<table style="font-size: 14pt">
    <tr>
        <td> </td>
        <td align="left" style="border-top: 1px solid black; border-right: 1px solid black">Индекс</td>
        <td align="left" style="border-top: 1px solid black" width="350em"><b><?= $index ?></b></td>
    </tr>
    <tr>
        <td> </td>
        <td align="left" style="border-top: 1px solid black; border-right: 1px solid black">Обозначение</td>
        <td align="left" style="border-top: 1px solid black"><b><?= $indication ?></b></td>
    </tr>
    <tr>
        <td> </td>
        <td align="left" style="border-top: 1px solid black; border-right: 1px solid black">№ сопр. перечня</td>
        <td align="left" style="border-top: 1px solid black"><b><?= $accompLetter ?></b></td>
    </tr>
    <tr>
        <td> </td>
        <td align="left" style="border-top: 1px solid black; border-right: 1px solid black">Инв. номер</td>
        <td align="left" style="border-top: 1px solid black"><b><?= $fasc ?></b></td>
    </tr>
    <tr>
        <td> </td>
        <td align="left" style="border-top: 1px solid black; border-right: 1px solid black; border-bottom: 1px solid black">Номер МКФ</td>
        <?php
            $tt = $numberForm;
            $len = strlen($tt);
            $kk = substr($tt, 0, $len-3);
            echo '<td align="left" style="border-top: 1px solid black; border-bottom: 1px solid black"><b>'. $kk . '</b></td>'
        ?>
    </tr>
</table>