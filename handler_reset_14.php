<?
session_start();

unset($_SESSION["click_amount"]);

if (!empty($_SERVER['HTTP_REFERER']))
    header("Location: " . $_SERVER['HTTP_REFERER']);
