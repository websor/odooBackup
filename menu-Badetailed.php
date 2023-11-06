<?php
/**
 * Including external classes
 */
require_once('Page.class.php');
require_once('Class/Balance.class.php');
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


$invoice_number="";
$salesOrderSearch="";
$dateSearch="";
$customerSearch="";
 
$invoices = array();
$count =0;
/**
* Call to the database to get all invoices
* 
*/ 

$query_user = "select * from customer_balances order by total_receivable DESC;";
$result_User = mysqli_query($conection,$query_user);
while($row_user = mysqli_fetch_assoc($result_User))
{ $count = $count +1;} 

$query_user = "select * from customer_balances order by total_receivable DESC limit 100;";
$result_User = mysqli_query($conection,$query_user);
while($row_user = mysqli_fetch_assoc($result_User))
{
    $newInvoiceLine = new Balance(); 
    $newInvoiceLine->setCustomer($row_user['customer']);
    $newInvoiceLine->setLast_update($row_user['last_update']);
    $newInvoiceLine->setTotal_receivable($row_user['total_receivable']);
    
    $invoices[] = $newInvoiceLine;
} 

 //Cheching for POST FILTERS
if(isset($_POST["search"]))
{
    $invoices = array();
    $count =0;

    //DO THE OTHER FILTERS HERE!!!!
    if(isset($_POST["customerSearch"]))
    {
        $customerSearch = strtoupper($_POST['customerSearch']);

        $query_user = "select * from customer_balances where customer like '%$customerSearch%';";
        $result_User = mysqli_query($conection,$query_user);
        while($row_user = mysqli_fetch_assoc($result_User))
        { $count = $count+1; }
        
        $query_user = "select * from customer_balances where customer like '%$customerSearch%' limit 50;";
        $result_User = mysqli_query($conection,$query_user);
        while($row_user = mysqli_fetch_assoc($result_User))
        { 
            $newInvoiceLine = new Balance(); 
            $newInvoiceLine->setCustomer($row_user['customer']);
            $newInvoiceLine->setLast_update($row_user['last_update']);
            $newInvoiceLine->setTotal_receivable($row_user['total_receivable']);
            
            $invoices[] = $newInvoiceLine;
        }
    }
    
}

 //Cheching for POST FILTERS
 if(isset($_POST["Clear"]))
 {
    $invoice_number = "";
    $customerSearch = "";
    $dateSearch = "";
    $salesOrderSearch="";
 }

//Website Structure
Page::head2();
Page::header2($email, $type);
Page::menuBadetailed($typ, $invoices, $email, $type, $invoice_number, $customerSearch, $dateSearch, $salesOrderSearch, $count);
Page::footer2();
Page::endHead2();

 ?>