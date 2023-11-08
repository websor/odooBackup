<?php
/**
 * Including external classes
 */
require_once('Page.class.php');
require_once('Class/Customer.class.php');
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

// Variables for pagination
if(isset($_GET["vendorSearch"]))
{
    $pagVendor = $_GET["vendorSearch"];
}
else
{
    $pagVendor = "";
}

if(isset($_GET["productSearch"]))
{
    $pagProduct = $_GET["productSearch"];
}
else
{
    $pagProduct = "";
}

if(isset($_GET["skuSearch"]))
{
    $pagSku = $_GET["skuSearch"];
}
else
{
    $pagSku = "";
}

/**
* Call to the database to get all invoices
* 
*/ 

$query_user = "select * from customer order by customer ASC;";
$result_User = mysqli_query($conection,$query_user);
while($row_user = mysqli_fetch_assoc($result_User))
{ $count = $count +1;} 

$query_user = "select * from customer order by customer ASC limit 50;";
$result_User = mysqli_query($conection,$query_user);
while($row_user = mysqli_fetch_assoc($result_User))
{
    $newInvoiceLine = new Customer(); 
    $newInvoiceLine->setName($row_user['customer']);
    $newInvoiceLine->setState($row_user['state']);
    $newInvoiceLine->setCity($row_user['city']);
    $newInvoiceLine->setStreet($row_user['street']);
    $newInvoiceLine->setPostal_code($row_user['postal_code']);
    $newInvoiceLine->setPhone($row_user['phone']);
    $newInvoiceLine->setEmail($row_user['email']);
    $newInvoiceLine->setPrice_list($row_user['price_list']); 
    
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

        $query_user = "select * from customer where price_list like '%$invoice_number%' AND customer like '%$customerSearch%' AND state like '%$salesOrderSearch%';";
        $result_User = mysqli_query($conection,$query_user);
        while($row_user = mysqli_fetch_assoc($result_User))
        { $count = $count+1; }

        $query_user = "select * from customer where price_list like '%$invoice_number%' AND customer like '%$customerSearch%' AND state like '%$salesOrderSearch%' limit 50;";
        $result_User = mysqli_query($conection,$query_user);
        while($row_user = mysqli_fetch_assoc($result_User))
        { 
            $newInvoiceLine = new Customer(); 
            $newInvoiceLine->setName($row_user['customer']);
            $newInvoiceLine->setState($row_user['state']);
            $newInvoiceLine->setStreet($row_user['street']);
            $newInvoiceLine->setCity($row_user['city']);
            $newInvoiceLine->setPostal_code($row_user['postal_code']);
            $newInvoiceLine->setPhone($row_user['phone']);
            $newInvoiceLine->setEmail($row_user['email']);
            $newInvoiceLine->setPrice_list($row_user['price_list']); 
            
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
Page::menuCLIdetailed($typ, $invoices, $email, $type, $invoice_number, $customerSearch, $dateSearch, $salesOrderSearch, $count);
Page::footer2();
Page::endHead2();

 ?>