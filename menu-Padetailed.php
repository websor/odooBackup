<?php
/**
 * Including external classes
 */
require_once('Page.class.php');
require_once('Class/Payment.class.php');
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
    header("location:menu-Padetailed.php?typ=$typ&user=$email&type=$type&page=1");
 }
 // PAGINATION LOGIC //

$invoice_number="";
$salesOrderSearch="";
$dateSearch="";
$customerSearch="";
$count = 0;
$totalLines = 50;
 
$invoices = array();

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

if($pagVendor == "" && $pagProduct == "" && $pagSku == "")
{


        /**
    * Call to the database to get all invoices
    * 
    */ 

    $query_user = "select * from payments order by payment_date DESC;";
    $result_User = mysqli_query($conection,$query_user);
    while($row_user = mysqli_fetch_assoc($result_User))
    {
        $count = $count + 1;
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

    $query_user = "select * from payments order by payment_date DESC limit $init,50;";
    $result_User = mysqli_query($conection,$query_user);
    while($row_user = mysqli_fetch_assoc($result_User))
    {
        $newInvoiceLine = new Payment(); 
        $newInvoiceLine->setPayment_number($row_user['payment_number']);
        $newInvoiceLine->setCustomer_ref($row_user['customer_ref']);
        $newInvoiceLine->setEmployee($row_user['employee']);
        $newInvoiceLine->setPayment_journal($row_user['payment_journal']);
        $newInvoiceLine->setCustomer($row_user['customer']);
        $newInvoiceLine->setAmount($row_user['amount']);
        $newInvoiceLine->setCustomer($row_user['customer']); 
        $newInvoiceLine->setStatus($row_user['status']);  
        $newInvoiceLine->setPayment_type($row_user['payment_type']); 
        $newInvoiceLine->setMemo($row_user['memo']); 
        $newInvoiceLine->setPayment_trans($row_user['payment_trans']); 
        $newInvoiceLine->setPayment_date($row_user['payment_date']); 

        $invoices[] = $newInvoiceLine;
    } 



    //Cheching for POST FILTERS
    if(isset($_POST["search"]))
    {
        $count =0;
        $invoices = array();

        //DO THE OTHER FILTERS HERE!!!!
        if(isset($_POST["invoiceNumberSearch"]) && isset($_POST["customerSearch"]) && isset($_POST["invoiceDateSearch"]))
        {
            $invoice_number = strtoupper($_POST['invoiceNumberSearch']);
            $customerSearch = strtoupper($_POST['customerSearch']);
            $dateSearch = strtoupper($_POST['invoiceDateSearch']);
         
            $query_user = "select * from payments where payment_number like '%$invoice_number%' AND customer like '%$customerSearch%' AND payment_date like '%$dateSearch%';";
            $result_User = mysqli_query($conection,$query_user);
            while($row_user = mysqli_fetch_assoc($result_User))
            { $count = $count + 1; }

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

            $query_user = "select * from payments where payment_number like '%$invoice_number%' AND customer like '%$customerSearch%' AND payment_date like '%$dateSearch%' order by payment_date DESC  limit $init,50;";
            $result_User = mysqli_query($conection,$query_user);
            while($row_user = mysqli_fetch_assoc($result_User))
            { 
                $newInvoiceLine = new Payment(); 
                $newInvoiceLine->setPayment_number($row_user['payment_number']);
                $newInvoiceLine->setCustomer_ref($row_user['customer_ref']);
                $newInvoiceLine->setEmployee($row_user['employee']);
                $newInvoiceLine->setPayment_journal($row_user['payment_journal']);
                $newInvoiceLine->setCustomer($row_user['customer']);
                $newInvoiceLine->setAmount($row_user['amount']);
                $newInvoiceLine->setCustomer($row_user['customer']); 
                $newInvoiceLine->setStatus($row_user['status']);  
                $newInvoiceLine->setPayment_type($row_user['payment_type']); 
                $newInvoiceLine->setMemo($row_user['memo']); 
                $newInvoiceLine->setPayment_trans($row_user['payment_trans']); 
                $newInvoiceLine->setPayment_date($row_user['payment_date']); 
            
                $invoices[] = $newInvoiceLine;
            }

        }   
    }
}
else{
     //Cheching for POST FILTERS
         $count =0;
         $invoices = array();
 
         //DO THE OTHER FILTERS HERE!!!!
         if(isset($_POST["invoiceNumberSearch"]) && isset($_POST["customerSearch"]) && isset($_POST["invoiceDateSearch"]))
         {
            $pagSku = strtoupper($_POST['invoiceNumberSearch']);
            $pagVendor = strtoupper($_POST['customerSearch']);
            $pagProduct = strtoupper($_POST['invoiceDateSearch']);
            $page = 1;
         }
           
             $query_user = "select * from payments where payment_number like '%$pagSku%' AND customer like '%$pagVendor%' AND payment_date like '%$pagProduct%';";
             $result_User = mysqli_query($conection,$query_user);
             while($row_user = mysqli_fetch_assoc($result_User))
             { $count = $count + 1; }
 
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
 
             $query_user = "select * from payments where payment_number like '%$pagSku%' AND customer like '%$pagVendor%' AND payment_date like '%$pagProduct%' order by payment_date DESC  limit $init,50;";
             $result_User = mysqli_query($conection,$query_user);
             while($row_user = mysqli_fetch_assoc($result_User))
             { 
                 $newInvoiceLine = new Payment(); 
                 $newInvoiceLine->setPayment_number($row_user['payment_number']);
                 $newInvoiceLine->setCustomer_ref($row_user['customer_ref']);
                 $newInvoiceLine->setEmployee($row_user['employee']);
                 $newInvoiceLine->setPayment_journal($row_user['payment_journal']);
                 $newInvoiceLine->setCustomer($row_user['customer']);
                 $newInvoiceLine->setAmount($row_user['amount']);
                 $newInvoiceLine->setCustomer($row_user['customer']); 
                 $newInvoiceLine->setStatus($row_user['status']);  
                 $newInvoiceLine->setPayment_type($row_user['payment_type']); 
                 $newInvoiceLine->setMemo($row_user['memo']); 
                 $newInvoiceLine->setPayment_trans($row_user['payment_trans']); 
                 $newInvoiceLine->setPayment_date($row_user['payment_date']); 
             
                 $invoices[] = $newInvoiceLine;
             }

             $customerSearch = $pagVendor;
             $dateSearch = $pagProduct;
             $invoice_number = $pagSku;
}


 //Cheching for POST FILTERS
 if(isset($_POST["clear"]))
 {
    $invoice_number = "";
    $customerSearch = "";
    $dateSearch = "";
    $salesOrderSearch="";
    $page = 1;
    header("location:menu-Padetailed.php?typ=$typ&user=$email&type=$type&page=1");
 }

//Website Structure
Page::head2();
Page::header2($email, $type);
Page::menuPadetailed($typ, $invoices, $email, $type, $invoice_number, $customerSearch, $dateSearch, $salesOrderSearch, $count, $init, $totalPages, $page);
Page::footer2();
Page::endHead2();

 ?>