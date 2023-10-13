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

$query_user = "select * from inventory order by product ASC;";
$result_User = mysqli_query($conection,$query_user);
while($row_user = mysqli_fetch_assoc($result_User))
{ $count = $count +1;} 

$query_user = "select * from inventory order by product ASC limit 50;";
$result_User = mysqli_query($conection,$query_user);
while($row_user = mysqli_fetch_assoc($result_User))
{
    $newInvoiceLine = new Inventory(); 
    $newInvoiceLine->setSku($row_user['sku']);
    $newInvoiceLine->setProduct($row_user['product']);
    $newInvoiceLine->setVendor($row_user['vendor']);
    $newInvoiceLine->setSales_price($row_user['sales_price']);
    $newInvoiceLine->setCost($row_user['cost']);
    $newInvoiceLine->setQty_onhand($row_user['qty_onhand']);
    
    $invoices[] = $newInvoiceLine;
} 

 //Cheching for POST FILTERS
if(isset($_POST["search"]))
{
    $invoices = array();
    $count =0;

    //DO THE OTHER FILTERS HERE!!!!
    if(isset($_POST["invoiceNumberSearch"]) && isset($_POST["customerSearch"]) && isset($_POST["salesOrderSearch"]))
    {
        $invoice_number = strtoupper($_POST['invoiceNumberSearch']);
        $customerSearch = strtoupper($_POST['customerSearch']);
        $salesOrderSearch = strtoupper($_POST['salesOrderSearch']);

        $query_user = "select * from inventory where sku like '%$invoice_number%' AND vendor like '%$customerSearch%' AND product like '%$salesOrderSearch%';";
        $result_User = mysqli_query($conection,$query_user);
        while($row_user = mysqli_fetch_assoc($result_User))
        { $count = $count+1; }

        $query_user = "select * from inventory where sku like '%$invoice_number%' AND vendor like '%$customerSearch%' AND product like '%$salesOrderSearch%' limit 50;";
        $result_User = mysqli_query($conection,$query_user);
        while($row_user = mysqli_fetch_assoc($result_User))
        { 
            $newInvoiceLine = new Inventory(); 
            $newInvoiceLine->setSku($row_user['sku']);
            $newInvoiceLine->setProduct($row_user['product']);
            $newInvoiceLine->setVendor($row_user['vendor']);
            $newInvoiceLine->setSales_price($row_user['sales_price']);
            $newInvoiceLine->setCost($row_user['cost']);
            $newInvoiceLine->setQty_onhand($row_user['qty_onhand']);
            
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
Page::menuINdetailed($typ, $invoices, $email, $type, $invoice_number, $customerSearch, $dateSearch, $salesOrderSearch, $count);
Page::footer();
Page::endHead();

 ?>