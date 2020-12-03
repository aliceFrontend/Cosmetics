<!DOCTYPE html>
  <html lang="en">
  <head>
    <title><?= $title; ?></title>
    <link rel="stylesheet" href="../css/bootstrap.css">
	<link rel="stylesheet" href="../css/font-awesome.css">
	<link rel="stylesheet" href="../css/custom-styles.css">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="../css/stylle.css">
  </head>
  <body>
    <div class="wrapper">
		<nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <a class="navbar-brand" href="/">
                	<i class="fa fa-comments"></i>
                	<strong>Cosmetics</strong>
                </a>
            </div>
        </nav>
    	<nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <a class="active-menu" href="/">
                        	<i class="fa fa-home"></i>
                        	Home
                    	</a>
                    </li>
                    <li>
                        <a href="#">
                        	<i class="fa fa-sitemap"></i> 
                        	Tables
                        	<span class="fa arrow"></span>
                        </a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="#">
                                	Brand
                                	<span class="fa arrow"></span>
                                </a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="/brandAdd">Add Brand</a>
                                    </li>
                                    <li>
                                        <a href="#">Edit Brand</a>
                                    </li>
                                    <li>
                                        <a href="#">Delete Brand</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">
                                	Category
                                	<span class="fa arrow"></span>
                                </a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="#">Add Category</a>
                                    </li>
                                    <li>
                                        <a href="#">Edit Category</a>
                                    </li>
                                    <li>
                                        <a href="#">Delete Category</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">
                                	Product
                                	<span class="fa arrow"></span>
                                </a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="#">Add Product</a>
                                    </li>
                                    <li>
                                        <a href="#">Edit Product</a>
                                    </li>
                                    <li>
                                        <a href="#">Delete Product</a>
                                    </li>
                                </ul>
                            </li>
                             <li>
                                <a href="#">
                                	Customer
                                	<span class="fa arrow"></span>
                                </a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="#">Add Customer</a>
                                    </li>
                                    <li>
                                        <a href="#">Edit Customer</a>
                                    </li>
                                    <li>
                                        <a href="#">Delete Customer</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">
                                	Storage
                                	<span class="fa arrow"></span>
                                </a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="#">Add Storage</a>
                                    </li>
                                    <li>
                                        <a href="#">Edit Storage</a>
                                    </li>
                                    <li>
                                        <a href="#">Delete Storage</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">
                                	Supplier
                                	<span class="fa arrow"></span>
                                </a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="#">Add Supplier</a>
                                    </li>
                                    <li>
                                        <a href="#">Edit Supplier</a>
                                    </li>
                                    <li>
                                        <a href="#">Delete Supplier</a>
                                    </li>
                                </ul>
                            </li>
                             <li>
                                <a href="#">
                                	Suppliers
                                	<span class="fa arrow"></span>
                                </a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="#">Add Suppliers</a>
                                    </li>
                                    <li>
                                        <a href="#">Edit Suppliers</a>
                                    </li>
                                    <li>
                                        <a href="#">Delete Suppliers</a>
                                    </li>
                                </ul>
                            </li>
                             <li>
                                <a href="#">
                                	Order
                                	<span class="fa arrow"></span>
                                </a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="#">Add Order</a>
                                    </li>
                                    <li>
                                        <a href="#">Edit Order</a>
                                    </li>
                                    <li>
                                        <a href="#">Delete Order</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                        	<i class="fa fa-fw fa-user"></i>
                        	User Control
                        </a>
                    </li>
                    <li>
                        <a href="#">
                        	<i class="fa fa-fw fa-table"></i>
							Analytics
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
         <div id="page-wrapper"> 
            <div id="page-inner">
                <?php include 'application/views/'.$content_view; ?>
                <footer>
                    <p>All right reserved. Template by:
                        <a href="http://webthemez.com">WebThemez</a>
                    </p>
                </footer>
            </div>
        </div>
	</div>

  	<script src="../js/jquery-1.10.2.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/jquery.metisMenu.js"></script>
	<script src="../js/easypiechart.js"></script>
	<script src="../js/easypiechart-data.js"></script>
	<script src="../js/custom-scripts.js"></script>	
  </body>
</html>