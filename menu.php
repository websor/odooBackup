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


require_once('Page.class.php');

//Website Structure
Page::head();
Page::header($email, $type);
Page::menu( $email, $type);
Page::footer();
Page::endHead();

 ?>