<?php
    session_start();
    if(!isset($_SESSION['userName']) && isset($_COOKIE['token']))
    {
        include_once("CRUD.php");
         $x = new CRUD('./xml/db.xml');
         $x->getCookieToken();
    }
?>