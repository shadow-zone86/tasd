<?php
/* @var $model app\models\Index */
$arr = $model->getListSheet($index, $indication);
?>

<div class="index-list">
    <?php foreach ($arr as $one): ?>
        <ul class="sheet-list-ul">
            <li class="sheet-list-li"><?=$one?></li>
        </ul>
    <?php endforeach; ?>
    <p>&nbsp;</p>
</div>