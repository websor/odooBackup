<?php
/**
 * Including external classes
 */
require_once('Page.class.php');
require_once('Class/Invoice.class.php');
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

$invoices = array();
/**
* Call to the database to get all invoices
* 
*/ 
$query_user = "select * from invoices;";
$result_User = mysqli_query($conection,$query_user);
while($row_user = mysqli_fetch_assoc($result_User))
{ 
    $newInvoice = new Invoice();
    $newInvoice->setInvoiceNumber($row_user['invoice_number']);
    $newInvoice->setSalesOrder($row_user['sales_order_#']);
    $newInvoice->setCustomer($row_user['customer']);
    $newInvoice->setDeliveryAddress($row_user['delivery_address']);
    $newInvoice->setPaymentTerms($row_user['payment_terms']);
    $newInvoice->setInvoiceDate($row_user['invoice_date']); 
    $newInvoice->setDueDate($row_user['due_date']);  
    $newInvoice->setSalesPerson($row_user['sales_person']); 
    $newInvoice->setSalesTeam($row_user['sales_team']); 
    $newInvoice->setGlobalComments($row_user['global_comments']); 
    $newInvoice->setInvoiceNotes($row_user['invoice_notes']); 
    $newInvoice->setCustomerPo($row_user['customer_po']); 
    $newInvoice->setCurrancy($row_user['currancy']); 
    $newInvoice->setUntaxedAmount($row_user['untaxed_amount']);
    $newInvoice->setTax($row_user['tax']);  
    $newInvoice->setTotal($row_user['total']);
    $newInvoice->setAmountDue($row_user['amount_due']);  
    $newInvoice->setWarehouseNotes($row_user['warehouseNotes']);  
    $newInvoice->setCustomerNotes($row_user['customerNotes']);    

    $invoices[] = $newInvoice;
} 

 //Cheching for POST FILTERS
if(isset($_POST["search"]))
{
    $invoices = array();

    //DO THE OTHER FILTERS HERE!!!!
    
    $invoice_number = $_POST['invoiceNumberSearch'];

    $query_user = "select * from invoices where invoice_number like '%$invoice_number%';";
    $result_User = mysqli_query($conection,$query_user);
    while($row_user = mysqli_fetch_assoc($result_User))
    { 
        $newInvoice = new Invoice();
        $newInvoice->setInvoiceNumber($row_user['invoice_number']);
        $newInvoice->setSalesOrder($row_user['sales_order_#']);
        $newInvoice->setCustomer($row_user['customer']);
        $newInvoice->setDeliveryAddress($row_user['delivery_address']);
        $newInvoice->setPaymentTerms($row_user['payment_terms']);
        $newInvoice->setInvoiceDate($row_user['invoice_date']); 
        $newInvoice->setDueDate($row_user['due_date']);  
        $newInvoice->setSalesPerson($row_user['sales_person']); 
        $newInvoice->setSalesTeam($row_user['sales_team']); 
        $newInvoice->setGlobalComments($row_user['global_comments']); 
        $newInvoice->setInvoiceNotes($row_user['invoice_notes']); 
        $newInvoice->setCustomerPo($row_user['customer_po']); 
        $newInvoice->setCurrancy($row_user['currancy']); 
        $newInvoice->setUntaxedAmount($row_user['untaxed_amount']);
        $newInvoice->setTax($row_user['tax']);  
        $newInvoice->setTotal($row_user['total']);
        $newInvoice->setAmountDue($row_user['amount_due']);  
        $newInvoice->setWarehouseNotes($row_user['warehouseNotes']);  
        $newInvoice->setCustomerNotes($row_user['customerNotes']);    

        $invoices[] = $newInvoice;
    } 
}

 //Cheching for POST FILTERS
 if(isset($_POST["Clear"]))
 {
    $invoice_number = "";
 }

//Website Structure
Page::head();
Page::header($email, $type);
Page::menuDetailed($typ, $invoices, $email, $type, $invoice_number);
Page::footer();
Page::endHead();

 ?>