<!DOCTYPE html>

<html lang="">
<head>
<title>Blood Bank</title>
<meta charset="utf-8">
<style>
  .container{
	    width:700px;
	    margin-left: 17em;
	    border:40px;
            padding:200px;  
      	    background-color:#F4F4F4;
      	   font-size:20px;
          }  


</style>

<!--header-->
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="css/layout.css" rel="stylesheet" type="text/css" media="all">
</head>
<body id="top">
<div class="wrapper row0">
  <header id="header" class="hoc clear"> 
    <div id="logo" class="one_quarter first">
      <h1><a href="index.html"><span>Web</span>Blood<span>Center</span></a></h1>
    </div>
    <div class="three_quarter">
      <ul class="nospace clear">
        <li class="one_third first">
          <div class="block clear"> <span><strong>Give us a call:</strong> +91 9372408729</span></div>
        </li>
        <li class="one_third">
          <div class="block clear"> <span><strong>Send us a mail:</strong> WebBloodCenter@gmail.com</span></div>
        </li>
        <li class="one_third">
          <div class="block clear"> <span><strong> Mon. - Sat.:</strong> 08.00am - 10.00pm</span></div>
        </li>
      </ul>
    </div>
  </header>
</div>


<!--navigation bar-->
<div class="wrapper row1">
  <section class="hoc clear"> 

    <nav id="mainav">
      <ul class="clear">
        <li class="active"><a href="index.html">Home</a></li>

          
        <li><a href="donor.html">Donor</a></li>
        <li><a href="seeker.html">Seeker</a></li>   
        <li><a href="login.php">Login</a></li>	
        <li><a href="camp.html">Camp</a></li>
        <li><a href="aboutus.html">About Us</a></li>
	<li><a href="logout.html">Logout</a></li>
      </ul>
    </nav>
  </section>
</div>



<?php
$name=$_POST['name'];
$place=$_POST['place'];
$date=$_POST['date'];
$time=$_POST['time'];

$name_err=$place_err=$date_err=$time_err="";
$name=$place=$date=$time="";

if($_SERVER["REQUEST_METHOD"]=="POST")
{

 if ($_POST['name']=="") {
    $name_err = "Name is required";
  } else {
    $name = input_data($_POST['name']);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $name_err = "Only letters and white space allowed";
    }
  }

  if($_POST['place']=="")
     $place_err="Place is required";
  else
  {
     $place=input_data($_POST['place']);
  }
   
  if($_POST['date']=="")
     $date_err="Date is required";
  else
  {
     $date=input_data($_POST['date']);
  } 

  if($_POST['time']=="")
     $time_err="Time is required";
  else
  {
     $time=input_data($_POST['time']);
  } 



 } 
function input_data($str)
 {
    $str=trim($str);
    $str=stripslashes($str);
    $str=htmlspecialchars($str);
    return $str;
 }
 
?>

<form method=post action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
<div class="container">
	<img src="Images/ani1.gif" id="img1" width="685" height="300"/><center>DONATE BLOOD SAVE LIFE</center><br><br>	
	<h1><b style="color:#95103B"><center>--Registration Information--</center></b></h1>
	
           <b>Full Name:</b>
            <input type="text" name="name" placeholder="Enter name" size="32" required><br> <?php echo $name_err; ?>   
         
	   <b>Select your nearest center for blood donation:</b>
	<select name = "place" >
	    <option value = "select" selected>--SELECT--</option>
            <option value = "p1">Jankalyan Raktapedhi,Saras Baug Rd.,Pune</option>
            <option value = "p2">Deenanath Mangeshkar Hospital,Erandwane,Pune</option>
	    <option value = "p3">Rakesh Jain Memorial Blood Bank,Sadashiv Peth,Pune</option>
            <option value = "p4">Sahiyadri Speciality Hospital,Karve Rd.,Pune</option>
            <option value = "p5">Aadhar Hospital Blood Storage,Narhe,Pune</option>
        </select> <br> <?php echo $place_err; ?><br>

	   <b>Date:</b>
            <input type="date" name="date"  required><br> <?php echo $date_err; ?>   
	
	    <b>Select slot timing:</b>
		<select name = "time" >
	    <option value = "select" selected>--SELECT--</option>
            <option value = "t1">7:00 am - 9:00 am</option>
            <option value = "t2">9:00 am - 11:00 am</option>
	    <option value = "t3">11:00 am - 1:00 pm</option>
            <option value = "t4">1:00 pm - 3:00 pm</option>
            <option value = "t5">3:00 pm - 5:00 pm</option>
            <option value = "t6">5:00 pm - 7:00 pm</option>
            </select> <?php echo $time_err; ?>   
         	<br><br>
         
        <button type="submit" class="btn" name="submit">Submit</button>  <br><br>
</div>

    </form> 


<!--Database-->
 <?php
if(isset($_POST['submit']))
{
   if($name_err=="" &&  $place_err=="" && $date_err=="" && $time_err=="")
   {
    $con=pg_connect("host=localhost dbname=finalproject user=postgres password=postgres");

echo $con;
$name=$_POST['name'];
$place=$_POST['place'];
$date=$_POST['date'];
$time=$_POST['time'];
//echo all values here  run on prompt
echo "$name,$place,$date,$time";

$sb=pg_query("insert into booking (name,place,date,time)
values('$name','$place','$date','$time')");

if($sb)
{ 
     echo '<script>alert("Your appointment is booked successfully.")</script>';
     echo '<script> location.replace("receipt.php") </script>';   
	$_SESSION["name"]=$name;
        $_SESSION["place"]=$place;
        $_SESSION["date"]=$date;
       $_SESSION["time"]=$time;
     
}
else 
    echo '<script>alert("Record not inserted")</script>';
} 
   else
     echo "<h3><b>You didn't filled up the form correctly.</b></h3>";  
     
}
?>



	
<!--footer-->
<div class="wrapper row4">
  <footer id="footer" class="hoc clear"> 
    <div class="one_third first">
      <h6 class="heading">About Us</h6>
      <p>The blood you donate is a life-chance for someone else who might need a transfusion,whether it's an emergency or out of necessity in your long term treatments</p>
      <p class="btmspace-30">WEB BLOOD CENTER helps people to find donor and donate blood.We also organize various campaignsfor blood donation.</p>
    </div>
    <div class="one_third">
      <h6 class="heading">Quick Links</h6>
      <ul class="nospace clear latestimg">
        <li class="active"><a href="index.html" style="color:white"><u>Home</u></a></li>
        <li><a href="donor.html" style="color:white"><u>Donor</u></a></li>
        <li><a href="seeker.html" style="color:white"><u>Seeker</u></a></li>   
        <li><a href="login.php" style="color:white"><u>Login</u></a></li>	
        <li><a href="camp.html" style="color:white"><u>Camp</u></a></li>
        <li><a href="aboutus.html" style="color:white"><u>About Us</u></a></li>
	<li><a href="logout.html" style="color:white"><u>Logout</u></a></li>
      </ul>
    </div>
    <div class="one_third">
      <h6 class="heading">Contact Us</h6>
        <fieldset>
          <legend>Newsletter:</legend>
          <input class="btmspace-15" type="text" value="" placeholder="Name">
          <input class="btmspace-15" type="text" value="" placeholder="Email">
          <button type="submit" value="submit">Submit</button>
        </fieldset>
      </form>
    </div>
  </footer>
</div>
<div class="wrapper row5">
  <div id="copyright" class="hoc clear"> 
    <p class="fl_left">Copyright &copy; 2021 - All Rights Reserved - <a href="#">WebBloodCenter</a></p>
  </div>
</div>

<!-- ################################################################################################ -->
<a id="backtotop" href="#top"><i class="fas fa-chevron-up"></i></a>
<!-- JAVASCRIPTS -->
<script src="JavaScript/jquery.min.js"></script>
<script src="JavaScript/jquery.backtotop.js"></script>
<!--<script src="jquery.mobilemenu.js"></script> -->
</body>
</html>	
