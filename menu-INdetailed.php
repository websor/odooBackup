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

 // PAGINATION LOGIC //
 if(isset($_GET["page"]))
 {
    $page = $_GET["page"];
 }
 else{
    header("location:menu-INdetailed.php?typ=$typ&user=$email&type=$type&page=1");
 }
 // PAGINATION LOGIC //


$invoice_number="";
$salesOrderSearch="";
$dateSearch="";
$customerSearch="";
$totalLines = 50;

 
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


if($pagVendor == "" && $pagProduct == "" && $pagSku == "")
{

        /**
    * Call to the database to get all invoices
    * 
    */ 
    $query_user = "select * from inventory order by product ASC;";
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

    $query_user = "select * from inventory order by product ASC limit $init,50;";
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

            $query_user = "select * from inventory where sku like '%$invoice_number%' AND vendor like '%$customerSearch%' AND product like '%$salesOrderSearch%' order by product ASC limit $init,50;";
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

}
else
{
    //Cheching for POST FILTERS with pagination
       
        $invoices = array();
        $count =0;

        if(isset($_POST["invoiceNumberSearch"]) && isset($_POST["customerSearch"]) && isset($_POST["salesOrderSearch"]))
        {   
            $pagSku = strtoupper($_POST["invoiceNumberSearch"]);
            $pagVendor = strtoupper($_POST["customerSearch"]);
            $pagProduct = strtoupper($_POST["salesOrderSearch"]);
            $page = 1;
        }
       
        //DO THE OTHER FILTERS HERE!!!!
            $query_user = "select * from inventory where sku like '%$pagSku%' AND vendor like '%$pagVendor%' AND product like '%$pagProduct%';";
            $result_User = mysqli_query($conection,$query_user);
            while($row_user = mysqli_fetch_assoc($result_User))
            { $count = $count+1; }

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
            
            $query_user = "select * from inventory where sku like '%$pagSku%' AND vendor like '%$pagVendor%' AND product like '%$pagProduct%' order by product ASC limit $init,50;";
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

            $customerSearch = $pagVendor;
            $salesOrderSearch = $pagProduct;
            $invoice_number = $pagSku;
}



//

 //Cheching for POST FILTERS
 if(isset($_POST["clear"]))
 {
    $invoice_number = "";
    $customerSearch = "";
    $dateSearch = "";
    $salesOrderSearch="";
    $page = 1;
    header("location:menu-INdetailed.php?typ=$typ&user=$email&type=$type&page=1");
 }

//Website Structure
Page::head2();
Page::header2($email, $type);
Page::menuINdetailed($typ, $invoices, $email, $type, $invoice_number, $customerSearch, $dateSearch, $salesOrderSearch, $count, $init, $totalPages, $page);
Page::footer2();
Page::endHead2();

 ?>