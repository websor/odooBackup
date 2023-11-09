<?php
/**
 * Including external classes
 */
require_once('Page.class.php');
require_once('Class/CreditNotes.class.php');
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

  // PAGINATION LOGIC //
  if(isset($_GET["page"]))
  {
     $page = $_GET["page"];
  }
  else{
     header("location:menu-CNdetailed.php?typ=$typ&user=$email&type=$type&page=1");
  }
  // PAGINATION LOGIC //


$invoice_number="";
$salesOrderSearch="";
$dateSearch="";
$customerSearch="";
$totalLines = 50;
 
$invoices = array();
$count = 0;

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

if(isset($_GET["dateSearch"]))
{
    $pagDate = $_GET["dateSearch"];
}
else
{
    $pagDate = "";
}


if($pagVendor == "" && $pagProduct == "" && $pagSku == "" && $pagDate == "")
{
        /**
    * Call to the database to get all invoices
    * 
    */
    $query_user = "select * from creditnotes order by invoice_date DESC;";
    $result_User = mysqli_query($conection,$query_user);
    while($row_user = mysqli_fetch_assoc($result_User))
    { 
        $count = $count +1;
    }

    // PAGINATION LOGIC //
    $totalPages1 = $count / $totalLines;
    $modulePages = $count % $totalLines; // Checking if the number is decimal or not

    if($count < 50)
    {
        $totalPages = round($totalPages1);
    }
    else
    {
        if(is_float($totalPages1))
        {
            $totalPages = ceil($totalPages1);
        }else{
            $totalPages = floor($totalPages1);
        }
    }
    $init = ($page - 1) * $totalLines;
    // PAGINATION LOGIC //

    $query_user = "select * from creditnotes order by invoice_date DESC limit $init,50;";
    $result_User = mysqli_query($conection,$query_user);
    while($row_user = mysqli_fetch_assoc($result_User))
    { 
        $newInvoice = new CreditNotes();
        $newInvoice->setCreditnote_number($row_user['creditnote_number']);
        $newInvoice->setCustomer($row_user['customer']);
        $newInvoice->setAddress($row_user['address']);
        $newInvoice->setInvoice_date($row_user['invoice_date']);
        $newInvoice->setSales_person($row_user['sales_person']);
        $newInvoice->setDue_date($row_user['due_date']); 
        $newInvoice->setSource_document($row_user['source_document']);  
        $newInvoice->setUntaxed_amount($row_user['untaxed_amount']); 
        $newInvoice->setTax($row_user['tax']); 
        $newInvoice->setTotal($row_user['total']); 
        $newInvoice->setAmount_due($row_user['amount_due']); 
        $newInvoice->setStatus($row_user['status']); 
        $newInvoice->setPayment_terms($row_user['payment_terms']); 
        $newInvoice->setGlobal_comments($row_user['global_comments']);
        $newInvoice->setInvoices_notes($row_user['invoices_notes']);  
        $newInvoice->setCustomer_po($row_user['customer_po']);
        $newInvoice->setWarehouse_note($row_user['warehouse_note']);  
        $newInvoice->setCustomerNotes($row_user['customer_notes']);    

        $invoices[] = $newInvoice;
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

            $query_user = "select * from creditnotes where creditnote_number like '%$invoice_number%' AND customer like '%$customerSearch%' AND invoice_date like '%$dateSearch%' AND source_document like '%$salesOrderSearch%';";
            $result_User = mysqli_query($conection,$query_user);
            while($row_user = mysqli_fetch_assoc($result_User))
            {
                $count = $count +1;
            }

             // PAGINATION LOGIC //
             $totalPages1 = $count / $totalLines;
             $modulePages = $count % 2; // Checking if the number is decimal or not
            
 
             if($count < 50)
             {
                 $totalPages = round($totalPages1);
             }
             else
             {
                 if(is_float($totalPages1))
                 {
                     $totalPages = ceil($totalPages1);
                 }else{
                     $totalPages = floor($totalPages1);
                 }
             }
 
             $page = 1;
             $init = ($page - 1) * $totalLines;
             // PAGINATION LOGIC //

            $query_user = "select * from creditnotes where creditnote_number like '%$invoice_number%' AND customer like '%$customerSearch%' AND invoice_date like '%$dateSearch%' AND source_document like '%$salesOrderSearch%' order by invoice_date DESC limit $init,50;";
            $result_User = mysqli_query($conection,$query_user);
            while($row_user = mysqli_fetch_assoc($result_User))
            { 
                $newInvoice = new CreditNotes();
                $newInvoice->setCreditnote_number($row_user['creditnote_number']);
                $newInvoice->setCustomer($row_user['customer']);
                $newInvoice->setAddress($row_user['address']);
                $newInvoice->setInvoice_date($row_user['invoice_date']);
                $newInvoice->setSales_person($row_user['sales_person']);
                $newInvoice->setDue_date($row_user['due_date']); 
                $newInvoice->setSource_document($row_user['source_document']);  
                $newInvoice->setUntaxed_amount($row_user['untaxed_amount']); 
                $newInvoice->setTax($row_user['tax']); 
                $newInvoice->setTotal($row_user['total']); 
                $newInvoice->setAmount_due($row_user['amount_due']); 
                $newInvoice->setStatus($row_user['status']); 
                $newInvoice->setPayment_terms($row_user['payment_terms']); 
                $newInvoice->setGlobal_comments($row_user['global_comments']);
                $newInvoice->setInvoices_notes($row_user['invoices_notes']);  
                $newInvoice->setCustomer_po($row_user['customer_po']);
                $newInvoice->setWarehouse_note($row_user['warehouse_note']);  
                $newInvoice->setCustomerNotes($row_user['customer_notes']);    
            
                $invoices[] = $newInvoice;
            }
        }
        
    }
}
else
{
    $invoices = array();
        $count = 0;

        //DO THE OTHER FILTERS HERE!!!!
        if(isset($_POST["invoiceNumberSearch"]) && isset($_POST["customerSearch"]) && isset($_POST["invoiceDateSearch"]) && isset($_POST["salesOrderSearch"]))
        {
            $pagSku = strtoupper($_POST['invoiceNumberSearch']); //invoice_number
            $pagVendor = strtoupper($_POST['customerSearch']); //customerSearch
            $pagDate = $_POST['invoiceDateSearch'];// dateSearch
            $pagProduct = strtoupper($_POST['salesOrderSearch']);// salesOrderSearch
            $page = 1;
        }
            $query_user = "select * from creditnotes where creditnote_number like '%$pagSku%' AND customer like '%$pagVendor%' AND invoice_date like '%$pagDate%' AND source_document like '%$pagProduct%';";
            $result_User = mysqli_query($conection,$query_user);
            while($row_user = mysqli_fetch_assoc($result_User))
            {
                $count = $count +1;
            }

             // PAGINATION LOGIC //
             $totalPages1 = $count / $totalLines;
             $modulePages = $count % 2; // Checking if the number is decimal or not
            
 
             if($count < 50)
             {
                 $totalPages = round($totalPages1);
             }
             else
             {
                 if(is_float($totalPages1))
                 {
                     $totalPages = ceil($totalPages1);
                 }else{
                     $totalPages = floor($totalPages1);
                 }
             }
 
             $init = ($page - 1) * $totalLines;
             // PAGINATION LOGIC //

            $query_user = "select * from creditnotes where creditnote_number like '%$pagSku%' AND customer like '%$pagVendor%' AND invoice_date like '%$pagDate%' AND source_document like '%$pagProduct%' order by invoice_date DESC limit $init,50;";
            $result_User = mysqli_query($conection,$query_user);
            while($row_user = mysqli_fetch_assoc($result_User))
            { 
                $newInvoice = new CreditNotes();
                $newInvoice->setCreditnote_number($row_user['creditnote_number']);
                $newInvoice->setCustomer($row_user['customer']);
                $newInvoice->setAddress($row_user['address']);
                $newInvoice->setInvoice_date($row_user['invoice_date']);
                $newInvoice->setSales_person($row_user['sales_person']);
                $newInvoice->setDue_date($row_user['due_date']); 
                $newInvoice->setSource_document($row_user['source_document']);  
                $newInvoice->setUntaxed_amount($row_user['untaxed_amount']); 
                $newInvoice->setTax($row_user['tax']); 
                $newInvoice->setTotal($row_user['total']); 
                $newInvoice->setAmount_due($row_user['amount_due']); 
                $newInvoice->setStatus($row_user['status']); 
                $newInvoice->setPayment_terms($row_user['payment_terms']); 
                $newInvoice->setGlobal_comments($row_user['global_comments']);
                $newInvoice->setInvoices_notes($row_user['invoices_notes']);  
                $newInvoice->setCustomer_po($row_user['customer_po']);
                $newInvoice->setWarehouse_note($row_user['warehouse_note']);  
                $newInvoice->setCustomerNotes($row_user['customer_notes']);    
            
                $invoices[] = $newInvoice;
            }
            $customerSearch = $pagVendor;
            $salesOrderSearch = $pagProduct;
            $invoice_number = $pagSku;
            $dateSearch = $pagDate;
}

 //Cheching for POST FILTERS
 if(isset($_POST["clear"]))
 {
    $invoice_number = "";
    $customerSearch = "";
    $dateSearch = "";
    $salesOrderSearch="";
    $page = 1;
    header("location:menu-CNdetailed.php?typ=$typ&user=$email&type=$type&page=1");
 }

//Website Structure
Page::head2();
Page::header2($email, $type);
Page::menuCNdetailed($typ, $invoices, $email, $type, $invoice_number, $customerSearch, $dateSearch, $salesOrderSearch, $count, $init, $totalPages, $page);
Page::footer2();
Page::endHead2();

 ?>