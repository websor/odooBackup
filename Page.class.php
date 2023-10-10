<?php

class Page {


    static function head(){ ?>

        <!DOCTYPE html>
            <html lang="en">

            <head>
                <meta name="viewport" content="width=device-width, initial-scale=1" />
                <meta http-equiv="content-type" content="text/html; charset=utf-8" />
                <meta name="Alfredo Morales" content="Stellar Wholesale Odoo Backup" />
                <meta name="description" content="Themeforest Template Polo, html template">
                <link rel="icon" type="image/png" href="images/favicon.png">   
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <!-- Document title -->
                <title>Stellar Wholesale Odoo Backup</title>
                <!-- Stylesheets & Fonts -->
                <link href="css/style.css" rel="stylesheet">
            </head>

            <body>
                <!-- Body Inner -->
                <div class="container">

    <?php } 

    static function header($email, $type) { ?>
        <!-- Header -->
        <header>
            <img src="images/logo.png" class="imgLogo">
            <?php if($email != "") 
            { ?> 
            <span class="welcome"> Hello,  <?php echo $email ?></span>
            <a href="index.php?logout" class="addButton"><div>Logout</div></a>
            <?php if($type == 1){ ?>
                <a href="addInvoices.php?user=<?php echo $email; ?>&type=<?php echo $type; ?>&typ=Invoice" class="addButton"><div>Add Invoices</div></a>
            <?php } ?>
            <?php } 
            else{ ?>
            
            <?php }?>
            <?php if(isset($_GET["type"])){ ?>
                <a href="menu.php?user=<?php echo $email; ?>&type=<?php echo $type; ?>" class="addButton"><div>MENU</div></a>
            <?php } ?>
            
            
        </header>
    <?php } 

    static function login($error)
    { ?>
        <!-- Section -->
        <section>
            <div class="row">
                <?php if($error == 1)
                { ?>
                    <div class="error">The user does not exist</div>
                <?php } else if($error == 2) { ?>
                    <div class="error">wrong email or password. Please Try again</div>
                <?php } ?>
                <h3><b>SIGN IN</b></h3>
            </div>
        
                <form method="POST">
                    <div class="row">
                        <input type="email" required name="email" class="form-control" placeholder="Type your email">
                        <input type="password" required name="password" class="form-control" placeholder="Type your password">
                    </div>
                    <div class="row">
                        <button type="submit" class="btn">SIGN IN</button>
                    </div>
                </form>
        </section>
        <!-- end: Section -->
    </div>
    <!-- end: Body Inner -->
    <!-- Scroll top -->
    <a id="scrollTop"><i class="icon-chevron-up"></i><i class="icon-chevron-up"></i></a>
    <?php }

    static function footer() { ?>
        <!-- Footer -->
        <footer id="footer">
            <p>&copy; 2023 Stellar Wholesale Inc. All Rights Reserved.<a href="//www.stellarinc.ca" target="_blank" rel="noopener">Stellar Wholesale Inc</a></p>
        </footer>
        <!-- end: Footer -->
    <?php } 

    static function menu($email, $type){ ?>
        <section>
            <div class="row">
                <a href="menu-detailed?user=<?php echo $email; ?>&type=<?php echo $type; ?>typ=Inventory"><div class="card">
                    <h2>Inventory</h2>
                    <img src="images/inventory.png"/>
                </div></a>
                <a href="menu-detailed?typ=Customers"><div class="card">
                    <h2>Customers</h2>
                    <img src="images/customer.png"/>
                </div></a>
                <a href="menu-detailed?typ=Sales"><div class="card">
                    <h2>Sales Order</h2>
                    <img src="images/sales.png"/>
                </div></a>
                <a href="menu-detailed?typ=Invoices&user=<?php echo $email; ?>&type=<?php echo $type; ?>"><div class="card">
                    <h2>Invoices</h2>
                    <img src="images/invoice.png"/>
                </div></a>
                <a href="menu-CNdetailed?user=<?php echo $email; ?>&type=<?php echo $type; ?>&typ=CreditNote"><div class="card">
                    <h2>Credit Notes</h2>
                    <img src="images/credit.png"/>
                </div></a>
                <a href="menu-detailed?typ=Purchase"><div class="card">
                    <h2>Purchases</h2>
                    <img src="images/purchase.png"/>
                </div></a>
                <a href="menu-detailed?typ=Picking"><div class="card">
                    <h2>Picking</h2>
                    <img src="images/picking.png"/>
                </div></a>
                <a href="menu-detailed?typ=sn"><div class="card">
                    <h2>Serial Numbers</h2>
                    <img src="images/sn.png"/>
                </div></a>
            </div>
        </section>
   <?php }

static function menuCNdetailed($typ, $invoices, $user, $type, $invoice_number, $customerSearch, $dateSearch, $salesOrderSearch){ ?>
    <section>   
        <dic class="row">
           <!-- <h1> <?php echo $typ;?> </h1> -->
        </div>
        <dic class="row">
            <form method="post">
                <h1 class="menu-detailed-title"><?php echo $typ;?></h1>
                <?php if($invoice_number == ""){ ?><input type="text" placeholder="Credit Note Number" name="invoiceNumberSearch" class="search_field"> <?php }else{ ?> <input type="text" value="<?php echo $invoice_number; ?>" disabled name="invoiceNumberSearch" class="search_field"> <input type="text" value="<?php echo $invoice_number; ?>" name="invoiceNumberSearch" style="display:none;" /> <?php } ?>
                <?php if($salesOrderSearch == ""){ ?><input type="text" placeholder="Source Document" name="salesOrderSearch" class="search_field"><?php }else{ ?> <input type="text" value="<?php echo $salesOrderSearch; ?>" disabled placeholder="Sales Order Number" name="salesOrderSearch" class="search_field" > <input type="text" value="<?php echo $salesOrderSearch; ?>" name="salesOrderSearch" style="display:none;" /> <?php } ?>
                <?php if($dateSearch == ""){ ?><input type="text" placeholder="Invoice Date" name="invoiceDateSearch" class="search_field"><?php }else{ ?><input type="text" value="<?php echo $dateSearch; ?>" disabled placeholder="Invoice Date" name="invoiceDateSearch" class="search_field"><input type="text" value="<?php echo $dateSearch; ?>" name="invoiceDateSearch" style="display:none;" /><?php }  ?>
                <?php if($customerSearch == ""){ ?><input type="text" placeholder="Customer" name="customerSearch" class="search_field"><?php }else{ ?><input type="text" value="<?php echo $customerSearch; ?>" disabled placeholder="Customer" name="customerSearch" class="search_field"><input style="display:none;" type="text" style="width:300px" value="<?php echo $customerSearch; ?>" name="customerSearch"  /><?php } ?>
                <input type="submit" value="search" class="search_field" name="search">
                <input type="submit" value="Clear" class="search_field" name="clear">
            </form>
        </div>
        <div class="page_body">
            <table>
                <tr>
                    <th>Credit Note Number</th>
                    <th>Source Document</th>
                    <th>Customer</th>
                    <th>Sales Person</th>
                    <th>Invoice Date</th>
                    <th>Due Date</th>
                    <th>untaxed Amount</th>
                    <th>Amount Due</th>
                    <th>Tax</th>
                    <th>Total</th>
                    <th></th>
                </tr>
                <?php
                    /**
                     * READING THE INVOICE OBJECT
                     * 
                     */ 
                    foreach ($invoices as $invoice)
                    { ?>
                        <tr>
                            <td><?php echo $invoice->getCreditnote_number() ?></td>
                            <td><?php echo $invoice->getSource_document() ?></td>
                            <td><?php echo $invoice->getCustomer() ?></td>
                            <td><?php echo $invoice->getSales_person() ?></td>
                            <td><?php echo $invoice->getInvoice_date() ?></td>
                            <td><?php echo $invoice->getDue_date() ?></td>
                            <td><?php if($invoice->getUntaxed_amount()!=""){echo "$". $invoice->getUntaxed_amount();}else{echo "$0.00";} ?></td>
                            <td><?php if($invoice->getAmount_due()!=""){echo "$".$invoice->getAmount_due();}else{echo "$0.00";} ?></td>
                            <td><?php if($invoice->getTax()!=""){echo "$".$invoice->getTax();}else{echo "$0.00";} ?></td>
                            <td><?php if($invoice->getTotal()!=""){echo "$".$invoice->getTotal();}else{echo "$0.00";} ?></td>
                            <td><a href="invoice-CNdetailed.php?user=<?php echo $user; ?>&typ=<?php echo $typ; ?>&type=<?php echo $type; ?>&inv=<?php echo $invoice->getCreditnote_number(); ?>&searchInvoice=<?php echo $invoice_number; ?>&searchSale=<?php echo $salesOrderSearch; ?>&searchCustomer=<?php echo $customerSearch; ?>&searchDate=<?php echo $dateSearch; ?>"><input type="button" value="Open Invoice" class="openInvoice" /></a></td>
                        </tr></a>

                        <?php     
                    } 
                ?>
            </table>
        </div>
    </section>
<?php }

   static function menuDetailed($typ, $invoices, $user, $type, $invoice_number, $customerSearch, $dateSearch, $salesOrderSearch){ ?>
        <section>   
            <dic class="row">
               <!-- <h1> <?php echo $typ;?> </h1> -->
            </div>
            <dic class="row">
                <form method="post">
                    <h1 class="menu-detailed-title"><?php echo $typ;?></h1>
                    <?php if($invoice_number == ""){ ?><input type="text" placeholder="Invoice Number" name="invoiceNumberSearch" class="search_field"> <?php }else{ ?> <input type="text" value="<?php echo $invoice_number; ?>" disabled name="invoiceNumberSearch" class="search_field"> <input type="text" value="<?php echo $invoice_number; ?>" name="invoiceNumberSearch" style="display:none;" /> <?php } ?>
                    <?php if($salesOrderSearch == ""){ ?><input type="text" placeholder="Sales Order Number" name="salesOrderSearch" class="search_field"><?php }else{ ?> <input type="text" value="<?php echo $salesOrderSearch; ?>" disabled placeholder="Sales Order Number" name="salesOrderSearch" class="search_field" > <input type="text" value="<?php echo $salesOrderSearch; ?>" name="salesOrderSearch" style="display:none;" /> <?php } ?>
                    <?php if($dateSearch == ""){ ?><input type="text" placeholder="Invoice Date" name="invoiceDateSearch" class="search_field"><?php }else{ ?><input type="text" value="<?php echo $dateSearch; ?>" disabled placeholder="Invoice Date" name="invoiceDateSearch" class="search_field"><input type="text" value="<?php echo $dateSearch; ?>" name="invoiceDateSearch" style="display:none;" /><?php }  ?>
                    <?php if($customerSearch == ""){ ?><input type="text" placeholder="Customer" name="customerSearch" class="search_field"><?php }else{ ?><input type="text" value="<?php echo $customerSearch; ?>" disabled placeholder="Customer" name="customerSearch" class="search_field"><input style="display:none;" type="text" style="width:300px" value="<?php echo $customerSearch; ?>" name="customerSearch"  /><?php } ?>
                    <input type="submit" value="search" class="search_field" name="search">
                    <?php if($invoice_number != "" || $customerSearch == "" || $dateSearch == "" || $salesOrderSearch == ""){ ?><input type="submit" value="Clear" class="search_field" name="clear"><?php }else{} ?>
                </form>
            </div>
            <div class="page_body">
                <table>
                    <tr>
                        <th>Inovice Number</th>
                        <th>Sales Order</th>
                        <th>Customer</th>
                        <th>Sales Person</th>
                        <th>Invoice Date</th>
                        <th>Due Date</th>
                        <th>untaxed Amount</th>
                        <th>Amount Due</th>
                        <th>Tax</th>
                        <th>Total</th>
                        <th></th>
                    </tr>
                    <?php
                        /**
                         * READING THE INVOICE OBJECT
                         * 
                         */ 
                        foreach ($invoices as $invoice)
                        { ?>
                            <tr>
                                <td><?php echo $invoice->getInvoiceNumber() ?></td>
                                <td><?php echo $invoice->getSalesOrder() ?></td>
                                <td><?php echo $invoice->getCustomer() ?></td>
                                <td><?php echo $invoice->getSalesPerson() ?></td>
                                <td><?php echo $invoice->getInvoiceDate() ?></td>
                                <td><?php echo $invoice->getDueDate() ?></td>
                                <td><?php if($invoice->getUntaxedAmount()!=""){echo "$". $invoice->getUntaxedAmount();}else{echo "$0.00";} ?></td>
                                <td><?php if($invoice->getAmountDue()!=""){echo "$".$invoice->getAmountDue();}else{echo "$0.00";} ?></td>
                                <td><?php if($invoice->getTax()!=""){echo "$".$invoice->getTax();}else{echo "$0.00";} ?></td>
                                <td><?php if($invoice->getTotal()!=""){echo "$".$invoice->getTotal();}else{echo "$0.00";} ?></td>
                                <td><a href="invoice-detailed.php?user=<?php echo $user; ?>&typ=<?php echo $typ; ?>&type=<?php echo $type; ?>&inv=<?php echo $invoice->getInvoiceNumber(); ?>&searchInvoice=<?php echo $invoice_number; ?>&searchSale=<?php echo $salesOrderSearch; ?>&searchCustomer=<?php echo $customerSearch; ?>&searchDate=<?php echo $dateSearch; ?>"><input type="button" value="Open Invoice" class="openInvoice" /></a></td>
                            </tr></a>

                            <?php     
                        } 
                    ?>
                </table>
            </div>
        </section>
   <?php }

static function invoiceCNDetailed($typ, $invoice, $invoice_lines, $user, $type, $invo){ 
    
    
    foreach ($invoice as $inv)
    {
        $customer = $invoice->getCustomer();
        $delivery_address = $invoice->getAddress();
        $payment_terms = $invoice->getPayment_terms();
        $global = $invoice->getGlobal_comments();
        $invoice_notes = $invoice->getInvoices_notes();
        $customerNotes = $invoice->getCustomer_notes();
        $invoice_date = $invoice->getInvoice_date();
        $due_date = $invoice->getDue_date();
        $sales_person = $invoice->getSales_person();
        $customer_po = $invoice->getCustomer_po();
        $warehouse_notes = $invoice->getWarehouse_note();
        $untaxed_amount_total = $invoice->getUntaxed_amount();
        $total_taxes = $invoice->getTax();
        $total_total = $invoice->getTotal();
        $amount_due_total = $invoice->getAmount_due();
    }
    
    
    ?>

    <section class="inv-content">   
        <div class="row">
            <h1 class="menu-detailed-title"> <?php echo $invo;?> </h1>
            <a href="menu-CNdetailed.php?user=<?php echo $user; ?>&typ=<?php echo $typ; ?>&type=<?php echo $type; ?>"><input type="button" value="Go back" name="goBack" class="print_button" /></a>
            <form method="POST">
                <input type="submit" value="Print" name="print" class="print_button" />
            </form>

        </div>
        <div class="row">
            <div class="invoice-table">
                <table>
                    <tr>
                        <td style="width:200px; font-weight:bold;">Customers</td>
                        <td><?php echo $customer; ?></td>
                    </tr>
                    <tr>
                        <td style="width:200px; font-weight:bold;">Delivery Address</td>
                        <td><?php echo $delivery_address; ?></td>
                    </tr>
                    <tr>
                        <td style="width:200px; font-weight:bold;">Payment Terms</td>
                        <td><?php echo $payment_terms; ?></td>
                    </tr>
                    <tr>
                        <td style="width:200px; font-weight:bold;">Global Comments</td>
                        <td><?php echo $global; ?></td>
                    </tr>
                    <tr>
                        <td style="width:200px; font-weight:bold;">Invoice Notes</td>
                        <td><?php echo $invoice_notes; ?></td>
                    </tr>
                    <tr>
                        <td style="width:200px; font-weight:bold;">Customer Notes</td>
                        <td><?php echo $customerNotes; ?></td>
                    </tr>
                </table>
            </div>
            <div class="invoice-table">
                <table>
                    <tr>
                        <td style="width:200px; font-weight:bold;">Invoice Date</td>
                        <td><?php echo $invoice_date; ?></td>
                    </tr>
                    <tr>
                        <td style="width:200px; font-weight:bold;">Due Date</td>
                        <td><?php echo $due_date; ?></td>
                    </tr>
                    <tr>
                        <td style="width:200px; font-weight:bold;">Sales Person</td>
                        <td><?php echo $sales_person; ?></td>
                    </tr>
                    
                    <tr>
                        <td style="width:200px; font-weight:bold;">Customer PO#</td>
                        <td><?php echo $customer_po; ?></td>
                    </tr>
                    <tr>
                        <td style="width:200px; font-weight:bold;">Warehouse Notes</td>
                        <td><?php echo $warehouse_notes; ?></td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="invoice-line-table">
                    <table>
                        <tr>
                            <th>Sku</th>
                            <th>Product</th>
                            <th>Serial Number</th>
                            <th>Notes</th>
                            <th>RMA Notes</th>
                            <th>QTY Ordered</th>
                            <th>Quantity</th>
                            <th>QTY Bo</th>
                            <th>Price</th>
                            <th>Unit Price after Disocunt</th>
                            <th>Taxes</th>
                            <th>Subtotal</th>
                        </tr>
                        
                        <?php
                        
                            foreach($invoice_lines as $line)
                            { ?>
                                <tr>
                                    <td><?php echo $line->getSku(); ?></td>
                                    <td><?php echo $line->getProduct(); ?></td>
                                    <td><?php echo $line->getSerial() ?></td>
                                    <td><?php echo $line->getNotes(); ?></td>
                                    <td><?php echo $line->getRma(); ?></td>
                                    <td><?php echo $line->getQty_delivered(); ?></td>
                                    <td><?php echo $line->getQuantity(); ?></td>
                                    <td><?php echo $line->getQuantity_bo(); ?></td>
                                    <td>$<?php echo $line->getUnit_price(); ?></td>
                                    <td>$<?php echo $line->getUnit_price_after(); ?></td>
                                    <td><?php echo $line->getTaxes(); ?></td>
                                    <td>$<?php echo $line->getUntaxed_amount(); ?></td>
                                </tr>
                           <?php }
                        
                        ?>
                   
                    </table>
            </div>
        </div>
        <div class="row">
            <div class="invoice-total-line">
                    <table>
                        <tr>
                            <td>Untaxed Amount:</td>
                            <td>$<?php if($untaxed_amount_total == ""){echo "0.00";}else{echo $untaxed_amount_total;} ?></td>
                        </tr>
                        <tr>
                            <td>Tax:</td>
                            <td>$<?php if($total_taxes == ""){echo "0.00";}else{echo $total_taxes;} ?></td>
                        </tr>
                        <tr>
                            <td>Total:</td>
                            <td>$<?php if($total_total == ""){echo "0.00";}else{echo $total_total;} ?></td>
                        </tr>
                        <tr>
                            <td>Amount Due:</td>
                            <td>$<?php if($amount_due_total == ""){echo "0.00";}else{echo $amount_due_total;} ?></td>
                        </tr>
                    </table>
            </div>
        </div>
    </section>
<?php }


static function invoiceDetailed($typ, $invoice, $invoice_lines, $user, $type, $invo){ 
    
    
    foreach ($invoice as $inv)
    {

        $customer = $invoice->getCustomer();
        $delivery_address = $invoice->getDeliveryAddress();
        $payment_terms = $invoice->getPaymentTerm();
        $global = $invoice->getGlobalComments();
        $invoice_notes = $invoice->getInvoiceNotes();
        $customerNotes = $invoice->getCustomerNotes();
        $invoice_date = $invoice->getInvoiceDate();
        $due_date = $invoice->getDueDate();
        $sales_person = $invoice->getSalesPerson();
        $sales_team = $invoice->getSalesTeam();
        $customer_po = $invoice->getCustomerPo();
        $warehouse_notes = $invoice->getWarehouseNotes();
        $untaxed_amount_total = $invoice->getUntaxedAmount();
        $total_taxes = $invoice->getTax();
        $total_total = $invoice->getTotal();
        $amount_due_total = $invoice->getAmountDue();
    }
    
    
    ?>

    <section class="inv-content">   
        <div class="row">
            <h1 class="menu-detailed-title"> <?php echo $invo;?> </h1>
            <a href="menu-detailed.php?user=<?php echo $user; ?>&typ=<?php echo $typ; ?>&type=<?php echo $type; ?>"><input type="button" value="Go back" name="goBack" class="print_button" /></a>
            <form method="POST">
                <input type="submit" value="Print" name="print" class="print_button" />
            </form>

        </div>
        <div class="row">
            <div class="invoice-table">
                <table>
                    <tr>
                        <td style="width:200px; font-weight:bold;">Customers</td>
                        <td><?php echo $customer; ?></td>
                    </tr>
                    <tr>
                        <td style="width:200px; font-weight:bold;">Delivery Address</td>
                        <td><?php echo $delivery_address; ?></td>
                    </tr>
                    <tr>
                        <td style="width:200px; font-weight:bold;">Payment Terms</td>
                        <td><?php echo $payment_terms; ?></td>
                    </tr>
                    <tr>
                        <td style="width:200px; font-weight:bold;">Global Comments</td>
                        <td><?php echo $global; ?></td>
                    </tr>
                    <tr>
                        <td style="width:200px; font-weight:bold;">Invoice Notes</td>
                        <td><?php echo $invoice_notes; ?></td>
                    </tr>
                    <tr>
                        <td style="width:200px; font-weight:bold;">Customer Notes</td>
                        <td><?php echo $customerNotes; ?></td>
                    </tr>
                </table>
            </div>
            <div class="invoice-table">
                <table>
                    <tr>
                        <td style="width:200px; font-weight:bold;">Invoice Date</td>
                        <td><?php echo $invoice_date; ?></td>
                    </tr>
                    <tr>
                        <td style="width:200px; font-weight:bold;">Due Date</td>
                        <td><?php echo $due_date; ?></td>
                    </tr>
                    <tr>
                        <td style="width:200px; font-weight:bold;">Sales Person</td>
                        <td><?php echo $sales_person; ?></td>
                    </tr>
                    <tr>
                        <td style="width:200px; font-weight:bold;">Sales Team</td>
                        <td><?php echo $sales_team; ?></td>
                    </tr>
                    <tr>
                        <td style="width:200px; font-weight:bold;">Customer PO#</td>
                        <td><?php echo $customer_po; ?></td>
                    </tr>
                    <tr>
                        <td style="width:200px; font-weight:bold;">Warehouse Notes</td>
                        <td><?php echo $warehouse_notes; ?></td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="invoice-line-table">
                    <table>
                        <tr>
                            <th>Sku</th>
                            <th>Product</th>
                            <th>Serial Number</th>
                            <th>Notes</th>
                            <th>RMA Notes</th>
                            <th>QTY Ordered</th>
                            <th>Quantity</th>
                            <th>QTY Bo</th>
                            <th>Price</th>
                            <th>Unit Price after Disocunt</th>
                            <th>Taxes</th>
                            <th>Subtotal</th>
                        </tr>
                        
                        <?php
                        
                            foreach($invoice_lines as $line)
                            { ?>
                                <tr>
                                    <td><?php echo $line->getSku(); ?></td>
                                    <td><?php echo $line->getProduct(); ?></td>
                                    <td><?php echo $line->getSerial() ?></td>
                                    <td><?php echo $line->getNotes(); ?></td>
                                    <td><?php echo $line->getRma(); ?></td>
                                    <td><?php echo $line->getQty_delivered(); ?></td>
                                    <td><?php echo $line->getQuantity(); ?></td>
                                    <td><?php echo $line->getQuantity_bo(); ?></td>
                                    <td>$<?php echo $line->getUnit_price(); ?></td>
                                    <td>$<?php echo $line->getUnit_price_after(); ?></td>
                                    <td><?php echo $line->getTaxes(); ?></td>
                                    <td>$<?php echo $line->getUntaxed_amount(); ?></td>
                                </tr>
                           <?php }
                        
                        ?>
                   
                    </table>
            </div>
        </div>
        <div class="row">
            <div class="invoice-total-line">
                    <table>
                        <tr>
                            <td>Untaxed Amount:</td>
                            <td>$<?php if($untaxed_amount_total == ""){echo "0.00";}else{echo $untaxed_amount_total;} ?></td>
                        </tr>
                        <tr>
                            <td>Tax:</td>
                            <td>$<?php if($total_taxes == ""){echo "0.00";}else{echo $total_taxes;} ?></td>
                        </tr>
                        <tr>
                            <td>Total:</td>
                            <td>$<?php if($total_total == ""){echo "0.00";}else{echo $total_total;} ?></td>
                        </tr>
                        <tr>
                            <td>Amount Due:</td>
                            <td>$<?php if($amount_due_total == ""){echo "0.00";}else{echo $amount_due_total;} ?></td>
                        </tr>
                    </table>
            </div>
        </div>
    </section>
<?php }

static function formAdd($typ){ ?>
    <section>   
        <div class="adding_block">
            <div class="row">
                <h1> <?php echo "Add the ".$typ;?> file lot</h1>
            </div>
            <div class="row">
                <form method="POST" enctype="multipart/form-data">
                    <input type="file" name="invoiceFile"/> <br><br>
                    <input type="submit" value="Submit file" name="import" style="background:#152c4e; color:white;"/>
                    <br><br><br><br>
                </form>
            </div>
        </div>

        <div class="adding_block">
            <div class="row">
                <h1>Add the invoice line file lot</h1>
            </div>
            <div class="row">
                <form method="POST" enctype="multipart/form-data">
                    <input type="file" name="invoiceLineFile"/> <br><br>
                    <input type="submit" value="Submit file" name="import2" style="background:#152c4e; color:white;"/>
                    <br><br><br><br>
                </form>
            </div>
        </div>

        <div class="adding_block">
            <div class="row">
                <h1>Add the CreditNote line file lot</h1>
            </div>
            <div class="row">
                <form method="POST" enctype="multipart/form-data">
                    <input type="file" name="creditNoteFile"/> <br><br>
                    <input type="submit" value="Submit file" name="import3" style="background:#152c4e; color:white;"/>
                    <br><br><br><br>
                </form>
            </div>
        </div>

    </section>
<?php }

    static function endHead(){ ?>
            

            </div><!-- End COntainer -->
        </div>
        <!-- End Body -->
    <?php }

} ?>