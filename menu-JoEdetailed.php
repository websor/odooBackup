<?php
/**
 * Including external classes
 */
require_once('Page.class.php');
require_once('Class/Journal_Entries.class.php');
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
     header("location:menu-JoEdetailed.php?typ=$typ&user=$email&type=$type&page=1");
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

    $query_user = "select * from journal_entries order by created_on DESC;";
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

    $query_user = "select * from journal_entries order by created_on DESC limit $init,50;";
    $result_User = mysqli_query($conection,$query_user);
    while($row_user = mysqli_fetch_assoc($result_User))
    {
        $newInvoiceLine = new Journal_Entries(); 
        $newInvoiceLine->setCreated_on($row_user['created_on']);
        $newInvoiceLine->setDate($row_user['date']);
        $newInvoiceLine->setNumber($row_user['number']);
        $newInvoiceLine->setCustomer($row_user['customer']);
        $newInvoiceLine->setReference($row_user['reference']);
        $newInvoiceLine->setJournal($row_user['journal']);
        $newInvoiceLine->setStatus($row_user['status']); 
        $newInvoiceLine->setAmount($row_user['amount']);  

        $invoices[] = $newInvoiceLine;
    } 


    //Cheching for POST FILTERS
    if(isset($_POST["search"]))
    {
        $count =0;
        $invoices = array();

        //DO THE OTHER FILTERS HERE!!!!
        if(isset($_POST["invoiceNumberSearch"]) && isset($_POST["VendorSearch"]) && isset($_POST["invoiceDateSearch"]) && isset($_POST["salesOrderSearch"]))
        {
            $invoice_number = strtoupper($_POST['invoiceNumberSearch']);
            $customerSearch = strtoupper($_POST['VendorSearch']);
            $dateSearch = strtoupper($_POST['invoiceDateSearch']);
            $salesOrderSearch = strtoupper($_POST['salesOrderSearch']);
            //var_dump($invoice_number);
            //var_dump($customerSearch);
            //var_dump($dateSearch);
            //var_dump($salesOrderSearch);
            $query_user = "select * from journal_entries where number like '%$invoice_number%' AND customer like '%$customerSearch%' AND date like '%$dateSearch%' AND reference like '%$salesOrderSearch%' ;";
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

            $query_user = "select * from journal_entries where number like '%$invoice_number%' AND customer like '%$customerSearch%' AND date like '%$dateSearch%' AND reference like '%$salesOrderSearch%' order by created_on DESC limit $init,50;";
            $result_User = mysqli_query($conection,$query_user);
            while($row_user = mysqli_fetch_assoc($result_User))
            { 
                $newInvoiceLine = new Journal_Entries(); 
                $newInvoiceLine->setCreated_on($row_user['created_on']);
                $newInvoiceLine->setDate($row_user['date']);
                $newInvoiceLine->setNumber($row_user['number']);
                $newInvoiceLine->setCustomer($row_user['customer']);
                $newInvoiceLine->setReference($row_user['reference']);
                $newInvoiceLine->setJournal($row_user['journal']);
                $newInvoiceLine->setStatus($row_user['status']); 
                $newInvoiceLine->setAmount($row_user['amount']);  

                $invoices[] = $newInvoiceLine;
            }
        }
        
    }

}
else
{

           $count =0;
           $invoices = array();
   
           //DO THE OTHER FILTERS HERE!!!!
           if(isset($_POST["invoiceNumberSearch"]) && isset($_POST["VendorSearch"]) && isset($_POST["invoiceDateSearch"]) && isset($_POST["salesOrderSearch"]))
           {
               $pagSku = strtoupper($_POST['invoiceNumberSearch']);
               $pagVendor = strtoupper($_POST['VendorSearch']);
               $pagDate = strtoupper($_POST['invoiceDateSearch']);
               $pagProduct = strtoupper($_POST['salesOrderSearch']);
               $page = 1;
           }

               $query_user = "select * from journal_entries where number like '%$pagSku%' AND customer like '%$pagVendor%' AND date like '%$pagDate%' AND reference like '%$pagProduct%' ;";
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
   
               $query_user = "select * from journal_entries where number like '%$pagSku%' AND customer like '%$pagVendor%' AND date like '%$dateSearch%' AND reference like '%$pagProduct%' order by created_on DESC limit $init,50;";
               $result_User = mysqli_query($conection,$query_user);
               while($row_user = mysqli_fetch_assoc($result_User))
               { 
                   $newInvoiceLine = new Journal_Entries(); 
                   $newInvoiceLine->setCreated_on($row_user['created_on']);
                   $newInvoiceLine->setDate($row_user['date']);
                   $newInvoiceLine->setNumber($row_user['number']);
                   $newInvoiceLine->setCustomer($row_user['customer']);
                   $newInvoiceLine->setReference($row_user['reference']);
                   $newInvoiceLine->setJournal($row_user['journal']);
                   $newInvoiceLine->setStatus($row_user['status']); 
                   $newInvoiceLine->setAmount($row_user['amount']);  
   
                   $invoices[] = $newInvoiceLine;
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
    header("location:menu-JoEdetailed.php?typ=$typ&user=$email&type=$type&page=1");
 }

//Website Structure
Page::head2();
Page::header2($email, $type);
Page::menuJoEdetailed($typ, $invoices, $email, $type, $invoice_number, $customerSearch, $dateSearch, $salesOrderSearch, $count, $init, $totalPages, $page);
Page::footer2();
Page::endHead2();

 ?>