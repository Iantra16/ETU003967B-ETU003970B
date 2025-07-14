<?php
session_start();
ini_set("display_errors", "1");
require('connection.php');

function formater_montant($nombre)
{
    $ret = "$ " . number_format($nombre, 2, ',', ' ');
    return $ret;
}

function formater_nombre($nombre)
{
    $ret = number_format($nombre, 0, ',', ' ');
    return $ret;
}
