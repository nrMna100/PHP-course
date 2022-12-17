<?
session_start();

$textVal = $_POST["text"];

$_SESSION["message"] = $textVal;


if (!empty($_SERVER['HTTP_REFERER']))
    header("Location: " . $_SERVER['HTTP_REFERER']);
