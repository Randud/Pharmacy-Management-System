<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Invoice | Nimedco Pharmacy</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="css/style.css" rel="stylesheet">

  <link href="css/stock_style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
  <!--Navbar-->
  <nav class="navbar navbar-expand-lg navbar-dark primary-color">

        <!-- Navbar brand -->
        <a class="navbar-brand" href="index.html">Admin Panel</a>
      
        <!-- Collapse button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
          aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <!-- Collapsible content -->
        <div class="collapse navbar-collapse" id="basicExampleNav">
      
          <!-- Links -->
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.html">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Features</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Pricing</a>
            </li>
      
            <!-- Dropdown -->
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">Reports</a>
              <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="#">Summary</a>
                <a class="dropdown-item" href="#">Reports Store</a>
                
              </div>
            </li>
      
          </ul>
          <!-- Links -->
      
          <form class="form-inline my-2 my-lg-0 align-self-stretch">
              <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
        <!-- Collapsible content -->
      
      </nav>
  <!--/.Navbar-->
 

  
  <div style="background-color: rgba(33, 89, 194, 0.753)">
    <form align = "center" name = "CashierCheckAvailabilityForm" method="POST" action="CashierInvoiceAvailability.php">
      <input type="text2" id="fname" name="ItemID" placeholder="Enter Item Number" required>
      
      <button class="buttoncheackcash" name="check" data-toggle="modal" onclick="action='CashierInvoiceAvailability.php';" data-target="#modalLoginForm">Check Availability</button>
    
      </form>
  </div>

  <br>
  <div class="container">
    <div class="row">
      <div class="col-lg-4">
      <?php require_once 'Cashier_process.php'; ?>
      <?php
      	if(isset($_SESSION['message'])): ?>
	        <div class = "alert alert-<?=$_SESSION['msg_type']?>">
	    	<?php
		    	echo $_SESSION['message'];
		    	unset($_SESSION['message']);
	    	?>
	    </div>
  	<?php endif ?>

        &nbsp <!--
        <table align="center">
          <form action="Cashier_process.php" method="POST">
        <tr align="">
              <th>&nbsp&nbsp&nbspItemNo</th> <th>&nbspQuantity</th>
          </tr>

        <tr align="">
          <td>&nbsp&nbsp&nbsp<input type="text" width="100%" name ="ItemID" placeholder="" required></td><td>&nbsp<input type="text" width="100%" name="ItemQuantity" required></td><td>

                  <button type="submit" class="btn btn-primary btn-sm" name="save"><i class="fa fa-plus"></i></button>
          </td></tr></table>
        </tr>
        </form>
        </table>  -->
      
        <form action="Cashier_process.php" method="POST">
  <!-- Default input -->
  <div class="form-group">
    <label for="formGroupExampleInput">ItemID</label>
    <input type="text" class="form-control" name ="ItemID" id ="ItemID" placeholder="ItemID" required>
  </div>
  <!-- Default input -->
  <div class="form-group">
    <label for="formGroupExampleInput2">Quantity</label>
    <input type="text" class="form-control" name="ItemQuantity" id="ItemQuantity" placeholder="Quantity" required>
  </div>
  <button type="submit" class="btn btn-primary btn-md" name="save" >&nbsp&nbsp&nbsp&nbsp<i class="fa fa-plus fa-lg"></i>&nbsp&nbsp Add to invoice&nbsp&nbsp&nbsp&nbsp</button>
</form>

    </div>

    <?php
	      $mysqli = new mysqli('localhost', 'root', 'root', 'nimedco-pharmacy') or die(mysqli_error($mysqli));
        	$result = $mysqli->query("SELECT * FROM stocksales order by id desc limit 0, 4") or die($mysqli->error);
	        //pre_r($result);
        ?>
  
    
      <div class="col">
      <h2 align ="left">INVOICE</h2> 
      <table border="" width="100%" class="table table-sm table-striped table-bordered" cellspacing="0">
        <tr style="color: white;" class="bg-info" align="center">
          <td><b>#</b></td>
          <td><b>ItemID</b></td>
          <td><b>ItemName</b></td>
          <td><b>Qty</b></td>
          <td><b>Price</b></td>
          <td><b>Action</b></td>
          <td><b>Total</b></td>
        </tr>
        
        <?php
		          	while($row = $result->fetch_assoc()): ?>
			          	<tr>
                    <td>X</td>
                    <td><b><?php echo $row['ItemID']; ?></b></td>
                    <td>XXXX</td>
                    <td><b><?php echo $row['ItemQuantity']; ?></b></td>
                    <td>XXXX</td>
                    
				          	<td align="center">
					            	<a href="CashierInvoice.php?edit=<?php echo $row['id']; ?>"
                          class ="btn btn-info btn-sm" >
                          <i class="fa fa-edit"></i>
                        </a>
					            	<a href="Cashier_process.php?delete=<?php echo $row['id']; ?>"
                          class ="btn btn-danger btn-sm">
                          <i class="fa fa-trash"></i>
                        </a>
                    </td>
                    <td>XXXX</td>
			          	</tr>
			        <?php endwhile; ?>
              

        <tr>
          <td colspan="6" align="right">Sub Total : &nbsp</td>
          <td>XXXX</td>
        </tr>
        <tr><form>
          <td colspan="6" align="right">Discount : &nbsp</td>
          <td>&nbsp<input type="text" width="" name ="Discount" placeholder="" pattern="[0-9]" oninvalid="setCustomValidity('Please enter on numbers only. ' required)"> %
          <a href=".php?edit1=<?php echo $row['id']; ?>"
                          class ="btn btn-primary btn-sm"  >
                          <i class="fa fa-star fa-spin"></i>
                        </a>
        </td></form>
        </tr>
        <tr style="color: black;" class="bg-warning">
          <td colspan="6" align="right"><font size="5">Net Total : &nbsp</font></td>
          <td><font size="5"><b>XXXX</b></font></td>
        </tr>
        <tr>
          <td colspan="6" align="right">Cash : &nbsp</td>
          <td>&nbsp<input type="text" width="" name ="Cash" placeholder="">&nbsp&nbsp&nbsp
          <a href=".php?edit2=<?php echo $row['id']; ?>"
                          class ="btn btn-primary btn-sm" >
                          <i class="fa fa-hand-holding-usd fa-lg"></i>
                        </a>
        </td>
        </tr>
        <tr>
          <td colspan="6" align="right">Change : &nbsp</td>
          <td>XXXX</td>
        </tr>
      </table><p align="right" >
      <a href="Cashier.php?edit2=<?php echo $row['id']; ?>"
                          class ="btn btn-primary btn-lg">
                          <i class="fa fa-print fa-lg"><font style="font-family: OCR A Std;"> &nbsp&nbspGenarate Bill</font></i>
                        </a></p>

      <br>
      </div>
      </div>
</div>
     




 

 












<!-- Footer -->
<footer class="page-footer font-small mdb-color pt-4">

    <!-- Footer Links -->
    <div class="container text-center text-md-left">
  
      <!-- Footer links -->
      <div class="row text-center text-md-left mt-3 pb-3">
  
        <!-- Grid column -->
        <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
          <h6 class="text-uppercase mb-4 font-weight-bold">Nimedco Pharmacy</h6>
          <p>Here you can use rows and columns to organize your footer content. Lorem ipsum dolor sit amet,
            consectetur
            adipisicing elit.</p>
        </div>
        <!-- Grid column -->
  
        <hr class="w-100 clearfix d-md-none">
  
        <!-- Grid column -->
        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
          <h6 class="text-uppercase mb-4 font-weight-bold">Products</h6>
          <p>
            <a href="#!">Drugs</a>
          </p>
          <p>
            <a href="#!">Medicine</a>
          </p>
          <p>
            <a href="#!">Child Items</a>
          </p>
          <p>
            <a href="#!">Energy Drinks</a>
          </p>
        </div>
        <!-- Grid column -->
  
        <hr class="w-100 clearfix d-md-none">
  
        <!-- Grid column -->
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
          <h6 class="text-uppercase mb-4 font-weight-bold">Useful links</h6>
          <p>
            <a href="#!">Your Account</a>
          </p>
          <p>
            <a href="#!">Medicines</a>
          </p>
          <p>
            <a href="#!">Delivery</a>
          </p>
          <p>
            <a href="#!">Help</a>
          </p>
        </div>
  
        <!-- Grid column -->
        <hr class="w-100 clearfix d-md-none">
  
        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
          <h6 class="text-uppercase mb-4 font-weight-bold">Contact</h6>
          <p>
            <i class="fas fa-home mr-3"></i> NimedcoPharmacy, Meerigama</p>
          <p>
            <i class="fas fa-envelope mr-3"></i> nimedcopharmacy@.com</p>
          <p>
            <i class="fas fa-phone mr-3"></i> + 94 770 828 319</p>
          <p>
            <i class="fas fa-print mr-3"></i> + 01 234 567 89</p>
        </div>
        <!-- Grid column -->
  
      </div>
      <!-- Footer links -->
  
      <hr>
  
      <!-- Grid row -->
      <div class="row d-flex align-items-center">
  
        <!-- Grid column -->
        <div class="col-md-7 col-lg-8">
  
          <!--Copyright-->
          <p class="text-center text-md-left">© 2019 Copyright:
            <a href="https://mdbootstrap.com/education/bootstrap/">
              <strong> NimedcoPharmacy.com</strong>
            </a>
          </p>
  
        </div>
        <!-- Grid column -->
  
        <!-- Grid column -->
        <div class="col-md-5 col-lg-4 ml-lg-0">
  
          <!-- Social buttons -->
          <div class="text-center text-md-right">
            <ul class="list-unstyled list-inline">
              <li class="list-inline-item">
                <a class="btn-floating btn-sm rgba-white-slight mx-1">
                  <i class="fab fa-facebook-f"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a class="btn-floating btn-sm rgba-white-slight mx-1">
                  <i class="fab fa-twitter"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a class="btn-floating btn-sm rgba-white-slight mx-1">
                  <i class="fab fa-google-plus-g"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a class="btn-floating btn-sm rgba-white-slight mx-1">
                  <i class="fab fa-linkedin-in"></i>
                </a>
              </li>
            </ul>
          </div>
  
        </div>
        <!-- Grid column -->
  
      </div>
      <!-- Grid row -->
  
    </div>
    <!-- Footer Links -->
  
  </footer>
  <!-- Footer -->
  
  <!--Ens of the footer-->        
  
  
  
  
  <!-- SCRIPTS -->
    <!-- JQuery -->
    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
  

  </body>
  </html>