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
$dateSearch="";
$customerSearch="";
$salesOrderSearch="";

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

 //Cheching for POST FILTERS
if(isset($_POST["search"]))
{
    $invoices = array();

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
    else if(isset($_POST["invoiceNumberSearch"]) && isset($_POST["salesOrderSearch"]) && isset($_POST["invoiceDateSearch"]))
    {
        $invoice_number = $_POST['invoiceNumberSearch'];
        $dateSearch = $_POST['invoiceDateSearch'];
        $salesOrderSearch = $_POST['salesOrderSearch'];

        $query_user = "select * from invoices where invoice_number like '%$invoice_number%' AND invoice_date like '%$dateSearch%' AND sales_order like '%$salesOrderSearch%';";
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
    else if(isset($_POST["customerSearch"]) && isset($_POST["salesOrderSearch"]) && isset($_POST["invoiceDateSearch"]))
    {
        $customerSearch = $_POST['customerSearch'];
        $dateSearch = $_POST['invoiceDateSearch'];
        $salesOrderSearch = $_POST['salesOrderSearch'];

        $query_user = "select * from invoices where customer like '%$customerSearch%' AND invoice_date like '%$dateSearch%' AND sales_order like '%$salesOrderSearch%';";
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
    else if(isset($_POST["customerSearch"]) && isset($_POST["salesOrderSearch"]) && isset($_POST["invoiceNumberSearch"]))
    {
        $customerSearch = $_POST['customerSearch'];
        $invoice_number = $_POST['invoiceNumberSearch'];
        $salesOrderSearch = $_POST['salesOrderSearch'];

        $query_user = "select * from invoices where customer like '%$customerSearch%' AND invoice_number like '%$invoice_number%' AND sales_order like '%$salesOrderSearch%';";
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
    else if(isset($_POST["customerSearch"]) && isset($_POST["invoiceDateSearch"]) && isset($_POST["invoiceNumberSearch"]))
    {
        $customerSearch = $_POST['customerSearch'];
        $invoice_number = $_POST['invoiceNumberSearch'];
        $dateSearch = $_POST['invoiceDateSearch'];

        $query_user = "select * from invoices where customer like '%$customerSearch%' AND invoice_number like '%$invoice_number%' AND invoice_date like '%$dateSearch%';";
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
    else if(isset($_POST["invoiceNumberSearch"]) && isset($_POST["salesOrderSearch"]))
    {
        $invoice_number = $_POST['invoiceNumberSearch'];
        $salesOrderSearch = $_POST['salesOrderSearch'];

        $query_user = "select * from invoices where invoice_number like '%$invoice_number%' AND sales_order like '%$dateSearch%';";
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
    else if(isset($_POST["customerSearch"]) && isset($_POST["invoiceDateSearch"]))
    {
        $customerSearch = $_POST['customerSearch'];
        $dateSearch = $_POST['invoiceDateSearch'];

        $query_user = "select * from invoices where customer like '%$customerSearch%' AND invoice_date like '%$dateSearch%';";
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
    else if(isset($_POST["invoiceNumberSearch"]) && isset($_POST["invoiceDateSearch"]))
    {
        $invoice_number = $_POST['invoiceNumberSearch'];
        $dateSearch = $_POST['invoiceDateSearch'];

        $query_user = "select * from invoices where invoice_date like '%$dateSearch%' AND invoice_number like '%$invoice_number%';";
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
    else if(isset($_POST["invoiceNumberSearch"]) && isset($_POST["customerSearch"]))
    {
        $invoice_number = $_POST['invoiceNumberSearch'];
        $customerSearch = $_POST['customerSearch'];
        var_dump($invoice_number);
        var_dump($customerSearch);
        $query_user = "select * from invoices where invoice_number like '%$invoice_number%' AND customer like '%$customerSearch%';";
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
    else if(isset($_POST["salesOrderSearch"]) && isset($_POST["invoiceDateSearch"]))
    {

        $dateSearch = $_POST['invoiceDateSearch'];
        $salesOrderSearch = $_POST['salesOrderSearch'];

        $query_user = "select * from invoices where sales_order like '%$salesOrderSearch%' AND invoice_date like '%$dateSearch%';";
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
    else if(isset($_POST["salesOrderSearch"]) && isset($_POST["customerSearch"]))
    {

        $customerSearch = $_POST['customerSearch'];
        $salesOrderSearch = $_POST['salesOrderSearch'];

        $query_user = "select * from invoices where sales_order like '%$salesOrderSearch%' AND customer like '%$customerSearch%';";
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
    else if(isset($_POST["invoiceNumberSearch"]))
    {

        $invoice_number = $_POST['invoiceNumberSearch'];

        $query_user = "select * from invoices where invoice_number like '%$invoice_number%';";
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
    else if(isset($_POST["customerSearch"]))
    {
        $customerSearch = $_POST['customerSearch'];

        $query_use = "select * from invoices where customer like '%$customerSearch%';";
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
    else if(isset($_POST["invoiceDateSearch"]))
    {

        $dateSearch = $_POST['invoiceDateSearch'];


        $query_user = "select * from invoices where invoice_date like '%$dateSearch%';";
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
    else if(isset($_POST["salesOrderSearch"]))
    {

        $salesOrderSearch = $_POST['salesOrderSearch'];

        $query_user = "select * from invoices where sales_order like '%$salesOrderSearch%';";
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
Page::menuDetailed($typ, $invoices, $email, $type, $invoice_number, $customerSearch, $dateSearch, $salesOrderSearch);
Page::footer();
Page::endHead();

 ?>