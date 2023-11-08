<?php
/**
 * Including external classes
 */
require_once('Page.class.php');
require_once('Class/Balance.class.php');
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
    header("location:menu-BAdetailed.php?typ=$typ&user=$email&type=$type&page=1");
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

if(isset($_GET["vendorSearch"]))
{
    $pagSku = $_GET["vendorSearch"];
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

    $query_user = "select * from customer_balances order by total_receivable DESC;";
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
            $totalPages1 = floor($totalPages1);
        }
    }
    $init = ($page - 1) * $totalLines;
    // PAGINATION LOGIC //

    $query_user = "select * from customer_balances order by total_receivable DESC limit $init,50;";
    $result_User = mysqli_query($conection,$query_user);
    while($row_user = mysqli_fetch_assoc($result_User))
    {
        $newInvoiceLine = new Balance(); 
        $newInvoiceLine->setCustomer($row_user['customer']);
        $newInvoiceLine->setLast_update($row_user['last_update']);
        $newInvoiceLine->setTotal_receivable($row_user['total_receivable']);
        
        $invoices[] = $newInvoiceLine;
    } 

    //Cheching for POST FILTERS
    if(isset($_POST["search"]))
    {
        $invoices = array();
        $count =0;

        //DO THE OTHER FILTERS HERE!!!!
        if(isset($_POST["customerSearch"]))
        {
            $customerSearch = strtoupper($_POST['customerSearch']);

            $query_user = "select * from customer_balances where customer like '%$customerSearch%';";
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
                    $totalPages1 = floor($totalPages1);
                }
            }

            $page = 1;
            $init = ($page - 1) * $totalLines;
            // PAGINATION LOGIC //
            
            $query_user = "select * from customer_balances where customer like '%$customerSearch%' limit $init,50;";
            $result_User = mysqli_query($conection,$query_user);
            while($row_user = mysqli_fetch_assoc($result_User))
            { 
                $newInvoiceLine = new Balance(); 
                $newInvoiceLine->setCustomer($row_user['customer']);
                $newInvoiceLine->setLast_update($row_user['last_update']);
                $newInvoiceLine->setTotal_receivable($row_user['total_receivable']);
                
                $invoices[] = $newInvoiceLine;
            }
        }
        
    }

}
else
{

        $invoices = array();
        $count =0;

        //DO THE OTHER FILTERS HERE!!!!
        if(isset($_POST["customerSearch"]))
        {
            $pagSku = strtoupper($_POST['customerSearch']);
            $page =1;
        }

            $query_user = "select * from customer_balances where customer like '%$pagSku%';";
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
                    $totalPages1 = floor($totalPages1);
                }
            }

            $init = ($page - 1) * $totalLines;
            // PAGINATION LOGIC //
            
            $query_user = "select * from customer_balances where customer like '%$pagSku%' limit $init,50;";
            $result_User = mysqli_query($conection,$query_user);
            while($row_user = mysqli_fetch_assoc($result_User))
            { 
                $newInvoiceLine = new Balance(); 
                $newInvoiceLine->setCustomer($row_user['customer']);
                $newInvoiceLine->setLast_update($row_user['last_update']);
                $newInvoiceLine->setTotal_receivable($row_user['total_receivable']);
                
                $invoices[] = $newInvoiceLine;
            }
            $customerSearch = $pagSku;

}




 //Cheching for POST FILTERS
 if(isset($_POST["clear"]))
 {
    $invoice_number = "";
    $customerSearch = "";
    $dateSearch = "";
    $salesOrderSearch="";
    $page = 1;
    header("location:menu-Badetailed.php?typ=$typ&user=$email&type=$type&page=1");
 }

//Website Structure
Page::head2();
Page::header2($email, $type);
Page::menuBadetailed($typ, $invoices, $email, $type, $invoice_number, $customerSearch, $dateSearch, $salesOrderSearch, $count, $init, $totalPages, $page);
Page::footer2();
Page::endHead2();

 ?>