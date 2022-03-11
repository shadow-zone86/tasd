<?php

/* @var $sheet array */

?>

<table align="center">
    <tr>
        <td align="center" style="border: 1px solid black"> № п/п </td>
        <td align="center" style="border: 1px solid black"> Индекс изделия </td>
    </tr>
    <?php
        $nn = 0;
        $index = '';
        for($i=0; $i<count($sheet); $i++) {
            if ($index != $sheet[$i]['index']) {
                $nn++;
                $index = $sheet[$i]['index'];
                echo '<tr>'
                    . '<td align="center" style="border: 1px solid black; width: 10%">' . $nn . '</td>'
                    . '<td align="center" style="border: 1px solid black; width: 90%">' . $sheet[$i]['index'] . '</td>'
                    . '</tr>';
            } else {
                continue;
            }
        }
    ?>
</table>