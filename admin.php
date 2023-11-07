<?php
/**
 * Including external classes
 */
session_start ();
if(!isset($_SESSION["login"]))
{
    header("location:index.php"); 
}

if(isset($_GET["type"]))
{
    $type = $_GET["type"];
}
else
{
    $type = "";
}

if(isset($_GET["user"]))
{
    $email = $_GET["user"];
}
else
{
    $email = "";
}

if(isset($_GET["msg"]))
{
    $msg = $_GET["msg"];
}
else
{
    $msg = "";
}


require_once('Page.class.php');

//Website Structure
Page::head2();
Page::header2($email, $type);
Page::menuAdmin( $email, $type, $msg);
Page::footer2();
Page::endHead2();

 ?>