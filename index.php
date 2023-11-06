<?php

// Final ----------------------------------------------------------------------

/**
 * Including external classes
 */
if(isset($_GET["type"]))
{
    $type = $_GET["type"];
}
else
{
    $type = "";
}

if(isset($_GET["logout"]))
{
    session_start ();
    session_destroy();
    header("location:index.php");
}
else
{
    
}

if(isset($_GET["user"]))
{
    $email = $_GET["user"];
}
else
{
    $email = "";
}

if(isset($_GET["error"]))
{
    $error = $_GET["error"];
}
else
{
    $error = "";
}

require_once('Page.class.php');
session_start ();
$conection = include 'config/conection.php';


/**
 * POST METHODS LOGIN
 */

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{       
        $email = $_POST["email"]; 
        $password = $_POST["password"];

        $query = "select * from users where email = '$email';";
        $result_slider = mysqli_query($conection,$query);
        $row = mysqli_fetch_assoc($result_slider);

        if($row != 0)
        {
            $query = "select * from users where email = '$email';";
            $result_slider = mysqli_query($conection,$query);
            while($row = mysqli_fetch_assoc($result_slider))
            {
                $userEmail = $row['email'];
                $passwordEmail = $row['password'];
                $usert = $row['type'];
        
                if($userEmail == $email && $passwordEmail == $password)
                {
                    $_SESSION["login"]="1";
                    header("Location: menu.php?user=$email&type=$usert");
                }
                else
                {
                    header("Location: index.php?error=2");
                }  
            }
        }
        else
        {
            header("Location: index.php?error=1");
        }
}


//Website Structure
Page::head2();
Page::header2($email, $type);
Page::login2($error); 
Page::footer2();
Page::endHead2();
?>