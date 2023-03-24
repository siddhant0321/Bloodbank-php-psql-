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

          
        <li><a href="donor.php">Donor</a></li>
        <li><a href="seeker.php">Seeker</a></li>   
        <li><a href="login.php">Login</a></li>	
        <li><a href="camp.php">Camp</a></li>
        <li><a href="aboutus.html">About Us</a></li>
	<li><a href="logout.html">Logout</a></li>
      </ul>
    </nav>
  </section>
</div>

<?php
$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$password=$_POST['password'];
$password1=$_POST['password1'];

$name_err=$email_err=$mobile_err=$password=$password1="";
$name=$email=$mobileno=$password=$password1="";

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

  if($_POST['email']=="")
     $email_err="Email ID is required";
  else
  {
     $email=input_data($_POST['email']);
     if(!filter_var($email,FILTER_VALIDATE_EMAIL))
        $email_err="Invalid email format.";
   }

   if($_POST['phone']=="")
     $mobile_err="Mobile number is required";
  else
  {
     $mobileno=input_data($_POST['phone']);
     if(!preg_match("/^[0-9]*$/",$mobileno))
        $mobile_err="Only numeric value is allowed.";
     if(strlen($phone)!=10)
        $mobile_err="Mobile number must contain 10 digits.";   
  }


 if($_POST['password']=="")
    $password_err="password is required";
else
{
$password=input_data($_POST['password']);
if (!preg_match(" #.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$#", $password)) {
 $password_err="Password must be at least 8 characters in length and must contain at least one number, one upper case letter, one lower case letter and one special character.";
} 
}


if($_POST['password1']=="")
    $password1_err="password is required";
else
{
$password1=input_data($_POST['password1']);
if ($_POST["password"] !== $_POST["password1"])
$password1_err="password and retype password must be same";
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
         
	
            <b>Email:</b>
            <input type="text" name="email" placeholder="Enter email" size="32" required><br> <?php echo $email_err; ?>  

		<b> Phone :  </b>
    	<input type="text" name="phone" placeholder="phone no." size="32" required /> <?php echo $mobile_err; ?> <br>
 

	 <label for="password"><b>Password:</b></label>  
        <input type="password" placeholder="Enter Password" name="password" size="32"  required><?php echo $password_err; ?> 	<br>  
       Note:Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one    special character.
	<br>
        <br><br><label for="password1"><b>Re-type Password:</b></label>  
        <input type="password" placeholder="Retype Password" name="password1" size="32" required> <?php echo $password1_err; ?> <br> 
        <button type="submit" class="btn" name="submit">Register</button>  <br><br>
</div>

    </form> 


<!--Database-->
 <?php
if(isset($_POST['submit']))
{
   if($name_err=="" &&  $email_err=="" && $mobile_err=="" && $password_err=="" && $password1_err=="")
   {
    $con=pg_connect("host=localhost dbname=bbproject user=postgres password=postgres");

echo $con;
$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$password=$_POST['password'];
$password1=$_POST['password1'];
//echo all values here  run on prompt
echo "$name,$email,$phone,$password,$password1";

$sp=pg_query("insert into donor (name,email,phone,password,cpassword) values('$name','$email','$phone','$password','$password1')");

if($sp)
{ 
     echo '<script>alert("Your registration is successful.")</script>';
     echo '<script> location.replace("login.php") </script>';   

}
else 
    echo '<script>alert("You have already registered with us. Please login!!")</script>';
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
        <li><a href="donor.php" style="color:white"><u>Donor</u></a></li>
        <li><a href="seeker.php" style="color:white"><u>Seeker</u></a></li>   
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



</body>
</html>

