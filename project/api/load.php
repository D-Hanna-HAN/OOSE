<?php

require_once "db/Config.php";
$config = new config;
$db = $config->getDb();
foreach (glob("classes/*.php") as $filename)
{
    include_once $filename;
}
