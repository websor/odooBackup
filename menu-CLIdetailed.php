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
$totalLines = 50;
 
$invoices = array();
$count =0;

// Variables for pagination

// PAGINATION LOGIC //
if(isset($_GET["page"]))
{
   $page = $_GET["page"];
}
else{
   header("location:menu-CLIdetailed.php?typ=$typ&user=$email&type=$type&page=1");
}

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

// customer              state           priceList
if($pagVendor == "" && $pagProduct == "" && $pagSku == "")
{

        /**
    * Call to the database to get all customers
    * 
    */ 

    $query_user = "select * from customer order by customer ASC;";
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

    $query_user = "select * from customer order by customer ASC limit $init,50;";
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

            $query_user = "select * from customer where price_list like '%$invoice_number%' AND customer like '%$customerSearch%' AND state like '%$salesOrderSearch%' limit $init,50;";
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

}
else
{

     //Cheching for POST FILTERS WITH PAGINATION
      
         $invoices = array();
         $count =0;
 
         //                    priceList                               customer                             state
         if(isset($_POST["invoiceNumberSearch"]) && isset($_POST["customerSearch"]) && isset($_POST["salesOrderSearch"]))
         {
             $pagSku = strtoupper($_POST['invoiceNumberSearch']);
             $pagVendor = strtoupper($_POST['customerSearch']);
             $pagProduct = strtoupper($_POST['salesOrderSearch']);
             $page = 1;
         }

 
             $query_user = "select * from customer where price_list like '%$pagSku%' AND customer like '%$pagVendor%' AND state like '%$pagProduct%';";
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

             $query_user = "select * from customer where price_list like '%$pagSku%' AND customer like '%$pagVendor%' AND state like '%$pagProduct%' limit $init,50;";
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

             $customerSearch = $pagVendor;
             $salesOrderSearch = $pagProduct;
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
    header("location:menu-CLIdetailed.php?typ=$typ&user=$email&type=$type&page=1");
 }

//Website Structure
Page::head2();
Page::header2($email, $type);
Page::menuCLIdetailed($typ, $invoices, $email, $type, $invoice_number, $customerSearch, $dateSearch, $salesOrderSearch, $count, $init, $totalPages, $page);
Page::footer2();
Page::endHead2();

 ?>