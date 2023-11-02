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

 if(isset($_GET["inv"]))
 {
     $inv = $_GET["inv"];
 }
 else
 {
     $inv = "";
 }


$invoice_number="";
$salesOrderSearch="";
$dateSearch="";
$customerSearch="";
$count = 0;
 
if($inv == "")
{
    $invoices = array();
    /**
    * Call to the database to get all invoices
    * 
    */
    $query_user = "select * from invoices";
    $result_User = mysqli_query($conection,$query_user);
    while($row_user = mysqli_fetch_assoc($result_User))
    { 
        $count = $count + 1;
    }

    $query_user = "select * from invoices  order by invoice_date DESC limit  50;";
    $result_User = mysqli_query($conection,$query_user);
    while($row_user = mysqli_fetch_assoc($result_User))
    { 
        $newInvoice = new Invoice();
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

        $invoices[] = $newInvoice;
    } 
}
else{
    $invoices = array();
    /**
    * Call to the database to get all invoices
    * 
    */
    $query_user = "select * from invoices where customer = '$inv' AND amount_due != ''";
    $result_User = mysqli_query($conection,$query_user);
    while($row_user = mysqli_fetch_assoc($result_User))
    { 
        $count = $count + 1;
    }

    $query_user = "select * from invoices where customer = '$inv' AND amount_due != '' limit 50;";
    $result_User = mysqli_query($conection,$query_user);
    while($row_user = mysqli_fetch_assoc($result_User))
    { 
        $newInvoice = new Invoice();
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

        $invoices[] = $newInvoice;
    } 
}


 //Cheching for POST FILTERS
if(isset($_POST["search"]))
{
    $invoices = array();
    $count = 0;

    //DO THE OTHER FILTERS HERE!!!!
    if(isset($_POST["invoiceNumberSearch"]) && isset($_POST["customerSearch"]) && isset($_POST["invoiceDateSearch"]) && isset($_POST["salesOrderSearch"]))
    {
        $invoice_number = strtoupper($_POST['invoiceNumberSearch']);
        $customerSearch = strtoupper($_POST['customerSearch']);
        $dateSearch = $_POST['invoiceDateSearch'];
        $salesOrderSearch = strtoupper($_POST['salesOrderSearch']);

        $query_user = "select * from invoices where invoice_number like '%$invoice_number%' AND customer like '%$customerSearch%' AND invoice_date like '%$dateSearch%' AND sales_order like '%$salesOrderSearch%';";
        $result_User = mysqli_query($conection,$query_user);
        while($row_user = mysqli_fetch_assoc($result_User))
        { 
            $count = $count +1;
        }

        $query_user = "select * from invoices where invoice_number like '%$invoice_number%' AND customer like '%$customerSearch%' AND invoice_date like '%$dateSearch%' AND sales_order like '%$salesOrderSearch%' order by inovice_date DESC limit 50;";
        $result_User = mysqli_query($conection,$query_user);
        while($row_user = mysqli_fetch_assoc($result_User))
        { 
            $newInvoice = new Invoice();
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
Page::menuDetailed($typ, $invoices, $email, $type, $invoice_number, $customerSearch, $dateSearch, $salesOrderSearch, $count, $inv);
Page::footer();
Page::endHead();

 ?>