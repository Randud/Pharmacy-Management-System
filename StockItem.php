<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Add Item | Nimedco Pharmacy</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="css/style.css" rel="stylesheet">
  <script src="js/stockvalidation.js"></script>
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
            <li class="nav-item">
              <a class="nav-link" href="stock.php">Stock</a>
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
  <br><br>



  
  <div class="container">
      <div class="row">


        <div class="col-md-5">
          

        <?php require_once 'StockItem_process.php'; ?>
      <?php
      	if(isset($_SESSION['message'])): ?>
	        <div class = "alert alert-<?=$_SESSION['msg_type']?>">
	    	<?php
		    	echo $_SESSION['message'];
		    	unset($_SESSION['message']);
	    	?>
	    </div>
  	<?php endif ?>

    <?php
		              if ($update == true):
		            ?>
                  <h2>UPDATE ITEM DETAILS</h2>  
		            <?php else: ?>
                <h2>ADD NEW ITEM</h2>  
                  <?php endif; ?>
                

          <br>    
          <!-- Extended default form grid -->
          <form name="addItemForm" method="POST" action="StockItem_process.php">
              <!-- Grid row -->
              <div class="form-row">
                <!-- Default input -->
                <div class="form-group col-md-6">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <label for="ItemID">ItemID</label>
                    <input type="text" class="form-control" value ="<?php echo $ItemID; ?>" name="ItemID" id="ItemID" placeholder="ItemID">
                  </div>
                  <!-- Default input -->
                  <div class="form-group col-md-6">
                    <label for="ItemName">ItemName</label>
                    <input type="text" class="form-control" value ="<?php echo $ItemName; ?>" id="ItemName" name="ItemName" placeholder="ItemName">
                  </div>
                </div>
                <!-- Grid row -->
              
                <!-- Default input -->
                <div class="form-group">
                  <label for="Description">Description</label>
                  <input type="text" class="form-control" value ="<?php echo $Description; ?>" id="Description" name="Description"  placeholder="Description">
                </div>
                <!-- Default input -->
                <div class="form-row">
                    <!-- Default input -->
                    <div class="form-group col-md-6">
                <label for="Category">Category</label>
                <input type="text" class="form-control" value ="<?php echo $Category; ?>" name="Category" id="Category" placeholder="Category">
                </div>
                <!-- Grid row -->
                <div class="form-group col-md-6">
                    <label for="Price">Price (each)</label>
                    <input type="text" class="form-control" value ="<?php echo $Price; ?>" name="Price" id="Price" placeholder="Rs:">
                  </div></div>
              
                <!-- Grid row -->
                <?php
		              if ($update == true):
		            ?>
                  <button type="submit" class="btn btn-warning btn-md" name="update" onclick="javascript: return validateAddItemForm();">Update</button>
                  <button type="submit" class="btn btn-danger btn-md" name="cancle" onclick="action='StockItem.php';">Cancle</button>
		            <?php else: ?>
		            	<button type="submit" class="btn btn-primary btn-md" name="save" onclick="javascript: return validateAddItemForm();">SUBMIT</button>
                  <button type="reset" class="btn btn-danger btn-md">RESET</button>
                  <?php endif; ?>
                
    
            </form>
            <br><br><br>



        </div>

        <?php
	       $mysqli = new mysqli('localhost', 'root', 'root', 'nimedco-pharmacy') or die(mysqli_error($mysqli));
        	$result = $mysqli->query("SELECT * FROM stockitem order by id desc limit 0, 7") or die($mysqli->error);
	        //pre_r($result);
        ?>
  
      <div class="col">
        

          <table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead style="color: white;" class="bg-primary" align="center">
                <tr>
                  <th class="th-sm">ItemID
                  </th>
                  <th class="th-sm">ItemName
                  </th>
                  <th class="th-sm">Description
                  </th>
                  <th class="th-sm">Category
                  </th>
                  <th class="th-sm">Price
                  </th>
                  <th class="th-sm">Action
                  </th>
                </tr>
              </thead>
              <tbody>
                
              <?php
		          	while($row = $result->fetch_assoc()): ?>
			          	<tr>
					          <td><b><?php echo $row['ItemID']; ?></b></td>
                    <td><b><?php echo $row['ItemName']; ?></b></td>
                    <td><b><?php echo $row['Description']; ?></b></td>
                    <td><b><?php echo $row['Category']; ?></b></td>
                    <td><b><?php echo $row['Price']; ?></b></td>
				          	<td align="center">
					            	<a href="StockItem.php?edit=<?php echo $row['id']; ?>"
                          class ="btn btn-info btn-sm" >
                          <i class="fa fa-edit"></i>
                        </a>
					            	<a href="StockItem_process.php?delete=<?php echo $row['id']; ?>"
                          class ="btn btn-danger btn-sm">
                          <i class="fa fa-trash"></i>
                        </a>
				          	</td>
			          	</tr>
			        <?php endwhile; ?>

              </tbody>
              <!--
              <tfoot>
                <tr>
                  <th>ItemID
                  </th>
                  <th>ItemName
                  </th>
                  <th>Description
                  </th>
                  <th>Category
                  </th>
                  <th>Price
                  </th>
                  <th >Action
                  </th>
                </tr>
              </tfoot> -->
            </table>
            <br>
            <?php
	            function pre_r( $array ){
		            echo '<pre>';
	            	print_r($array);
		            echo '</pre>';
              	}
          	?>

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
    
    <script src="js/stockvalidation.js"></script>
  

  </body>
  </html>