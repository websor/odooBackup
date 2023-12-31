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
        
        header("Location: menu.php?user=$email&type=$type&msg=1"); 
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
        
        $error = mysqli_error($conection);
        //var_dump($error);
        header("Location: menu.php?user=$email&type=$type&msg=1"); 
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

        header("Location: menu.php?user=$email&type=$type&msg=1"); 
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

        header("Location: menu.php?user=$email&type=$type&msg=1");  
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

        header("Location: menu.php?user=$email&type=$type&msg=1"); 
    } 
}

//Cheching if the document payments file is correct, and them add the data to DB
if(isset($_POST["import6"]))
{
    //print_r($_FILES);
    $fileName = $_FILES["paymentsFile"]["name"];
    //$fileExtension = explode('.', $fileName);
    //$fileExtension - strtolower(end($fileExtension));
    
    $newFileName = date("y.m.d")."-".date("h.i.sa")."-".$fileName;

    $targetDirectory = "uploads/". $newFileName;
    
    move_uploaded_file($_FILES["paymentsFile"]["tmp_name"], $targetDirectory);

    error_reporting(0);
    ini_set('display_errors',0);

    require "excelReader/excel_reader2.php";
    require "excelReader/SpreadsheetReader.php";

    $reader = new SpreadsheetReader($targetDirectory);
    foreach($reader as $key => $row)
    {
        $payment_number = strtoupper($row[0]);
        $customer_ref = strtoupper($row[1]);
        $employee = strtoupper($row[2]);
        $payment_journal = strtoupper($row[3]);
        $customer = strtoupper($row[4]);
        $amount = $row[5];
        $status = strtoupper($row[6]);
        $payment_type = strtoupper($row[7]);
        $memo = strtoupper($row[8]);
        $payment_trans = strtoupper($row[9]);
        $payment_date = $row[10];
        
        mysqli_query($conection, "INSERT INTO payments VALUES('', '$payment_number', '$customer_ref', '$employee', '$payment_journal',
        '$customer', '$amount', '$status', '$payment_type', '$memo', '$payment_trans','$payment_date')"); 
        
        $error = mysqli_error($conection);
        //var_dump($error);
        $typ="Payments";

        header("Location: menu.php?user=$email&type=$type&msg=1"); 
    } 
}

//Cheching if the document customers file is correct, and them add the data to DB
if(isset($_POST["import7"]))
{
    //print_r($_FILES);
    $fileName = $_FILES["alfredoFile"]["name"];
    //$fileExtension = explode('.', $fileName);
    //$fileExtension - strtolower(end($fileExtension));
    
    $newFileName = date("y.m.d")."-".date("h.i.sa")."-".$fileName;

    $targetDirectory = "uploads/". $newFileName;
    
    move_uploaded_file($_FILES["alfredoFile"]["tmp_name"], $targetDirectory);

    error_reporting(0);
    ini_set('display_errors',0);

    require "excelReader/excel_reader2.php";
    require "excelReader/SpreadsheetReader.php";

    $reader = new SpreadsheetReader($targetDirectory);
    foreach($reader as $key => $row)
    {
        $name = strtoupper($row[0]);
        $parent_name = strtoupper($row[1]);
        $state = strtoupper($row[2]);
        $city = strtoupper($row[3]);
        $country = strtoupper($row[4]);
        $postal_code = strtoupper($row[5]);
        $fiscal_position = strtoupper($row[6]);
        $phone = $row[7];
        $email = strtoupper($row[8]);
        $created_by = $row[9];
        $customer_id_number = $row[10];
        $mobile = $row[11];
        $fax = $row[12];
        $phone2 = $row[13];
        $contact_name = strtoupper($row[14]);
        $second_contact_name = strtoupper($row[15]);
        $tags = strtoupper($row[16]);
        $pst = $row[17];
        $notes = $row[18];
        $warning = $row[19];
        $is_customer = $row[20];
        $is_vendor = $row[21];
        $payment_terms = $row[22];
        $price_list = $row[23];
        $street = $row[24];
        
        mysqli_query($conection, "INSERT INTO customer VALUES('', '$name', '$parent_name', '$state', '$city',
        '$country', '$postal_code', '$fiscal_position', '$phone', '$email', '$created_by','$customer_id_number',
        '$mobile', '$fax', '$phone2', '$contact_name', '$second_contact_name', '$tags','$pst',
        '$notes', '$warning', '$is_customer', '$is_vendor', '$payment_terms', '$price_list', '$street')"); 
        
        $error = mysqli_error($conection);
        $typ="Customer";
        //var_dump($error);
        header("Location: menu.php?user=$email&type=$type&msg=1"); 
    } 
}

//Cheching if the document inventory file is correct, and them add the data to DB
if(isset($_POST["import8"]))
{
    //print_r($_FILES);
    $fileName = $_FILES["inventoryFile"]["name"];
    //$fileExtension = explode('.', $fileName);
    //$fileExtension - strtolower(end($fileExtension));
    
    $newFileName = date("y.m.d")."-".date("h.i.sa")."-".$fileName;

    $targetDirectory = "uploads/". $newFileName;
    
    move_uploaded_file($_FILES["inventoryFile"]["tmp_name"], $targetDirectory);

    error_reporting(0);
    ini_set('display_errors',0);

    require "excelReader/excel_reader2.php";
    require "excelReader/SpreadsheetReader.php";

    $reader = new SpreadsheetReader($targetDirectory);
    foreach($reader as $key => $row)
    {
        $sku = strtoupper($row[0]);
        $product = strtoupper($row[1]);
        $vendor = strtoupper($row[2]);
        $barcode = strtoupper($row[3]);
        $sales_price = $row[4];
        $cost = $row[5];
        $category = strtoupper($row[6]);
        $t = strtoupper($row[7]);
        $qty_onhand = $row[8];
        $created_by = $row[9];
        $created_on = $row[10];
        $qty_sold = $row[11];
        $customer_tax = strtoupper($row[12]);
        $we_description = strtoupper($row[13]);
 
        
        mysqli_query($conection, "INSERT INTO inventory VALUES('', '$sku', '$product', '$vendor', '$barcode',
        '$sales_price', '$cost', '$category', '$t', '$qty_onhand', '$created_by','$created_on',
        '$qty_sold', '$customer_tax', '$we_description')"); 
        
        $error = mysqli_error($conection);
        $typ="Customer";
        //var_dump($error);
        header("Location: menu.php?user=$email&type=$type&msg=1"); 
    } 
}

if(isset($_POST["import9"]))
{
    //print_r($_FILES);
    $fileName = $_FILES["balanceFile"]["name"];
    //$fileExtension = explode('.', $fileName);
    //$fileExtension - strtolower(end($fileExtension));
    
    $newFileName = date("y.m.d")."-".date("h.i.sa")."-".$fileName;

    $targetDirectory = "uploads/". $newFileName;
    
    move_uploaded_file($_FILES["balanceFile"]["tmp_name"], $targetDirectory);

    error_reporting(0);
    ini_set('display_errors',0);

    require "excelReader/excel_reader2.php";
    require "excelReader/SpreadsheetReader.php";

    $reader = new SpreadsheetReader($targetDirectory);
    foreach($reader as $key => $row)
    {
        $customer = strtoupper($row[0]);
        $last_update = strtoupper($row[1]);
        $total_receivable = strtoupper($row[2]);
 
        mysqli_query($conection, "INSERT INTO customer_balances VALUES('', '$customer', '$last_update',
         '$total_receivable')"); 
        
        $error = mysqli_error($conection);
        $typ="balances";
        var_dump($error);
        header("Location: menu.php?user=$email&type=$type&msg=1"); 
    } 
}

if(isset($_POST["import10"]))
{
    //print_r($_FILES);
    $fileName = $_FILES["journalEntries"]["name"];
    //$fileExtension = explode('.', $fileName);
    //$fileExtension - strtolower(end($fileExtension));
    
    $newFileName = date("y.m.d")."-".date("h.i.sa")."-".$fileName;

    $targetDirectory = "uploads/". $newFileName;
    
    move_uploaded_file($_FILES["journalEntries"]["tmp_name"], $targetDirectory);

    error_reporting(0);
    ini_set('display_errors',0);

    require "excelReader/excel_reader2.php";
    require "excelReader/SpreadsheetReader.php";

    $reader = new SpreadsheetReader($targetDirectory);
    foreach($reader as $key => $row)
    {
        $create_on = strtoupper($row[0]);
        $date = strtoupper($row[1]);
        $number = strtoupper($row[2]);
        $customer = strtoupper($row[3]);
        $reference = strtoupper($row[4]);
        $journal = strtoupper($row[5]);
        $status = strtoupper($row[6]);
        $amount = strtoupper($row[7]);
 
        mysqli_query($conection, "INSERT INTO journal_entries VALUES('', '$create_on', '$date',
         '$number', '$customer', '$reference', '$journal', '$status', '$amount')"); 
        
        $error = mysqli_error($conection);
        $typ="balances";
        header("Location: menu.php?user=$email&type=$type&msg=1"); 
    } 
}

if(isset($_POST["import11"]))
{
    //print_r($_FILES);
    $fileName = $_FILES["journalItems"]["name"];
    //$fileExtension = explode('.', $fileName);
    //$fileExtension - strtolower(end($fileExtension));
    
    $newFileName = date("y.m.d")."-".date("h.i.sa")."-".$fileName;

    $targetDirectory = "uploads/". $newFileName;
    
    move_uploaded_file($_FILES["journalItems"]["tmp_name"], $targetDirectory);

    error_reporting(0);
    ini_set('display_errors',0);

    require "excelReader/excel_reader2.php";
    require "excelReader/SpreadsheetReader.php";

    $reader = new SpreadsheetReader($targetDirectory);
    foreach($reader as $key => $row)
    {
        $created_on = strtoupper($row[0]);
        $number = strtoupper($row[1]);
        $account = strtoupper($row[2]);
        $customer = strtoupper($row[3]);
        $label = strtoupper($row[4]);
        $reference = strtoupper($row[5]);
        $debit = strtoupper($row[6]);
        $credit = strtoupper($row[7]);
        $due_date = strtoupper($row[8]);
 
        mysqli_query($conection, "INSERT INTO journal_items VALUES('', '$created_on', '$number',
         '$account', '$customer', '$label', '$reference', '$debit', '$credit', '$due_date')"); 
        
        $error = mysqli_error($conection);
        $typ="balances";
        var_dump($error);
        header("Location: menu.php?user=$email&type=$type&msg=1");  
    } 
}

//Website Structure
Page::head2();
Page::header2($email, $type);
Page::formAdd($typ);
Page::footer2();
Page::endHead2();

 ?>