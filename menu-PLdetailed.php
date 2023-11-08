<?php
/**
 * Including external classes
 */
require_once('Page.class.php');
require_once('Class/PurchasesLine.class.php');
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

if(isset($_GET["item"]))
{
    $item = $_GET["item"];
    /**
    * Call to the database to get all pruchases line
    * 
    */ 

    $query_user = "select * from purchase_line WHERE sku = '$item' order by created_on DESC;";
    $result_User = mysqli_query($conection,$query_user);
    while($row_user = mysqli_fetch_assoc($result_User))
    { $count = $count +1;} 

    $query_user = "select * from purchase_line WHERE sku = '$item' order by created_on DESC limit 100;";
    $result_User = mysqli_query($conection,$query_user);
    while($row_user = mysqli_fetch_assoc($result_User))
    {
        $newInvoiceLine = new PurchasesLine(); 
        $newInvoiceLine->setSku($row_user['sku']);
        $newInvoiceLine->setProduct($row_user['product']);
        $newInvoiceLine->setQuantity($row_user['quantity']);
        $newInvoiceLine->setUnit_cost($row_user['unit_cost']); 
        $newInvoiceLine->setTaxes($row_user['taxes']);  
        $newInvoiceLine->setQuantity($row_user['quantity']); 
        $newInvoiceLine->setSubtotal($row_user['subtotal']); 
        $newInvoiceLine->setPurchase_number($row_user['purchase_number']); 
        $newInvoiceLine->setVendor($row_user['vendor']); 
        $newInvoiceLine->setTotal($row_user['total']); 
        $newInvoiceLine->setReceive_qty($row_user['received_qty']); 
        $newInvoiceLine->setCreated_on($row_user['created_on']);
        $invoices[] = $newInvoiceLine;
    } 

    $salesOrderSearch = $item;
}
else
{
    $item = "";
    /**
    * Call to the database to get all invoices
    * 
    */ 

    $query_user = "select * from purchase_line order by created_on DESC;";
    $result_User = mysqli_query($conection,$query_user);
    while($row_user = mysqli_fetch_assoc($result_User))
    { $count = $count +1;} 

    $query_user = "select * from purchase_line order by created_on DESC limit 50;";
    $result_User = mysqli_query($conection,$query_user);
    while($row_user = mysqli_fetch_assoc($result_User))
    {
        $newInvoiceLine = new PurchasesLine(); 
        $newInvoiceLine->setSku($row_user['sku']);
        $newInvoiceLine->setProduct($row_user['product']);
        $newInvoiceLine->setQuantity($row_user['quantity']);
        $newInvoiceLine->setUnit_cost($row_user['unit_cost']); 
        $newInvoiceLine->setTaxes($row_user['taxes']);  
        $newInvoiceLine->setQuantity($row_user['quantity']); 
        $newInvoiceLine->setSubtotal($row_user['subtotal']); 
        $newInvoiceLine->setPurchase_number($row_user['purchase_number']); 
        $newInvoiceLine->setVendor($row_user['vendor']); 
        $newInvoiceLine->setTotal($row_user['total']); 
        $newInvoiceLine->setReceive_qty($row_user['received_qty']); 
        $newInvoiceLine->setCreated_on($row_user['created_on']);
        $invoices[] = $newInvoiceLine;
    } 
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

        $query_user = "select * from purchase_line where purchase_number like '%$invoice_number%' AND vendor like '%$customerSearch%' AND created_on like '%$dateSearch%' AND sku like '%$salesOrderSearch%';";
        $result_User = mysqli_query($conection,$query_user);
        while($row_user = mysqli_fetch_assoc($result_User))
        { $count = $count+1; }

        $query_user = "select * from purchase_line where purchase_number like '%$invoice_number%' AND vendor like '%$customerSearch%' AND created_on like '%$dateSearch%' AND sku like '%$salesOrderSearch%' order by created_on DESC limit 100;";
        $result_User = mysqli_query($conection,$query_user);
        while($row_user = mysqli_fetch_assoc($result_User))
        { 
            $newInvoiceLine = new PurchasesLine(); 
            $newInvoiceLine->setSku($row_user['sku']);
            $newInvoiceLine->setProduct($row_user['product']);
            $newInvoiceLine->setQuantity($row_user['quantity']);
            $newInvoiceLine->setUnit_cost($row_user['unit_cost']); 
            $newInvoiceLine->setTaxes($row_user['taxes']);  
            $newInvoiceLine->setQuantity($row_user['quantity']); 
            $newInvoiceLine->setSubtotal($row_user['subtotal']); 
            $newInvoiceLine->setPurchase_number($row_user['purchase_number']); 
            $newInvoiceLine->setVendor($row_user['vendor']); 
            $newInvoiceLine->setTotal($row_user['total']); 
            $newInvoiceLine->setReceive_qty($row_user['received_qty']); 
            $newInvoiceLine->setCreated_on($row_user['created_on']);
            $invoices[] = $newInvoiceLine;
        }
    }
    
}

 //Cheching for POST FILTERS
 if(isset($_POST["clear"]))
 {
    $invoice_number = "";
    $customerSearch = "";
    $dateSearch = "";
    $salesOrderSearch="";
    $item = "";
    header("location:menu-PLdetailed.php?user=$email&typ=$typ&type=$type");
 }

//Website Structure
Page::head2();
Page::header2($email, $type);
Page::menuPLdetailed($typ, $invoices, $email, $type, $invoice_number, $customerSearch, $dateSearch, $salesOrderSearch, $count);
Page::footer2();
Page::endHead2();

 ?>