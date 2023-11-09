<?php
/**
 * Including external classes
 */
require_once('Page.class.php');
require_once('Class/InvoiceLine.class.php');
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

if(isset($_GET["item"]))
{
    $inv = $_GET["item"];
}
else
{
    $inv = "";
}

$pro = "";


 if($inv != "")
 {
   // PAGINATION LOGIC //
    // PAGINATION LOGIC //
    if(isset($_GET["page"]))
    {
        $page = $_GET["page"];
    }
    else{
        header("location:menu-ILdetailed.php?typ=$typ&user=$email&type=$type&page=1&item=$inv");
    }

        /**
    * Call to the database to get all invoices
    * 
    */ 

    $query_user = "select * from invoice_line WHERE sku = '$inv' order by created_on DESC;";
    $result_User = mysqli_query($conection,$query_user);
    while($row_user = mysqli_fetch_assoc($result_User))
    { $count = $count +1;} 

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

    $query_user = "select * from invoice_line WHERE sku = '$inv' order by created_on DESC limit $init,50;";
    $result_User = mysqli_query($conection,$query_user);
    while($row_user = mysqli_fetch_assoc($result_User))
    {
        $newInvoiceLine = new InvoiceLine(); 
        $newInvoiceLine->setCreatedOn($row_user['created_on']);
        $newInvoiceLine->setInvoiceNumber($row_user['invoice_number']);
        $newInvoiceLine->setSalesOrder($row_user['salers_order']);
        $newInvoiceLine->setSku($row_user['sku']);
        $newInvoiceLine->setProduct($row_user['product']);
        $newInvoiceLine->setVendor($row_user['vendor']);
        $newInvoiceLine->setCustomer($row_user['customer']); 
        $newInvoiceLine->setQty_delivered($row_user['qty_delivered']);  
        $newInvoiceLine->setQuantity($row_user['quantity']); 
        $newInvoiceLine->setUntaxed_amount($row_user['untaxed_amount']); 
        $newInvoiceLine->setUnit_price($row_user['unit_price']); 
        $newInvoiceLine->setUnit_price_after($row_user['unit_price_after']); 
        $newInvoiceLine->setCost($row_user['cost']); 
        $newInvoiceLine->setTaxes($row_user['taxes']); 
        $newInvoiceLine->setNotes($row_user['notes']);
        $newInvoiceLine->setRma($row_user['rma_notes']);  
        $newInvoiceLine->setQuantity_bo($row_user['quantity_bo']);
        $newInvoiceLine->setSerial($row_user['serial_numbers']);  
        $invoices[] = $newInvoiceLine;
        $pro = $row_user['product'];
    } 

    $salesOrderSearch = $inv;
    $salesOrderSearch = $pro;
 }
 else
 {

     // PAGINATION LOGIC //
     if(isset($_GET["page"]))
     {
         $page = $_GET["page"];
     }
     else{
         header("location:menu-ILdetailed.php?typ=$typ&user=$email&type=$type&page=1");
     }


    if($pagVendor == "" && $pagProduct == "" && $pagSku == "" && $pagDate == "")
    {

            /**
            * Call to the database to get all invoices
            * 
            */ 

            $query_user = "select * from invoice_line order by created_on DESC;";
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

            $query_user = "select * from invoice_line order by created_on DESC limit $init,50;";
            $result_User = mysqli_query($conection,$query_user);
            while($row_user = mysqli_fetch_assoc($result_User))
            {
                $newInvoiceLine = new InvoiceLine(); 
                $newInvoiceLine->setCreatedOn($row_user['created_on']);
                $newInvoiceLine->setInvoiceNumber($row_user['invoice_number']);
                $newInvoiceLine->setSalesOrder($row_user['salers_order']);
                $newInvoiceLine->setSku($row_user['sku']);
                $newInvoiceLine->setProduct($row_user['product']);
                $newInvoiceLine->setVendor($row_user['vendor']);
                $newInvoiceLine->setCustomer($row_user['customer']); 
                $newInvoiceLine->setQty_delivered($row_user['qty_delivered']);  
                $newInvoiceLine->setQuantity($row_user['quantity']); 
                $newInvoiceLine->setUntaxed_amount($row_user['untaxed_amount']); 
                $newInvoiceLine->setUnit_price($row_user['unit_price']); 
                $newInvoiceLine->setUnit_price_after($row_user['unit_price_after']); 
                $newInvoiceLine->setCost($row_user['cost']); 
                $newInvoiceLine->setTaxes($row_user['taxes']); 
                $newInvoiceLine->setNotes($row_user['notes']);
                $newInvoiceLine->setRma($row_user['rma_notes']);  
                $newInvoiceLine->setQuantity_bo($row_user['quantity_bo']);
                $newInvoiceLine->setSerial($row_user['serial_numbers']);  
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
                    

                    $query_user = "select * from invoice_line where invoice_number like '%$invoice_number%' AND customer like '%$customerSearch%' AND serial_numbers like '%$dateSearch%' AND product like '%$salesOrderSearch%';";
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

                    $query_user = "select * from invoice_line where invoice_number like '%$invoice_number%' AND customer like '%$customerSearch%' AND serial_numbers like '%$dateSearch%' AND product like '%$salesOrderSearch%' order by created_on DESC limit $init,50;";
                    $result_User = mysqli_query($conection,$query_user);
                    while($row_user = mysqli_fetch_assoc($result_User))
                    { 
                        $newInvoiceLine = new InvoiceLine(); 
                        $newInvoiceLine->setCreatedOn($row_user['created_on']);
                        $newInvoiceLine->setInvoiceNumber($row_user['invoice_number']);
                        $newInvoiceLine->setSalesOrder($row_user['salers_order']);
                        $newInvoiceLine->setSku($row_user['sku']);
                        $newInvoiceLine->setProduct($row_user['product']);
                        $newInvoiceLine->setVendor($row_user['vendor']);
                        $newInvoiceLine->setCustomer($row_user['customer']); 
                        $newInvoiceLine->setQty_delivered($row_user['qty_delivered']);  
                        $newInvoiceLine->setQuantity($row_user['quantity']); 
                        $newInvoiceLine->setUntaxed_amount($row_user['untaxed_amount']); 
                        $newInvoiceLine->setUnit_price($row_user['unit_price']); 
                        $newInvoiceLine->setUnit_price_after($row_user['unit_price_after']); 
                        $newInvoiceLine->setCost($row_user['cost']); 
                        $newInvoiceLine->setTaxes($row_user['taxes']); 
                        $newInvoiceLine->setNotes($row_user['notes']);
                        $newInvoiceLine->setRma($row_user['rma_notes']);  
                        $newInvoiceLine->setQuantity_bo($row_user['quantity_bo']);
                        $newInvoiceLine->setSerial($row_user['serial_numbers']);  
                        $invoices[] = $newInvoiceLine;
                    }
                }
                
            }


     }else
     {
        $invoices = array();
        $count =0;

        //DO THE OTHER FILTERS HERE!!!!
            if(isset($_POST["invoiceNumberSearch"]) && isset($_POST["customerSearch"]) && isset($_POST["invoiceDateSearch"]) && isset($_POST["salesOrderSearch"]))
            {
                $pagSku = strtoupper($_POST['invoiceNumberSearch']); //invoice_number
                $pagVendor = strtoupper($_POST['customerSearch']); //customerSearch
                $pagDate = $_POST['invoiceDateSearch']; //dateSearch
                $pagProduct = strtoupper($_POST['salesOrderSearch']); //salesOrderSearch
                $page = 1;
            }

            $query_user = "select * from invoice_line where invoice_number like '%$pagSku%' AND customer like '%$pagVendor%' AND serial_numbers like '%$pagDate%' AND product like '%$pagProduct%';";
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

            $query_user = "select * from invoice_line where invoice_number like '%$pagSku%' AND customer like '%$pagVendor%' AND serial_numbers like '%$pagDate%' AND product like '%$pagProduct%' order by created_on DESC limit $init,50;";
            $result_User = mysqli_query($conection,$query_user);
            while($row_user = mysqli_fetch_assoc($result_User))
            { 
                $newInvoiceLine = new InvoiceLine(); 
                $newInvoiceLine->setCreatedOn($row_user['created_on']);
                $newInvoiceLine->setInvoiceNumber($row_user['invoice_number']);
                $newInvoiceLine->setSalesOrder($row_user['salers_order']);
                $newInvoiceLine->setSku($row_user['sku']);
                $newInvoiceLine->setProduct($row_user['product']);
                $newInvoiceLine->setVendor($row_user['vendor']);
                $newInvoiceLine->setCustomer($row_user['customer']); 
                $newInvoiceLine->setQty_delivered($row_user['qty_delivered']);  
                $newInvoiceLine->setQuantity($row_user['quantity']); 
                $newInvoiceLine->setUntaxed_amount($row_user['untaxed_amount']); 
                $newInvoiceLine->setUnit_price($row_user['unit_price']); 
                $newInvoiceLine->setUnit_price_after($row_user['unit_price_after']); 
                $newInvoiceLine->setCost($row_user['cost']); 
                $newInvoiceLine->setTaxes($row_user['taxes']); 
                $newInvoiceLine->setNotes($row_user['notes']);
                $newInvoiceLine->setRma($row_user['rma_notes']);  
                $newInvoiceLine->setQuantity_bo($row_user['quantity_bo']);
                $newInvoiceLine->setSerial($row_user['serial_numbers']);  
                $invoices[] = $newInvoiceLine;
            }
            $customerSearch = $pagVendor;
            $salesOrderSearch = $pagProduct;
            $invoice_number = $pagSku;
            $dateSearch = $pagDate;    
        }

       
 }



 //Cheching for POST FILTERS
 if(isset($_POST["clear"]))
 {
    $invoice_number = "";
    $customerSearch = "";
    $dateSearch = "";
    $salesOrderSearch="";
    $item = "";
    header("location:menu-ILdetailed.php?user=$email&type=$type&typ=$typ");
 }

//Website Structure
Page::head2();
Page::header2($email, $type);
Page::menuILdetailed($typ, $invoices, $email, $type, $invoice_number, $customerSearch, $dateSearch, $salesOrderSearch, $count, $inv, $init, $totalPages, $page);
Page::footer2();
Page::endHead2();

 ?>