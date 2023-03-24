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

          
        <li><a href="donorrr.php">Donor</a></li>
        <li><a href="seeker.php">Search for blood</a></li>   
        <li><a href="login.php">Login</a></li>	
        <li><a href="camp.html">Camp</a></li>
        <li><a href="aboutus.html">About Us</a></li>
	<li><a href="logout.html">Logout</a></li>
      </ul>
    </nav>
  </section>
</div>
</body>

<?php
$pname=$_POST['pname'];
$state=$_POST['state'];
$bgroup=$_POST['bgroup'];
$haddress=$_POST['haddress'];
$phno=$_POST['phno'];
$ndate=$_POST['ndate'];
$email=$_POST['email'];
$msg=$_POST['msg'];

$pname_err=$state_err=$email_err=$haddress_err=$phno_err=$ndate_err=$msg_err="";
$pname=$email=$phno=$gender=$ndate=$state=$bgroup=$haddress=$msg="";

if($_SERVER["REQUEST_METHOD"]=="POST")
{
  if($_POST['pname']=="")
     $pname_err="Name is required";
  else
  {
     $pname=input_data($_POST['pname']);
     if(!preg_match("/^[a-zA-Z_]*$/",$name))
        $pname_err="Only alphabets and white space are allowed.";
  }
  
  if($_POST['state']=="")
  	$state_err="Enter state.";
  else
  {
  	$state=input_data($_POST['state']);
      if(!preg_match("/^[0-9a-zA-Z__\s]*$/",$state))
       $state_err="only characters and numbers are allowed";
  }
  
  if($_POST['email']=="")
     $email_err="Email ID is required";
  else
  {
     $email=input_data($_POST['email']);
     if(!filter_var($email,FILTER_VALIDATE_EMAIL))
        $email_err="Invalid email format.";
  }
 if($_POST['haddress']=="")
     $haddress_err="Address is required";
  else
    {
      $haddress=input_data($_POST['haddress']);
      if(!preg_match("/^[0-9a-zA-Z__\s]*$/",$address))
       $haddress_err="only characters and numbers are allowed";
    }
  
  if($_POST['phno']=="")
     $phno_err="Mobile number is required";
  else
  {
     $mobileno=input_data($_POST['phno']);
     if(!preg_match("/^[0-9]*$/",$mobileno))
        $mobile_err="Only numeric value is allowed.";
     if(strlen($phno)!=10)
        $mobile_err="Mobile number must contain 10 digits.";   
  }
  
  if($_POST['gender']=="")
     $gender_err="Gender is required";
  else
  {
     $gender=input_data($_POST['gender']);
  }
  
  if($_POST['msg']=="")
     $msg_err="Address is required";
  else
    {
      $msg=input_data($_POST['msg']);
      if(!preg_match("/^[0-9a-zA-Z__\s]*$/",$address))
       $msg_err="only characters and numbers are allowed";
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
<form>
<div class="container">
<h1><b style="color:#95103B"><center>--Request for blood--</center></b></h1>
<h2>Patient Details</h2>

	<div><label for="pname"><b>Patiant Name:</b>  </lable></div>
	<input type="text" id="pname" name="pname"><br><?php echo $pname_err; ?>   <br>  
	<lable><b>State:</b></lable>
        <select name="state" id="state" class="form-control">
        <option value="select">Select state</option>
	<option value="Andhra Pradesh">Andhra Pradesh</option>
	<option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
	<option value="Arunachal Pradesh">Arunachal Pradesh</option>
	<option value="Assam">Assam</option>
	<option value="Bihar">Bihar</option>
	<option value="Chandigarh">Chandigarh</option>
	<option value="Chhattisgarh">Chhattisgarh</option>
	<option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
	<option value="Daman and Diu">Daman and Diu</option>
	<option value="Delhi">Delhi</option>
	<option value="Lakshadweep">Lakshadweep</option>
	<option value="Puducherry">Puducherry</option>
	<option value="Goa">Goa</option>
	<option value="Gujarat">Gujarat</option>
	<option value="Haryana">Haryana</option>
	<option value="Himachal Pradesh">Himachal Pradesh</option>
	<option value="Jammu and Kashmir">Jammu and Kashmir</option>
	<option value="Jharkhand">Jharkhand</option>
	<option value="Karnataka">Karnataka</option>
	<option value="Kerala">Kerala</option>
	<option value="Madhya Pradesh">Madhya Pradesh</option>
	<option value="Maharashtra">Maharashtra</option>
	<option value="Manipur">Manipur</option>
	<option value="Meghalaya">Meghalaya</option>
	<option value="Mizoram">Mizoram</option>
	<option value="Nagaland">Nagaland</option>
	<option value="Odisha">Odisha</option>
	<option value="Punjab">Punjab</option>
	<option value="Rajasthan">Rajasthan</option>
	<option value="Sikkim">Sikkim</option>
	<option value="Tamil Nadu">Tamil Nadu</option>
	<option value="Telangana">Telangana</option>
	<option value="Tripura">Tripura</option>
	<option value="Uttar Pradesh">Uttar Pradesh</option>
	<option value="Uttarakhand">Uttarakhand</option>
	<option value="West Bengal">West Bengal</option>
	</select><br><?php echo $state_err; ?>   <br>  
</script>	
	
	<lable><b>Blood Group:</b></lable>
	<select name = "bgroup" >
	    <option value = "select" selected>--SELECT--</option>
            <option value = "O+">O +VE</option>
            <option value = "O-">O -VE</option>
            <option value = "A+">A +VE</option>
            <option value = "A-">A -VE</option>
            <option value = "AB+">AB +VE</option>
            <option value = "AB-">AB -VE</option>
            <option value = "B+">B +VE</option>
            <option value = "B-">B -VE</option>
        </select>
        <br>
        <br>
        
        <div>
       <label for="haddress"><b>Hospital name & Address </b></lable></div>
       <textarea id="haddress" row ="3" cols="45" name = "haddress" ></textarea><br><?php echo $haddress_err; ?>   <br>  
<h1><b style="color:#95103B"><center>--Contact Details--</center></b></h1>
	<div><label for="phno" ><b>Phone Number:</b> </lable></div>
	     <input type="text" id="phno" name="phno" size="10" /><br><?php echo $mobile_err; ?>   <br>  
	 <lable for="bdate"><b> Date when need</b></lable>
	<input type="date" id="bdate" name="bdate"><br><br>
	<div><label for="email"><b>Email:</b></label></div>
     <input type="text" id="email"name="email" ><br><br><?php echo $email_err; ?>   <br>  
     <label for="msg"><b>Other message</b></lable>
       <textarea id="msg" row ="3" cols="45" name = "msg" ></textarea><br><?php echo $msg_err; ?>   <br>  
       <button type="submit" class="btn">Send request</button>  <br>
</div>
</form>

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
        <li><a href="donorrr.php" style="color:white"><u>Donor</u></a></li>
        <li><a href="seeker.php" style="color:white"><u>Search for blood</u></a></li>   
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
