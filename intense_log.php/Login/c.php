<?php  
session_start();  
if(!isset($_SESSION["email"]))
{
 header("location: index.php");
}?>


 <!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

/* Style the body */
body {
  font-family: Arial;
  margin: 0;
  background-image:url(img6.jpg);
   background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
  
    padding: 60px;
}

/* Header/logo Title */
.header {
  padding: 60px;
  text-align: center;
  background: #ff0066;
  color: black;
}

/* Style the top navigation bar */
.navbar {
  display: flex;
  background-color: #333;
}

/* Style the navigation bar links */
.navbar a {
  color: white;
  padding: 14px 20px;
  text-decoration: none;
  text-align: center;
}

.fakeimg a {
  color: black;
  padding: 14px 20px;
  text-decoration: none;
  text-align: center;
}
.fakeimg2 a {
  color: black;
  padding: 14px 20px;
  text-decoration: none;
  text-align: center;
  margin-bottom:20px;
}

/* Change color on hover */
.navbar a:hover {
  background-color: #ddd;
  color: black;
}

/* Column container */
.row {  
  display: flex;
  flex-wrap: wrap;
}

/* Create two unequal columns that sits next to each other */
/* Sidebar/left column */
.side {
  flex: 30%;
   background: #ff0066;
  padding: 40px;
  margin-top: 20px;
  

  
}
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  padding: 16px;
  text-align: center;
  margin-top: 30px;
  background-color: #ff0066;
}
.column {
  float: left;
  width: 25%;
  padding: 0 10px;
}

/* Main column */
.main {
  flex: 70%;
  background: #ff0066;
  padding: 20px;
      margin-top: 20px;
}

/* Fake image, just for this example */
.fakeimg {
  background-color: black;
  width: 100%;
  padding: 20px;
}
.fakeimg2 {
  background-color: #FE739D;
  width: 100%;
  padding: 20px;
}
.column2 {
  float:left;
  width: 50%;
  padding: 10px;
  height: 300px; /* Should be removed. Only for demonstration */
      margin-top: 30px;
}

/* Footer */
.footer {
  padding: 20px;
  text-align: center;
  background: #ddd;
}

/* Responsive layout - when the screen is less than 700px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 700px) {
  .row, .navbar {   
    flex-direction: column;
  }
}
</style>
</head>
<body>

<!-- Note 
<div style="background:yellow;padding:5px">
  <h4 style="text-align:center">Resize the browser window to see the responsive effect.</h4>
</div>-->

<!-- Header -->
<div class="header">
  <h1>Hello Expecting  Mom</h1>
  <p>We  are <b>happy</b> to help you.</p>
</div>

<!-- Navigation Bar -->
<div class="navbar" >

<a href="logout.php" class="right">Logout</a>
</div>

<!-- The flexible grid (content) -->
<div class="row">
  <div class="side">
    <div class="fakeimg" style="height:200px;"><img src="b4.jpg" height="100%" width="100%"></div>
	<center> <h3>Dr. RACHITA 
    <br>MD in gycnology<br>
  holding the experience of more than years. She will be there for you 24/7 days.</h3></center>
	<br><br><br><br>
	
    <center><h2>Tests & Reports</h2>
    </center>
    <div class="fakeimg2" style="height:60px;">
	<a href ="index.php" download="Health report"><center>Health Report</center></a></div><br>
    <div class="fakeimg2" style="height:60px;">	<a href ="index.php" download="Weekly nurition plan"><center>Weekly nurition plan</center></a></div><br>
    <div class="fakeimg2" style="height:60px;">	<a href ="index.php" download="Time-table"><center>Time-table </center></a></div>  <br>                      
	 <div class="fakeimg2" style="height:60px;"> <a href ="index.php" download="Guidelines"><center>New Covid Guidelines </center></a></div>
  </div>
  <div class="main">
    <br><br>
    <div class="fakeimg" style="height:200px;">
	 <div class="column">
    <div class="card">
     <a href="https://www.zoom.com/" ><h3>Meditation & Yoga</h3></a>
      
    </div>
  </div>

  <div class="column">
    <div class="card">
        <a href="https://www.zoom.com/" > <h3>Preg. Workout</h3></a>
    </div>
  </div>
  
  <div class="column">
    <div class="card">
        <a href="https://www.zoom.com/" > <h3>Relaxation therapy</h3></a>
     
    </div>
  </div>
  
  <div class="column">
    <div class="card">
       <a href="https://www.zoom.com/" >  <h3>Notifications</h3></a>
    
    </div>
  </div></div>
    <br><br><br><br><br>
	<center><h1>Important tips</h1></center>
    <div class="fakeimg" style="height:400px;"> 
	<div class="column2" style="background-color: #FE91B2;">
    <h2><a href="https://health.ucsd.edu/news/features/pages/2016-01-05-36-pregnancy-tips-listicle.aspx" >36 Tips for a Healthy Pregnancy </h2></a>
   <p>* Take a prenatal vitamin</p>
<p>* Change your chores (avoid harsh or toxic cleaners, heavy lifting)</p>
<p>* Track your weight gain (normal weight gain is 25-35 pounds)</p>
<p>* Get comfortable shoes</p>
<p>  cont to blog...</p>

  </div>
  <div class="column2" style="background-color:#FE739D;">
     <h2><a href="https://rosewalk.com/blog-news/tips-to-manage-labour-and-delivery-fears/" >How to manage labour & delivery<br>fears</h2></a>
    <p>*  Let someone know</p>
	<p>*  Try yoga</p>
	<p>*  Create a birth plan</p>
    <p>*  Take a birthing class</p>
	<p> cont to blog....</p>
	
  </div></div>
 
  </div>
</div>

<!-- Footer 
<div class="footer">
  <h2>Footer</h2>-->
</div>

</body>
</html>
