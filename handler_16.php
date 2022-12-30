<?
session_start();

if (isset($_SESSION["user_data"]))
    unset($_SESSION["user_data"]);

if (!empty($_SERVER['HTTP_REFERER']))
    header("Location: " . $_SERVER['HTTP_REFERER']);
