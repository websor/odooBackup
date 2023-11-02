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
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
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

    static function menu($email, $type, $msg){ ?>
        <section>
            <div class="row">
                <?php if($msg==""){ ?><div class="succes" id="msg" style="display:none;">The file has been uploaded SUCCESSFULLY </div> <?php }else{ ?> <div class="succes" id="msg">The file has been uploaded SUCCESSFULLY </div> <?php } ?>
               
                <a href="menu-INdetailed?typ=Inventory&user=<?php echo $email; ?>&type=<?php echo $type; ?>"><div class="card">
                    <h2>Inventory</h2>
                    <img src="images/inventory.png"/>
                </div></a>
                <a href="menu-CLIdetailed?typ=Customer&user=<?php echo $email; ?>&type=<?php echo $type; ?>"><div class="card">
                    <h2>Customers</h2>
                    <img src="images/customer.png"/>
                </div></a>
                <a href="menu-Badetailed?user=<?php echo $email; ?>&type=<?php echo $type; ?>&typ=balances"><div class="card">
                    <h2>Customer Balances</h2>
                    <img src="images/balance.png"/>
                </div></a>
                <a href="menu-detailed?typ=Invoices&user=<?php echo $email; ?>&type=<?php echo $type; ?>"><div class="card">
                    <h2>Invoices</h2>
                    <img src="images/invoice.png"/>
                </div></a>
                <a href="menu-ILdetailed?user=<?php echo $email; ?>&type=<?php echo $type; ?>&typ=Invoice Line"><div class="card">
                    <h2>Invoice Line</h2>
                    <img src="images/sn.png"/>
                </div></a>
                <a href="menu-CNdetailed?user=<?php echo $email; ?>&type=<?php echo $type; ?>&typ=CreditNote"><div class="card">
                    <h2>Credit Notes</h2>
                    <img src="images/credit.png"/>
                </div></a>
                <a href="menu-Pdetailed?user=<?php echo $email; ?>&type=<?php echo $type; ?>&typ=Purchases"><div class="card">
                    <h2>Purchases</h2>
                    <img src="images/purchase.png"/>
                </div></a>
                <a href="menu-Padetailed?user=<?php echo $email; ?>&type=<?php echo $type; ?>&typ=Payments"><div class="card">
                    <h2>Payments</h2>
                    <img src="images/payment.png"/>
                </div></a>
                <a href="menu-JoEdetailed?user=<?php echo $email; ?>&type=<?php echo $type; ?>&typ=Journal Entries"><div class="card">
                    <h2>Journal Entries</h2>
                    <img src="images/journal_entries.png"/>
                </div></a>
                <a href="menu-MoDetailed?user=<?php echo $email; ?>&type=<?php echo $type; ?>&typ=Montly Reports"><div class="card">
                    <h2>Monthly Reports</h2>
                    <img src="images/rpeorts.png"/>
                </div></a>
            </div>
        </section>
   <?php }

static function menuCNdetailed($typ, $invoices, $user, $type, $invoice_number, $customerSearch, $dateSearch, $salesOrderSearch, $count){ ?>
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
                <spam>Total Rows: <?php echo $count; ?></spam>
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

static function menuMonDetailed($typ, $user, $type){ ?>
    <section>   
        <dic class="row">
            <h1> <?php echo $typ; ?> </h1> 
        </div>

        <div class="page_body">
            <table>
                <tr>
                    <th>Monthly Report Package</th>
                    <th></th>
                </tr> 
                <!-- 2023 -->
                <tr>
                    <td>October 2023</td>
                    <td><a href=""><input type="submit" name="Download" value="Download" style="width:20%; height:40px;"/></a></td>
                </tr>
                <tr>
                    <td>September 2023</td>
                    <td><a href="reports/2023/2023_September.zip" download><input type="submit" name="Download" value="Download" style="width:20%; height:40px;"/></a></td>
                </tr>
                <tr>
                    <td>August 2023</td>
                    <td><a href="reports/2023/2023 August.zip" download><input type="submit" name="Download" value="Download" style="width:20%; height:40px;"/></a></td>
                </tr>
                <tr>
                    <td>July 2023</td>
                    <td><a href="reports/2023/2023 July.zip" download><input type="submit" name="Download" value="Download" style="width:20%; height:40px;"/></a></td>
                </tr>
                <tr>
                    <td>June 2023</td>
                    <td><a href="reports/2023/2023 June.zip" download><input type="submit" name="Download" value="Download" style="width:20%; height:40px;"/></a></td>
                </tr>
                <tr>
                    <td>May 2023</td>
                    <td><a href="reports/2023/2023 May.zip" download><input type="submit" name="Download" value="Download" style="width:20%; height:40px;"/></a></td>
                </tr>
                <tr>
                    <td>April 2023</td>
                    <td><a href="reports/2023/2023 April.zip" download><input type="submit" name="Download" value="Download" style="width:20%; height:40px;"/></a></td>
                </tr>
                <tr>
                    <td>March 2023</td>
                    <td><a href="reports/2023/2023 March.zip" download><input type="submit" name="Download" value="Download" style="width:20%; height:40px;"/></a></td>
                </tr>
                <tr>
                    <td>February 2023</td>
                    <td><a href="reports/2023/2023 February.zip" download><input type="submit" name="Download" value="Download" style="width:20%; height:40px;"/></a></td>
                </tr> 
                <tr>
                    <td>January 2023</td>
                    <td><a href="reports/2023/2023 January.zip" download><input type="submit" name="Download" value="Download" style="width:20%; height:40px;"/></a></td>
                </tr> 
                <!-- END 2023 --> 

                <!--  2022 --> 
                <tr>
                    <td>December 2022</td>
                    <td><a href="reports/2022/2022 December.zip" download><input type="submit" name="Download" value="Download" style="width:20%; height:40px;"/></a></td>
                </tr>
                <tr>
                    <td>November 2022</td>
                    <td><a href="reports/2022/2022 November.zip" download><input type="submit" name="Download" value="Download" style="width:20%; height:40px;"/></a></td>
                </tr>              
                <tr>
                    <td>October 2022</td>
                    <td><a href="reports/2022/2022 October.zip" download><input type="submit" name="Download" value="Download" style="width:20%; height:40px;"/></a></td>
                </tr>
                <tr>
                    <td>September 2022</td>
                    <td><a href="reports/2022/2022 September.zip" download><input type="submit" name="Download" value="Download" style="width:20%; height:40px;"/></a></td>
                </tr>
                <tr>
                    <td>August 2022</td>
                    <td><a href="reports/2022/2022 August.zip" download><input type="submit" name="Download" value="Download" style="width:20%; height:40px;"/></a></td>
                </tr>
                <tr>
                    <td>July 2022</td>
                    <td><a href="reports/2022/2022 July.zip" download><input type="submit" name="Download" value="Download" style="width:20%; height:40px;"/></a></td>
                </tr>
                <tr>
                    <td>June 2022</td>
                    <td><a href="reports/2022/2022 June.zip" download><input type="submit" name="Download" value="Download" style="width:20%; height:40px;"/></a></td>
                </tr>
                <tr>
                    <td>May 2022</td>
                    <td><a href="reports/2022/2022 May.zip" download><input type="submit" name="Download" value="Download" style="width:20%; height:40px;"/></a></td>
                </tr>
                <tr>
                    <td>April 2022</td>
                    <td><a href="reports/2022/2022 April.zip" download><input type="submit" name="Download" value="Download" style="width:20%; height:40px;"/></a></td>
                </tr>
                <tr>
                    <td>March 2022</td>
                    <td><a href="reports/2022/2022 March.zip" download><input type="submit" name="Download" value="Download" style="width:20%; height:40px;"/></a></td>
                </tr>
                <tr>
                    <td>February 2022</td>
                    <td><a href="reports/2022/2022 February.zip" download><input type="submit" name="Download" value="Download" style="width:20%; height:40px;"/></a></td>
                </tr> 
                <tr>
                    <td>January 2022</td>
                    <td><a href="reports/2022/2022 January.zip" download><input type="submit" name="Download" value="Download" style="width:20%; height:40px;"/></a></td>
                </tr>
                <!-- END 2022 -->

                <!-- 2021 -->
                <tr>
                    <td>December 2021</td>
                    <td><a href="reports/2021/December.zip" download><input type="submit" name="Download" value="Download" style="width:20%; height:40px;"/></a></td>
                </tr>
                <tr>
                    <td>November 2021</td>
                    <td><a href="reports/2021/November.zip" download><input type="submit" name="Download" value="Download" style="width:20%; height:40px;"/></a></td>
                </tr>              
                <tr>
                    <td>October 2021</td>
                    <td><a href="reports/2021/October.zip" download><input type="submit" name="Download" value="Download" style="width:20%; height:40px;"/></a></td>
                </tr>
                <tr>
                    <td>September 2021</td>
                    <td><a href="reports/2021/September.zip" download><input type="submit" name="Download" value="Download" style="width:20%; height:40px;"/></a></td>
                </tr>
                <tr>
                    <td>August 2021</td>
                    <td><a href="reports/2021/August.zip" download><input type="submit" name="Download" value="Download" style="width:20%; height:40px;"/></a></td>
                </tr>
                <tr>
                    <td>July 2021</td>
                    <td><a href="reports/2021/July.zip" download><input type="submit" name="Download" value="Download" style="width:20%; height:40px;"/></a></td>
                </tr>
                <tr>
                    <td>June 2021</td>
                    <td><a href="reports/2021/June.zip" download><input type="submit" name="Download" value="Download" style="width:20%; height:40px;"/></a></td>
                </tr>
                <tr>
                    <td>May 2021</td>
                    <td><a href="reports/2021/May.zip" download><input type="submit" name="Download" value="Download" style="width:20%; height:40px;"/></a></td>
                </tr>
                <tr>
                    <td>April 2021</td>
                    <td><a href="reports/2021/April.zip" download><input type="submit" name="Download" value="Download" style="width:20%; height:40px;"/></a></td>
                </tr>
                <tr>
                    <td>March 2021</td>
                    <td><a href="reports/2021/March.zip" download><input type="submit" name="Download" value="Download" style="width:20%; height:40px;"/></a></td>
                </tr>
                <tr>
                    <td>February 2021</td>
                    <td><a href="reports/2021/February.zip" download><input type="submit" name="Download" value="Download" style="width:20%; height:40px;"/></a></td>
                </tr> 
                <tr>
                    <td>January 2021</td>
                    <td><a href="reports/2021/January.zip" download><input type="submit" name="Download" value="Download" style="width:20%; height:40px;"/></a></td>
                </tr>
                <!-- END 2021 -->

                <!-- 2020 -->
                <tr>
                    <td>December 2020</td>
                    <td><a href="reports/2020/December.zip" download><input type="submit" name="Download" value="Download" style="width:20%; height:40px;"/></a></td>
                </tr>
                <tr>
                    <td>November 2020</td>
                    <td><a href="reports/2020/November.zip" download><input type="submit" name="Download" value="Download" style="width:20%; height:40px;"/></a></td>
                </tr>              
                <tr>
                    <td>October 2020</td>
                    <td><a href="reports/2020/October.zip" download><input type="submit" name="Download" value="Download" style="width:20%; height:40px;"/></a></td>
                </tr>
                <tr>
                    <td>September 2020</td>
                    <td><a href="reports/2020/September.zip" download><input type="submit" name="Download" value="Download" style="width:20%; height:40px;"/></a></td>
                </tr>
                <!-- END 2020 -->
            </table>
        </div>
    </section>
<?php }

static function menuPadetailed($typ, $invoices, $user, $type, $invoice_number, $customerSearch, $dateSearch, $salesOrderSearch, $count){ ?>
    <section>   
        <dic class="row">
           <!-- <h1> <?php echo $typ; ?> </h1> -->
        </div>
        <dic class="row">
            <form method="post">
                <h1 class="menu-detailed-title"><?php echo $typ;?></h1>
                <?php if($invoice_number == ""){ ?><input type="text" placeholder="Payment Number" name="invoiceNumberSearch" class="search_field"> <?php }else{ ?> <input type="text" value="<?php echo $invoice_number; ?>" disabled name="invoiceNumberSearch" class="search_field"> <input type="text" value="<?php echo $invoice_number; ?>" name="invoiceNumberSearch" style="display:none;" /> <?php } ?>
                <?php if($dateSearch == ""){ ?><input type="text" placeholder="Payment Date" name="invoiceDateSearch" class="search_field"><?php }else{ ?><input type="text" value="<?php echo $dateSearch; ?>" disabled placeholder="Invoice Date" name="invoiceDateSearch" class="search_field"><input type="text" value="<?php echo $dateSearch; ?>" name="invoiceDateSearch" style="display:none;" /><?php }  ?>
                <?php if($customerSearch == ""){ ?><input type="text" placeholder="Customer" name="customerSearch" class="search_field"><?php }else{ ?><input type="text" value="<?php echo $customerSearch; ?>" disabled placeholder="Customer" name="customerSearch" class="search_field"><input style="display:none;" type="text" style="width:300px" value="<?php echo $customerSearch; ?>" name="customerSearch"  /><?php } ?>
                <input type="submit" value="search" class="search_field" name="search">
                <input type="submit" value="Clear" class="search_field" name="clear">
                <td><spam class="search_field">Total rows: <?php echo $count; ?></spam></td>
            </form>
        </div>
        <div class="page_body">
            <table>
                <tr>
                    <th>Payment Date</th>
                    <th>Payment Number</th>
                    <th>Customer</th>
                    <th>Customer Ref</th>
                    <th>Employee</th>
                    <th>Payment Journal</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Memo</th>
                </tr>
                <?php
                    /**
                     * READING THE INVOICE OBJECT
                     * 
                     */ 

                    foreach ($invoices as $invoice)
                    { 
                        
                        ?>
                    
                        <tr>
                            <td><?php echo $invoice->getPayment_date() ?></td>
                            <td><?php echo $invoice->getPayment_number() ?></td>
                            <td><?php echo $invoice->getCustomer() ?></td>
                            <td><?php echo $invoice->getCustomer_ref() ?></td>
                            <td><?php echo $invoice->getEmployee() ?></td>
                            <td><?php echo $invoice->getPayment_journal() ?></td>
                            <td><?php if($invoice->getAmount()!=""){echo "$". $invoice->getAmount();}else{echo "$0.00";} ?></td>
                            <td><?php echo $invoice->getStatus() ?></td>
                            <td><?php echo $invoice->getMemo() ?></td>
                        </tr></a>

                        <?php     
                    } 
                ?>
            </table>
        </div>
    </section>
<?php }

static function menuILdetailed($typ, $invoices, $user, $type, $invoice_number, $customerSearch, $dateSearch, $salesOrderSearch, $count){ ?>
    <section>   
        <dic class="row">
           <!-- <h1> <?php echo $typ;?> </h1> -->
        </div>
        <dic class="row">
            <form method="post">
                <h1 class="menu-detailed-title"><?php echo $typ;?></h1>
                <?php if($invoice_number == ""){ ?><input type="text" placeholder="Reference" name="invoiceNumberSearch" class="search_field"> <?php }else{ ?> <input type="text" value="<?php echo $invoice_number; ?>" disabled name="invoiceNumberSearch" class="search_field"> <input type="text" value="<?php echo $invoice_number; ?>" name="invoiceNumberSearch" style="display:none;" /> <?php } ?>
                <?php if($salesOrderSearch == ""){ ?><input type="text" placeholder="Product" name="salesOrderSearch" class="search_field"><?php }else{ ?> <input type="text" value="<?php echo $salesOrderSearch; ?>" disabled placeholder="Sales Order Number" name="salesOrderSearch" class="search_field" > <input type="text" value="<?php echo $salesOrderSearch; ?>" name="salesOrderSearch" style="display:none;" /> <?php } ?>
                <?php if($dateSearch == ""){ ?><input type="text" placeholder="Serial Number" name="invoiceDateSearch" class="search_field"><?php }else{ ?><input type="text" value="<?php echo $dateSearch; ?>" disabled placeholder="Invoice Date" name="invoiceDateSearch" class="search_field"><input type="text" value="<?php echo $dateSearch; ?>" name="invoiceDateSearch" style="display:none;" /><?php }  ?>
                <?php if($customerSearch == ""){ ?><input type="text" placeholder="Customer" name="customerSearch" class="search_field"><?php }else{ ?><input type="text" value="<?php echo $customerSearch; ?>" disabled placeholder="Customer" name="customerSearch" class="search_field"><input style="display:none;" type="text" style="width:300px" value="<?php echo $customerSearch; ?>" name="customerSearch"  /><?php } ?>
                <input type="submit" value="search" class="search_field" name="search">
                <input type="submit" value="Clear" class="search_field" name="clear">
                <spam>Total Rows: <?php echo $count; ?></spam>
            </form>
        </div>
        <div class="page_body">
            <table>
                <tr>
                    <th>Created On</th>
                    <th>Reference</th>
                    <th>Sales Order</th>
                    <th>Sku</th>
                    <th>Product</th>
                    <th>Vendor</th>
                    <th>Customer</th>
                    <th>Quantity</th>
                    <th>QTY Delivered</th>
                    <th>Serial Number</th>
                    <th>Unit Price</th>
                    <th>Taxes</th>
                    <th>Untaxed Amount</th>
                </tr>
                <?php
                    /**
                     * READING THE INVOICE OBJECT
                     * 
                     */ 

                    foreach ($invoices as $invoice)
                    { 
                        $serialExplode = explode("/",$invoice->getSerial());
                        $arrayCount = count($serialExplode);
                        ?>
                    
                        <tr>
                            <td><?php echo $invoice->getCreatedOn() ?></td>
                            <td><?php echo $invoice->getInvoice_number() ?></td>
                            <td><?php echo $invoice->getSales_order() ?></td>
                            <td><?php echo $invoice->getSku() ?></td>
                            <td><?php echo $invoice->getProduct() ?></td>
                            <td><?php echo $invoice->getVendor() ?></td>
                            <td><?php echo $invoice->getCustomer() ?></td>
                            <td><?php echo $invoice->getQuantity() ?></td>
                            <td><?php echo $invoice->getQty_delivered() ?></td>
                            <td><?php for($x = 0; $x<$arrayCount; $x++){echo $serialExplode[$x]."  ";} ?></td>
                            <td><?php echo $invoice->getUnit_price() ?></td>
                            <td><?php if($invoice->getTaxes()!=""){echo "$".$invoice->getTaxes();}else{echo "$0.00";} ?></td>
                            <td><?php if($invoice->getUntaxed_amount()!=""){echo "$". $invoice->getUntaxed_amount();}else{echo "$0.00";} ?></td>
                        </tr></a>

                        <?php     
                    } 
                ?>
            </table>
        </div>
    </section>
<?php }

static function menuCLIdetailed($typ, $invoices, $user, $type, $invoice_number, $customerSearch, $dateSearch, $salesOrderSearch, $count){ ?>
    <section>   
        <dic class="row">
           <!-- <h1> <?php echo $typ;?> </h1> -->
        </div>
        <dic class="row">
            <form method="post">
                <h1 class="menu-detailed-title"><?php echo $typ;?></h1>
                <?php if($customerSearch == ""){ ?><input type="text" placeholder="Customer" name="customerSearch" class="search_field"><?php }else{ ?><input type="text" value="<?php echo $customerSearch; ?>" disabled placeholder="Customer" name="customerSearch" class="search_field"><input style="display:none;" type="text" style="width:300px" value="<?php echo $customerSearch; ?>" name="customerSearch"  /><?php } ?>
                <?php if($invoice_number == ""){ ?><input type="text" placeholder="Price List" name="invoiceNumberSearch" class="search_field"> <?php }else{ ?> <input type="text" value="<?php echo $invoice_number; ?>" disabled name="invoiceNumberSearch" class="search_field"> <input type="text" value="<?php echo $invoice_number; ?>" name="invoiceNumberSearch" style="display:none;" /> <?php } ?>
                <?php if($salesOrderSearch == ""){ ?><input type="text" placeholder="State" name="salesOrderSearch" class="search_field"><?php }else{ ?> <input type="text" value="<?php echo $salesOrderSearch; ?>" disabled placeholder="Sales Order Number" name="salesOrderSearch" class="search_field" > <input type="text" value="<?php echo $salesOrderSearch; ?>" name="salesOrderSearch" style="display:none;" /> <?php } ?>
                <input type="submit" value="search" class="search_field" name="search">
                <input type="submit" value="Clear" class="search_field" name="clear">
                <spam>Total Rows: <?php echo $count; ?></spam>
            </form>
        </div>
        <div class="page_body">
            <table>
                <tr>
                    <th>Customer Name</th>
                    <th>Street</th>
                    <th>State</th>
                    <th>City</th>
                    <th>Postal Code</th>
                    <th>Phone</th>
                    <th>emal</th>
                    <th>Price List</th>
                    <th></th>
                </tr>
                <?php
                    /**
                     * READING THE INVOICE OBJECT
                     * 
                     */ 

                    foreach ($invoices as $invoice)
                    {   ?>
                    
                        <tr>
                            <td><?php echo $invoice->getName() ?></td>
                            <td><?php echo $invoice->getStreet() ?></td>
                            <td><?php echo $invoice->getState() ?></td>
                            <td><?php echo $invoice->getCity() ?></td>
                            <td><?php echo $invoice->getPostal_code() ?></td>
                            <td><?php echo $invoice->getPhone() ?></td>
                            <td><?php echo $invoice->getEmail() ?></td>
                            <td><?php echo $invoice->getPrice_list() ?></td>
                            <td><a href="invoice-CLIdetailed.php?user=<?php echo $user; ?>&typ=<?php echo $typ; ?>&type=<?php echo $type; ?>&inv=<?php echo $invoice->getName(); ?>&searchInvoice=<?php echo $invoice_number; ?>&searchSale=<?php echo $salesOrderSearch; ?>&searchCustomer=<?php echo $customerSearch; ?>&searchDate=<?php echo $dateSearch; ?>"><input type="button" value="Open Customer" class="openInvoice" /></a></td>
                        </tr></a>

                        <?php     
                    } 
                ?>
            </table>
        </div>
    </section>
<?php }

static function menuBadetailed($typ, $invoices, $user, $type, $invoice_number, $customerSearch, $dateSearch, $salesOrderSearch, $count){ ?>
    <section>   
        <dic class="row">
           <!-- <h1> <?php echo $typ;?> </h1> -->
        </div>
        <dic class="row">
            <form method="post">
                <h1 class="menu-detailed-title"><?php echo $typ;?></h1>
                <?php if($customerSearch == ""){ ?><input type="text" placeholder="Customer" name="customerSearch" class="search_field"><?php }else{ ?><input type="text" value="<?php echo $customerSearch; ?>" disabled placeholder="Customer" name="customerSearch" class="search_field"><input style="display:none;" type="text" style="width:300px" value="<?php echo $customerSearch; ?>" name="customerSearch"  /><?php } ?>
                <input type="submit" value="search" class="search_field" name="search">
                <input type="submit" value="Clear" class="search_field" name="clear">
                <spam>Total Rows: <?php echo $count; ?></spam>
            </form>
        </div>
        <div class="page_body">
            <table>
                <tr>
                    <th>Customer Name</th>
                    <th>Last Update</th>
                    <th>Total Receivable</th>
                    <th></th>
                </tr>
                <?php
                    /**
                     * READING THE Balance OBJECT
                     * 
                     */ 

                    foreach ($invoices as $invoice)
                    {   ?>
                    
                        <tr>
                            <td><?php echo $invoice->getCustomer() ?></td>
                            <td><?php echo $invoice->getLast_update() ?></td>
                            <td>$<?php if($invoice->getTotal_receivable() == ""){echo "0.00";}else{ echo $invoice->getTotal_receivable(); }  ?></td>
                            <td><a href="menu-detailed.php?user=<?php echo $user; ?>&typ=Invoices&type=<?php echo $type; ?>&inv=<?php echo $invoice->getCustomer(); ?>&searchInvoice=<?php echo $invoice_number; ?>&searchSale=<?php echo $salesOrderSearch; ?>&searchCustomer=<?php echo $customerSearch; ?>&searchDate=<?php echo $dateSearch; ?>"><input type="button" value="More Details" class="openInvoice" /></a></td>
                        </tr></a>

                        <?php     
                    } 
                ?>
            </table>
        </div>
    </section>
<?php }

static function menuINdetailed($typ, $invoices, $user, $type, $invoice_number, $customerSearch, $dateSearch, $salesOrderSearch, $count){ ?>
    <section>   
        <dic class="row">
           <!-- <h1> <?php echo $typ;?> </h1> -->
        </div>
        <dic class="row">
            <form method="post">
                <h1 class="menu-detailed-title"><?php echo $typ;?></h1>
                <?php if($invoice_number == ""){ ?><input type="text" placeholder="Sku" name="invoiceNumberSearch" class="search_field"> <?php }else{ ?> <input type="text" value="<?php echo $invoice_number; ?>" disabled name="invoiceNumberSearch" class="search_field"> <input type="text" value="<?php echo $invoice_number; ?>" name="invoiceNumberSearch" style="display:none;" /> <?php } ?>
                <?php if($salesOrderSearch == ""){ ?><input type="text" placeholder="Product" name="salesOrderSearch" class="search_field"><?php }else{ ?> <input type="text" value="<?php echo $salesOrderSearch; ?>" disabled placeholder="Sales Order Number" name="salesOrderSearch" class="search_field" > <input type="text" value="<?php echo $salesOrderSearch; ?>" name="salesOrderSearch" style="display:none;" /> <?php } ?>
                <?php if($customerSearch == ""){ ?><input type="text" placeholder="Vendor" name="customerSearch" class="search_field"><?php }else{ ?><input type="text" value="<?php echo $customerSearch; ?>" disabled placeholder="Customer" name="customerSearch" class="search_field"><input style="display:none;" type="text" style="width:300px" value="<?php echo $customerSearch; ?>" name="customerSearch"  /><?php } ?>
                <input type="submit" value="search" class="search_field" name="search">
                <input type="submit" value="Clear" class="search_field" name="clear">
                <spam>Total Rows: <?php echo $count; ?></spam>
            </form>
        </div>
        <div class="page_body">
            <table>
                <tr>
                    <th>SKU</th>
                    <th>Product</th>
                    <th>Vendor</th>
                    <th>Sales Price</th>
                    <th>Cost</th>
                    <th>QTY On Hand</th>
                    <th></th>
                </tr>
                <?php
                    /**
                     * READING THE INVOICE OBJECT
                     * 
                     */ 

                    foreach ($invoices as $invoice)
                    {   ?>
                    
                        <tr>
                            <td><?php echo $invoice->getSku() ?></td>
                            <td><?php echo $invoice->getProduct() ?></td>
                            <td><?php echo $invoice->getVendor() ?></td>
                            <td>$<?php echo $invoice->getSales_price() ?></td>
                            <td>$<?php echo $invoice->getCost() ?></td>
                            <td><?php echo $invoice->getQty_onhand() ?></td>
                            <td><a href="invoice-INdetailed.php?user=<?php echo $user; ?>&typ=<?php echo $typ; ?>&type=<?php echo $type; ?>&inv=<?php echo $invoice->getSku(); ?>&searchInvoice=<?php echo $invoice_number; ?>&searchSale=<?php echo $salesOrderSearch; ?>&searchCustomer=<?php echo $customerSearch; ?>&searchDate=<?php echo $dateSearch; ?>"><input type="button" value="Open Item" class="openInvoice" /></a></td>
                        </tr></a>

                        <?php     
                    } 
                ?>
            </table>
        </div>
    </section>
<?php }

static function menuPdetailed($typ, $invoices, $user, $type, $invoice_number, $customerSearch, $dateSearch, $salesOrderSearch, $count){ ?>
    <section>   
        <dic class="row">
           <!-- <h1> <?php echo $typ;?> </h1> -->
        </div>
        <dic class="row">
            <form method="post">
                <h1 class="menu-detailed-title"><?php echo $typ;?></h1>
                <?php if($invoice_number == ""){ ?><input type="text" placeholder="Purchase Number" name="invoiceNumberSearch" class="search_field"> <?php }else{ ?> <input type="text" value="<?php echo $invoice_number; ?>" disabled name="invoiceNumberSearch" class="search_field"> <input type="text" value="<?php echo $invoice_number; ?>" name="invoiceNumberSearch" style="display:none;" /> <?php } ?>
                <?php if($customerSearch == ""){ ?><input type="text" placeholder="Vendor" name="VendorSearch" class="search_field"><?php }else{ ?><input type="text" value="<?php echo $customerSearch; ?>" disabled placeholder="Customer" name="VendorSearch" class="search_field"><input style="display:none;" type="text" style="width:300px" value="<?php echo $customerSearch; ?>" name="VendorSearch"  /><?php } ?>
                <?php if($salesOrderSearch == ""){ ?><input type="text" style="display:none;" placeholder="Source Document" name="salesOrderSearch" class="search_field"><?php }else{ ?> <input type="text" value="<?php echo $salesOrderSearch; ?>" disabled placeholder="Sales Order Number" name="salesOrderSearch" style="display:none;" class="search_field" > <input type="text" value="<?php echo $salesOrderSearch; ?>" name="salesOrderSearch" style="display:none;" /> <?php } ?>
                <?php if($dateSearch == ""){ ?><input type="text" placeholder="Order Date" name="invoiceDateSearch" class="search_field"><?php }else{ ?><input type="text" value="<?php echo $dateSearch; ?>" disabled placeholder="Invoice Date" name="invoiceDateSearch" class="search_field"><input type="text" value="<?php echo $dateSearch; ?>" name="invoiceDateSearch" style="display:none;" /><?php }  ?>
                <input type="submit" value="search" class="search_field" name="search">
                <input type="submit" value="Clear" class="search_field" name="clear">
                <spam>Total Rows: <?php echo $count ?></spam>
            </form>
        </div>
        <div class="page_body">
            <table>
                <tr>
                    <th>Purchase Number</th>
                    <th>Order Date</th>
                    <th>Vendor</th>
                    <th>Schedule Date</th>
                    <th>Sales Person</th>
                    <th>Source Document</th>
                    <th>Untaxed Amount</th>
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
                            <td><?php echo $invoice->getPurchase_number() ?></td>
                            <td><?php echo $invoice->getOrder_date() ?></td>
                            <td><?php echo $invoice->getVendor() ?></td>
                            <td><?php echo $invoice->getSchedule_date() ?></td>
                            <td><?php echo $invoice->getSales_person() ?></td>
                            <td><?php echo $invoice->getSource_document() ?></td>
                            <td><?php if($invoice->getUntaxed_amount()!=""){echo "$". $invoice->getUntaxed_amount();}else{echo "$0.00";} ?></td>
                            <td><?php if($invoice->getTax()!=""){echo "$".$invoice->getTax();}else{echo "$0.00";} ?></td>
                            <td><?php if($invoice->getTotal()!=""){echo "$".$invoice->getTotal();}else{echo "$0.00";} ?></td>
                            <td><a href="invoice-Pdetailed.php?user=<?php echo $user; ?>&typ=<?php echo $typ; ?>&type=<?php echo $type; ?>&inv=<?php echo $invoice->getPurchase_number(); ?>&searchInvoice=<?php echo $invoice_number; ?>&searchSale=<?php echo $salesOrderSearch; ?>&searchCustomer=<?php echo $customerSearch; ?>&searchDate=<?php echo $dateSearch; ?>"><input type="button" value="Open Invoice" class="openInvoice" /></a></td>
                        </tr></a>

                        <?php     
                    } 
                ?>
            </table>
        </div>
    </section>
<?php }

static function menuJoEdetailed($typ, $invoices, $user, $type, $invoice_number, $customerSearch, $dateSearch, $salesOrderSearch, $count){ ?>
    <section>   
        <dic class="row">
           <!-- <h1> <?php echo $typ;?> </h1> -->
        </div>
        <dic class="row">
            <form method="post">
                <h1 class="menu-detailed-title"><?php echo $typ;?></h1>
                <?php if($invoice_number == ""){ ?><input type="text" placeholder="Number" name="invoiceNumberSearch" class="search_field"> <?php }else{ ?> <input type="text" value="<?php echo $invoice_number; ?>" disabled name="invoiceNumberSearch" class="search_field"> <input type="text" value="<?php echo $invoice_number; ?>" name="invoiceNumberSearch" style="display:none;" /> <?php } ?>
                <?php if($customerSearch == ""){ ?><input type="text" placeholder="Customer" name="VendorSearch" class="search_field"><?php }else{ ?><input type="text" value="<?php echo $customerSearch; ?>" disabled placeholder="Customer" name="VendorSearch" class="search_field"><input style="display:none;" type="text" style="width:300px" value="<?php echo $customerSearch; ?>" name="VendorSearch"  /><?php } ?>
                <?php if($salesOrderSearch == ""){ ?><input type="text" placeholder="Reference" name="salesOrderSearch" class="search_field"><?php }else{ ?> <input type="text" value="<?php echo $salesOrderSearch; ?>" disabled placeholder="Sales Order Number" name="salesOrderSearch"  class="search_field" > <input type="text" value="<?php echo $salesOrderSearch; ?>" name="salesOrderSearch" style="display:none;" /> <?php } ?>
                <?php if($dateSearch == ""){ ?><input type="text" placeholder="Date" name="invoiceDateSearch" class="search_field"><?php }else{ ?><input type="text" value="<?php echo $dateSearch; ?>" disabled placeholder="Invoice Date" name="invoiceDateSearch" class="search_field"><input type="text" value="<?php echo $dateSearch; ?>" name="invoiceDateSearch" style="display:none;" /><?php }  ?>
                <input type="submit" value="search" class="search_field" name="search">
                <input type="submit" value="Clear" class="search_field" name="clear">
                <spam>Total Rows: <?php echo $count ?></spam>
            </form>
        </div>
        <div class="page_body">
            <table>
                <tr>
                    <th>Date</th>
                    <th>Number</th>
                    <th>Customer</th>
                    <th>Reference</th>
                    <th>Journal</th>
                    <th>Status</th>
                    <th>Amount</th>
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
                            <td><?php echo $invoice->getDate() ?></td>
                            <td><?php echo $invoice->getNumber() ?></td>
                            <td><?php echo $invoice->getCustomer() ?></td>
                            <td><?php echo $invoice->getReference() ?></td>
                            <td><?php echo $invoice->getJournal() ?></td>
                            <td><?php echo $invoice->getStatus() ?></td>
                            <td><?php if($invoice->getAmount()!=""){echo "$". $invoice->getAmount();}else{echo "$0.00";} ?></td>
                            <td><a href="invoice-JoIdetailed.php?user=<?php echo $user; ?>&typ=<?php echo $typ; ?>&type=<?php echo $type; ?>&inv=<?php echo $invoice->getNumber(); ?>&searchInvoice=<?php echo $invoice_number; ?>&searchSale=<?php echo $salesOrderSearch; ?>&searchCustomer=<?php echo $customerSearch; ?>&searchDate=<?php echo $dateSearch; ?>"><input type="button" value="More Details" class="openInvoice" /></a></td>
                        </tr></a>

                        <?php     
                    } 
                ?>
            </table>
        </div>
    </section>
<?php }

   static function menuDetailed($typ, $invoices, $user, $type, $invoice_number, $customerSearch, $dateSearch, $salesOrderSearch, $count, $inv){ ?>
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
                    <?php if ($inv == ""){}else{ ?> <a href="menu-Badetailed.php?user=<?php echo $user; ?>&type=<?php echo $type ?>&typ=Balances"><input type="button" value="Go Back" class="search_field" name="back" style="background:#152c4e; color:white; width:5%; font-size:12px"></a> <?php } ?>
                    <spam>Total rows: <?php echo $count; ?></spam>
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

static function invoiceINDetailed($typ, $invoice, $user, $typee, $invo){ 
    
    
    foreach ($invoice as $inv)
    {
        $sku = $invoice->getSku();
        $product = $invoice->getProduct();
        $vendor = $invoice->getVendor();
        $barcode = $invoice->getBarcode();
        $sales_price = $invoice->getSales_price();
        $cost = $invoice->getCost();
        $category = $invoice->getCategory();
        $type = $invoice->getType();
        $qty_onhand = $invoice->getQty_onhand();
        $created_by = $invoice->getCreated_by();
        $created_on = $invoice->getCreated_on();
        $qty_sold = $invoice->getQty_sold();
        $customer_tax = $invoice->getCustomer_tax();
        $web_description = $invoice->getWeb_description();
    }
    
    
    ?>

    <section class="inv-content">   
        <div class="row">
            <h1 class="menu-detailed-title"> <?php echo $product;?> </h1>
            <a href="menu-INdetailed.php?user=<?php echo $user; ?>&typ=<?php echo $typ; ?>&type=<?php echo $typee; ?>"><input type="button" value="Go back" name="goBack" class="print_button" /></a>
            <form method="POST">
                <input type="submit" value="Print" name="print" class="print_button" />
            </form>
        </div>
        <div class="row">
            <div class="invoice-table">
                <table>
                    <tr>
                        <td style="width:200px; font-weight:bold;">Sku</td>
                        <td><?php echo $sku; ?></td>
                    </tr>
                    <tr>
                        <td style="width:200px; font-weight:bold;">Description</td>
                        <td><?php echo $product; ?></td>
                    </tr>
                    <tr>
                        <td style="width:200px; font-weight:bold;">Vendor</td>
                        <td><?php echo $vendor; ?></td>
                    </tr>
                    <tr>
                        <td style="width:200px; font-weight:bold;">Barcode</td>
                        <td><?php echo $barcode; ?></td>
                    </tr>
                    <tr>
                        <td style="width:200px; font-weight:bold;">Sales Price</td>
                        <td>$<?php echo $sales_price; ?></td>
                    </tr>
                    <tr>
                        <td style="width:200px; font-weight:bold;">Cost</td>
                        <td>$<?php echo $cost; ?></td>
                    </tr>
                    <tr>
                        <td style="width:200px; font-weight:bold;">Customer Tax</td>
                        <td><?php echo $customer_tax; ?></td>
                    </tr>
                </table>
            </div>
            <div class="invoice-table">
                <table>
                    <tr>
                        <td style="width:200px; font-weight:bold;">Category</td>
                        <td><?php echo $category; ?></td>
                    </tr>
                    <tr>
                        <td style="width:200px; font-weight:bold;">Product Type</td>
                        <td><?php echo $type; ?></td>
                    </tr>
                    <tr>
                        <td style="width:200px; font-weight:bold;">Qty on hand</td>
                        <td><?php echo $qty_onhand; ?></td>
                    </tr>
                    
                    <tr>
                        <td style="width:200px; font-weight:bold;">Created By</td>
                        <td><?php echo $created_by; ?></td>
                    </tr>
                    <tr>
                        <td style="width:200px; font-weight:bold;">Created On</td>
                        <td><?php echo $created_on; ?></td>
                    </tr>
                    <tr>
                        <td style="width:200px; font-weight:bold;">Web Description</td>
                        <td><?php echo $web_description; ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </section>
<?php }

static function invoiceCLIDetailed($typ, $invoice, $user, $type, $invo){ 
    
    
    foreach ($invoice as $inv)
    {
        $customer = $invoice->getName();
        $parent = $invoice->getParent_name();
        $state = $invoice->getState();
        $city = $invoice->getCity();
        $country = $invoice->getCountry();
        $postal_code = $invoice->getPostal_code();
        $fiscal = $invoice->getFiscal_position();
        $phone = $invoice->getPhone();
        $email = $invoice->getEmail();
        $by = $invoice->getCreated_by();
        $customer_id = $invoice->getCustomer_id_number();
        $mobile = $invoice->getMobile();
        $fax = $invoice->getFax();
        $phone2 = $invoice->getPhone2();
        $contact_name = $invoice->getContact_name();
        $second_contact = $invoice->getSecond_contact_name();
        $tags = $invoice->getTags();
        $pst = $invoice->getPst();
        $notes = $invoice->getNotes();
        $warning = $invoice->getWarning();
        $is_customer = $invoice->getIs_customer();
        $is_vendor = $invoice->getIs_vendor();
        $payment_terms = $invoice->getPayment_terms();
        $price_list = $invoice->getPrice_list();
        $street = $invoice->getStreet();
    
    }
    ?>

    <section class="inv-content">   
        <div class="row">
            <h1 class="menu-detailed-title"> <?php echo $customer;?> </h1>
            <a href="menu-CLIdetailed.php?user=<?php echo $user; ?>&typ=<?php echo $typ; ?>&type=<?php echo $type; ?>"><input type="button" value="Go back" name="goBack" class="print_button" /></a>
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
                        <td><?php echo $street." ".$state.", ".$city.", ".$postal_code.", ".$country; ?></td>
                    </tr>
                    <tr>
                        <td style="width:200px; font-weight:bold;">Payment Terms</td>
                        <td><?php echo $payment_terms; ?></td>
                    </tr>
                    <tr>
                        <td style="width:200px; font-weight:bold;">Fiscal Position</td>
                        <td><?php echo $fiscal; ?></td>
                    </tr>
                    <tr>
                        <td style="width:200px; font-weight:bold;">Created By</td>
                        <td><?php echo $by; ?></td>
                    </tr>
                    <tr>
                        <td style="width:200px; font-weight:bold;">Customer Id</td>
                        <td><?php echo $customer_id; ?></td>
                    </tr>
                    
                </table>
            </div>
            <div class="invoice-table">
                <table>
                    <tr>
                        <td style="width:200px; font-weight:bold;">Phone</td>
                        <td><?php echo $phone." ".$phone2." ".$mobile; ?></td>
                    </tr>
                    <tr>
                        <td style="width:200px; font-weight:bold;">Email</td>
                        <td><?php echo $email; ?></td>
                    </tr>
                    <tr>
                        <td style="width:200px; font-weight:bold;">Fax</td>
                        <td><?php echo $fax; ?></td>
                    </tr>
                    
                    <tr>
                        <td style="width:200px; font-weight:bold;">Contact Name</td>
                        <td><?php echo $contact_name." ".$second_contact; ?></td>
                    </tr>
                    <tr>
                        <td style="width:200px; font-weight:bold;">PST</td>
                        <td><?php echo $pst; ?></td>
                    </tr>
                    <tr>
                        <td style="width:200px; font-weight:bold;">Tags</td>
                        <td><?php echo $tags; ?></td>
                    </tr>
                    <tr>
                        <td style="width:200px; font-weight:bold;">Notes</td>
                        <td><?php echo $notes.", ".$warning; ?></td>
                    </tr>

                    <tr>
                        <td style="width:200px; font-weight:bold;">Notes</td>
                        <td><?php echo $notes.", ".$warning; ?></td>
                    </tr>
                </table>
            </div>
        </div>

    </section>
<?php }


static function invoicePDetailed($typ, $invoice, $invoice_lines, $user, $type, $invo){ 
    
    
    foreach ($invoice as $inv)
    {
        $purchase_number = $invoice->getPurchase_number();
        $order_date = $invoice->getOrder_date();
        $vendor = $invoice->getVendor();
        $schedule_date = $invoice->getSchedule_date();
        $sales_person = $invoice->getSales_person();
        $source_document = $invoice->getSource_document();
        $untaxed_amount = $invoice->getUntaxed_amount();
        $total_total = $invoice->getTotal();
        $status = $invoice->getStatus();
        $stellar_status = $invoice->getStellar_status();
        $currancy = $invoice->getCurrancy();
        $deliver_to = $invoice->getDeliver_to();
        $broker = $invoice->getBroker();
        $invoice_number = $invoice->getInvoice_number();
        $sales_number = $invoice->getSales_number();
        $bill_reference = $invoice->getBill_reference();
        $comments = $invoice->getComments();
        $terms = $invoice->getTerms();
        $total_taxes = $invoice->getTax();
        $vendor_reference = $invoice->getVendor_reference();
    }
    
    
    ?>

    <section class="inv-content">   
        <div class="row">
            <h1 class="menu-detailed-title"> <?php echo $invo;?> </h1>
            <a href="menu-Pdetailed.php?user=<?php echo $user; ?>&typ=<?php echo $typ; ?>&type=<?php echo $type; ?>"><input type="button" value="Go back" name="goBack" class="print_button" /></a>
            <form method="POST">
                <input type="submit" value="Print" name="print" class="print_button" />
            </form>

        </div>
        <div class="row">
            <div class="invoice-table">
                <table>
                    <tr>
                        <td style="width:200px; font-weight:bold;">Vendor</td>
                        <td><?php echo $vendor; ?></td>
                    </tr>
                    <tr>
                        <td style="width:200px; font-weight:bold;">Deliver to</td>
                        <td><?php echo $deliver_to; ?></td>
                    </tr>
                    <tr>
                        <td style="width:200px; font-weight:bold;">Payment Terms</td>
                        <td><?php echo $terms; ?></td>
                    </tr>
                    <tr>
                        <td style="width:200px; font-weight:bold;">Comments</td>
                        <td><?php echo $comments; ?></td>
                    </tr>
                    <tr>
                        <td style="width:200px; font-weight:bold;">Status</td>
                        <td><?php echo $status; ?></td>
                    </tr>
                    <tr>
                        <td style="width:200px; font-weight:bold;">Stellar Status</td>
                        <td><?php echo $stellar_status; ?></td>
                    </tr>
                    <tr>
                        <td style="width:200px; font-weight:bold;">Sales order</td>
                        <td><?php echo $sales_number; ?></td>
                    </tr>
                </table>
            </div>
            <div class="invoice-table">
                <table>
                    <tr>
                        <td style="width:200px; font-weight:bold;">Order Date</td>
                        <td><?php echo $order_date; ?></td>
                    </tr>
                    <tr>
                        <td style="width:200px; font-weight:bold;">Schedule Date</td>
                        <td><?php echo $schedule_date; ?></td>
                    </tr>
                    <tr>
                        <td style="width:200px; font-weight:bold;">Sales Person</td>
                        <td><?php echo $sales_person; ?></td>
                    </tr>
                    <tr>
                        <td style="width:200px; font-weight:bold;">Broker</td>
                        <td><?php echo $broker; ?></td>
                    </tr>
                    <tr>
                        <td style="width:200px; font-weight:bold;">Source Document</td>
                        <td><?php echo $source_document; ?></td>
                    </tr>
                    <tr>
                        <td style="width:200px; font-weight:bold;">Currancy</td>
                        <td><?php echo $currancy; ?></td>
                    </tr>
                    <tr>
                        <td style="width:200px; font-weight:bold;">Bill Reference</td>
                        <td><?php echo $bill_reference; ?></td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="invoice-line-table">
                    <table>
                        <tr>
                            <th>Created On</th>
                            <th>Purchase Order</th>
                            <th>Sku</th>
                            <th>Product</th>
                            <th>Vendor</th>
                            <th>Quantity</th>
                            <th>Received Qty</th>
                            <th>Unit Cost</th>
                            <th>Taxes</th>
                            <th>Subtotal</th>
                            <th>Total</th>

                        
                        <?php
                        
                            foreach($invoice_lines as $line)
                            { ?>
                                <tr>
                                    <td><?php echo $line->getCreated_on(); ?></td>
                                    <td><?php echo $line->getPurchase_number(); ?></td>
                                    <td><?php echo $line->getSku() ?></td>
                                    <td><?php echo $line->getProduct(); ?></td>
                                    <td><?php echo $line->getVendor(); ?></td>
                                    <td><?php echo $line->getQuantity(); ?></td>
                                    <td><?php echo $line->getReceive_qty(); ?></td>
                                    <td><?php echo $line->getUnit_cost(); ?></td>
                                    <td>$<?php echo $line->getTaxes(); ?></td>
                                    <td>$<?php echo $line->getSubtotal(); ?></td>
                                    <td>$<?php echo $line->getTotal(); ?></td>
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
                            <td>$<?php if($untaxed_amount == ""){echo "0.00";}else{echo $untaxed_amount;} ?></td>
                        </tr>
                        <tr>
                            <td>Tax:</td>
                            <td>$<?php if($total_taxes == ""){echo "0.00";}else{echo $total_taxes;} ?></td>
                        </tr>
                        <tr>
                            <td>Total:</td>
                            <td>$<?php if($total_total == ""){echo "0.00";}else{echo $total_total;} ?></td>
                        </tr>
                    </table>
            </div>
        </div>
    </section>
<?php }

static function invoiceJoIDetailed($typ, $invoice, $invoice_lines, $user, $type, $invo){ 
    
    
    foreach ($invoice as $inv)
    {
        $created_on = $invoice->getCreated_on();
        $date = $invoice->getDate();
        $number = $invoice->getNumber();
        $Customer = $invoice->getCustomer();
        $Reference = $invoice->getReference();
        $journal = $invoice->getJournal();
        $status = $invoice->getStatus();
        $amount = $invoice->getAmount();
    }
    
    
    ?>

    <section class="inv-content">   
        <div class="row">
            <h1 class="menu-detailed-title"> <?php echo $invo;?> </h1>
            <a href="menu-JoEdetailed.php?user=<?php echo $user; ?>&typ=<?php echo $typ; ?>&type=<?php echo $type; ?>"><input type="button" value="Go back" name="goBack" class="print_button" /></a>
            <form method="POST">
                <input type="submit" value="Print" name="print" class="print_button" />
            </form>

        </div>
        <div class="row">
            <div class="invoice-table">
                <table>
                    <tr>
                        <td style="width:200px; font-weight:bold;">Date</td>
                        <td><?php echo $date; ?></td>
                    </tr>
                    <tr>
                        <td style="width:200px; font-weight:bold;">Customer</td>
                        <td><?php echo $Customer; ?></td>
                    </tr>
                    <tr>
                        <td style="width:200px; font-weight:bold;">Reference</td>
                        <td><?php echo $Reference; ?></td>
                    </tr>
                </table>
            </div>
            <div class="invoice-table">
                <table>
                    <tr>
                        <td style="width:200px; font-weight:bold;">Journal</td>
                        <td><?php echo $journal; ?></td>
                    </tr>
                    <tr>
                        <td style="width:200px; font-weight:bold;">Status</td>
                        <td><?php echo $status; ?></td>
                    </tr>
                    <tr>
                        <td style="width:200px; font-weight:bold;">Amount</td>
                        <td><?php echo $amount; ?></td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="invoice-line-table">
                    <table>
                        <tr>
                            <th>Created On</th>
                            <th>Number</th>
                            <th>Account</th>
                            <th>Customer</th>
                            <th>label</th>
                            <th>reference</th>
                            <th>Debit</th>
                            <th>Credit</th>
                            <th>Due Date</th>

                        
                        <?php
                        
                            foreach($invoice_lines as $line)
                            { ?>
                                <tr>
                                    <td><?php echo $line->getCreated_on(); ?></td>
                                    <td><?php echo $line->getNumber(); ?></td>
                                    <td><?php echo $line->getAccount() ?></td>
                                    <td><?php echo $line->getCustomer(); ?></td>
                                    <td><?php echo $line->getLabel(); ?></td>
                                    <td><?php echo $line->getReference(); ?></td>
                                    <td><?php if($line->getDebit() == ""){ }else{ ?> $ <?php echo $line->getDebit(); } ?></td>
                                    <td><?php if($line->getCredit() == ""){ }else{ ?> $ <?php echo $line->getCredit(); } ?></td>
                                    <td><?php echo $line->getDate(); ?></td>
                                </tr>
                           <?php }
                        
                        ?>
                   
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
                    <input type="submit" value="Submit file"  name="import" style="background:#152c4e; color:white;"/>
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
                    <input type="submit" value="Submit file" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" name="import2" style="background:#152c4e; color:white;"/>
                    <br><br><br><br>
                </form>
            </div>
        </div>

        <div class="adding_block">
            <div class="row">
                <h1>Add the CreditNote file lot</h1>
            </div>
            <div class="row">
                <form method="POST" enctype="multipart/form-data">
                    <input type="file" name="creditNoteFile"/> <br><br>
                    <input type="submit" value="Submit file" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" name="import3" style="background:#152c4e; color:white;"/>
                    <br><br><br><br>
                </form>
            </div>
        </div>

        <div class="adding_block">
            <div class="row">
                <h1>Add Purchases file lot</h1>
            </div>
            <div class="row">
                <form method="POST" enctype="multipart/form-data">
                    <input type="file" name="purchasesFile"/> <br><br>
                    <input type="submit" value="Submit file" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" name="import4" style="background:#152c4e; color:white;"/>
                    <br><br><br><br>
                </form>
            </div>
        </div>

        <div class="adding_block">
            <div class="row">
                <h1>Add Purchases Line file lot</h1>
            </div>
            <div class="row">
                <form method="POST" enctype="multipart/form-data">
                    <input type="file" name="purchasesLineFile"/> <br><br>
                    <input type="submit" value="Submit file" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" name="import5" style="background:#152c4e; color:white;"/>
                    <br><br><br><br>
                </form>
            </div>
        </div>

        <div class="adding_block">
            <div class="row">
                <h1>Add Payment file lot</h1>
            </div>
            <div class="row">
                <form method="POST" enctype="multipart/form-data">
                    <input type="file" name="paymentsFile"/> <br><br>
                    <input type="submit" value="Submit file" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" name="import6" style="background:#152c4e; color:white;"/>
                    <br><br><br><br>
                </form>
            </div>
        </div>

        <div class="adding_block">
            <div class="row">
                <h1>Add Customer file lot</h1>
            </div>
            <div class="row">
                <form method="POST" enctype="multipart/form-data">
                    <input type="file" name="alfredoFile"/> <br><br>
                    <input type="submit" value="Submit file" name="import7" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" style="background:#152c4e; color:white;"/>
                    <br><br><br><br>
                </form>
            </div>
        </div>

        <div class="adding_block">
            <div class="row">
                <h1>Add Inventory file lot</h1>
            </div>
            <div class="row">
                <form method="POST" enctype="multipart/form-data">
                    <input type="file" name="inventoryFile"/> <br><br>
                    <input type="submit" value="Submit file" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" name="import8" style="background:#152c4e; color:white;"/>
                    <br><br><br><br>
                </form>
            </div>
        </div>

        <div class="adding_block">
            <div class="row">
                <h1>Add Balances file lot</h1>
            </div>
            <div class="row">
                <form method="POST" enctype="multipart/form-data">
                    <input type="file" name="balanceFile"/> <br><br>
                    <input type="submit" value="Submit file" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" name="import9" style="background:#152c4e; color:white;"/>
                    <br><br><br><br>
                </form>
            </div>
        </div>

        <div class="adding_block">
            <div class="row">
                <h1>Add Journal Entries file lot</h1>
            </div>
            <div class="row">
                <form method="POST" enctype="multipart/form-data">
                    <input type="file" name="journalEntries"/> <br><br>
                    <input type="submit" value="Submit file" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" name="import10" style="background:#152c4e; color:white;"/>
                    <br><br><br><br>
                </form>
            </div>
        </div>

        <div class="adding_block">
            <div class="row">
                <h1>Add Journal Items file lot</h1>
            </div>
            <div class="row">
                <form method="POST" enctype="multipart/form-data">
                    <input type="file" name="journalItems"/> <br><br>
                    <input type="submit" value="Submit file" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" name="import11" style="background:#152c4e; color:white;"/>
                    <br><br><br><br>
                </form>
            </div>
        </div>
        
    </section>
<?php }

    static function endHead(){ ?>
            

            </div><!-- End COntainer -->
            <script>
                setTimeout(function() {
                $('#msg').fadeOut('fast');
                }, 2000); // <-- time in milliseconds
            </script>
        </div>
        <!-- End Body -->
    <?php }

} ?>