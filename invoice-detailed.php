<?php
/**
 * Including external classes
 */
require_once('Page.class.php');
require_once('Class/Invoice.class.php');
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

 if(isset($_GET["inv"]))
 {
     $inv = $_GET["inv"];
 }
 else
 {
     $inv = "";
 }



 /**
* Call to the database to get the invoices
* 
*/ 
$newInvoice = new Invoice();

$query_user = "select * from invoices where invoice_number = '$inv';";
$result_User = mysqli_query($conection,$query_user);
while($row_user = mysqli_fetch_assoc($result_User))
{ 
    $newInvoice->setInvoiceNumber($row_user['invoice_number']);
    $newInvoice->setSalesOrder($row_user['sales_order']);
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
}

/**
* Call to the database to get all the invoices lines
* 
*/ 
$invoiceLines = array();
$query_user_line = "select * from invoice_line where invoice_number = '$inv';";
$result_User_line = mysqli_query($conection,$query_user_line);
while($row_user = mysqli_fetch_assoc($result_User_line))
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

    $invoiceLines[] = $newInvoiceLine;
} 

//Website Structure
Page::head2();
Page::header2($email, $type);
Page::invoiceDetailed($typ, $newInvoice, $invoiceLines, $email, $type, $inv);
Page::footer2();
Page::endHead2();

 ?>