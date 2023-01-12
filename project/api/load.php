<?php

require_once "db/Config.php";
$config = new config;
$db = $config->getDb();
foreach (glob("get/*.php") as $filename)
{
    include_once $filename;
}
foreach (glob("post/*.php") as $filename)
{
    include_once $filename;
}
foreach (glob("model/*.php") as $filename)
{
    include_once $filename;
}
