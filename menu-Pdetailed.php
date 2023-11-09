<?php
/**
 * Including external classes
 */
require_once('Page.class.php');
require_once('Class/Purchases.class.php');
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
     header("location:menu-Pdetailed.php?typ=$typ&user=$email&type=$type&page=1");
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


if($pagVendor == "" && $pagProduct == "" && $pagSku == "")
{

        /**
    * Call to the database to get all invoices
    * 
    */
    $query_user = "select * from purchases order by order_date DESC;";
    $result_User = mysqli_query($conection,$query_user);
    while($row_user = mysqli_fetch_assoc($result_User))
    { $count = $count +1; }

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

    $query_user = "select * from purchases order by order_date DESC limit $init,50;";
    $result_User = mysqli_query($conection,$query_user);
    while($row_user = mysqli_fetch_assoc($result_User))
    { 
        $newInvoice = new Purchases();
        $newInvoice->setPurchase_number($row_user['purchase_number']);
        $newInvoice->setOrder_date($row_user['order_date']);
        $newInvoice->setVendor($row_user['vendor']);
        $newInvoice->setSchedule_date($row_user['schedule_date']);
        $newInvoice->setSales_person($row_user['sales_person']);
        $newInvoice->setSource_document($row_user['source_document']); 
        $newInvoice->setUntaxed_amount($row_user['untaxed_amount']);  
        $newInvoice->setTotal($row_user['total']); 
        $newInvoice->setStellar_status($row_user['stellar_status']); 
        $newInvoice->setStatus($row_user['status']); 
        $newInvoice->setCurrancy($row_user['currancy']); 
        $newInvoice->setVendor_reference($row_user['vendor_reference']); 
        $newInvoice->setDeliver_to($row_user['deliver_to']); 
        $newInvoice->setBroker($row_user['broker']);
        $newInvoice->setInvoice_number($row_user['invoice_number']);  
        $newInvoice->setSales_number($row_user['sales_number']);
        $newInvoice->setBill_reference($row_user['bill_reference']);  
        $newInvoice->setComments($row_user['comments']);
        $newInvoice->setTerms($row_user['terms']);  
        $newInvoice->setTax($row_user['tax']);    

        $invoices[] = $newInvoice;
    } 

    //Cheching for POST FILTERS
    if(isset($_POST["search"]))
    {
        $invoices = array();
        $count =0;

        //DO THE OTHER FILTERS HERE!!!!
        if(isset($_POST["invoiceNumberSearch"]) && isset($_POST["VendorSearch"]) && isset($_POST["invoiceDateSearch"]))
        {
            $invoice_number = strtoupper($_POST['invoiceNumberSearch']);
            $customerSearch = strtoupper($_POST['VendorSearch']);
            $dateSearch = $_POST['invoiceDateSearch'];
            $salesOrderSearch ="";
            
            $query_user = "select * from purchases where purchase_number like '%$invoice_number%' AND vendor like '%$customerSearch%' AND order_date like '%$dateSearch%';";
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

            $query_user = "select * from purchases where purchase_number like '%$invoice_number%' AND vendor like '%$customerSearch%' AND order_date like '%$dateSearch%' order by order_date DESC limit $init,50;";
            $result_User = mysqli_query($conection,$query_user);
            while($row_user = mysqli_fetch_assoc($result_User))
            { 
                $newInvoice = new Purchases();
                $newInvoice->setPurchase_number($row_user['purchase_number']);
                $newInvoice->setOrder_date($row_user['order_date']);
                $newInvoice->setVendor($row_user['vendor']);
                $newInvoice->setSchedule_date($row_user['schedule_date']);
                $newInvoice->setSales_person($row_user['sales_person']);
                $newInvoice->setSource_document($row_user['source_document']); 
                $newInvoice->setUntaxed_amount($row_user['untaxed_amount']);  
                $newInvoice->setTotal($row_user['total']); 
                $newInvoice->setStellar_status($row_user['stellar_status']); 
                $newInvoice->setStatus($row_user['status']); 
                $newInvoice->setCurrancy($row_user['currancy']); 
                $newInvoice->setVendor_reference($row_user['vendor_reference']); 
                $newInvoice->setDeliver_to($row_user['deliver_to']); 
                $newInvoice->setBroker($row_user['broker']);
                $newInvoice->setInvoice_number($row_user['invoice_number']);  
                $newInvoice->setSales_number($row_user['sales_number']);
                $newInvoice->setBill_reference($row_user['bill_reference']);  
                $newInvoice->setComments($row_user['comments']);
                $newInvoice->setTerms($row_user['terms']);  
                $newInvoice->setTax($row_user['tax']);    

                $invoices[] = $newInvoice;
            }
        }
        
    }

}
else
{
    $invoices = array();
        $count =0;

        //DO THE OTHER FILTERS HERE!!!!
        if(isset($_POST["invoiceNumberSearch"]) && isset($_POST["VendorSearch"]) && isset($_POST["invoiceDateSearch"]))
        {
            $pagSku = strtoupper($_POST['invoiceNumberSearch']); //$invoice_number
            $pagVendor = strtoupper($_POST['VendorSearch']); //$customerSearch
            $pagProduct = $_POST['invoiceDateSearch']; //dateSearch
            
            $page = 1;
        }
           
            $query_user = "select * from purchases where purchase_number like '%$pagSku%' AND vendor like '%$pagVendor%' AND order_date like '%$pagProduct%';";
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

            $query_user = "select * from purchases where purchase_number like '%$pagSku%' AND vendor like '%$pagVendor%' AND order_date like '%$pagProduct%' order by order_date DESC limit $init,50;";
            $result_User = mysqli_query($conection,$query_user);
            while($row_user = mysqli_fetch_assoc($result_User))
            { 
                $newInvoice = new Purchases();
                $newInvoice->setPurchase_number($row_user['purchase_number']);
                $newInvoice->setOrder_date($row_user['order_date']);
                $newInvoice->setVendor($row_user['vendor']);
                $newInvoice->setSchedule_date($row_user['schedule_date']);
                $newInvoice->setSales_person($row_user['sales_person']);
                $newInvoice->setSource_document($row_user['source_document']); 
                $newInvoice->setUntaxed_amount($row_user['untaxed_amount']);  
                $newInvoice->setTotal($row_user['total']); 
                $newInvoice->setStellar_status($row_user['stellar_status']); 
                $newInvoice->setStatus($row_user['status']); 
                $newInvoice->setCurrancy($row_user['currancy']); 
                $newInvoice->setVendor_reference($row_user['vendor_reference']); 
                $newInvoice->setDeliver_to($row_user['deliver_to']); 
                $newInvoice->setBroker($row_user['broker']);
                $newInvoice->setInvoice_number($row_user['invoice_number']);  
                $newInvoice->setSales_number($row_user['sales_number']);
                $newInvoice->setBill_reference($row_user['bill_reference']);  
                $newInvoice->setComments($row_user['comments']);
                $newInvoice->setTerms($row_user['terms']);  
                $newInvoice->setTax($row_user['tax']);    

                $invoices[] = $newInvoice;
            }
            $customerSearch = $pagVendor;
            $dataSearch = $pagProduct;
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
    header("location:menu-Pdetailed.php?typ=$typ&user=$email&type=$type&page=1");
 }

//Website Structure
Page::head2();
Page::header2($email, $type);
Page::menuPdetailed($typ, $invoices, $email, $type, $invoice_number, $customerSearch, $dateSearch, $salesOrderSearch, $count, $init, $totalPages, $page);
Page::footer2();
Page::endHead2();

 ?>