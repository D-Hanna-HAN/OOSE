<?php
foreach (glob("model/*.php") as $filename)
{
    include_once $filename;
}
