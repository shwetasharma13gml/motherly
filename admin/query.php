<?php  
session_start();  
if(!isset($_SESSION["username"]))
{
 header("location: adilog.php");
}
?> 
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Administrator	</title>
    <!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Morris Chart Styles-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="home2.php"> <?php echo $_SESSION["username"]; ?> </a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="usersetting.php"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <!--<li><a href="settings.php"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>-->
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
        </nav>
        <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                 <li>
                        <a class="active-menu" href="home.php"><i class="fa fa-dashboard"></i>Online consultation booking</a>
                    </li>
                  
					<li>
                        <a href="vaccine.php"><i class="fa fa-bar-chart-o"></i> Vaccine for Toddlers</a>
                    </li>
                   
					 <li>
                        <a href="premi.php"><i class="fa fa-qrcode"></i> Newly Registered Pregnants</a>
                    </li>
					  <li>
                        <a href="query.php"><i class="fa fa-desktop"></i> Query</a>
                    </li>
					
                   <!-- <li>
                        <a  href="profit.php"><i class="fa fa-qrcode"></i> Profit</a>
                    </li>-->
                    <li>
                        <a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
					</ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">


                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
               QUERIES
                        </h1>
                    </div>
                </div>
                <!-- /. ROW  -->
				<?php
						include ('dbcon.php');
						/*$sql = "select * from feedback";
						$re = mysqli_query($con,$sql);
						$c =0;
						while($row=mysqli_fetch_array($re) )
						{
								$Adhar = $row['Adhar'];
								/*$Name = $row['Name'];
								$date = $row['date'];*/
								//$c = $c + 1;
								/*if($new=="Not Conform")
								{
									$c = $c + 1;
									
								
								}*/
						
						//}
						
									
									

						
				?>

					<div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            
                        </div>
                        <div class="panel-body">
                            <div class="panel-group" id="accordion">
							
							<div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
											<!--<button class="btn btn-default" type="button">
												 New Room Bookings  <span class="badge"><!--?php echo $c ; ?--></span>
											<!--/button-->
											</a>
                                        </h4>
                                    </div>
									
									
                                    <div id="collapseTwo" class="panel-collapse in" style="height: auto;">
                                        <div class="panel-body">
                                           <div class="panel panel-default">
                        
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            
                                              <th>Q.NO.</th>
                                            <th>NAME</th>
                                            <th>CONTACT</th>
											<th>EMAIL</th>
											<th>QUERY</th>
											
											
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
						<?php
									$tsql = "select * from query";
									$tre = mysqli_query($con,$tsql);
									while($trow=mysqli_fetch_array($tre) )
									{	
										//$co =$trow['stat']; 
										//if($co=="Not Conform"){
										
											echo"<tr>
												
												<th>".$trow['ID']."</th>
												<th>".$trow['name']."</th>
												<th>".$trow['email']."</th>
												<th>".$trow['phone']."</th>
												<th>".$trow['message']."</th>
												
												</tr>";
										//}	
									
									}
									?>
                                        
                                    </tbody>
                                </table>
								
                            </div>
                        </div>
                    </div>
                  
                            
				
										
                    

                <!-- /. ROW  -->
				
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- Morris Chart Js -->
    <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
    <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>


</body>

</html>