<?php
/**
 * Including external classes
 */
require_once('Page.class.php');
require_once('Class/Inventory.class.php');
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
$newInvoiceLine = new Inventory();

$query_user = "select * from inventory where sku = '$inv';";
$result_User = mysqli_query($conection,$query_user);
while($row_user = mysqli_fetch_assoc($result_User))
{  
    $newInvoiceLine->setSku($row_user['sku']);
    $newInvoiceLine->setProduct($row_user['product']);
    $newInvoiceLine->setVendor($row_user['vendor']);
    $newInvoiceLine->setBarcode($row_user['barcode']);
    $newInvoiceLine->setSales_price($row_user['sales_price']);
    $newInvoiceLine->setCost($row_user['cost']);
    $newInvoiceLine->setCategory($row_user['category']);
    $newInvoiceLine->setType($row_user['type']);
    $newInvoiceLine->setQty_onhand($row_user['qty_onhand']);
    $newInvoiceLine->setCreated_on($row_user['created_on']);
    $newInvoiceLine->setCreated_by($row_user['created_by']);
    $newInvoiceLine->setQty_sold($row_user['qty_sold']);
    $newInvoiceLine->setCustomer_tax($row_user['customer_tax']);
    $newInvoiceLine->setWeb_description($row_user['web_description']);
}

//Website Structure
Page::head2();
Page::header2($email, $type);
Page::invoiceINDetailed($typ, $newInvoiceLine, $email, $type, $inv);
Page::footer2();
Page::endHead2();

 ?>