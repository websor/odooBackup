<?php
/**
 * Including external classes
 */
require_once('Page.class.php');
require_once('Class/InvoiceLine.class.php');
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

$query_user = "select * from invoice_line order by created_on DESC;";
$result_User = mysqli_query($conection,$query_user);
while($row_user = mysqli_fetch_assoc($result_User))
{ $count = $count +1;} 

$query_user = "select * from invoice_line order by created_on DESC limit 50;";
$result_User = mysqli_query($conection,$query_user);
while($row_user = mysqli_fetch_assoc($result_User))
{
    $newInvoiceLine = new InvoiceLine(); 
    $newInvoiceLine->setCreatedOn($row_user['created_on']);
    $newInvoiceLine->setInvoiceNumber($row_user['invoice_number']);
    $newInvoiceLine->setSalesOrder($row_user['salers_order']);
    $newInvoiceLine->setSku($row_user['sku']);
    $newInvoiceLine->setProduct($row_user['product']);
    $newInvoiceLine->setVendor($row_user['vendor']);
    $newInvoiceLine->setCustomer($row_user['customer']); 
    $newInvoiceLine->setQty_delivered($row_user['qty_delivered']);  
    $newInvoiceLine->setQuantity($row_user['quantity']); 
    $newInvoiceLine->setUntaxed_amount($row_user['untaxed_amount']); 
    $newInvoiceLine->setUnit_price($row_user['unit_price']); 
    $newInvoiceLine->setUnit_price_after($row_user['unit_price_after']); 
    $newInvoiceLine->setCost($row_user['cost']); 
    $newInvoiceLine->setTaxes($row_user['taxes']); 
    $newInvoiceLine->setNotes($row_user['notes']);
    $newInvoiceLine->setRma($row_user['rma_notes']);  
    $newInvoiceLine->setQuantity_bo($row_user['quantity_bo']);
    $newInvoiceLine->setSerial($row_user['serial_numbers']);  
    $invoices[] = $newInvoiceLine;
} 

 //Cheching for POST FILTERS
if(isset($_POST["search"]))
{
    $invoices = array();
    $count =0;

    //DO THE OTHER FILTERS HERE!!!!
    if(isset($_POST["invoiceNumberSearch"]) && isset($_POST["customerSearch"]) && isset($_POST["invoiceDateSearch"]) && isset($_POST["salesOrderSearch"]))
    {
        $invoice_number = strtoupper($_POST['invoiceNumberSearch']);
        $customerSearch = strtoupper($_POST['customerSearch']);
        $dateSearch = strtoupper($_POST['invoiceDateSearch']);
        $salesOrderSearch = strtoupper($_POST['salesOrderSearch']);

        $query_user = "select * from invoice_line where invoice_number like '%$invoice_number%' AND customer like '%$customerSearch%' AND serial_numbers like '%$dateSearch%' AND product like '%$salesOrderSearch%';";
        $result_User = mysqli_query($conection,$query_user);
        while($row_user = mysqli_fetch_assoc($result_User))
        { $count = $count+1; }

        $query_user = "select * from invoice_line where invoice_number like '%$invoice_number%' AND customer like '%$customerSearch%' AND serial_numbers like '%$dateSearch%' AND product like '%$salesOrderSearch%' limit 50;";
        $result_User = mysqli_query($conection,$query_user);
        while($row_user = mysqli_fetch_assoc($result_User))
        { 
            $newInvoiceLine = new InvoiceLine(); 
            $newInvoiceLine->setCreatedOn($row_user['created_on']);
            $newInvoiceLine->setInvoiceNumber($row_user['invoice_number']);
            $newInvoiceLine->setSalesOrder($row_user['salers_order']);
            $newInvoiceLine->setSku($row_user['sku']);
            $newInvoiceLine->setProduct($row_user['product']);
            $newInvoiceLine->setVendor($row_user['vendor']);
            $newInvoiceLine->setCustomer($row_user['customer']); 
            $newInvoiceLine->setQty_delivered($row_user['qty_delivered']);  
            $newInvoiceLine->setQuantity($row_user['quantity']); 
            $newInvoiceLine->setUntaxed_amount($row_user['untaxed_amount']); 
            $newInvoiceLine->setUnit_price($row_user['unit_price']); 
            $newInvoiceLine->setUnit_price_after($row_user['unit_price_after']); 
            $newInvoiceLine->setCost($row_user['cost']); 
            $newInvoiceLine->setTaxes($row_user['taxes']); 
            $newInvoiceLine->setNotes($row_user['notes']);
            $newInvoiceLine->setRma($row_user['rma_notes']);  
            $newInvoiceLine->setQuantity_bo($row_user['quantity_bo']);
            $newInvoiceLine->setSerial($row_user['serial_numbers']);  
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
Page::head();
Page::header($email, $type);
Page::menuILdetailed($typ, $invoices, $email, $type, $invoice_number, $customerSearch, $dateSearch, $salesOrderSearch, $count);
Page::footer();
Page::endHead();

 ?>