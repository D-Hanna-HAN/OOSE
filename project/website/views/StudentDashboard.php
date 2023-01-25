<?php
?>
<div class="container">
    <div class="row">
        <h2>Welcome <?= $student["firstname"] ?></h2>
    </div>
    <div class="row">
        <div class="col6">
            <a href="/<?= constant('URL_SUBFOLDER') ?>/courses/">courses</a>
            <a href="/<?= constant('URL_SUBFOLDER') ?>/grades/">grades</a>
            <a href="/<?= constant('URL_SUBFOLDER') ?>/agenda/">agenda</a>
        </div>
        <div class="col6">

        </div>
    </div>


</div>