<?php

require_once "model/Config.php";
$config = new \Api\Model\config;
$db = $config->getDb();

foreach (glob("model/*.php") as $filename)
{
    include_once $filename;
}
