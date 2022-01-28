<?php
/* @var $model app\models\Agent */
$arr = $model->getListSheet($agent);
?>

<div class="agent-list">
    <?php foreach ($arr as $one): ?>
        <ul class="sheet-list-ul">
            <li class="sheet-list-li"><?=$one?></li>
        </ul>
    <?php endforeach; ?>
    <p>&nbsp;</p>
</div>