<?php
/**
 * Including external classes
 */
require_once('Page.class.php');
$conection = include 'config/conection.php';

/**
 * Receivind data by GET Method
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

 if(isset($_GET["typ"]))
 {
     $typ = $_GET["typ"];
 }
 else
 {
     $typ = "";
 }



//Website Structure
Page::head();
Page::header($email, $type);
Page::menuMonDetailed($typ, $email, $type);
Page::footer();
Page::endHead();

 ?>