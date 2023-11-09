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

 if(isset($_GET["inv"]))
 {
     $inv = $_GET["inv"];
 }
 else
 {
     $inv = "";
 }



$invoice_number="";
$salesOrderSearch="";
$dateSearch="";
$customerSearch="";
$count = 0;
$totalLines = 50;

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

 
if($inv == "")
{
      // PAGINATION LOGIC //
    if(isset($_GET["page"]))
    {
        $page = $_GET["page"];
    }
    else{
        header("location:menu-detailed.php?typ=$typ&user=$email&type=$type&page=1");
    }
    // PAGINATION LOGIC //

    $invoices = array();

    if($pagVendor == "" && $pagProduct == "" && $pagSku == "" && $pagDate == "")
    {
            /**
        * Call to the database to get all invoices
        * 
        */
        $query_user = "select * from invoices";
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

        $query_user = "select * from invoices  order by invoice_date DESC limit  $init,50;";
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
            $count = 0;

            //DO THE OTHER FILTERS HERE!!!!
            if(isset($_POST["invoiceNumberSearch"]) && isset($_POST["customerSearch"]) && isset($_POST["invoiceDateSearch"]) && isset($_POST["salesOrderSearch"]))
            {
                $invoice_number = strtoupper($_POST['invoiceNumberSearch']);
                $customerSearch = strtoupper($_POST['customerSearch']);
                $dateSearch = $_POST['invoiceDateSearch'];
                $salesOrderSearch = strtoupper($_POST['salesOrderSearch']);
                //var_dump($invoice_number);
                $query_user = "select * from invoices where invoice_number like '%$invoice_number%' AND customer like '%$customerSearch%' AND invoice_date like '%$dateSearch%' AND sales_order like '%$salesOrderSearch%';";
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

                $query_user = "select * from invoices where invoice_number like '%$invoice_number%' AND customer like '%$customerSearch%' AND invoice_date like '%$dateSearch%' AND sales_order like '%$salesOrderSearch%' order by invoice_date DESC limit $init,50;";
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
            $pagDate = $_POST['invoiceDateSearch']; //dateSearch
            $pagProduct = strtoupper($_POST['salesOrderSearch']); //salesOrderSearch
            $page = 1;
        }
            
            $query_user = "select * from invoices where invoice_number like '%$pagSku%' AND customer like '%$pagVendor%' AND invoice_date like '%$pagDate%' AND sales_order like '%$pagProduct%';";
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

            $query_user = "select * from invoices where invoice_number like '%$pagSku%' AND customer like '%$pagVendor%' AND invoice_date like '%$pagDate%' AND sales_order like '%$pagProduct%' order by invoice_date DESC limit $init,50;";
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
            $customerSearch = $pagVendor;
            $salesOrderSearch = $pagProduct;
            $invoice_number = $pagSku;
            $dateSearch = $pagDate;
    }
}
else{
      // PAGINATION LOGIC //
    if(isset($_GET["page"]))
    {
        $page = $_GET["page"];
    }
    else{
        header("location:menu-detailed.php?typ=$typ&user=$email&type=$type&page=1&inv=$inv");
    }
  // PAGINATION LOGIC //
    $invoices = array();
    /**
    * Call to the database to get all invoices
    * 
    */
    $query_user = "select * from invoices where customer = '$inv' AND amount_due != ''";
    $result_User = mysqli_query($conection,$query_user);
    while($row_user = mysqli_fetch_assoc($result_User))
    { 
        $count = $count + 1;
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
            $totalPages1 = floor($totalPages1);
        }
    }

    $init = ($page - 1) * $totalLines;
    // PAGINATION LOGIC //

    $query_user = "select * from invoices where customer = '$inv' AND amount_due != '' limit 50;";
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




 //Cheching for POST FILTERS
 if(isset($_POST["clear"]))
 {
    $invoice_number = "";
    $customerSearch = "";
    $dateSearch = "";
    $salesOrderSearch="";
    $page = 1;
    header("location:menu-detailed.php?typ=$typ&user=$email&type=$type&page=1");
 }

//Website Structure
Page::head2();
Page::header2($email, $type);
Page::menuDetailed($typ, $invoices, $email, $type, $invoice_number, $customerSearch, $dateSearch, $salesOrderSearch, $count, $inv, $init, $totalPages, $page);
Page::footer2();
Page::endHead2();

 ?>