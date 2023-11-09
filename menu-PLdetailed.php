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


$invoice_number="";
$salesOrderSearch="";
$dateSearch="";
$customerSearch="";
$totalLines = 50;

 
$invoices = array();
$count =0;

if($pagVendor == "" && $pagProduct == "" && $pagSku == "" && $pagDate == "")
{
    /**
    * Call to the database to get all pruchases line
    * 
    */ 
      // PAGINATION LOGIC //
    if(isset($_GET["page"]))
    {
        $page = $_GET["page"];
    }
    else{
        header("location:menu-PLdetailed.php?typ=$typ&user=$email&type=$type&page=1");
    }
    // PAGINATION LOGIC //

    $query_user = "select * from purchase_line order by created_on DESC;";
    $result_User = mysqli_query($conection,$query_user);
    while($row_user = mysqli_fetch_assoc($result_User))
    { $count = $count +1;} 

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

    $query_user = "select * from purchase_line order by created_on DESC limit $init,50;";
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

            $query_user = "select * from purchase_line where purchase_number like '%$invoice_number%' AND vendor like '%$customerSearch%' AND created_on like '%$dateSearch%' AND sku like '%$salesOrderSearch%' order by created_on DESC limit $init,50;";
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
}
else
{
        $invoices = array();
        $count =0;
              // PAGINATION LOGIC //
        if(isset($_GET["page"]))
        {
            $page = $_GET["page"];
        }
        else{
            header("location:menu-PLdetailed.php?typ=$typ&user=$email&type=$type&page=1&skuSearch=$pagSku");
        }

        if(isset($_GET["skuSearch"]))
        {
            $pagSku = $_GET["skuSearch"];
        }
        else{
           $pagSku = "";
        }
        // PAGINATION LOGIC //


        //DO THE OTHER FILTERS HERE!!!!
        if(isset($_POST["invoiceNumberSearch"]) && isset($_POST["customerSearch"]) && isset($_POST["invoiceDateSearch"]) && isset($_POST["salesOrderSearch"]))
        {
            $pagProduct = strtoupper($_POST['invoiceNumberSearch']); //invoice_number
            $pagVendor = strtoupper($_POST['customerSearch']); //customerSearch
            $pagDate = strtoupper($_POST['invoiceDateSearch']); //dateSearch
            $pagSku = strtoupper($_POST['salesOrderSearch']); //salesOrderSearch
            $page = 1;
        }

            $query_user = "select * from purchase_line where purchase_number like '%$pagProduct%' AND vendor like '%$pagVendor%' AND created_on like '%$pagDate%' AND sku like '%$pagSku%';";
            $result_User = mysqli_query($conection,$query_user);
            while($row_user = mysqli_fetch_assoc($result_User))
            { $count = $count+1; }

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

            $query_user = "select * from purchase_line where purchase_number like '%$pagProduct%' AND vendor like '%$pagVendor%' AND created_on like '%$pagDate%' AND sku like '%$pagSku%' order by created_on DESC limit $init,50;";
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
            $customerSearch = $pagVendor;
            $invoice_number = $pagProduct;
            $salesOrderSearch = $pagSku;
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
    header("location:menu-PLdetailed.php?typ=$typ&user=$email&type=$type&page=1");
 }

//Website Structure
Page::head2();
Page::header2($email, $type);
Page::menuPLdetailed($typ, $invoices, $email, $type, $invoice_number, $customerSearch, $dateSearch, $salesOrderSearch, $count, $init, $totalPages, $page);
Page::footer2();
Page::endHead2();

 ?>