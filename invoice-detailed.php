<?php
/**
 * Including external classes
 */
require_once('Page.class.php');
require_once('Class/Invoice.class.php');
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

 if(isset($_GET["inv"]))
 {
     $inv = $_GET["inv"];
 }
 else
 {
     $inv = "";
 }

 

 //check post for print
 if(isset($_POST["print"]))
 {
    require('fpdf/fpdf.php');

    /* class PDF extends FPDF {
  
        // Page header
        function Header() {
              
            // Add logo to page
            $this->Image('images/logo.png',10,10,60);
              
            // Move to the right
            $this->Cell(70);
            // Header
            // Set font family to Arial bold 
            $this->SetFont('Arial','b',16);
            $this->Cell(10,3,'Remit To',0,0,'C');

            // Set font family to Arial bold 
            $this->SetFont('Arial','',16);
            $this->Cell(15,17,'Stellar Wholesale Inc',0,0,'C');

            // Set font family to Arial bold 
            $this->SetFont('Arial','',12);
            $this->Cell(8,30,'602-19055 Airport Way',0,0,'C');
              
            // Line break
            $this->Ln(31);
        }
      
        // Page footer
        function Footer() {
              
            // Position at 1.5 cm from bottom
            $this->SetY(-15);
              
            // Arial italic 8
            $this->SetFont('Arial','I',8);
              
            // Page number
            $this->Cell(0,10,'Page ' . 
                $this->PageNo() . '/{nb}',0,0,'C');
        }
    } */

    // Instantiate and use the FPDF class 
    $pdf = new FPDF();
    
    //Add a new page
    $pdf->AddPage();
    
    // Add logo to page
    $pdf->Image('images/logo.png',10,10,60);
    // Set the font for the text
    $pdf->SetFont('Arial', 'B', 18);
     // Move to the right
    $pdf->Cell(70);
    $pdf->Cell(70,5,'Remit To:');
    $pdf->SetFont('Arial', 'b', 18);
    $pdf->Cell(10);
    $pdf->Cell(60,5,'INVOICE');
    // Line break
    $pdf->Ln(20);
    $pdf->SetFont('Arial', '', 16);
    $pdf->Cell(70);
    $pdf->Cell(70,-20,'Stellar Wholesale Inc');
    $pdf->Cell(4);
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(60,-20,'DATE        TRANSACTION #');
    // Line break
    $pdf->Ln(20);
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(70);
    $pdf->Cell(70,-48,'602-19055 Airport Way');
    $pdf->Cell(4);
    $pdf->SetFont('Arial', '', 8);
    $pdf->Cell(60,-48,'09/06/2023        INV/2023/2015');
    // Line break
    $pdf->Ln(20);
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(70);
    $pdf->Cell(70,-77,'Pitt Meadows BC V3Y 0G4');
    $pdf->Cell(4);
    $pdf->SetFont('Arial', '', 8);
    $pdf->Cell(60,-77,'Entered By / Entree Par: Alfredo Morales');
    // Line break
    $pdf->Ln(20);
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(70);
    $pdf->Cell(70,-105,'Canada, 6044384025');
     // Line break
     $pdf->Ln(20);
     $pdf->SetFont('Arial', '', 12);
     $pdf->Cell(70);
     $pdf->Cell(70,-135,'info@stellarinc.ca');
    // Line break
    $pdf->Ln(7);
    $pdf->SetFont('Arial', 'b', 12);
    $pdf->Cell(68,-135,'Bill TO / VENDUA');
    $pdf->Cell(1);
    $pdf->SetFont('Arial', 'b', 12);
    $pdf->Cell(-10,-135,'SHIP TO / EXPEDIER A:');
    $pdf->Cell(85);
    $pdf->SetFont('Arial', '', 8);
    $pdf->Cell(10,-135,'NOTES:');
    // Line break
    $pdf->Ln(7);
    $pdf->SetFont('Arial', '', 8);
    $pdf->Cell(68,-140,'VALLEY INDOOR BC LTD (DBA)');
    $pdf->Cell(1);
    $pdf->SetFont('Arial', '', 8);
    $pdf->Cell(-10,-140,'VALLEY INDOOR BC LTD (DBA), DAVE');
    $pdf->Cell(85);
    $pdf->SetFont('Arial', '', 6);
    $pdf->Cell(10,-140,'THIS IS THE SPOR FOR NOTES:');
    // Line break
    $pdf->Ln(7);
    $pdf->SetFont('Arial', '', 8);
    $pdf->Cell(68,-147,'P.O. BOX #70');
    $pdf->Cell(1);
    $pdf->SetFont('Arial', '', 8);
    $pdf->Cell(-10,-147,' UNIT 103 - 44195 YALE ROAD WEST');
    // Line break
    $pdf->Ln(7);
    $pdf->SetFont('Arial', '', 8);
    $pdf->Cell(68,-154,'51211 YALE RD.');
    $pdf->Cell(1);
    $pdf->SetFont('Arial', '', 8);
    $pdf->Cell(-10,-154,'CHILLIWACK BC V2R 4H2');
    // Line break
    $pdf->Ln(7);
    $pdf->SetFont('Arial', '', 8);
    $pdf->Cell(68,-161,'ROSEDALE BC V0X 1X0');
    $pdf->Cell(1);
    $pdf->SetFont('Arial', '', 8);
    $pdf->Cell(-10,-161,'');
    // Line break
    $pdf->Ln(7);
    $pdf->SetFont('Arial', '', 8);
    $pdf->Cell(68,-168,'Canada');
    $pdf->Cell(1);
    $pdf->SetFont('Arial', '', 8);
    $pdf->Cell(-10,-168,'Canada');
    // Line break
    $pdf->Ln(7);
    $pdf->SetFont('Arial', 'b', 8);
    $pdf->Cell(-30,-168,'Order Number                       Order Date                           Customer No.                         Term                           PO #                      Ship Date');
    // Line break
    $pdf->Ln(7);
    $pdf->SetFont('Arial', '', 8);
    $pdf->Cell(-30,-170,'Order Number                       Order Date                           Customer No.                         Term                           PO #                      Ship Date');
    // Line break
    $pdf->Ln(7);
    $pdf->SetFont('Arial', 'b', 8);
    $pdf->Cell(-30,-170,'QTY Ordered    Qty Ship    Qty Bo        Item Number               Description                                                          Unit Price                    Total');
    // Line break
    $pdf->Ln(7);
    $pdf->SetFont('Arial', '', 8);
    $pdf->Cell(-30,-170,'2                              2              0                     55050                   ATHENA VP DOME 48" x 72" X 16" (1)                  $ 173.99                    $ 347.98');




    
    // Prints a cell with given text 
    //$pdf->Cell(60,20,'Hello GeeksforGeeks!');
    
    // return the generated output
    $pdf->Output();
 }

 /**
* Call to the database to get the invoices
* 
*/ 
$newInvoice = new Invoice();

$query_user = "select * from invoices where invoice_number = '$inv';";
$result_User = mysqli_query($conection,$query_user);
while($row_user = mysqli_fetch_assoc($result_User))
{ 
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
}

/**
* Call to the database to get all the invoices lines
* 
*/ 
$invoiceLines = array();
$query_user_line = "select * from invoice_line where invoice_number = '$inv';";
$result_User_line = mysqli_query($conection,$query_user_line);
while($row_user = mysqli_fetch_assoc($result_User_line))
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

    $invoiceLines[] = $newInvoiceLine;
} 

//Website Structure
Page::head2();
Page::header2($email, $type);
Page::invoiceDetailed($typ, $newInvoice, $invoiceLines, $email, $type, $inv);
Page::footer2();
Page::endHead2();

 ?>