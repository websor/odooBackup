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
        $invoice_number = $row[0];
        $sales_order = $row[1];
        $customer = $row[2];
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
        $invoice_number = $row[1];
        $salers_order = $row[2];
        $sku = $row[3];
        $product = $row[4];
        $vendor = $row[5];
        $customer = $row[6];
        $qty_delivered = $row[7];
        $quantity = $row[8];
        $untaxed_amount = $row[9];
        $unit_price = $row[10];
        $unit_price_after = $row[11];
        $cost = $row[12];
        $taxes = $row[14];
        $notes = $row[15];
        $rma = $row[16];
        $quantity_bo = $row[17];
        $serial = $row[18];

        mysqli_query($conection, "INSERT INTO invoice_line VALUES('', '$created_on', '$invoice_number', '$salers_order', '$sku',
        '$product', '$vendor', '$customer', '$qty_delivered', '$quantity', '$untaxed_amount', '$unit_price',
        '$unit_price_after', '$cost', '$taxes','$notes', '$rma', '$quantity_bo','$serial')"); 
        
        header("Location: menu-detailed.php?user=$email&type=$type&typ=$typ"); 
    } 
}

//Website Structure
Page::head();
Page::header($email, $type);
Page::formAdd($typ);
Page::footer();
Page::endHead();

 ?>