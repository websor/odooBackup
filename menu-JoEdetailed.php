<?php
/**
 * Including external classes
 */
require_once('Page.class.php');
require_once('Class/Journal_Entries.class.php');
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
$count = 0;
 
$invoices = array();
/**
* Call to the database to get all invoices
* 
*/ 

$query_user = "select * from journal_entries order by created_on DESC;";
$result_User = mysqli_query($conection,$query_user);
while($row_user = mysqli_fetch_assoc($result_User))
{
    $count = $count + 1;
}

$query_user = "select * from journal_entries order by created_on DESC limit 100;";
$result_User = mysqli_query($conection,$query_user);
while($row_user = mysqli_fetch_assoc($result_User))
{
    $newInvoiceLine = new Journal_Entries(); 
    $newInvoiceLine->setCreated_on($row_user['created_on']);
    $newInvoiceLine->setDate($row_user['date']);
    $newInvoiceLine->setNumber($row_user['number']);
    $newInvoiceLine->setCustomer($row_user['customer']);
    $newInvoiceLine->setReference($row_user['reference']);
    $newInvoiceLine->setJournal($row_user['journal']);
    $newInvoiceLine->setStatus($row_user['status']); 
    $newInvoiceLine->setAmount($row_user['amount']);  

    $invoices[] = $newInvoiceLine;
} 


 //Cheching for POST FILTERS
if(isset($_POST["search"]))
{
    $count =0;
    $invoices = array();

    //DO THE OTHER FILTERS HERE!!!!
    if(isset($_POST["invoiceNumberSearch"]) && isset($_POST["VendorSearch"]) && isset($_POST["invoiceDateSearch"]) && isset($_POST["salesOrderSearch"]))
    {
        $invoice_number = strtoupper($_POST['invoiceNumberSearch']);
        $customerSearch = strtoupper($_POST['VendorSearch']);
        $dateSearch = strtoupper($_POST['invoiceDateSearch']);
        $salesOrderSearch = strtoupper($_POST['salesOrderSearch']);
        //var_dump($invoice_number);
        //var_dump($customerSearch);
        //var_dump($dateSearch);
        //var_dump($salesOrderSearch);
        $query_user = "select * from journal_entries where number like '%$invoice_number%' AND customer like '%$customerSearch%' AND date like '%$dateSearch%' AND reference like '%$salesOrderSearch%' ;";
        $result_User = mysqli_query($conection,$query_user);
        while($row_user = mysqli_fetch_assoc($result_User))
        { $count = $count + 1; }

        $query_user = "select * from journal_entries where number like '%$invoice_number%' AND customer like '%$customerSearch%' AND date like '%$dateSearch%' AND reference like '%$salesOrderSearch%' limit 100;";
        $result_User = mysqli_query($conection,$query_user);
        while($row_user = mysqli_fetch_assoc($result_User))
        { 
            $newInvoiceLine = new Journal_Entries(); 
            $newInvoiceLine->setCreated_on($row_user['created_on']);
            $newInvoiceLine->setDate($row_user['date']);
            $newInvoiceLine->setNumber($row_user['number']);
            $newInvoiceLine->setCustomer($row_user['customer']);
            $newInvoiceLine->setReference($row_user['reference']);
            $newInvoiceLine->setJournal($row_user['journal']);
            $newInvoiceLine->setStatus($row_user['status']); 
            $newInvoiceLine->setAmount($row_user['amount']);  

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
Page::menuJoEdetailed($typ, $invoices, $email, $type, $invoice_number, $customerSearch, $dateSearch, $salesOrderSearch, $count);
Page::footer2();
Page::endHead2();

 ?>