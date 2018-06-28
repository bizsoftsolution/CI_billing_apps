<!DOCTYPE html>

<html>

<head>

    <meta charset="UTF-8">

    <title>..:: Logamindah ::..</title>

    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    

    

    <!-- bootstrap 3.0.2 -->

    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

    <!-- font Awesome -->

    <link href="<?php echo base_url();?>assets/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

    <!-- Ionicons -->

    <link href="<?php echo base_url();?>assets/css/ionicons.min.css" rel="stylesheet" type="text/css" />

    <!-- Morris chart -->

    <link href="<?php echo base_url();?>assets/css/morris/morris.css" rel="stylesheet" type="text/css" />

    <!-- jvectormap -->

    <link href="<?php echo base_url();?>assets/css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />

    

    <link href="<?php echo base_url();?>assets/css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />

    <!-- iCheck for checkboxes and radio inputs -->

    <link href="<?php echo base_url();?>assets/css/iCheck/all.css" rel="stylesheet" type="text/css" />

    

    <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet" type="text/css" />









  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>datatables/dataTables.bootstrap.min.css">  



<script type="text/javascript" src="<?php echo base_url();?>datepicker/jquery-1.9.1.js"></script>







<link rel="stylesheet" href="<?php echo base_url();?>assets/new/css/datepicker.css">

<script src="<?php echo base_url();?>assets/new/js/bootstrap-datepicker.js"></script>







<script type="text/javascript" src="<?php echo base_url();?>datepicker/bootstrap.min.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>datatables/jquery.dataTables.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>datatables/dataTables.bootstrap.js"></script>







</head>

      <body class="skin-black">

        <!-- header logo: style can be found in header.less -->

        <header class="header">

            <a href="<?php echo base_url();?>dashboard" class="logo">

            <h5> LOGAM INDAH METAL TRADING </h5>
           

            </a>

            <!-- Header Navbar: style can be found in header.less -->

            <nav class="navbar navbar-static-top" role="navigation">

                <!-- Sidebar toggle button-->

                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">

                    <span class="sr-only">Toggle navigation</span>

                    <span class="icon-bar"></span>

                    <span class="icon-bar"></span>

                    <span class="icon-bar"></span>

                </a>

                <div class="navbar-right">

                    <ul class="nav navbar-nav">

                        <!-- Messages: style can be found in dropdown.less-->

                      

                            </ul>

                        </div>

                    </nav>

                </header>

                <div class="wrapper row-offcanvas row-offcanvas-left">

                    <!-- Left side column. contains the logo and sidebar -->

                    <aside class="left-side sidebar-offcanvas">

                        <!-- sidebar: style can be found in sidebar.less -->

                        <section class="sidebar">

                            <!-- Sidebar user panel -->

                            <div class="user-panel">

                                <div class="pull-left image">

                                    

                                </div>

                                <div class="pull-left info">

                                    



                                   

                                </div>

                            </div>

                            <!-- search form -->

                            

                            <!-- /.search form -->

                            <!-- sidebar menu: : style can be found in sidebar.less -->

                            <ul class="sidebar-menu" style="">

                                <li >

                                    <a href="<?php echo base_url();?>dashboard/index">

                                        <i class="fa fa-dashboard"></i> <span>Dashboard</span>

                                    </a>

                                </li>
                                <li >

                                    <a href="<?php echo base_url();?>customer/admin">

                                        <i class="fa fa-user"></i> <span>Admin profile</span>

                                    </a>

                                </li>

                             

                          





                            <li class="treeview">

              <a href="#">

                <i class="fa fa-cog"></i>

                <span>Sales</span>

                <i class="fa fa-angle-left pull-right"></i>

              </a>

              <ul class="treeview-menu">

                            

                            <li><a href="<?php echo base_url();?>sales/view_sales"><i class="fa fa-circle-o"></i> Sales Invoice</a>

                            </li>



                            <li><a href="<?php echo base_url();?>sales/sales_report"><i class="fa fa-circle-o"></i> Sales Invoice Report</a>

                            </li>

                    

                        </ul>

                    </li>



                    <li class="treeview">

              <a href="#">

                <i class="fa fa-money"></i>

                <span>Purchase</span>

                <i class="fa fa-angle-left pull-right"></i>

              </a>

              <ul class="treeview-menu">

                             <li><a href="<?php echo base_url();?>cash_purchase/"><i class="fa fa-circle-o"></i>Cash Purchase </a>

                            </li>
                             <li><a href="<?php echo base_url();?>cash_purchase/cash_select"><i class="fa fa-circle-o"></i>Cash Purchase Reports</a>

                            </li>

                            <li><a href="<?php echo base_url();?>purchase_invoice/view_purchase"><i class="fa fa-circle-o"></i> Purchase Invoice</a>

                            </li>



                            <li><a href="<?php echo base_url();?>purchase_invoice/invoice_report"><i class="fa fa-circle-o"></i> Purchase Invoice Report</a>

                            </li>

                    

                        </ul>

                    </li>



                         <li class="treeview">

              <a href="#">

                <i class="fa fa-expand"></i>

                <span>Expenses</span>

                <i class="fa fa-angle-left pull-right"></i>

              </a>

              <ul class="treeview-menu">

                            

                            <li><a href="<?php echo base_url();?>expenses"><i class="fa fa-circle-o"></i> Add Expenses</a>

                            </li>



                            <li><a href="<?php echo base_url();?>expenses/expenses_report"><i class="fa fa-circle-o"></i> Expenses Reports</a>

                            </li>

                    

                        </ul>

                    </li>

                        

                                

                                                            

                                 <li >

                                    <a href="<?php echo base_url();?>item">

                                        <i class="fa fa-th-list"></i> <span>Item</span>

                                    </a>

                                </li>

                                 

                            <li class="treeview">

              <a href="#">

                <i class="fa fa-user"></i>

                <span>Customer</span>

                <i class="fa fa-angle-left pull-right"></i>

              </a>

              <ul class="treeview-menu">

                            

                            <li><a href="<?php echo base_url();?>customer"><i class="fa fa-circle-o"></i>Add Customer</a>

                            </li>



                            <li><a href="<?php echo base_url();?>customer/customer_report"><i class="fa fa-circle-o"></i> Customer Report</a>

                            </li>

                    

                        </ul>

                    </li>

     



                

                                <li>

                                    <a href="<?php echo base_url();?>login/logout">

                                        <i class="fa fa-sign-out"></i> <span>Logout</span>

                                    </a>

                                </li>



                                

                                    



                            </ul>

                        </section>

                        <!-- /.sidebar -->

                    </aside>



                    <aside class="right-side">



               



                <!-- Main content -->

                <section class="content">

                

                    

         <div class="row">

         <div class="col-md-12">





         