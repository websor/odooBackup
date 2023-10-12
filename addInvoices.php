<?php
/**
 * Including external classes
 */
require_once('Page.class.php');
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

 // Allowed mime types 
 //$excelMimes = array('text/xls', 'text/xlsx', 'application/excel', 'application/vnd.msexcel', 'application/vnd.ms-excel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'); 
     
/*if($_server["REQUEST_METHOD"] !== "POST")
{
    exit("POST request method reqired");
}*/

//Cheching if the document file is not empty
if(isset($_POST["import"]))
{
    //print_r($_FILES);
    $fileName = $_FILES["invoiceFile"]["name"];
    //$fileExtension = explode('.', $fileName);
    //$fileExtension - strtolower(end($fileExtension));
    
    $newFileName = date("y.m.d")."-".date("h.i.sa")."-".$fileName;

    $targetDirectory = "uploads/". $newFileName;
    
    move_uploaded_file($_FILES["invoiceFile"]["tmp_name"], $targetDirectory);

    error_reporting(0);
    ini_set('display_errors',0);

    require "excelReader/excel_reader2.php";
    require "excelReader/SpreadsheetReader.php";

    $reader = new SpreadsheetReader($targetDirectory);
    foreach($reader as $key => $row)
    {
        $invoice_number = strtoupper($row[0]);
        $sales_order = strtoupper($row[1]);
        $customer = strtoupper($row[2]);
        $delivery_address = $row[3];
        $payment_terms = $row[4];
        $invoice_date = $row[5];
        $due_date = $row[6];
        $sales_person = $row[7];
        $sales_team = $row[8];
        $global_comments = $row[9];
        $invoice_notes = $row[10];
        $customer_po = $row[11];
        $currancy = $row[12];
        $untaxed_amount = $row[13];
        $tax = $row[14];
        $total = $row[15];
        $amount_due = $row[16];
        $warehouseNotes = $row[17];
        $customerNotes = $row[18];

        mysqli_query($conection, "INSERT INTO invoices VALUES('', '$invoice_number', '$sales_order', '$customer', '$delivery_address',
        '$payment_terms', '$invoice_date', '$due_date', '$sales_person', '$sales_team', '$global_comments', '$invoice_notes',
        '$customer_po', '$currancy', '$untaxed_amount', '$tax', '$total', '$amount_due', '$warehouseNotes', '$customerNotes')");
        
        header("Location: menu-detailed.php?user=$email&type=$type&typ=$typ"); 
    } 
}

//Cheching if the document invoice line file is correct, and them add the data to DB
if(isset($_POST["import2"]))
{
    //print_r($_FILES);
    $fileName = $_FILES["invoiceLineFile"]["name"];
    //$fileExtension = explode('.', $fileName);
    //$fileExtension - strtolower(end($fileExtension));
    
    $newFileName = date("y.m.d")."-".date("h.i.sa")."-".$fileName;

    $targetDirectory = "uploads/". $newFileName;
    
    move_uploaded_file($_FILES["invoiceLineFile"]["tmp_name"], $targetDirectory);

    error_reporting(0);
    ini_set('display_errors',0);

    require "excelReader/excel_reader2.php";
    require "excelReader/SpreadsheetReader.php";

    $reader = new SpreadsheetReader($targetDirectory);
    foreach($reader as $key => $row)
    {
        $created_on = $row[0];
        $invoice_number = strtoupper($row[1]);
        $salers_order = strtoupper($row[2]);
        $sku = strtoupper($row[3]);
        $product = strtoupper($row[4]);
        $vendor = strtoupper($row[5]);
        $customer = strtoupper($row[6]);
        $qty_delivered = $row[7];
        $quantity = $row[8];
        $untaxed_amount = $row[9];
        $unit_price = $row[10];
        $unit_price_after = $row[11];
        $cost = $row[12];
        $taxes = $row[13];
        $notes = $row[14];
        $rma = $row[15];
        $quantity_bo = $row[16];
        $serial = $row[17];

        mysqli_query($conection, "INSERT INTO invoice_line VALUES('', '$created_on', '$invoice_number', '$salers_order', '$sku',
        '$product', '$vendor', '$customer', '$qty_delivered', '$quantity', '$untaxed_amount', '$unit_price',
        '$unit_price_after', '$cost', '$taxes','$notes', '$rma', '$quantity_bo','$serial')"); 
        
        $error = mysqli_error($con);
        var_dump($error);
        //header("Location: menu-detailed.php?user=$email&type=$type&typ=$typ"); 
    } 
}

//Cheching if the document credit note file is correct, and them add the data to DB
if(isset($_POST["import3"]))
{
    //print_r($_FILES);
    $fileName = $_FILES["creditNoteFile"]["name"];
    //$fileExtension = explode('.', $fileName);
    //$fileExtension - strtolower(end($fileExtension));
    
    $newFileName = date("y.m.d")."-".date("h.i.sa")."-".$fileName;

    $targetDirectory = "uploads/". $newFileName;
    
    move_uploaded_file($_FILES["creditNoteFile"]["tmp_name"], $targetDirectory);

    error_reporting(0);
    ini_set('display_errors',0);

    require "excelReader/excel_reader2.php";
    require "excelReader/SpreadsheetReader.php";

    $reader = new SpreadsheetReader($targetDirectory);
    foreach($reader as $key => $row)
    {
        $creditnote_number = strtoupper($row[0]);
        $customer = strtoupper($row[1]);
        $address = strtoupper($row[2]);
        $invoice_date = $row[3];
        $sales_person = strtoupper($row[4]);
        $due_date = $row[5];
        $source_document = strtoupper($row[6]);
        $untaxed_amount = $row[7];
        $tax = $row[8];
        $total = $row[9];
        $amount_due = $row[10];
        $status = $row[11];
        $payment_terms = $row[12];
        $global_comments = $row[13];
        $invoices_notes = $row[14];
        $customer_po = $row[15];
        $warehouse_note = $row[16];
        $customer_notes = $row[17];

        mysqli_query($conection, "INSERT INTO creditnotes VALUES('', '$creditnote_number', '$customer', '$address', '$invoice_date',
        '$sales_person', '$due_date', '$source_document', '$untaxed_amount', '$tax', '$total', '$amount_due',
        '$status', '$payment_terms', '$global_comments','$invoices_notes', '$customer_po', '$warehouse_note','$customer_notes')"); 
        
        $typ="CreditNote";

        header("Location: menu-CNdetailed.php?user=$email&type=$type&typ=$typ"); 
    } 
}

//Cheching if the document purchases file is correct, and them add the data to DB
if(isset($_POST["import4"]))
{
    //print_r($_FILES);
    $fileName = $_FILES["purchasesFile"]["name"];
    //$fileExtension = explode('.', $fileName);
    //$fileExtension - strtolower(end($fileExtension));
    
    $newFileName = date("y.m.d")."-".date("h.i.sa")."-".$fileName;

    $targetDirectory = "uploads/". $newFileName;
    
    move_uploaded_file($_FILES["purchasesFile"]["tmp_name"], $targetDirectory);

    error_reporting(0);
    ini_set('display_errors',0);

    require "excelReader/excel_reader2.php";
    require "excelReader/SpreadsheetReader.php";

    $reader = new SpreadsheetReader($targetDirectory);
    foreach($reader as $key => $row)
    {
        $purchases_number = strtoupper($row[0]);
        $order_date = $row[1];
        $vendor = strtoupper($row[2]);
        $schedule_date = $row[3];
        $sales_person = strtoupper($row[4]);
        $source_document = strtoupper($row[5]);
        $untaxed_amount = $row[6];
        $total = $row[7];
        $status = $row[8];
        $stellar_status = $row[9];
        $currancy = $row[10];
        $vendor_reference = $row[11];
        $deliver_to = $row[12];
        $broker = $row[13];
        $invoice_number = $row[14];
        $sales_number = $row[15];
        $bill_reference = $row[16];
        $comments = $row[17];
        $terms = $row[18];
        $tax = $row[19];

        mysqli_query($conection, "INSERT INTO purchases VALUES('', '$purchases_number', '$order_date', '$vendor', '$schedule_date',
        '$sales_person', '$source_document', '$untaxed_amount', '$total', '$status', '$stellar_status', '$currancy',
        '$vendor_reference', '$deliver_to', '$broker','$invoice_number', '$sales_number', '$bill_reference','$comments', '$terms', '$tax')"); 
        
        $typ="Purchases";

        header("Location: menu-Pdetailed.php?user=$email&type=$type&typ=$typ"); 
    } 
}

//Cheching if the document purchases line file is correct, and them add the data to DB
if(isset($_POST["import5"]))
{
    //print_r($_FILES);
    $fileName = $_FILES["purchasesLineFile"]["name"];
    //$fileExtension = explode('.', $fileName);
    //$fileExtension - strtolower(end($fileExtension));
    
    $newFileName = date("y.m.d")."-".date("h.i.sa")."-".$fileName;

    $targetDirectory = "uploads/". $newFileName;
    
    move_uploaded_file($_FILES["purchasesLineFile"]["tmp_name"], $targetDirectory);

    error_reporting(0);
    ini_set('display_errors',0);

    require "excelReader/excel_reader2.php";
    require "excelReader/SpreadsheetReader.php";

    $reader = new SpreadsheetReader($targetDirectory);
    foreach($reader as $key => $row)
    {
        $sku = strtoupper($row[0]);
        $product = strtoupper($row[1]);
        $quantity = $row[2];
        $unit_cost = $row[3];
        $taxes = $row[4];
        $subtotal = $row[5];
        $purchases_number = strtoupper($row[6]);
        $vendor = strtoupper($row[7]);
        $total = $row[8];
        $received_qty = $row[9];
        $created_on = $row[10];
        
        mysqli_query($conection, "INSERT INTO purchase_line VALUES('', '$sku', '$product', '$quantity', '$unit_cost',
        '$taxes', '$subtotal', '$purchases_number', '$vendor', '$total', '$received_qty', '$created_on')"); 
        
        $typ="Purchases";

        header("Location: menu.php?user=$email&type=$type"); 
    } 
}

//Website Structure
Page::head();
Page::header($email, $type);
Page::formAdd($typ);
Page::footer();
Page::endHead();

 ?>