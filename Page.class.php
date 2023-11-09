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
                <link href="css/custom.css" rel="stylesheet">
            </head>

            <body>

                <!-- Body Inner -->
                <div class="container">

    <?php } 

static function head2(){ ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />    
        <meta name="author" content="Alfredo Morales" />    
        <link rel="icon" type="image/png" href="images/favicon.png">   
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Document title -->
        <title>Stellar Wholesale Inc</title>
        <!-- Stylesheets & Fonts -->
        <link href="css/plugins.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
    </head>

    <body>
        <!-- Body Inner -->
        <div class="body-inner">

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

static function header2($email, $type) { ?>
    <!-- Header -->
    <header id="header" data-transparent="true" data-fullwidth="true" class="dark submenu-light" style="background:#fec470;">
            <div class="header-inner">
                <div class="container">
                    <!--Logo-->
                    <div id="logo">
                       
                            <img src="images/logo.png" style="width:300px;"/>
                        
                    </div>
                    <!--Navigation Resposnive Trigger-->
                    <div id="mainMenu-trigger">
                        <a class="lines-button x"><span class="lines"></span></a>
                    </div>
                    <!--end: Navigation Resposnive Trigger-->
                    <!--End: Logo-->
                    <div id="mainMenu">
                        <div class="container" >
                            <nav>
                                <ul>
                                    <?php if($email !=""){ ?><li><div class="col-lg-3"  style="margin-top:15px;">
                                        <a href="menu.php?user=<?php echo $email; ?>&type=<?php echo $type; ?>"><button type="button" class="btn btn-light" style="background:#0a3d67; border-color:#0a3d67; color:white;">Menu</button></a>
                                    </div></li>
                                    <li><div class="col-lg-3" style="margin-top:15px;">
                                        <a href="index.php?logout"><button type="button" class="btn btn-light" style="background:#0a3d67; border-color:#0a3d67; color:white;">Logout</button></a>
                                    </div></li>
                                    <li><div class="col-lg-3" style="margin-top:15px;">
                                        <button type="" class="btn btn-light" style="background:#0a3d67; border-color:#0a3d67; color:white;"><?php echo $email; ?></button>
                                    </div></li> <?php }else{} ?>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- end: Header -->
<?php } 

    static function login2($error)
    { ?>
       <!-- Section -->
       <section>
            <div class="container">
                <div class="row">
                    <div id="loginError" class="col-lg-12 center" style="background: red; border-radius:10px; font-size:12px; text-align:center;">
                        <?php if($error == "1"){ ?><h3 style="color:white;">The user does not exist</h3> <?php }else if ($error=="2"){ ?> <h3 style="color:white;">wrong email or password. Please Try again</h3> <?php } ?>
                    </div>
                    <div class="col-lg-4 center">
                        <div class="panel ">
                            <div class="panel-body" style="text-align:center;">
                                <h3>Login</h3>
                                <form method="POST">
                                    <div class="form-group">
                                        <input type="text" placeholder="Email" name="email" class="form-control">
                                    </div>
                                    <div class="form-group m-b-5">
                                        <input type="password" placeholder="Password" name="password" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <button class="btn" type="submit" name="submit" style="background:#fec470; border-color:#fec470; color:#0a3d67;">Login</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                      
                    </div>
                </div>
            </div>
        </section>
        <!-- end: Section -->
    <?php }

    static function footer() { ?>
        <!-- Footer -->
        <footer id="footer">
            <p>&copy; 2023 Stellar Wholesale Inc. All Rights Reserved.<a href="//www.stellarinc.ca" target="_blank" rel="noopener">Stellar Wholesale Inc</a></p>
        </footer>
        <!-- end: Footer -->
    <?php } 

static function footer2() { ?>
    <!-- Footer -->
    <footer id="footer">
            <div class="copyright-content" style="background:#0a3d67; color:white;">
                <div class="container">
                    <div class="copyright-text text-center">&copy; 2023 Stellar Wholesale Inc. All Rights Reserved. Stellar Wholesale Inc</div>
                </div>
            </div>
        </footer>
        <!-- end: Footer -->
<?php } 

    static function menu2($email, $type, $msg){ ?>
        <!-- Pricing Table -->
        <section id="section3" class="p-t-120 p-b-120">
            <div class="container">
                <hr class="space">
                <div class="row pricing-table">

                    <div class="col-lg-4 col-md-12 col-12">
                        <div class="plan featured">
                        <a href="menu-INdetailed.php?typ=Inventory&user=<?php echo $email; ?>&type=<?php echo $type; ?>"><div class="plan-header" style="background:#fec470; height:320px; color:black; box-shadow: rgba(10,61,103,255) 0px 3px 8px;">
                                <img src="images/inventory.png" style="width:50%;" />
                                <p class="text-muted"></p>
                                <p class="text-muted"></p>
                                <div class="plan-price" style="font-size:30px;">Inventory</div>
                            </div></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-12 col-12">
                        <div class="plan featured">
                        <a href="menu-CLIdetailed.php?typ=Customer&user=<?php echo $email; ?>&type=<?php echo $type; ?>"><div class="plan-header" style="background:#fec470; color:black; height:320px; box-shadow: rgba(10,61,103,255) 0px 3px 8px;">
                                <img src="images/customer.png" style="width:50%;" />
                                <p class="text-muted"></p>
                                <p class="text-muted"></p>
                                <div class="plan-price" style="font-size:30px;">Customer</div>
                            </div></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-12 col-12">
                        <div class="plan featured">
                        <a href="menu-Badetailed.php?user=<?php echo $email; ?>&type=<?php echo $type; ?>&typ=balances"><div class="plan-header" style="background:#fec470; color:black; height:320px; box-shadow: rgba(10,61,103,255) 0px 3px 8px;">
                                <img src="images/balance.png" style="width:50%;" />
                                <p class="text-muted"></p>
                                <p class="text-muted"></p>
                                <div class="plan-price" style="font-size:30px;">Customer Balances</div>
                            </div></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-12 col-12">
                        <div class="plan featured">
                            <a href="menu-detailed.php?typ=Invoices&user=<?php echo $email; ?>&type=<?php echo $type; ?>"><div class="plan-header" style="background:#fec470; color:black; height:320px; box-shadow: rgba(10,61,103,255) 0px 3px 8px;">
                                <img src="images/invoice.png" style="width:50%;" />
                                <p class="text-muted"></p>
                                <p class="text-muted"></p>
                                <div class="plan-price" style="font-size:30px;">Invoices</div>
                            </div></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-12 col-12">
                        <div class="plan featured">
                            <a href="menu-ILdetailed.php?user=<?php echo $email; ?>&type=<?php echo $type; ?>&typ=Invoice Line"><div class="plan-header" style="background:#fec470; color:black; height:320px; box-shadow: rgba(10,61,103,255) 0px 3px 8px;">
                                <img src="images/sn.png" style="width:50%;" />
                                <p class="text-muted"></p>
                                <p class="text-muted"></p>
                                <div class="plan-price" style="font-size:30px;">Invoice Lines</div>
                            </div></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-12 col-12">
                        <div class="plan featured">
                            <a href="menu-CNdetailed.php?user=<?php echo $email; ?>&type=<?php echo $type; ?>&typ=CreditNote"><div class="plan-header" style="background:#fec470; color:black; height:320px; box-shadow: rgba(10,61,103,255) 0px 3px 8px;">
                                <img src="images/credit.png" style="width:50%;" />
                                <p class="text-muted"></p>
                                <p class="text-muted"></p>
                                <div class="plan-price" style="font-size:30px;">Credit Notes</div>
                            </div></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-12 col-12">
                        <div class="plan featured">
                            <a href="menu-Pdetailed.php?user=<?php echo $email; ?>&type=<?php echo $type; ?>&typ=Purchases"><div class="plan-header" style="background:#fec470; color:black;  height:320px; box-shadow: rgba(10,61,103,255) 0px 3px 8px;">
                                <img src="images/purchase.png" style="width:50%;" />
                                <p class="text-muted"></p>
                                <p class="text-muted"></p>
                                <div class="plan-price" style="font-size:30px;">Purchases</div>
                            </div></a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-12">
                        <div class="plan featured">
                            <a href="menu-PLdetailed.php?user=<?php echo $email; ?>&type=<?php echo $type; ?>&typ=Purchases Line"><div class="plan-header" style="background:#fec470; color:black;  height:320px; box-shadow: rgba(10,61,103,255) 0px 3px 8px;">
                                <img src="images/purchasesLine.png" style="width:70%;" />
                                <p class="text-muted"></p>
                                <p class="text-muted"></p>
                                <div class="plan-price" style="font-size:30px;">Purchases Line</div>
                            </div></a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-12">
                        <div class="plan featured">
                            <a href="menu-Padetailed.php?user=<?php echo $email; ?>&type=<?php echo $type; ?>&typ=Payments"><div class="plan-header" style="background:#fec470; color:black; height:320px; box-shadow: rgba(10,61,103,255) 0px 3px 8px;">
                                <img src="images/payment.png" style="width:50%;" />
                                <p class="text-muted"></p>
                                <p class="text-muted"></p>
                                <div class="plan-price" style="font-size:30px;">Payments</div>
                            </div></a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-12 col-12">
                        <div class="plan featured">
                            <a href="menu-JoEdetailed.php?user=<?php echo $email; ?>&type=<?php echo $type; ?>&typ=Journal Entries"><div class="plan-header" style="background:#fec470; color:black; height:320px; box-shadow: rgba(10,61,103,255) 0px 3px 8px;">
                                <img src="images/inventory.png" style="width:50%;" />
                                <p class="text-muted"></p>
                                <p class="text-muted"></p>
                                <div class="plan-price" style="font-size:30px;">Journal Entries</div>
                            </div></a>
                        </div>
                    </div>

                    
                    <div class="col-lg-4 col-md-12 col-12">
                        <div class="plan featured">
                            <a href="menu-MoDetailed.php?user=<?php echo $email; ?>&type=<?php echo $type; ?>&typ=Montly Reports"><div class="plan-header" style="background:#fec470; color:black;  height:320px; box-shadow: rgba(10,61,103,255) 0px 3px 8px;">
                                <img src="images/rpeorts.png" style="width:50%;" />
                                <p class="text-muted"></p>
                                <p class="text-muted"></p>
                                <div class="plan-price" style="font-size:30px;">Monthly Reports</div>
                            </div></a>
                        </div>
                    </div>

                     <?php if($type=="1"){ ?><div class="col-lg-4 col-md-12 col-12">
                        <div class="plan featured">
                            <a href="admin.php?user=<?php echo $email; ?>&type=<?php echo $type; ?>&typ=Administrator"><div class="plan-header" style="background:#fec470; color:black;  height:320px; box-shadow: rgba(10,61,103,255) 0px 3px 8px;">
                                <img src="images/admin.png" style="width:50%;" />
                                <p class="text-muted"></p>
                                <p class="text-muted"></p>
                                <div class="plan-price" style="font-size:30px;">Admin</div>
                            </div></a>
                        </div>
                        <?php }else{} ?>
                    </div>
                </div>
            </div>
        </section>
        <!-- end: Pricing Table -->
    <?php }

static function menuAdmin($email, $type, $msg){ ?>
    <!-- Pricing Table -->
    <section id="section3" class="p-t-120 p-b-120">
        <div class="container">
            <hr class="space">
            <div class="row pricing-table">
                <div class="col-lg-4 col-md-12 col-12">
                    <div class="plan featured">
                    <a href="addInvoices.php?typ=AdminData&user=<?php echo $email; ?>&type=<?php echo $type; ?>"><div class="plan-header" style="background:#fec470; height:320px; color:black; box-shadow: rgba(10,61,103,255) 0px 3px 8px;">
                            <img src="images/addData.png" style="width:50%;" />
                            <p class="text-muted"></p>
                            <p class="text-muted"></p>
                            <div class="plan-price" style="font-size:30px;">Add Data</div>
                        </div></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-12">
                    <div class="plan featured">
                    <a href="users.php?typ=AdminUser&user=<?php echo $email; ?>&type=<?php echo $type; ?>"><div class="plan-header" style="background:#fec470; color:black; height:320px; box-shadow: rgba(10,61,103,255) 0px 3px 8px;">
                            <img src="images/customer.png" style="width:50%;" />
                            <p class="text-muted"></p>
                            <p class="text-muted"></p>
                            <div class="plan-price" style="font-size:30px;">Users</div>
                        </div></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end: Pricing Table -->
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


static function menuMonDetailed($typ, $user, $type){ ?>
    <!-- Page Content -->
    <section id="page-content">
        <div class="content col-lg-12"> 
            <div class="row"> 
                <div class="content col-lg-12">
                    <h2> <?php echo $typ; ?> </h2> 
                </div>  
                        <table class="table">
                            <thead class="thead" style="background:#0a3d67; color:white;">
                                <tr>
                                    <th scope="col">Monthly Report</th>
                                    <th scope="col">Package</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <!-- 2023 -->
                <tr>
                    <td>October 2023</td>
                    <td><a href="reports/2023/2023_October.zip" download><input type="submit" name="Download" value="Download" class="btn btn-light" style="background:#0a3d67; color:white;"/></a></td>
                </tr>
                <tr>
                    <td>September 2023</td>
                    <td><a href="reports/2023/2023_September.zip" download><input type="submit" name="Download" value="Download" class="btn btn-light" style="background:#0a3d67; color:white;"/></a></td>
                </tr>
                <tr>
                    <td>August 2023</td>
                    <td><a href="reports/2023/2023 August.zip" download><input type="submit" name="Download" value="Download"class="btn btn-light" style="background:#0a3d67; color:white;"/></a></td>
                </tr>
                <tr>
                    <td>July 2023</td>
                    <td><a href="reports/2023/2023 July.zip" download><input type="submit" name="Download" value="Download" class="btn btn-light" style="background:#0a3d67; color:white;"/></a></td>
                </tr>
                <tr>
                    <td>June 2023</td>
                    <td><a href="reports/2023/2023 June.zip" download><input type="submit" name="Download" value="Download" class="btn btn-light" style="background:#0a3d67; color:white;" /></a></td>
                </tr>
                <tr>
                    <td>May 2023</td>
                    <td><a href="reports/2023/2023 May.zip" download><input type="submit" name="Download" value="Download" class="btn btn-light" style="background:#0a3d67; color:white;"/></a></td>
                </tr>
                <tr>
                    <td>April 2023</td>
                    <td><a href="reports/2023/2023 April.zip" download><input type="submit" name="Download" value="Download" class="btn btn-light" style="background:#0a3d67; color:white;"/></a></td>
                </tr>
                <tr>
                    <td>March 2023</td>
                    <td><a href="reports/2023/2023 March.zip" download><input type="submit" name="Download" value="Download" class="btn btn-light" style="background:#0a3d67; color:white;"/></a></td>
                </tr>
                <tr>
                    <td>February 2023</td>
                    <td><a href="reports/2023/2023 February.zip" download><input type="submit" name="Download" value="Download" class="btn btn-light" style="background:#0a3d67; color:white;"/></a></td>
                </tr> 
                <tr>
                    <td>January 2023</td>
                    <td><a href="reports/2023/2023 January.zip" download><input type="submit" name="Download" value="Download" class="btn btn-light" style="background:#0a3d67; color:white;"/></a></td>
                </tr> 
                <!-- END 2023 --> 

                <!--  2022 --> 
                <tr>
                    <td>December 2022</td>
                    <td><a href="reports/2022/2022 December.zip" download><input type="submit" name="Download" value="Download" class="btn btn-light" style="background:#0a3d67; color:white;"/></a></td>
                </tr>
                <tr>
                    <td>November 2022</td>
                    <td><a href="reports/2022/2022 November.zip" download><input type="submit" name="Download" value="Download" class="btn btn-light" style="background:#0a3d67; color:white;"/></a></td>
                </tr>              
                <tr>
                    <td>October 2022</td>
                    <td><a href="reports/2022/2022 October.zip" download><input type="submit" name="Download" value="Download" class="btn btn-light" style="background:#0a3d67; color:white;"/></a></td>
                </tr>
                <tr>
                    <td>September 2022</td>
                    <td><a href="reports/2022/2022 September.zip" download><input type="submit" name="Download" value="Download" class="btn btn-light" style="background:#0a3d67; color:white;"/></a></td>
                </tr>
                <tr>
                    <td>August 2022</td>
                    <td><a href="reports/2022/2022 August.zip" download><input type="submit" name="Download" value="Download" class="btn btn-light" style="background:#0a3d67; color:white;"/></a></td>
                </tr>
                <tr>
                    <td>July 2022</td>
                    <td><a href="reports/2022/2022 July.zip" download><input type="submit" name="Download" value="Download" class="btn btn-light" style="background:#0a3d67; color:white;"/></a></td>
                </tr>
                <tr>
                    <td>June 2022</td>
                    <td><a href="reports/2022/2022 June.zip" download><input type="submit" name="Download" value="Download" class="btn btn-light" style="background:#0a3d67; color:white;"/></a></td>
                </tr>
                <tr>
                    <td>May 2022</td>
                    <td><a href="reports/2022/2022 May.zip" download><input type="submit" name="Download" value="Download" class="btn btn-light" style="background:#0a3d67; color:white;"/></a></td>
                </tr>
                <tr>
                    <td>April 2022</td>
                    <td><a href="reports/2022/2022 April.zip" download><input type="submit" name="Download" value="Download" class="btn btn-light" style="background:#0a3d67; color:white;"/></a></td>
                </tr>
                <tr>
                    <td>March 2022</td>
                    <td><a href="reports/2022/2022 March.zip" download><input type="submit" name="Download" value="Download" class="btn btn-light" style="background:#0a3d67; color:white;"/></a></td>
                </tr>
                <tr>
                    <td>February 2022</td>
                    <td><a href="reports/2022/2022 February.zip" download><input type="submit" name="Download" value="Download" class="btn btn-light" style="background:#0a3d67; color:white;"/></a></td>
                </tr> 
                <tr>
                    <td>January 2022</td>
                    <td><a href="reports/2022/2022 January.zip" download><input type="submit" name="Download" value="Download" class="btn btn-light" style="background:#0a3d67; color:white;"/></a></td>
                </tr>
                <!-- END 2022 -->

                <!-- 2021 -->
                <tr>
                    <td>December 2021</td>
                    <td><a href="reports/2021/December.zip" download><input type="submit" name="Download" value="Download" class="btn btn-light" style="background:#0a3d67; color:white;"/></a></td>
                </tr>
                <tr>
                    <td>November 2021</td>
                    <td><a href="reports/2021/November.zip" download><input type="submit" name="Download" value="Download" class="btn btn-light" style="background:#0a3d67; color:white;"/></a></td>
                </tr>              
                <tr>
                    <td>October 2021</td>
                    <td><a href="reports/2021/October.zip" download><input type="submit" name="Download" value="Download" class="btn btn-light" style="background:#0a3d67; color:white;"/></a></td>
                </tr>
                <tr>
                    <td>September 2021</td>
                    <td><a href="reports/2021/September.zip" download><input type="submit" name="Download" value="Download" class="btn btn-light" style="background:#0a3d67; color:white;"/></a></td>
                </tr>
                <tr>
                    <td>August 2021</td>
                    <td><a href="reports/2021/August.zip" download><input type="submit" name="Download" value="Download" class="btn btn-light" style="background:#0a3d67; color:white;"/></a></td>
                </tr>
                <tr>
                    <td>July 2021</td>
                    <td><a href="reports/2021/July.zip" download><input type="submit" name="Download" value="Download" class="btn btn-light" style="background:#0a3d67; color:white;"/></a></td>
                </tr>
                <tr>
                    <td>June 2021</td>
                    <td><a href="reports/2021/June.zip" download><input type="submit" name="Download" value="Download" class="btn btn-light" style="background:#0a3d67; color:white;"/></a></td>
                </tr>
                <tr>
                    <td>May 2021</td>
                    <td><a href="reports/2021/May.zip" download><input type="submit" name="Download" value="Download" class="btn btn-light" style="background:#0a3d67; color:white;"/></a></td>
                </tr>
                <tr>
                    <td>April 2021</td>
                    <td><a href="reports/2021/April.zip" download><input type="submit" name="Download" value="Download" class="btn btn-light" style="background:#0a3d67; color:white;"/></a></td>
                </tr>
                <tr>
                    <td>March 2021</td>
                    <td><a href="reports/2021/March.zip" download><input type="submit" name="Download" value="Download" class="btn btn-light" style="background:#0a3d67; color:white;"/></a></td>
                </tr>
                <tr>
                    <td>February 2021</td>
                    <td><a href="reports/2021/February.zip" download><input type="submit" name="Download" value="Download" class="btn btn-light" style="background:#0a3d67; color:white;"/></a></td>
                </tr> 
                <tr>
                    <td>January 2021</td>
                    <td><a href="reports/2021/January.zip" download><input type="submit" name="Download" value="Download" class="btn btn-light" style="background:#0a3d67; color:white;"/></a></td>
                </tr>
                <!-- END 2021 -->

                <!-- 2020 -->
                <tr>
                    <td>December 2020</td>
                    <td><a href="reports/2020/December.zip" download><input type="submit" name="Download" value="Download" class="btn btn-light" style="background:#0a3d67; color:white;"/></a></td>
                </tr>
                <tr>
                    <td>November 2020</td>
                    <td><a href="reports/2020/November.zip" download><input type="submit" name="Download" value="Download" class="btn btn-light" style="background:#0a3d67; color:white;"/></a></td>
                </tr>              
                <tr>
                    <td>October 2020</td>
                    <td><a href="reports/2020/October.zip" download><input type="submit" name="Download" value="Download" class="btn btn-light" style="background:#0a3d67; color:white;"/></a></td>
                </tr>
                <tr>
                    <td>September 2020</td>
                    <td><a href="reports/2020/September.zip" download><input type="submit" name="Download" value="Download" class="btn btn-light" style="background:#0a3d67; color:white;"/></a></td>
                </tr>
                <!-- END 2020 -->

                                </tr>
                            </tbody>
                        </table>
                    </div>

            </div>
        </div>
    </section>
        <!-- end: Page Content -->
<?php }

static function menuPadetailed($typ, $invoices, $user, $type, $invoice_number, $customerSearch, $dateSearch, $salesOrderSearch, $count, $init, $totalPages, $page){ 
    
    $temp = $init + 50;
    if($temp < $count)
    {
        $finalNumber = $temp;
    }
    else{
        $finalNumber = $count;
    }
    ?>
    <!-- Page Content -->
    <section id="page-content">
        <div class="content col-lg-12">
            <div class="row">
                    <div class="content col-lg-3">
                        <h2 class="menu-detailed-title"><?php echo $typ;?></h2>
                    </div>
                    <div class="content col-lg-9">
                    <form method="post">
                        <?php if($invoice_number == ""){ ?><input type="text" placeholder="Payment Number" name="invoiceNumberSearch" class="search_field"> <?php }else{ ?> <input type="text" value="<?php echo $invoice_number; ?>" disabled name="invoiceNumberSearch" class="search_field"> <input type="text" value="<?php echo $invoice_number; ?>" name="invoiceNumberSearch" style="display:none;" /> <?php } ?>
                        <?php if($dateSearch == ""){ ?><input type="text" placeholder="Payment Date" name="invoiceDateSearch" class="search_field"><?php }else{ ?><input type="text" value="<?php echo $dateSearch; ?>" disabled placeholder="Invoice Date" name="invoiceDateSearch" class="search_field"><input type="text" value="<?php echo $dateSearch; ?>" name="invoiceDateSearch" style="display:none;" /><?php }  ?>
                        <?php if($customerSearch == ""){ ?><input type="text" placeholder="Customer" name="customerSearch" class="search_field"><?php }else{ ?><input type="text" value="<?php echo $customerSearch; ?>" disabled placeholder="Customer" name="customerSearch" class="search_field"><input style="display:none;" type="text" style="width:300px" value="<?php echo $customerSearch; ?>" name="customerSearch"  /><?php } ?>
                        <input type="submit" value="search" class="btn btn-light" name="search" style="background:#0a3d67; color:white;">
                        <input type="submit" value="Clear" class="btn btn-light" name="clear" style="background:#0a3d67; color:white;">
                        <spam class="btn btn-light" style="color:white; background:#0a3d67;">Results from <?php echo $init + 1; ?> - <?php echo $finalNumber; ?></spam>
                        <spam class="btn btn-light" style="background:#0a3d67; color:white;">Total rows: <?php echo $count; ?></spam>
                    </form>
                    </div>
                        <table class="table">
                            <thead class="thead" style="background:#0a3d67; color:white;">
                                <tr>
                                    <th scope="col">Payment Date</th>
                                    <th scope="col">Payment Number</th>
                                    <th scope="col">Customer</th>
                                    <th scope="col">Customer Ref</th>
                                    <th scope="col">Employee</th>
                                    <th scope="col">Payment Journal</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Memo</th>
                                </tr>
                            </thead>
                            <tbody>
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
                            </tbody>
                        </table>
                        <div class="col-lg-12" >
                            <?php
                                for($i=1;$i <= $totalPages; $i++)
                                { 
                                    if($i == $page)
                                    { ?>
                                            <div style="box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px; width:30px; text-align:center; float:left; margin:5px; font-weight:bold;">
                                                <?php echo $i; ?>
                                            </div> 
                                        <?php 
                                    }
                                    else{ ?>
                                            <a href="menu-Padetailed.php?typ=<?php echo $typ; ?>&user=<?php echo $user; ?>&type=<?php echo $type; ?>&page=<?php echo $i; ?>&skuSearch=<?php echo $invoice_number; ?>&vendorSearch=<?php echo $customerSearch; ?>&productSearch=<?php echo $dateSearch; ?>"><div style="box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px; width:30px; text-align:center; float:left; margin:5px;">
                                                <?php echo $i; ?>
                                            </div></a>
                                        <?php
                                    }
                                }
                            ?>
                        </div>
                    </div>

            </div>
        </div>
    </section>
    <!-- end: Page Content -->
<?php }

static function menuILdetailed($typ, $invoices, $user, $type, $invoice_number, $customerSearch, $dateSearch, $salesOrderSearch, $count){ ?>
    <!-- Page Content -->
    <section id="page-content">
        <div class="content col-lg-12">   
            <div class="row">
                    <div class="content col-lg-3">
                        <h2 class="menu-detailed-title"><?php echo $typ;?></h2>
                    </div>
                    <div class="content col-lg-9">
                        <form method="post">
                            <?php if($invoice_number == ""){ ?><input type="text" placeholder="Reference" name="invoiceNumberSearch" class="search_field"> <?php }else{ ?> <input type="text" value="<?php echo $invoice_number; ?>" disabled name="invoiceNumberSearch" class="search_field"> <input type="text" value="<?php echo $invoice_number; ?>" name="invoiceNumberSearch" style="display:none;" /> <?php } ?>
                            <?php if($salesOrderSearch == ""){ ?><input type="text" placeholder="Product" name="salesOrderSearch" class="search_field"><?php }else{ ?> <input type="text" value="<?php echo $salesOrderSearch; ?>" disabled placeholder="Sales Order Number" name="salesOrderSearch" class="search_field" > <input type="text" value="<?php echo $salesOrderSearch; ?>" name="salesOrderSearch" style="display:none;" /> <?php } ?>
                            <?php if($dateSearch == ""){ ?><input type="text" placeholder="Serial Number" name="invoiceDateSearch" class="search_field"><?php }else{ ?><input type="text" value="<?php echo $dateSearch; ?>" disabled placeholder="Invoice Date" name="invoiceDateSearch" class="search_field"><input type="text" value="<?php echo $dateSearch; ?>" name="invoiceDateSearch" style="display:none;" /><?php }  ?>
                            <?php if($customerSearch == ""){ ?><input type="text" placeholder="Customer" name="customerSearch" class="search_field"><?php }else{ ?><input type="text" value="<?php echo $customerSearch; ?>" disabled placeholder="Customer" name="customerSearch" class="search_field"><input style="display:none;" type="text" style="width:300px" value="<?php echo $customerSearch; ?>" name="customerSearch"  /><?php } ?>
                            <input type="submit" value="search" class="btn btn-light" name="search" style="background:#0a3d67; color:white;">
                            <input type="submit" value="Clear" class="btn btn-light" name="clear" style="background:#0a3d67; color:white;">
                            <spam class="btn btn-light" style="background:#0a3d67; color:white;">Total Rows: <?php echo $count; ?></spam>
                        </form>
                    </div>
                        <table class="table">
                            <thead class="thead" style="background:#0a3d67; color:white;">
                                <tr>
                                    <th scope="col">Created On</th>
                                    <th scope="col">Reference</th>
                                    <th scope="col">Sales Order</th>
                                    <th scope="col">Sku</th>
                                    <th scope="col">Product</th>
                                    <th scope="col">Vendor</th>
                                    <th scope="col">Customer</th>
                                    <th scope="col">Qty</th>
                                    <th scope="col">Qty Delivered</th>
                                    <th scope="col">Serial Number</th>
                                    <th scope="col">Unit Price</th>
                                    <th scope="col">Taxes</th>
                                    <th scope="col">Untaxed AMount</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                    /**
                     * READING THE INVOICE OBJECT
                     * 
                     */ 

                    foreach ($invoices as $invoice)
                    { 
                        $serialExplode = explode("/",$invoice->getSerial());
                        $arrayCount = count($serialExplode);
                        $referenceType =  explode("/", $invoice->getInvoice_number());
                        ?>
                    
                        <tr>
                            <td><?php echo $invoice->getCreatedOn() ?></td>
                            <?php if($referenceType[0] == "INV"){ ?> <td><a href="invoice-detailed.php?user=<?php echo $user; ?>&typ=<?php echo $typ; ?>&type=<?php echo $type; ?>&inv=<?php echo $invoice->getInvoice_number();  ?>"><?php echo $invoice->getInvoice_number() ?></a></td> <?php }else{ ?> <td><a href="invoice-CNdetailed.php?user=<?php echo $user; ?>&typ=<?php echo $typ; ?>&type=<?php echo $type; ?>&inv=<?php echo $invoice->getInvoice_number();  ?>"><?php echo $invoice->getInvoice_number() ?></a></td> <?php } ?>
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
                            </tbody>
                        </table>
                    </div>
            </div>
        </div>
    </section>
        <!-- end: Page Content -->
<?php }

static function menuPLdetailed($typ, $invoices, $user, $type, $invoice_number, $customerSearch, $dateSearch, $salesOrderSearch, $count){ ?>
    <!-- Page Content -->
    <section id="page-content">
        <div class="content col-lg-12">   
            <div class="row">
                    <div class="content col-lg-3">
                        <h2 class="menu-detailed-title"><?php echo $typ;?></h2>
                    </div>
                    <div class="content col-lg-9">
                        <form method="post">
                            <?php if($invoice_number == ""){ ?><input type="text" placeholder="Purchase Number" name="invoiceNumberSearch" class="search_field"> <?php }else{ ?> <input type="text" value="<?php echo $invoice_number; ?>" disabled name="invoiceNumberSearch" class="search_field"> <input type="text" value="<?php echo $invoice_number; ?>" name="invoiceNumberSearch" style="display:none;" /> <?php } ?>
                            <?php if($salesOrderSearch == ""){ ?><input type="text" placeholder="Sku" name="salesOrderSearch" class="search_field"><?php }else{ ?> <input type="text" value="<?php echo $salesOrderSearch; ?>" disabled placeholder="Sales Order Number" name="salesOrderSearch" class="search_field" > <input type="text" value="<?php echo $salesOrderSearch; ?>" name="salesOrderSearch" style="display:none;" /> <?php } ?>
                            <?php if($dateSearch == ""){ ?><input type="text" placeholder="Created On" name="invoiceDateSearch" class="search_field"><?php }else{ ?><input type="text" value="<?php echo $dateSearch; ?>" disabled placeholder="Invoice Date" name="invoiceDateSearch" class="search_field"><input type="text" value="<?php echo $dateSearch; ?>" name="invoiceDateSearch" style="display:none;" /><?php }  ?>
                            <?php if($customerSearch == ""){ ?><input type="text" placeholder="Vendor" name="customerSearch" class="search_field"><?php }else{ ?><input type="text" value="<?php echo $customerSearch; ?>" disabled placeholder="Customer" name="customerSearch" class="search_field"><input style="display:none;" type="text" style="width:300px" value="<?php echo $customerSearch; ?>" name="customerSearch"  /><?php } ?>
                            <input type="submit" value="search" class="btn btn-light" name="search" style="background:#0a3d67; color:white;">
                            <input type="submit" value="Clear" class="btn btn-light" name="clear" style="background:#0a3d67; color:white;">
                            <spam class="btn btn-light" style="background:#0a3d67; color:white;">Total Rows: <?php echo $count; ?></spam>
                        </form>
                    </div>
                        <table class="table">
                            <thead class="thead" style="background:#0a3d67; color:white;">
                                <tr>
                                    <th scope="col">Created On</th>
                                    <th scope="col">Purchase Number</th>
                                    <th scope="col">Sku</th>
                                    <th scope="col">Product</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Unit Cost</th>
                                    <th scope="col">Taxes</th>
                                    <th scope="col">Subtotal</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Vendor</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                    /**
                     * READING THE INVOICE OBJECT
                     * 
                     */ 

                    foreach ($invoices as $invoice)
                    {  ?>
                    
                        <tr>
                            <td><?php echo $invoice->getCreated_on() ?></td>
                            <td><a href="invoice-Pdetailed.php?user=<?php echo $user; ?>&typ=<?php echo $typ; ?>&type=<?php echo $type; ?>&inv=<?php echo $invoice->getPurchase_number(); ?>&searchInvoice=<?php echo $invoice_number; ?>&searchSale=<?php echo $salesOrderSearch; ?>&searchCustomer=<?php echo $customerSearch; ?>&searchDate=<?php echo $dateSearch; ?>"><?php echo $invoice->getPurchase_number() ?></a></td>
                            <td><?php echo $invoice->getSku() ?></td>
                            <td><?php echo $invoice->getProduct() ?></td>
                            <td><?php echo $invoice->getQuantity() ?></td>
                            <td><?php echo $invoice->getUnit_cost() ?></td>
                            <td><?php if($invoice->getTaxes()!=""){echo "$".$invoice->getTaxes();}else{echo "$0.00";} ?></td>
                            <td><?php if($invoice->getSubtotal()!=""){echo "$". $invoice->getSubtotal();}else{echo "$0.00";} ?></td>
                            <td><?php if($invoice->getTotal()!=""){echo "$". $invoice->getTotal();}else{echo "$0.00";} ?></td>
                            <td><?php echo $invoice->getVendor() ?></td>
                            
                            
                        </tr></a>

                        <?php     
                    } 
                ?>
                            </tbody>
                        </table>
                    </div>
            </div>
        </div>
    </section>
        <!-- end: Page Content -->
<?php }

static function menuCNdetailed($typ, $invoices, $user, $type, $invoice_number, $customerSearch, $dateSearch, $salesOrderSearch, $count, $init, $totalPages, $page){
    $temp = $init + 50;
    if($temp < $count)
    {
        $finalNumber = $temp;
    }
    else{
        $finalNumber = $count;
    }
    ?>
    <!-- Page Content -->
    <section id="page-content">
        <div class="content col-lg-12"> 
            <div class="row">
                    <div class="content col-lg-3">
                        <h2 class="menu-detailed-title"><?php echo $typ;?></h2>
                    </div>
                    <div class="content col-lg-9">
                        <form method="post">
                            <?php if($invoice_number == ""){ ?><input type="text" placeholder="Credit Note Number" name="invoiceNumberSearch" class="search_field"> <?php }else{ ?> <input type="text" value="<?php echo $invoice_number; ?>" disabled name="invoiceNumberSearch" class="search_field"> <input type="text" value="<?php echo $invoice_number; ?>" name="invoiceNumberSearch" style="display:none;" /> <?php } ?>
                            <?php if($salesOrderSearch == ""){ ?><input type="text" placeholder="Source Document" name="salesOrderSearch" class="search_field"><?php }else{ ?> <input type="text" value="<?php echo $salesOrderSearch; ?>" disabled placeholder="Sales Order Number" name="salesOrderSearch" class="search_field" > <input type="text" value="<?php echo $salesOrderSearch; ?>" name="salesOrderSearch" style="display:none;" /> <?php } ?>
                            <?php if($dateSearch == ""){ ?><input type="text" placeholder="Invoice Date" name="invoiceDateSearch" class="search_field"><?php }else{ ?><input type="text" value="<?php echo $dateSearch; ?>" disabled placeholder="Invoice Date" name="invoiceDateSearch" class="search_field"><input type="text" value="<?php echo $dateSearch; ?>" name="invoiceDateSearch" style="display:none;" /><?php }  ?>
                            <?php if($customerSearch == ""){ ?><input type="text" placeholder="Customer" name="customerSearch" class="search_field"><?php }else{ ?><input type="text" value="<?php echo $customerSearch; ?>" disabled placeholder="Customer" name="customerSearch" class="search_field"><input style="display:none;" type="text" style="width:300px" value="<?php echo $customerSearch; ?>" name="customerSearch"  /><?php } ?>
                            <input type="submit" value="search" class="btn btn-light" name="search" style="background:#0a3d67; color:white;">
                            <input type="submit" value="Clear" class="btn btn-light" name="clear" style="background:#0a3d67; color:white;">
                            <spam class="btn btn-light" style="color:white; background:#0a3d67;">Results from <?php echo $init + 1; ?> - <?php echo $finalNumber; ?></spam>
                            <spam class="btn btn-light" style="background:#0a3d67; color:white;">Total Rows: <?php echo $count; ?></spam>
                        </form>
                    </div>
                    
                        <table class="table">
                            <thead class="thead" style="background:#0a3d67; color:white;">
                                <tr>
                                    <th scope="col">Credit Note#</th>
                                    <th scope="col">Source Document</th>
                                    <th scope="col">Customer</th>
                                    <th scope="col">Sales Person</th>
                                    <th scope="col">Invoice Date</th>
                                    <th scope="col">Due Date</th>
                                    <th scope="col">Untaxed Amount</th>
                                    <th scope="col">Amount Due</th>
                                    <th scope="col">Tax</th>
                                    <th scope="col">Total</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
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
                            <td><a href="invoice-CNdetailed.php?user=<?php echo $user; ?>&typ=<?php echo $typ; ?>&type=<?php echo $type; ?>&inv=<?php echo $invoice->getCreditnote_number(); ?>&searchInvoice=<?php echo $invoice_number; ?>&searchSale=<?php echo $salesOrderSearch; ?>&searchCustomer=<?php echo $customerSearch; ?>&searchDate=<?php echo $dateSearch; ?>"><input type="button" value="Open CreditNote" class="btn btn-light" style="background:#0a3d67; color:white;" /></a></td>
                        </tr></a>

                        <?php     
                    } 
                ?>
                            </tbody>
                        </table>
                        <div class="col-lg-12" >
                            <?php
                                for($i=1;$i <= $totalPages; $i++)
                                { 
                                    if($i == $page)
                                    { ?>
                                            <div style="box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px; width:30px; text-align:center; float:left; margin:5px; font-weight:bold;">
                                                <?php echo $i; ?>
                                            </div> 
                                        <?php 
                                    }
                                    else{ ?>
                                            <a href="menu-CNdetailed.php?typ=<?php echo $typ; ?>&user=<?php echo $user; ?>&type=<?php echo $type; ?>&page=<?php echo $i; ?>&skuSearch=<?php echo $invoice_number; ?>&vendorSearch=<?php echo $customerSearch; ?>&productSearch=<?php echo $salesOrderSearch; ?>&dateSearch=<?php echo $dateSearch; ?>"><div style="box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px; width:30px; text-align:center; float:left; margin:5px;">
                                                <?php echo $i; ?>
                                            </div></a>
                                        <?php
                                    }
                                }
                            ?>
                        </div>
                    </div>

            </div>
        </div>
    </section>
<?php }

static function menuCLIdetailed($typ, $invoices, $user, $type, $invoice_number, $customerSearch, $dateSearch, $salesOrderSearch, $count, $init, $totalPages, $page){ 
    
    $temp = $init + 50;
    if($temp < $count)
    {
        $finalNumber = $temp;
    }
    else{
        $finalNumber = $count;
    }
    
    ?>
    
    <!-- Page Content -->
    <section id="page-content">
                    <div class="col-lg-12">
                        <div class="row">
                                <div class="col-lg-3">
                                    <h2><?php echo $typ; ?></h2>
                                </div>
                                <div class="col-lg-9">
                                    <form method="post">
                                    <?php if($customerSearch == ""){ ?><input type="text" placeholder="Customer" name="customerSearch" class="search_field"><?php }else{ ?><input type="text" value="<?php echo $customerSearch; ?>" disabled placeholder="Customer" name="customerSearch" class="search_field"><input style="display:none;" type="text" style="width:300px" value="<?php echo $customerSearch; ?>" name="customerSearch"  /><?php } ?>
                                    <?php if($invoice_number == ""){ ?><input type="text" placeholder="Price List" name="invoiceNumberSearch" class="search_field"> <?php }else{ ?> <input type="text" value="<?php echo $invoice_number; ?>" disabled name="invoiceNumberSearch" class="search_field"> <input type="text" value="<?php echo $invoice_number; ?>" name="invoiceNumberSearch" style="display:none;" /> <?php } ?>
                                    <?php if($salesOrderSearch == ""){ ?><input type="text" placeholder="State" name="salesOrderSearch" class="search_field"><?php }else{ ?> <input type="text" value="<?php echo $salesOrderSearch; ?>" disabled placeholder="Sales Order Number" name="salesOrderSearch" class="search_field" > <input type="text" value="<?php echo $salesOrderSearch; ?>" name="salesOrderSearch" style="display:none;" /> <?php } ?>
                                    <input type="submit" value="search" class="btn btn-light" name="search" style="background:#0a3d67; color:white;" >
                                    <input type="submit" value="Clear" class="btn btn-light" name="clear" style="background:#0a3d67; color:white;">
                                    <spam class="btn btn-light" style="color:white; background:#0a3d67;">Results from <?php echo $init + 1; ?> - <?php echo $finalNumber; ?></spam>
                                    <spam class="btn btn-light" style="background:#0a3d67; color:white;">Total Rows: <?php echo $count; ?></spam>
                                    </form>
                                </div>
                            </div>
                        <table class="table">
                            <thead class="thead" style="background:#0a3d67; color:white;">
                                <tr>
                                    <th scope="col">Customer</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">State</th>
                                    <th scope="col">City</th>
                                    <th scope="col">Postal Code</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Email</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
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
                                        <td><a href="invoice-CLIdetailed.php?user=<?php echo $user; ?>&typ=<?php echo $typ; ?>&type=<?php echo $type; ?>&inv=<?php echo $invoice->getName(); ?>&searchInvoice=<?php echo $invoice_number; ?>&searchSale=<?php echo $salesOrderSearch; ?>&searchCustomer=<?php echo $customerSearch; ?>&searchDate=<?php echo $dateSearch; ?>"><input type="button" value="Open Customer" class="btn btn-light" style="background:#0a3d67; border-color:#0a3d67; color:white;" /></a></td>
                                    </tr></a>

                                    <?php     
                                } 
                            ?>
                            </tbody>
                        </table>
                        <div class="col-lg-12" >
                            <?php
                                for($i=1;$i <= $totalPages; $i++)
                                { 
                                    if($i == $page)
                                    { ?>
                                            <div style="box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px; width:30px; text-align:center; float:left; margin:5px; font-weight:bold;">
                                                <?php echo $i; ?>
                                            </div> 
                                        <?php 
                                    }
                                    else{ ?>
                                            <a href="menu-CLIdetailed.php?typ=<?php echo $typ; ?>&user=<?php echo $user; ?>&type=<?php echo $type; ?>&page=<?php echo $i; ?>&skuSearch=<?php echo $invoice_number; ?>&vendorSearch=<?php echo $customerSearch; ?>&productSearch=<?php echo $salesOrderSearch; ?>"><div style="box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px; width:30px; text-align:center; float:left; margin:5px;">
                                                <?php echo $i; ?>
                                            </div></a>
                                        <?php
                                    }
                                }
                            ?>
                        </div>
                    </div>
        </section>
<?php }

static function menuBadetailed($typ, $invoices, $user, $type, $invoice_number, $customerSearch, $dateSearch, $salesOrderSearch, $count, $init, $totalPages, $page){
    $temp = $init + 50;
        if($temp < $count)
        {
            $finalNumber = $temp;
        }
        else{
            $finalNumber = $count;
        }
    ?>
        <!-- Page Content -->
        <section id="page-content">
                    <div class="content col-lg-12">
                    <dic class="row">
                        <div class="col-lg-3">
                            <h2 class="menu-detailed-title"><?php echo $typ;?></h2>
                        </div>
                        <div class="col-lg-9">
                            <form method="post">
                                <?php if($customerSearch == ""){ ?><input type="text" placeholder="Customer" name="customerSearch" class="search_field"><?php }else{ ?><input type="text" value="<?php echo $customerSearch; ?>" disabled placeholder="Customer" name="customerSearch" class="search_field"><input style="display:none;" type="text" style="width:300px" value="<?php echo $customerSearch; ?>" name="customerSearch"  /><?php } ?>
                                <input type="submit" value="search" class="btn btn-light" name="search" style="background:#0a3d67; color:white;">
                                <input type="submit" value="Clear" class="btn btn-light" name="clear" style="background:#0a3d67; color:white;">
                                <spam class="btn btn-light" style="color:white; background:#0a3d67;">Results from <?php echo $init + 1; ?> - <?php echo $finalNumber; ?></spam>
                                <spam class="btn btn-light" style="background:#0a3d67; color:white;">Total Rows: <?php echo $count; ?></spam>
                            </form>
                        </div>
                        <table class="table">
                            <thead class="thead" style="background:#0a3d67; color:white">
                                <tr>
                                    <th scope="col">Customer Name</th>
                                    <th scope="col">Last Updated</th>
                                    <th scope="col">Total Receivable</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                          <?php   /**
                     * READING THE Balance OBJECT
                     * 
                     */ 

                    foreach ($invoices as $invoice)
                    {   ?>
                    
                        <tr>
                            <td><?php echo $invoice->getCustomer() ?></td>
                            <td><?php echo $invoice->getLast_update() ?></td>
                            <td>$<?php if($invoice->getTotal_receivable() == ""){echo "0.00";}else{ echo $invoice->getTotal_receivable(); }  ?></td>
                            <td><a href="menu-detailed.php?user=<?php echo $user; ?>&typ=Invoices&type=<?php echo $type; ?>&inv=<?php echo $invoice->getCustomer(); ?>&searchInvoice=<?php echo $invoice_number; ?>&searchSale=<?php echo $salesOrderSearch; ?>&searchCustomer=<?php echo $customerSearch; ?>&searchDate=<?php echo $dateSearch; ?>"><input type="button" value="More Details" class="btn btn-light" style="background:#0a3d67; color:white" /></a></td>
                        </tr></a>

                        <?php     
                    } 
                ?>
                            </tbody>
                        </table>
                        <div class="col-lg-12" >
                            <?php
                                for($i=1;$i <= $totalPages; $i++)
                                { 
                                    if($i == $page)
                                    { ?>
                                            <div style="box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px; width:30px; text-align:center; float:left; margin:5px; font-weight:bold;">
                                                <?php echo $i; ?>
                                            </div> 
                                        <?php 
                                    }
                                    else{ ?>
                                            <a href="menu-Badetailed.php?typ=<?php echo $typ; ?>&user=<?php echo $user; ?>&type=<?php echo $type; ?>&page=<?php echo $i; ?>&skuSearch=<?php echo $invoice_number; ?>&vendorSearch=<?php echo $customerSearch; ?>&productSearch=<?php echo $salesOrderSearch; ?>"><div style="box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px; width:30px; text-align:center; float:left; margin:5px;">
                                                <?php echo $i; ?>
                                            </div></a>
                                        <?php
                                    }
                                }
                            ?>
                        </div>
                    </div>
            </div>
        </section>
        <!-- end: Page Content -->
<?php }

static function menuUdetailed($user, $type, $msg, $invoices, $action ,$u, $userToEdit){ 
        if($userToEdit != "")
        {
            foreach ($userToEdit as $edit)
            {   
                $editId = $edit->getId();
                $editName = $edit->getName();
                $editEmail= $edit->getEmail();
                $editType= $edit->getType();
                $editPassword= $edit->getPassword();
            }  
        }
        else{
            $editId = "";
            $editName = "";
            $editEmail = "";
            $editType = "";
            $editPassword = "";
        }
    ?>
    <!-- Page Content -->
    <section id="page-content">
        <div class="content col-lg-12"> 
            <?php if($msg != ""){ ?> <h2 style="text-align:center; background:#063970; color:white; border-radius:20px;"><?php echo $msg; ?></h2><br><br> <?php } ?>
            <dic class="row">
                        <div class="col-lg-3">
                            <h2 class="menu-detailed-title">Users</h2>
                        </div>
                        <div class="col-lg-9" style="text-align:center;">
                            <form method="post">
                                <a href="admin.php?user=<?php echo $user; ?>&type=<?php echo $type; ?>"><spam class="btn btn-light" style="background:#0a3d67; color:white;">Go Back</spam></a>
                            </form>
                        </div>
                        <?php if($action != "") {?> <div class="col-lg-8"> <?php } else{ ?> <div class="col-lg-12"> <?php } ?>
                        
                            <table class="table">
                                <thead class="thead" style="background:#0a3d67; color:white">
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Type</th>
                                        <th scope="col">Password</th>
                                        <th scope="col"><a href="users.php?type=<?php echo $type; ?>&user=<?php echo $user; ?>&action=A"><img src="images/add.png" style="width:20px;"/></a></th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php   /**
                                     * READING THE Balance OBJECT
                                     * 
                                     */ 

                                    foreach ($invoices as $invoice)
                                    {   ?>
                                    
                                        <tr>
                                            <td><?php echo $invoice->getName(); ?></td>
                                            <td><?php echo $invoice->getEmail(); ?></td>
                                            <td><?php echo $invoice->getType();  ?></td>
                                            <td><?php echo $invoice->getPassword(); ?></td>
                                            <td><a href="users.php?type=<?php echo $type; ?>&user=<?php echo $user; ?>&action=D&u=<?php echo $invoice->getEmail(); ?>"><img src="images/delete.png" style="width:20px;"/></a></td>
                                            <td><a href="users.php?type=<?php echo $type; ?>&user=<?php echo $user; ?>&action=E&u=<?php echo $invoice->getEmail(); ?>"><img src="images/edit.png" style="width:20px;"/></a></td>
                                        </tr></a>

                                        <?php     
                                    }  ?>
                                </tbody>
                            </table>
                        </div>
                        <?php if($action == "D"){ ?>
                        <div class="col-lg-4" id="delete" style=" box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;">
                            <h4 class="menu-detailed-title">Delete User</h4>
                            <h5 class="menu-detailed-title">Are you sure you want to remore <strong><?php echo $u ?></strong> from the user list?</h5>
                            <form method="POST">
                                <input type="text" value="<?php echo $type; ?>" name="typeD" style="display:none;"/>
                                <input type="text" value="<?php echo $user; ?>" name="userD" style="display:none;"/>
                                <input type="submit" value="Delete" name="delete" class="btn btn-light" style="background:#0a3d67; color:white;" />
                            </form>
                        </div>
                        <?php }else if($action == "E"){ ?>
                        <div class="col-lg-4" id="edit" style="box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;">
                            <h4 class="menu-detailed-title">Edit User</h4>
                            <h4 class="menu-detailed-title">Are you sure you want to edit this users?</h4>
                            <form method="POST">
                                <input type="text" value="<?php echo $type; ?>" name="typeE" style="display:none;"/>
                                <input type="text" value="<?php echo $user; ?>" name="userE" style="display:none;"/>
                                    <table>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                        </tr>
                                        <tr>
                                            <td style="margin-left:5px;"><input type="text" required value="<?php echo $editName; ?>" name="name"/></td>
                                            <td style="margin-left:5px;"> <input type="email" required value="<?php echo $editEmail; ?>" name="email"/></td>
                                            <td style="margin-left:5px;"> <input type="text"  value="<?php echo $editId; ?>" name="id" style="display:none;"/></td>
                                        </tr>
                                        <tr>
                                            <th>Customer Type</th>
                                            <th>Password</th>
                                        </tr>
                                        <tr>
                                            <td style="margin-left:5px;"><input type="text" required value="<?php echo $editType; ?>" name="type"/></td>
                                            <td style="margin-left:5px;"> <input type="text" required value="<?php echo $editPassword; ?>" name="password"/></td>
                                        </tr>
                                    </table>
                                <input type="submit" value="Edit" name="edit" class="btn btn-light" style="background:#0a3d67; color:white;" />
                            </form>
                        </div>
                        <?php }else if($action == "A"){ ?>
                        <div class="col-lg-4" id="edit" style="box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;">
                            <h4 class="menu-detailed-title">Adding a New User</h4>
                            <h4 class="menu-detailed-title"></h4>
                            <form method="POST">
                                <input type="text" value="<?php echo $type; ?>" name="typeA" style="display:none;"/>
                                <input type="text" value="<?php echo $user; ?>" name="userA" style="display:none;"/>
                                    <table>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                        </tr>
                                        <tr>
                                            <td style="margin-left:5px;"><input type="text" required placeholder="Name" name="addName"/></td>
                                            <td style="margin-left:5px;"> <input type="email" required placeholder="Email"  name="addEmail"/></td>
                                        </tr>
                                        <tr>
                                            <th>Customer Type</th>
                                            <th>Password</th>
                                        </tr>
                                        <tr>
                                            <td>
                                                <select name="addType" id="type" required >
                                                    <option value="">--Please choose an User--</option>
                                                    <option value="2">Sales Team</option>
                                                    <option value="1">Admin</option>
                                                </select>
                                            </td>
                                            <td style="margin-left:5px;"> <input type="password" required  placeholder="Password" name="addPassword"/></td>
                                        </tr>
                                    </table>
                                <input type="submit" value="Add User" name="add" class="btn btn-light" style="background:#0a3d67; color:white;" />
                            </form>
                        </div><?php  } ?>
            </div>
        </div>
    </section>
<?php }

static function menuINdetailed($typ, $invoices, $user, $type, $invoice_number, $customerSearch, $dateSearch, $salesOrderSearch, $count, $init, $totalPages, $page){ 
        $temp = $init + 50;
        if($temp < $count)
        {
            $finalNumber = $temp;
        }
        else{
            $finalNumber = $count;
        }

    ?>
    <!-- Page Content -->
    <section id="page-content">

                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-3">
                                <h2><?php echo $typ; ?></h2>
                            </div>
                            <div class="col-lg-9">
                                <form method="post">
                                    <?php if($invoice_number == ""){ ?><input type="text" placeholder="Sku" name="invoiceNumberSearch" class="search_field"> <?php }else{ ?> <input type="text" value="<?php echo $invoice_number; ?>" disabled name="invoiceNumberSearch" class="search_field"> <input type="text" value="<?php echo $invoice_number; ?>" name="invoiceNumberSearch" style="display:none;" /> <?php } ?>
                                    <?php if($salesOrderSearch == ""){ ?><input type="text" placeholder="Product" name="salesOrderSearch" class="search_field"><?php }else{ ?> <input type="text" value="<?php echo $salesOrderSearch; ?>" disabled placeholder="Sales Order Number" name="salesOrderSearch" class="search_field" > <input type="text" value="<?php echo $salesOrderSearch; ?>" name="salesOrderSearch" style="display:none;" /> <?php } ?>
                                    <?php if($customerSearch == ""){ ?><input type="text" placeholder="Vendor" name="customerSearch" class="search_field"><?php }else{ ?><input type="text" value="<?php echo $customerSearch; ?>" disabled placeholder="Customer" name="customerSearch" class="search_field"><input style="display:none;" type="text" style="width:300px" value="<?php echo $customerSearch; ?>" name="customerSearch"  /><?php } ?>
                                    <input type="submit" value="search" class="btn btn-light" name="search" style="background:#0a3d67; border-color:#0a3d67; color:white;">
                                    <input type="submit" value="Clear" class="btn btn-light" name="clear" style="background:#0a3d67; border-color:#0a3d67; color:white;">
                                    <spam class="btn btn-light" style="color:white; background:#0a3d67;">Results from <?php echo $init + 1; ?> - <?php echo $finalNumber; ?></spam>
                                    <spam class="btn btn-light" style="color:white; background:#0a3d67;">Total Rows: <?php echo $count; ?></spam>
                                </form>
                            </div>
                        </div>
    
                        <table class="table">
                            <thead class="thead" style="background:#0a3d67; Color:white;">
                                <tr>
                                    <th scope="col">Sku</th>
                                    <th scope="col">Product</th>
                                    <th scope="col">Vendor</th>
                                    <th scope="col">Sales Price</th>
                                    <th scope="col">Cost</th>
                                    <th scope="col">Qty On Hand</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
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
                                            <td><a href="invoice-INdetailed.php?user=<?php echo $user; ?>&typ=<?php echo $typ; ?>&type=<?php echo $type; ?>&inv=<?php echo $invoice->getSku(); ?>&searchInvoice=<?php echo $invoice_number; ?>&searchSale=<?php echo $salesOrderSearch; ?>&searchCustomer=<?php echo $customerSearch; ?>&searchDate=<?php echo $dateSearch; ?>"><input type="button" value="Open Item" class="btn btn-light" style="background:#0a3d67; color: white;" /></a></td>
                                        </tr></a>

                                        <?php     
                                    } 
                                ?>
                            </tbody>
                        </table>
                        <div class="col-lg-12" >
                            <?php
                                for($i=1;$i <= $totalPages; $i++)
                                { 
                                    if($i == $page)
                                    { ?>
                                            <div style="box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px; width:30px; text-align:center; float:left; margin:5px; font-weight:bold;">
                                                <?php echo $i; ?>
                                            </div> 
                                        <?php 
                                    }
                                    else{ ?>
                                            <a href="menu-INdetailed.php?typ=<?php echo $typ; ?>&user=<?php echo $user; ?>&type=<?php echo $type; ?>&page=<?php echo $i; ?>&skuSearch=<?php echo $invoice_number; ?>&vendorSearch=<?php echo $customerSearch; ?>&productSearch=<?php echo $salesOrderSearch; ?>"><div style="box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px; width:30px; text-align:center; float:left; margin:5px;">
                                                <?php echo $i; ?>
                                            </div></a>
                                        <?php
                                    }
                                }
                            ?>
                        </div>
                    </div>
        </section>
        <!-- end: Page Content -->
<?php }

static function menuPdetailed($typ, $invoices, $user, $type, $invoice_number, $customerSearch, $dateSearch, $salesOrderSearch, $count){ ?>
    <!-- Page Content -->
    <section id="page-content">
        <div class="content col-lg-12">
            <div class="row">
                    <div class="content col-lg-3">
                        <h2 class="menu-detailed-title"><?php echo $typ;?></h2>
                    </div>
                    <div class="content col-lg-9">
                        <form method="post">
                            <?php if($invoice_number == ""){ ?><input type="text" placeholder="Purchase Number" name="invoiceNumberSearch" class="search_field"> <?php }else{ ?> <input type="text" value="<?php echo $invoice_number; ?>" disabled name="invoiceNumberSearch" class="search_field"> <input type="text" value="<?php echo $invoice_number; ?>" name="invoiceNumberSearch" style="display:none;" /> <?php } ?>
                            <?php if($customerSearch == ""){ ?><input type="text" placeholder="Vendor" name="VendorSearch" class="search_field"><?php }else{ ?><input type="text" value="<?php echo $customerSearch; ?>" disabled placeholder="Customer" name="VendorSearch" class="search_field"><input style="display:none;" type="text" style="width:300px" value="<?php echo $customerSearch; ?>" name="VendorSearch"  /><?php } ?>
                            <?php if($salesOrderSearch == ""){ ?><input type="text" style="display:none;" placeholder="Source Document" name="salesOrderSearch" class="search_field"><?php }else{ ?> <input type="text" value="<?php echo $salesOrderSearch; ?>" disabled placeholder="Sales Order Number" name="salesOrderSearch" style="display:none;" class="search_field" > <input type="text" value="<?php echo $salesOrderSearch; ?>" name="salesOrderSearch" style="display:none;" /> <?php } ?>
                            <?php if($dateSearch == ""){ ?><input type="text" placeholder="Order Date" name="invoiceDateSearch" class="search_field"><?php }else{ ?><input type="text" value="<?php echo $dateSearch; ?>" disabled placeholder="Invoice Date" name="invoiceDateSearch" class="search_field"><input type="text" value="<?php echo $dateSearch; ?>" name="invoiceDateSearch" style="display:none;" /><?php }  ?>
                            <input type="submit" value="search" class="btn btn-light" name="search" style="background:#0a3d67; border-color:#0a3d67; color:white;">
                            <input type="submit" value="Clear" class="btn btn-light" name="clear" style="background:#0a3d67; border-color:#0a3d67; color:white;">
                            <spam class="btn btn-light" style="color:white; background:#0a3d67;">Total Rows: <?php echo $count ?></spam>
                        </form>
                    </div>
        
                        <table class="table">
                            <thead class="thead" style="background:#0a3d67; color:white;">
                                <tr>
                                    <th scope="col">Purchase #</th>
                                    <th scope="col">Order Date</th>
                                    <th scope="col">Vendor</th>
                                    <th scope="col">Schedule Date</th>
                                    <th scope="col">Sales Person</th>
                                    <th scope="col">Source Document</th>
                                    <th scope="col">Untaxed Amount</th>
                                    <th scope="col">Tax</th>
                                    <th scope="col">Total</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
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
                            <td><a href="invoice-Pdetailed.php?user=<?php echo $user; ?>&typ=<?php echo $typ; ?>&type=<?php echo $type; ?>&inv=<?php echo $invoice->getPurchase_number(); ?>&searchInvoice=<?php echo $invoice_number; ?>&searchSale=<?php echo $salesOrderSearch; ?>&searchCustomer=<?php echo $customerSearch; ?>&searchDate=<?php echo $dateSearch; ?>"><input type="button" value="Open Purchase" class="btn btn-light" style="color:white; background:#0a3d67;" /></a></td>
                        </tr></a>

                        <?php     
                    } 
                ?>
                            </tbody>
                        </table>
                    </div>

            </div>
        </div>
    </section>
        <!-- end: Page Content -->
<?php }

static function menuJoEdetailed($typ, $invoices, $user, $type, $invoice_number, $customerSearch, $dateSearch, $salesOrderSearch, $count, $init, $totalPages, $page){ 
    $temp = $init + 50;
        if($temp < $count)
        {
            $finalNumber = $temp;
        }
        else{
            $finalNumber = $count;
        }
    ?>
    <!-- Page Content -->
    <section id="page-content">
        <div class="content col-lg-12">  
            <div class="row">
                    <div class="content col-lg-3">
                        <h2 class="menu-detailed-title"><?php echo $typ;?></h2>
                    </div>
                    <div class="content col-lg-9">
                        <form method="post">
                            <?php if($invoice_number == ""){ ?><input type="text" placeholder="Number" name="invoiceNumberSearch" class="search_field"> <?php }else{ ?> <input type="text" value="<?php echo $invoice_number; ?>" disabled name="invoiceNumberSearch" class="search_field"> <input type="text" value="<?php echo $invoice_number; ?>" name="invoiceNumberSearch" style="display:none;" /> <?php } ?>
                            <?php if($customerSearch == ""){ ?><input type="text" placeholder="Customer" name="VendorSearch" class="search_field"><?php }else{ ?><input type="text" value="<?php echo $customerSearch; ?>" disabled placeholder="Customer" name="VendorSearch" class="search_field"><input style="display:none;" type="text" style="width:300px" value="<?php echo $customerSearch; ?>" name="VendorSearch"  /><?php } ?>
                            <?php if($salesOrderSearch == ""){ ?><input type="text" placeholder="Reference" name="salesOrderSearch" class="search_field"><?php }else{ ?> <input type="text" value="<?php echo $salesOrderSearch; ?>" disabled placeholder="Sales Order Number" name="salesOrderSearch"  class="search_field" > <input type="text" value="<?php echo $salesOrderSearch; ?>" name="salesOrderSearch" style="display:none;" /> <?php } ?>
                            <?php if($dateSearch == ""){ ?><input type="text" placeholder="Date" name="invoiceDateSearch" class="search_field"><?php }else{ ?><input type="text" value="<?php echo $dateSearch; ?>" disabled placeholder="Invoice Date" name="invoiceDateSearch" class="search_field"><input type="text" value="<?php echo $dateSearch; ?>" name="invoiceDateSearch" style="display:none;" /><?php }  ?>
                            <input type="submit" value="search"class="btn btn-light" name="search" style="background:#0a3d67; border-color:#0a3d67; color:white;">
                            <input type="submit" value="Clear" class="btn btn-light" name="clear" style="background:#0a3d67; border-color:#0a3d67; color:white;">
                            <spam class="btn btn-light" style="color:white; background:#0a3d67;">Results from <?php echo $init + 1; ?> - <?php echo $finalNumber; ?></spam>
                            <spam class="btn btn-light" style="color:white; background:#0a3d67;">Total Rows: <?php echo $count ?></spam>
                        </form>
                    </div>
                       
                        <table class="table">
                            <thead class="thead" style="background:#0a3d67; color:white;">
                                <tr>
                                    <th scope="col">Date</th>
                                    <th scope="col">Number</th>
                                    <th scope="col">Customer</th>
                                    <th scope="col">Reference</th>
                                    <th scope="col">Journal</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
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
                            <td><a href="invoice-JoIdetailed.php?user=<?php echo $user; ?>&typ=<?php echo $typ; ?>&type=<?php echo $type; ?>&inv=<?php echo $invoice->getNumber(); ?>&searchInvoice=<?php echo $invoice_number; ?>&searchSale=<?php echo $salesOrderSearch; ?>&searchCustomer=<?php echo $customerSearch; ?>&searchDate=<?php echo $dateSearch; ?>"><input type="button" value="More Details" class="btn btn-light" style="color:white; background:#0a3d67;" /></a></td>
                        </tr></a>

                        <?php     
                    } 
                ?>
                            </tbody>
                        </table>
                        <div class="col-lg-12" >
                            <?php
                                for($i=1;$i <= $totalPages; $i++)
                                { 
                                    if($i == $page)
                                    { ?>
                                            <div style="box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px; width:30px; text-align:center; float:left; margin:5px; font-weight:bold;">
                                                <?php echo $i; ?>
                                            </div> 
                                        <?php 
                                    }
                                    else{ ?>
                                            <a href="menu-JoEdetailed.php?typ=<?php echo $typ; ?>&user=<?php echo $user; ?>&type=<?php echo $type; ?>&page=<?php echo $i; ?>&skuSearch=<?php echo $invoice_number; ?>&vendorSearch=<?php echo $customerSearch; ?>&productSearch=<?php echo $salesOrderSearch; ?>&dateSearch=<?php echo $dateSearch; ?>"><div style="box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px; width:30px; text-align:center; float:left; margin:5px;">
                                                <?php echo $i; ?>
                                            </div></a>
                                        <?php
                                    }
                                }
                            ?>
                        </div>
                    </div>

                </div>
            </div>
     </section>
    <!-- end: Page Content -->
    
<?php }

   static function menuDetailed($typ, $invoices, $user, $type, $invoice_number, $customerSearch, $dateSearch, $salesOrderSearch, $count, $inv, $init, $totalPages, $page){
    $temp = $init + 50;
    if($temp < $count)
    {
        $finalNumber = $temp;
    }
    else{
        $finalNumber = $count;
    }
    ?>
        <!-- Page Content -->
        <section id="page-content">
                <div class="content col-lg-12">
                    <div class="row">
                        <div class="content col-lg-3">
                            <h2 class="menu-detailed-title"><?php echo $typ;?></h2>
                        </div>
                        <div class="content col-lg-9">
                        <form method="post">
                            <?php
                            if($inv == "")
                            {
                                if($invoice_number == ""){ ?><input type="text" placeholder="Invoice Number" name="invoiceNumberSearch" class="search_field"> <?php }else{ ?> <input type="text" value="<?php echo $invoice_number; ?>" disabled name="invoiceNumberSearch" class="search_field"> <input type="text" value="<?php echo $invoice_number; ?>" name="invoiceNumberSearch" style="display:none;" /> <?php } ?>
                                <?php if($salesOrderSearch == ""){ ?><input type="text" placeholder="Sales Order Number" name="salesOrderSearch" class="search_field"><?php }else{ ?> <input type="text" value="<?php echo $salesOrderSearch; ?>" disabled placeholder="Sales Order Number" name="salesOrderSearch" class="search_field" > <input type="text" value="<?php echo $salesOrderSearch; ?>" name="salesOrderSearch" style="display:none;" /> <?php } ?>
                                <?php if($dateSearch == ""){ ?><input type="text" placeholder="Invoice Date" name="invoiceDateSearch" class="search_field"><?php }else{ ?><input type="text" value="<?php echo $dateSearch; ?>" disabled placeholder="Invoice Date" name="invoiceDateSearch" class="search_field"><input type="text" value="<?php echo $dateSearch; ?>" name="invoiceDateSearch" style="display:none;" /><?php }  ?>
                                <?php if($customerSearch == ""){ ?><input type="text" placeholder="Customer" name="customerSearch" class="search_field"><?php }else{ ?><input type="text" value="<?php echo $customerSearch; ?>" disabled placeholder="Customer" name="customerSearch" class="search_field"><input style="display:none;" type="text" style="width:300px" value="<?php echo $customerSearch; ?>" name="customerSearch"  /><?php } ?>
                                <input type="submit" value="search" class="btn btn-light" style="color:white; background:#0a3d67;" name="search">
                                <?php if($invoice_number != "" || $customerSearch == "" || $dateSearch == "" || $salesOrderSearch == ""){ ?><input type="submit" value="Clear" class="btn btn-light" style="color:white; background:#0a3d67;" name="clear"><?php }else{} ?>
                                <spam class="btn btn-light" style="color:white; background:#0a3d67;">Results from <?php echo $init + 1; ?> - <?php echo $finalNumber; ?></spam>
                                <spam class="btn btn-light" style="color:white; background:#0a3d67;">Total rows: <?php echo $count; ?></spam>
                           <?php }
                            else
                            { ?>
                                <spam class="btn btn-light" style="color:white; background:#0a3d67;">Results from <?php echo $init + 1; ?> - <?php echo $finalNumber; ?></spam>
                                <spam class="btn btn-light" style="color:white; background:#0a3d67;">Total rows: <?php echo $count; ?></spam>
                           <?php  } ?>
                            
                        </form>
                        </div>
                            <table class="table">
                                <thead class="thead" style="background:#0a3d67; color:white;">
                                    <tr>
                                        <th scope="col">Invoice#</th>
                                        <th scope="col">Sales Order#</th>
                                        <th scope="col">Customer</th>
                                        <th scope="col">Sales Person</th>
                                        <th scope="col">Invoice Date</th>
                                        <th scope="col">Due Date</th>
                                        <th scope="col">Untaxed Amount</th>
                                        <th scope="col">Amount Due</th>
                                        <th scope="col">Tax</th>
                                        <th scope="col">Total</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
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
                                <td><a href="invoice-detailed.php?user=<?php echo $user; ?>&typ=<?php echo $typ; ?>&type=<?php echo $type; ?>&inv=<?php echo $invoice->getInvoiceNumber(); ?>&searchInvoice=<?php echo $invoice_number; ?>&searchSale=<?php echo $salesOrderSearch; ?>&searchCustomer=<?php echo $customerSearch; ?>&searchDate=<?php echo $dateSearch; ?>"><input type="button" value="Open Invoice" class="btn btn-light" style="color:white; background:#0a3d67;" /></a></td>
                            </tr></a>

                            <?php     
                        } 
                    ?>
                                </tbody>
                            </table>
                            <div class="col-lg-12" >
                            <?php
                                for($i=1;$i <= $totalPages; $i++)
                                { 
                                    if($i == $page)
                                    { ?>
                                            <div style="box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px; width:30px; text-align:center; float:left; margin:5px; font-weight:bold;">
                                                <?php echo $i; ?>
                                            </div> 
                                        <?php 
                                    }
                                    else{ ?>
                                            <a href="menu-detailed.php?typ=<?php echo $typ; ?>&user=<?php echo $user; ?>&type=<?php echo $type; ?>&page=<?php echo $i; ?>&skuSearch=<?php echo $invoice_number; ?>&vendorSearch=<?php echo $customerSearch; ?>&productSearch=<?php echo $salesOrderSearch; ?>&dateSearch=<?php echo $dateSearch; ?>&inv=<?php echo $inv; ?>"><div style="box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px; width:30px; text-align:center; float:left; margin:5px;">
                                                <?php echo $i; ?>
                                            </div></a>
                                        <?php
                                    }
                                }
                            ?>
                        </div>
                    </div>
                </div>
        </section>
        <!-- end: Page Content -->
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

<section>
    <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12" style="text-align:center;">
                        <form method="POST">
                            <a href="menu-CNdetailed.php?user=<?php echo $user; ?>&typ=CreditNotes&type=<?php echo $type; ?>"><input type="button" value="Go back" name="goBack" class="btn btn-light" style="color:white; background:#0a3d67;" /></a>
                            <input type="submit" value="Print" name="print" class="btn btn-light" style="color:white; background:#0a3d67;" />
                        </form>
                    </div>
                    <div class="row center" style="width:95%; border-radius:10px; padding:30px; box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;">
                        <div class="col-lg-12" style="margin-bottom:40px;">
                            <h2 class="menu-detailed-title"> <?php echo $invo;?> </h2>
                        </div>
                        <div class="col-lg-4">
                            <div>
                                <h4>Customer</h4>
                                <p><?php echo $customer; ?></p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div>
                                <h4>Delivering Address</h4>
                                <p><?php echo $delivery_address; ?></p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div>
                                <h4>Payment Terms</h4>
                                <p><?php echo $payment_terms; ?></p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div>
                                <h4>Global Comments</h4>
                                <p><?php echo $global; ?></p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div>
                                <h4>Invoice Notes</h4>
                                <p><?php echo $invoice_notes; ?></p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div>
                                <h4>Customer Notes</h4>
                                <p><?php echo $customerNotes; ?></p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div>
                                <h4>Invoice Date</h4>
                                <p><?php echo $invoice_date; ?></p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div>
                                <h4>Due Date</h4>
                                <p><?php echo $due_date; ?></p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div>
                                <h4>Sales Person</h4>
                                <p><?php echo $sales_person; ?></p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div>
                                <h4>Customer Po#</h4>
                                <p><?php echo $customer_po; ?></p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div>
                                <h4>Warehouse Notes</h4>
                                <p><?php echo $warehouse_notes; ?></p>
                            </div>
                        </div>
                        <br><br><br>
                        <div class="content col-lg-12">
                                    <div class="row">
                                                <table class="table">
                                                    <thead class="thead" style="background:#0a3d67; color:white;">
                                                        <tr>
                                                            <th scope="col">Sku</th>
                                                            <th scope="col">Product</th>
                                                            <th scope="col">Serial Number</th>
                                                            <th scope="col">Notes</th>
                                                            <th scope="col">RMA Notes</th>
                                                            <th scope="col">Qty Ordered</th>
                                                            <th scope="col">Qty</th>
                                                            <th scope="col">Qty Bo</th>
                                                            <th scope="col">Price</th>
                                                            <th scope="col">Unit Price after discount</th>
                                                            <th scope="col">Taxes</th>
                                                            <th scope="col">Subtotal</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
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
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="row" style=" float:right; margin-right:50px; ">
                                    
                                                <table>
                                                    <tr>
                                                        <td >Untaxed Amount:</td>
                                                        <td style="margin-left:10px;">$<?php if($untaxed_amount_total == ""){echo "0.00";}else{echo $untaxed_amount_total;} ?></td>
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
                                </div>

            </div>
    </div>
                    </div>
                    
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
<section>
            <div class="col-lg-12">
                <div class="row">
                <div class="col-lg-12" style="text-align:center;">
                            <form method="POST">
                                <a href="menu-INdetailed.php?user=<?php echo $user; ?>&typ=<?php echo $typ; ?>&type=<?php echo $typee; ?>"><input type="button" value="Go back" name="goBack" class="btn btn-light" style="color:white; background:#0a3d67;" /></a>
                            </form>
                        </div>

                    <div class="row center" style="width:95%; border-radius:10px; padding:30px; box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;">
                        <div class="col-lg-8">
                            <h2 class="menu-detailed-title"> <?php echo $product;?> </h2>
                        </div>
                        <div class="col-lg-2">
                            <a href="menu-ILdetailed.php?user=<?php echo $user; ?>&typ=Invoice Line&type=<?php echo $typee; ?>&item=<?php echo $sku; ?>"><input type="button" value="Sales History" name="goBack" class="btn btn-light" style="color:white; background:#0a3d67;" /></a>
                        </div>
                        <div class="col-lg-2">
                            <a href="menu-PLdetailed.php?user=<?php echo $user; ?>&typ=Purchase Line&type=<?php echo $typee; ?>&item=<?php echo $sku; ?>"><input type="button" value="Purchase History" name="goBack" class="btn btn-light" style="color:white; background:#0a3d67;" /></a>
                        </div>
                        <br><br><br><br><br><br>
                        <div class="col-lg-4">
                            <div>
                                <h4>SKU</h4>
                                <p><?php echo $sku; ?></p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div>
                                <h4>Vendor</h4>
                                <p><?php echo $vendor; ?></p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div>
                                <h4>Barcode</h4>
                                <p><?php echo $barcode; ?></p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div>
                                <h4>Sales Price</h4>
                                <p><?php if($sales_price !=""){ echo "$".$sales_price;  } else{} ?></p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div>
                                <h4>Cost</h4>
                                <p><?php if($cost !=""){ echo "$".$cost;  } else{} ?></p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div>
                                <h4>Category</h4>
                                <p><?php echo $category; ?></p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div>
                                <h4>Invoice Type</h4>
                                <p><?php echo $type; ?></p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div>
                                <h4>Qty On hand</h4>
                                <p><?php echo $qty_onhand; ?></p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div>
                                <h4>created by</h4>
                                <p><?php echo $created_by; ?></p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div>
                                <h4>Created On</h4>
                                <p><?php echo $created_on; ?></p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div>
                                <h4>Qty Sold</h4>
                                <p><?php echo $qty_sold; ?></p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div>
                                <h4>Customer Tax</h4>
                                <p><?php echo $customer_tax; ?></p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div>
                                <h4>web_description</h4>
                                <p><?php echo $web_description; ?></p>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
    </section>
    <!-- Page Content -->
    
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

<section>
            <div class="col-lg-12">
                <div class="row">
                        <div class="col-lg-12" style="text-align:center;">
                            <form method="POST">
                                <a href="menu-CLIdetailed.php?user=<?php echo $user; ?>&typ=<?php echo $typ; ?>&type=<?php echo $type; ?>"><input type="button" value="Go back" name="goBack" class="btn btn-light" style="color:white; background:#0a3d67;" /></a>
                               
                            </form>
                        </div>
                    <div class="row center" style="width:95%; border-radius:10px; padding:30px; box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;">
                        <div class="col-lg-12" style="margin-bottom:50px;">
                            <h2 class="menu-detailed-title"> <?php echo $customer;?> </h2>
                        </div>
                        
                        <div class="col-lg-4">
                            <div>
                                <h4>Delivery Address</h4>
                                <p><?php echo $street.", ".$city.", ".$state.", ".$postal_code.", ".$country; ?></p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div>
                                <h4>Payment Terms</h4>
                                <p><?php echo $payment_terms; ?></p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div>
                                <h4>Fiscal Postion</h4>
                                <p><?php echo $fiscal; ?></p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div>
                                <h4>Created By</h4>
                                <p><?php  echo $by;   ?></p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div>
                                <h4>Customer Id</h4>
                                <p><?php echo $customer_id; ?></p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div>
                                <h4>phone</h4>
                                <p><?php echo $phone." ".$phone2; ?></p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div>
                                <h4>Email</h4>
                                <p><?php echo $email; ?></p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div>
                                <h4>Fax</h4>
                                <p><?php echo $fax; ?></p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div>
                                <h4>Contact Name</h4>
                                <p><?php echo $contact_name; ?></p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div>
                                <h4>PST</h4>
                                <p><?php echo $pst; ?></p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div>
                                <h4>Tags</h4>
                                <p><?php echo $tags; ?></p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div>
                                <h4>Notes</h4>
                                <p><?php echo $notes; ?></p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div>
                                <h4>Warning Message</h4>
                                <p><?php echo $warning; ?></p>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
    </section>
    <!-- Page Content -->
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

<section>
    <div class="col-lg-12">
        <div class="row">
                    <div class="col-lg-12" style="text-align:center;">
                        <form method="POST">
                            <a href="menu-Pdetailed.php?user=<?php echo $user; ?>&typ=Purchases&type=<?php echo $type; ?>"><input type="button" value="Go back" name="goBack" class="btn btn-light" style="color:white; background:#0a3d67;" /></a>
                            <input type="submit" value="Print" name="print" class="btn btn-light" style="color:white; background:#0a3d67;" />
                        </form>
                    </div>
                    <div class="row center" style="width:95%; border-radius:10px; padding:30px; box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;">
                        <div class="col-lg-12" style="margin-bottom:40px;">
                            <h2 class="menu-detailed-title"> <?php echo $invo;?> </h2>
                        </div>
                        <div class="col-lg-4">
                            <div>
                                <h4>Vendor</h4>
                                <p><?php echo $vendor; ?></p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div>
                                <h4>Delivering TO</h4>
                                <p><?php echo $deliver_to; ?></p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div>
                                <h4>Payment Terms</h4>
                                <p><?php echo $terms; ?></p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div>
                                <h4>Comments</h4>
                                <p><?php echo $comments; ?></p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div>
                                <h4>Status</h4>
                                <p><?php echo $status; ?></p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div>
                                <h4>Stellar Status</h4>
                                <p><?php echo $stellar_status; ?></p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div>
                                <h4>Sales Order</h4>
                                <p><?php echo $sales_number; ?></p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div>
                                <h4>Order Date</h4>
                                <p><?php echo $order_date; ?></p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div>
                                <h4>Schedule Date</h4>
                                <p><?php echo $schedule_date; ?></p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div>
                                <h4>Sales Person</h4>
                                <p><?php echo $sales_person; ?></p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div>
                                <h4>Source Document</h4>
                                <p><?php echo $source_document; ?></p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div>
                                <h4>Broker</h4>
                                <p><?php echo $broker; ?></p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div>
                                <h4>Currancy</h4>
                                <p><?php echo $currancy; ?></p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div>
                                <h4>Bill Reference</h4>
                                <p><?php echo $bill_reference; ?></p>
                            </div>
                        </div>
                        <br><br><br>
                        <div class="content col-lg-12">
                                    <div class="row">
                                                <table class="table">
                                                    <thead class="thead" style="background:#0a3d67; color:white;">
                                                        <tr>
                                                            <th scope="col">Created On</th>
                                                            <th scope="col">Purchase Order</th>
                                                            <th scope="col">Sku</th>
                                                            <th scope="col">Product</th>
                                                            <th scope="col">Vendor</th>
                                                            <th scope="col">Quantity</th>
                                                            <th scope="col">Received Qty</th>
                                                            <th scope="col">Unit Cost</th>
                                                            <th scope="col">Taxes</th>
                                                            <th scope="col">Subtotal</th>
                                                            <th scope="col">Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
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
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="row" style="float:right;">
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end row--> 
        </div> <!-- end row-->     
    </div><!-- end col-lg-12-->   
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


<section>
    <div class="col-lg-12">
        <div class="row">
                    <div class="col-lg-12" style="text-align:center;">
                        <form method="POST">
                            <a href="menu-JoEdetailed.php?user=<?php echo $user; ?>&typ=<?php echo $typ; ?>&type=<?php echo $type; ?>"><input type="button" value="Go back" name="goBack" class="btn btn-light" style="color:white; background:#0a3d67;" /></a>
                            <input type="submit" value="Print" name="print" class="btn btn-light" style="color:white; background:#0a3d67;" />
                        </form>
                    </div>
                    <div class="row center" style="width:95%; border-radius:10px; padding:30px; box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;">
                        <div class="col-lg-12" style="margin-bottom:40px;">
                            <h2 class="menu-detailed-title"> <?php echo $invo;?> </h2>
                        </div>
                        <div class="col-lg-4">
                            <div>
                                <h4>Date</h4>
                                <p><?php echo $date; ?></p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div>
                                <h4>Customer</h4>
                                <p><?php echo $Customer; ?></p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div>
                                <h4>Reference</h4>
                                <p><?php echo $Reference; ?></p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div>
                                <h4>Journal</h4>
                                <p><?php echo $journal; ?></p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div>
                                <h4>Status</h4>
                                <p><?php echo $status; ?></p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div>
                                <h4>Amount</h4>
                                <p><?php echo $amount; ?></p>
                            </div>
                        </div>
                        <br><br><br>
                        <div class="content col-lg-12">
                                    <div class="row">
                                                <table class="table">
                                                    <thead class="thead" style="background:#0a3d67; color:white;">
                                                        <tr>
                                                            <th scope="col">Created On</th>
                                                            <th scope="col">Number</th>
                                                            <th scope="col">Account</th>
                                                            <th scope="col">Customer</th>
                                                            <th scope="col">Label</th>
                                                            <th scope="col">Reference</th>
                                                            <th scope="col">Debit</th>
                                                            <th scope="col">Credit</th>
                                                            <th scope="col">Due Date</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
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
                                                    </tbody>
                                                </table>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end row--> 
        </div> <!-- end row-->     
    </div><!-- end col-lg-12-->   
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

    <section>
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12" style="text-align:center;">
                        <form method="POST">
                            <a href="menu-detailed.php?user=<?php echo $user; ?>&typ=Invoices&type=<?php echo $type; ?>"><input type="button" value="GO BACK" name="goBack" class="btn btn-light" style="color:white; background:#0a3d67;" /></a>
                            <input type="submit" value="Print" name="print" class="btn btn-light" style="color:white; background:#0a3d67;" />
                        </form>
                    </div>
                    <div class="row center" style="width:95%; border-radius:10px; padding:30px; box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;">
                        <div class="col-lg-12">
                            <h2 class="menu-detailed-title"> <?php echo $invo;?> </h2>
                        </div>
                        <br><br><br><br>
                        <div class="col-lg-4">
                            <div>
                                <h4>Customer</h4>
                                <p><?php echo $customer; ?></p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div>
                                <h4>Delivering Address</h4>
                                <p><?php echo $delivery_address; ?></p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div>
                                <h4>Payment Terms</h4>
                                <p><?php echo $payment_terms; ?></p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div>
                                <h4>Global Comments</h4>
                                <p><?php echo $global; ?></p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div>
                                <h4>Invoice Notes</h4>
                                <p><?php echo $invoice_notes; ?></p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div>
                                <h4>Customer Notes</h4>
                                <p><?php echo $customerNotes; ?></p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div>
                                <h4>Invoice Date</h4>
                                <p><?php echo $invoice_date; ?></p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div>
                                <h4>Due Date</h4>
                                <p><?php echo $due_date; ?></p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div>
                                <h4>Sales Person</h4>
                                <p><?php echo $sales_person; ?></p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div>
                                <h4>Sales Team</h4>
                                <p><?php echo $sales_team; ?></p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div>
                                <h4>Customer Po#</h4>
                                <p><?php echo $customer_po; ?></p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div>
                                <h4>Warehouse Notes</h4>
                                <p><?php echo $warehouse_notes; ?></p>
                            </div>
                        </div>
                        <table class="table">
                            <thead class="thead" style="background:#0a3d67; color:white;">
                                <tr>
                                    <th scope="col">Sku</th>
                                    <th scope="col">Product</th>
                                    <th scope="col">Serial Number</th>
                                    <th scope="col">Notes</th>
                                    <th scope="col">RMA Notes</th>
                                    <th scope="col">Qty Ordered</th>
                                    <th scope="col">Qty</th>
                                    <th scope="col">Qty Bo</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Unit Price after discount</th>
                                    <th scope="col">Taxes</th>
                                    <th scope="col">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
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
                            </tbody>
                        </table>
                        <div style="margin-left:88%;">
                            <table style="text-align:right; ">
                                    <tr>
                                        <td >Untaxed Amount:</td>
                                        <td style="margin-left:10px;">$<?php if($untaxed_amount_total == ""){echo "0.00";}else{echo $untaxed_amount_total;} ?></td>
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
                </div>
            </div>
    </section>
<?php }

static function formAdd($typ){ ?>
<section>   
    <div class="col-lg-10" style="text-align:center; margin-left:auto; margin-right:auto; border-radius:20px; padding:40px; box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;">
        <h3>The only file accepted is an excel file.</h3><br><br><br>
        <div class="row">
                <div class="col-lg-4">
                    <div class="row">
                        <h2> <?php echo "Add the ".$typ;?> file lot</h2>
                    </div>
                    <div class="row">
                        <form method="POST" enctype="multipart/form-data">
                            <input type="file" name="invoiceFile"/> <br><br>
                            <input type="submit" value="Submit file"  name="import" style="background:#152c4e; color:white;"/>
                            <br><br><br><br>
                        </form>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="row">
                        <h2>Add the invoice line file lot</h2>
                    </div>
                    <div class="row">
                        <form method="POST" enctype="multipart/form-data">
                            <input type="file" name="invoiceLineFile"/> <br><br>
                            <input type="submit" value="Submit file" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" name="import2" style="background:#152c4e; color:white;"/>
                            <br><br><br><br>
                        </form>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="row">
                        <h2>Add the CreditNote file lot</h2>
                    </div>
                    <div class="row">
                        <form method="POST" enctype="multipart/form-data">
                            <input type="file" name="creditNoteFile"/> <br><br>
                            <input type="submit" value="Submit file" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" name="import3" style="background:#152c4e; color:white;"/>
                            <br><br><br><br>
                        </form>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="row">
                        <h2>Add Purchases file lot</h2>
                    </div>
                    <div class="row">
                        <form method="POST" enctype="multipart/form-data">
                            <input type="file" name="purchasesFile"/> <br><br>
                            <input type="submit" value="Submit file" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" name="import4" style="background:#152c4e; color:white;"/>
                            <br><br><br><br>
                        </form>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="row">
                        <h2>Add Purchases Line file lot</h2>
                    </div>
                    <div class="row">
                        <form method="POST" enctype="multipart/form-data">
                            <input type="file" name="purchasesLineFile"/> <br><br>
                            <input type="submit" value="Submit file" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" name="import5" style="background:#152c4e; color:white;"/>
                            <br><br><br><br>
                        </form>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="row">
                        <h2>Add Payment file lot</h2>
                    </div>
                    <div class="row">
                        <form method="POST" enctype="multipart/form-data">
                            <input type="file" name="paymentsFile"/> <br><br>
                            <input type="submit" value="Submit file" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" name="import6" style="background:#152c4e; color:white;"/>
                            <br><br><br><br>
                        </form>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="row">
                        <h2>Add Customer file lot</h2>
                    </div>
                    <div class="row">
                        <form method="POST" enctype="multipart/form-data">
                            <input type="file" name="alfredoFile"/> <br><br>
                            <input type="submit" value="Submit file" name="import7" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" style="background:#152c4e; color:white;"/>
                            <br><br><br><br>
                        </form>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="row">
                        <h2>Add Inventory file lot</h2>
                    </div>
                    <div class="row">
                        <form method="POST" enctype="multipart/form-data">
                            <input type="file" name="inventoryFile"/> <br><br>
                            <input type="submit" value="Submit file" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" name="import8" style="background:#152c4e; color:white;"/>
                            <br><br><br><br>
                        </form>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="row">
                        <h2>Add Balances file lot</h2>
                    </div>
                    <div class="row">
                        <form method="POST" enctype="multipart/form-data">
                            <input type="file" name="balanceFile"/> <br><br>
                            <input type="submit" value="Submit file" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" name="import9" style="background:#152c4e; color:white;"/>
                            <br><br><br><br>
                        </form>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="row">
                        <h2>Add Journal Entries file lot</h2>
                    </div>
                    <div class="row">
                        <form method="POST" enctype="multipart/form-data">
                            <input type="file" name="journalEntries"/> <br><br>
                            <input type="submit" value="Submit file" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" name="import10" style="background:#152c4e; color:white;"/>
                            <br><br><br><br>
                        </form>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="row">
                        <h2>Add Journal Items file lot</h2>
                    </div>
                    <div class="row">
                        <form method="POST" enctype="multipart/form-data">
                            <input type="file" name="journalItems"/> <br><br>
                            <input type="submit" value="Submit file" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" name="import11" style="background:#152c4e; color:white;"/>
                            <br><br><br><br>
                        </form>
                    </div>
            </div>
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

static function endHead2(){ ?>
                </div> <!-- end: Body Inner -->
        <!-- Scroll top -->
        <a id="scrollTop"><i class="icon-chevron-up"></i><i class="icon-chevron-up"></i></a>
        <!--Plugins-->
        <script src="js/jquery.js"></script>
        <script src="js/plugins.js"></script>
        <!--Template functions-->
        <script src="js/functions.js"></script>
        <script> //shows message after add information
            setTimeout(function() {
            $('#msg').fadeOut('fast');
            }, 2000); // <-- time in milliseconds

            setTimeoutLogError(function() {  //shows login error message
            $('#loginError').fadeOut('fast');
            }, 2000); // <-- time in milliseconds
        </script>
    </body>

    </html>
<?php }

} ?>