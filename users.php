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

if(isset($_GET["action"]))
{
    $action = $_GET["action"];
}
else
{
    $action = "";
}

if(isset($_GET["u"]))
{
    $u = $_GET["u"];
}
else
{
    $u = "";
}


require_once('Page.class.php');
require_once('config/conection.php');
require_once('Class/User.php');

    $invoices = array();
    $userToEdit = array();
    /**
    * Call to the database to get all Users
    * 
    */

    $query_user = "select * from users;";
    $result_User = mysqli_query($conection,$query_user);
    while($row_user = mysqli_fetch_assoc($result_User))
    { 
        $newInvoice = new User();
        $newInvoice->setName($row_user['name']);
        $newInvoice->setEmail($row_user['email']);
        $newInvoice->setType($row_user['type']);
        $newInvoice->setPassword($row_user['password']);  

        $invoices[] = $newInvoice;
    } 

    /**
    * Call to the database to delete an user
    * 
    */
if(isset($_POST["delete"]))
{
    $query_user = "DELETE from users WHERE email = '$u';";
    $result_User = mysqli_query($conection,$query_user);
    $msg = "The user has been removed";
    $action="";
    $val1 = $_POST["typeD"];
    $val2 = $_POST["userD"];

    header("location:users.php?type=$val1&user=$val2&msg=$msg");


}

if(isset($_POST["add"]))
{
    $nameA = $_POST["addName"];
    $emailA = $_POST["addEmail"];
    $typeA = $_POST["addType"];
    $passwordA = $_POST["addPassword"];

    $query_user = "INSERT INTO users (name, email, type, password) VALUES ('$nameA', '$emailA', '$typeA', '$passwordA')";
    $result_User = mysqli_query($conection,$query_user);
    $msg = "The user has been Added";
    $action="";
    $val1 = $_POST["typeA"];
    $val2 = $_POST["userA"];

    header("location:users.php?type=$val1&user=$val2&msg=$msg");


}

if($action == "E")
{
    $query_user = "select * from users WHERE email = '$u';";
    $result_User = mysqli_query($conection,$query_user);
    while($row_user = mysqli_fetch_assoc($result_User))
    { 
        $newInvoice = new User();
        $newInvoice->setId($row_user['id']);
        $newInvoice->setName($row_user['name']);
        $newInvoice->setEmail($row_user['email']);
        $newInvoice->setType($row_user['type']);
        $newInvoice->setPassword($row_user['password']);  

        $userToEdit[] = $newInvoice;
    } 
}

    /**
    * Call to the database to edit an user
    * 
    */
    if(isset($_POST["edit"]))
    {
        $id = $_POST["id"];
        $nameE = $_POST['name'];
        $emailE = $_POST['email'];
        $typeE = $_POST['type'];
        $passwordE = $_POST['password'];

        $query_user = "UPDATE users SET name = '$nameE', email = '$emailE', type = '$typeE', password = '$passwordE' WHERE id = $id";
        $result_User = mysqli_query($conection,$query_user);
        $msg = "The user has been Updated";
        $action="";
        
        $val1 = $_POST["typeE"];
        $val2 = $_POST["userE"];

        header("location:users.php?type=$val1&user=$val2&msg=$msg");
    }

//Website Structure
Page::head2();
Page::header2($email, $type);
Page::menuUdetailed($email, $type, $msg, $invoices, $action, $u, $userToEdit);
Page::footer2();
Page::endHead2();

 ?>