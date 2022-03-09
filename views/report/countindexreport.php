<?php

/* @var $index array */

?>

<table align="center">
    <tr>
        <td align="center" style="border: 1px solid black"> № п/п </td>
        <td align="center" style="border: 1px solid black"> Индекс изделия </td>
    </tr>
    <?php
        $nn = 0;
        foreach ($index as $one) {
            $nn++;
            echo '<tr>'
                . '<td align="center" style="border: 1px solid black; width: 10%">' . $nn . '</td>'
                . '<td align="center" style="border: 1px solid black; width: 90%">' . $one . '</td>'
                . '</tr>';
        }
    ?>
</table>