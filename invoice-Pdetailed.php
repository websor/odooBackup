<?php
/**
 * Including external classes
 */
require_once('Page.class.php');
require_once('Class/Purchases.class.php');
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
$newInvoice = new Purchases();

$query_user = "select * from purchases where purchase_number = '$inv';";
$result_User = mysqli_query($conection,$query_user);
while($row_user = mysqli_fetch_assoc($result_User))
{ 
    $newInvoice = new Purchases();
    $newInvoice->setPurchase_number($row_user['purchase_number']);
    $newInvoice->setOrder_date($row_user['order_date']);
    $newInvoice->setVendor($row_user['vendor']);
    $newInvoice->setSchedule_date($row_user['schedule_date']);
    $newInvoice->setSales_person($row_user['sales_person']);
    $newInvoice->setSource_document($row_user['source_document']); 
    $newInvoice->setUntaxed_amount($row_user['untaxed_amount']);  
    $newInvoice->setTotal($row_user['total']); 
    $newInvoice->setStellar_status($row_user['stellar_status']); 
    $newInvoice->setStatus($row_user['status']); 
    $newInvoice->setCurrancy($row_user['currancy']); 
    $newInvoice->setVendor_reference($row_user['vendor_reference']); 
    $newInvoice->setDeliver_to($row_user['deliver_to']); 
    $newInvoice->setBroker($row_user['broker']);
    $newInvoice->setInvoice_number($row_user['invoice_number']);  
    $newInvoice->setSales_number($row_user['sales_number']);
    $newInvoice->setBill_reference($row_user['bill_reference']);  
    $newInvoice->setComments($row_user['comments']);
    $newInvoice->setTerms($row_user['terms']);  
    $newInvoice->setTax($row_user['tax']);    

}

/**
* Call to the database to get all the invoices lines
* 
*/ 
$invoiceLines = array();
$query_user_line = "select * from purchase_line where purchase_number = '$inv';";
$result_User_line = mysqli_query($conection,$query_user_line);
while($row_user = mysqli_fetch_assoc($result_User_line))
{ 
    $newInvoiceLine = new PurchasesLine();
    $newInvoiceLine->setSku($row_user['sku']);
    $newInvoiceLine->setProduct($row_user['product']);
    $newInvoiceLine->setQuantity($row_user['quantity']);
    $newInvoiceLine->setUnit_cost($row_user['unit_cost']);
    $newInvoiceLine->setTaxes($row_user['taxes']);
    $newInvoiceLine->setSubtotal($row_user['subtotal']);
    $newInvoiceLine->setPurchase_number($row_user['purchase_number']); 
    $newInvoiceLine->setVendor($row_user['vendor']);  
    $newInvoiceLine->setTotal($row_user['total']); 
    $newInvoiceLine->setReceive_qty($row_user['received_qty']); 
    $newInvoiceLine->setCreated_on($row_user['created_on']);  

    $invoiceLines[] = $newInvoiceLine;
} 

//Website Structure
Page::head2();
Page::header2($email, $type);
Page::invoicePDetailed($typ, $newInvoice, $invoiceLines, $email, $type, $inv);
Page::footer2();
Page::endHead2();

 ?>