<?php
/**
 * Including external classes
 */
require_once('Page.class.php');
require_once('Class/Payment.class.php');
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

$query_user = "select * from payments order by payment_date DESC;";
$result_User = mysqli_query($conection,$query_user);
while($row_user = mysqli_fetch_assoc($result_User))
{
    $count = $count + 1;
}

$query_user = "select * from payments order by payment_date DESC limit 50;";
$result_User = mysqli_query($conection,$query_user);
while($row_user = mysqli_fetch_assoc($result_User))
{
    $newInvoiceLine = new Payment(); 
    $newInvoiceLine->setPayment_number($row_user['payment_number']);
    $newInvoiceLine->setCustomer_ref($row_user['customer_ref']);
    $newInvoiceLine->setEmployee($row_user['employee']);
    $newInvoiceLine->setPayment_journal($row_user['payment_journal']);
    $newInvoiceLine->setCustomer($row_user['customer']);
    $newInvoiceLine->setAmount($row_user['amount']);
    $newInvoiceLine->setCustomer($row_user['customer']); 
    $newInvoiceLine->setStatus($row_user['status']);  
    $newInvoiceLine->setPayment_type($row_user['payment_type']); 
    $newInvoiceLine->setMemo($row_user['memo']); 
    $newInvoiceLine->setPayment_trans($row_user['payment_trans']); 
    $newInvoiceLine->setPayment_date($row_user['payment_date']); 

    $invoices[] = $newInvoiceLine;
} 



 //Cheching for POST FILTERS
if(isset($_POST["search"]))
{
    $count =0;
    $invoices = array();

    //DO THE OTHER FILTERS HERE!!!!
    if(isset($_POST["invoiceNumberSearch"]) && isset($_POST["customerSearch"]) && isset($_POST["invoiceDateSearch"]))
    {
        $invoice_number = strtoupper($_POST['invoiceNumberSearch']);
        $customerSearch = strtoupper($_POST['customerSearch']);
        $dateSearch = strtoupper($_POST['invoiceDateSearch']);

        $query_user = "select * from payments where payment_number like '%$invoice_number%' AND customer like '%$customerSearch%' AND payment_date like '%$dateSearch%';";
        $result_User = mysqli_query($conection,$query_user);
        while($row_user = mysqli_fetch_assoc($result_User))
        { $count = $count + 1; }

        $query_user = "select * from payments where payment_number like '%$invoice_number%' AND customer like '%$customerSearch%' AND payment_date like '%$dateSearch%' order by payment_date DESC  limit 50;";
        $result_User = mysqli_query($conection,$query_user);
        while($row_user = mysqli_fetch_assoc($result_User))
        { 
            $newInvoiceLine = new Payment(); 
            $newInvoiceLine->setPayment_number($row_user['payment_number']);
            $newInvoiceLine->setCustomer_ref($row_user['customer_ref']);
            $newInvoiceLine->setEmployee($row_user['employee']);
            $newInvoiceLine->setPayment_journal($row_user['payment_journal']);
            $newInvoiceLine->setCustomer($row_user['customer']);
            $newInvoiceLine->setAmount($row_user['amount']);
            $newInvoiceLine->setCustomer($row_user['customer']); 
            $newInvoiceLine->setStatus($row_user['status']);  
            $newInvoiceLine->setPayment_type($row_user['payment_type']); 
            $newInvoiceLine->setMemo($row_user['memo']); 
            $newInvoiceLine->setPayment_trans($row_user['payment_trans']); 
            $newInvoiceLine->setPayment_date($row_user['payment_date']); 
        
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
Page::menuPadetailed($typ, $invoices, $email, $type, $invoice_number, $customerSearch, $dateSearch, $salesOrderSearch, $count);
Page::footer2();
Page::endHead2();

 ?>