<?php
/**
 * Including external classes
 */
require_once('Page.class.php');
require_once('Class/Purchases.class.php');
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
$count = 0;
/**
* Call to the database to get all invoices
* 
*/
$query_user = "select * from purchases order by order_date DESC;";
$result_User = mysqli_query($conection,$query_user);
while($row_user = mysqli_fetch_assoc($result_User))
{ $count = $count +1; }

$query_user = "select * from purchases order by order_date DESC limit 50;";
$result_User = mysqli_query($conection,$query_user);
while($row_user = mysqli_fetch_assoc($result_User))
{ 
    $newInvoice = new Purchases();
    $newInvoice->setPurchase_number($row_user['purchase_number']);
    $newInvoice->setOrder_date($row_user['order_date']);
    $newInvoice->setVendor($row_user['vendor']);
    $newInvoice->setSchedule_date($row_user['schedule_date']);
    $newInvoice->setSales_person($row_user['sales_person']);
    $newInvoice->setSource_document($row_user['source_document']); 
    $newInvoice->setUntaxed_amount($row_user['untaxed_amount']);  
    $newInvoice->setTotal($row_user['total']); 
    $newInvoice->setStellar_status($row_user['stellar_status']); 
    $newInvoice->setStatus($row_user['status']); 
    $newInvoice->setCurrancy($row_user['currancy']); 
    $newInvoice->setVendor_reference($row_user['vendor_reference']); 
    $newInvoice->setDeliver_to($row_user['deliver_to']); 
    $newInvoice->setBroker($row_user['broker']);
    $newInvoice->setInvoice_number($row_user['invoice_number']);  
    $newInvoice->setSales_number($row_user['sales_number']);
    $newInvoice->setBill_reference($row_user['bill_reference']);  
    $newInvoice->setComments($row_user['comments']);
    $newInvoice->setTerms($row_user['terms']);  
    $newInvoice->setTax($row_user['tax']);    

    $invoices[] = $newInvoice;
} 

 //Cheching for POST FILTERS
if(isset($_POST["search"]))
{
    $invoices = array();
    $count =0;

    //DO THE OTHER FILTERS HERE!!!!
    if(isset($_POST["invoiceNumberSearch"]) && isset($_POST["VendorSearch"]) && isset($_POST["invoiceDateSearch"]))
    {
        $invoice_number = strtoupper($_POST['invoiceNumberSearch']);
        $customerSearch = strtoupper($_POST['VendorSearch']);
        $dateSearch = $_POST['invoiceDateSearch'];
        $salesOrderSearch ="";
        
        $query_user = "select * from purchases where purchase_number like '%$invoice_number%' AND vendor like '%$customerSearch%' AND order_date like '%$dateSearch%';";
        $result_User = mysqli_query($conection,$query_user);
        while($row_user = mysqli_fetch_assoc($result_User))
        { $count = $count + 1; }

        $query_user = "select * from purchases where purchase_number like '%$invoice_number%' AND vendor like '%$customerSearch%' AND order_date like '%$dateSearch%' limit 50;";
        $result_User = mysqli_query($conection,$query_user);
        while($row_user = mysqli_fetch_assoc($result_User))
        { 
            $newInvoice = new Purchases();
            $newInvoice->setPurchase_number($row_user['purchase_number']);
            $newInvoice->setOrder_date($row_user['order_date']);
            $newInvoice->setVendor($row_user['vendor']);
            $newInvoice->setSchedule_date($row_user['schedule_date']);
            $newInvoice->setSales_person($row_user['sales_person']);
            $newInvoice->setSource_document($row_user['source_document']); 
            $newInvoice->setUntaxed_amount($row_user['untaxed_amount']);  
            $newInvoice->setTotal($row_user['total']); 
            $newInvoice->setStellar_status($row_user['stellar_status']); 
            $newInvoice->setStatus($row_user['status']); 
            $newInvoice->setCurrancy($row_user['currancy']); 
            $newInvoice->setVendor_reference($row_user['vendor_reference']); 
            $newInvoice->setDeliver_to($row_user['deliver_to']); 
            $newInvoice->setBroker($row_user['broker']);
            $newInvoice->setInvoice_number($row_user['invoice_number']);  
            $newInvoice->setSales_number($row_user['sales_number']);
            $newInvoice->setBill_reference($row_user['bill_reference']);  
            $newInvoice->setComments($row_user['comments']);
            $newInvoice->setTerms($row_user['terms']);  
            $newInvoice->setTax($row_user['tax']);    

            $invoices[] = $newInvoice;
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
Page::head();
Page::header($email, $type);
Page::menuPdetailed($typ, $invoices, $email, $type, $invoice_number, $customerSearch, $dateSearch, $salesOrderSearch, $count);
Page::footer();
Page::endHead();

 ?>