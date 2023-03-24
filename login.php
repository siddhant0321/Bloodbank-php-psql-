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
</div><!--navigation bar-->
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




        <div class="container">  
 
   <center> <h1>-----Login-----</h1> </center>  

<?php

$email=$_POST['email'];
$password=$_POST['password'];



$email_err=$password_err="";
$email=$password="";


if($_SERVER["REQUEST_METHOD"]=="POST")
{
  if($_POST['email']=="")
     $email_err="Email ID is required";
  else
  {
     $email=input_data($_POST['email']);
     if(!filter_var($email,FILTER_VALIDATE_EMAIL))
        $email_err="Invalid email format.";
  }
 
  
  
  if($_POST['password']=="")
    $password_err="password is required";
else
{
$password=input_data($_POST['password']);
if (!preg_match(" #.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$#", $password)) 
{
 $password_err="Password must be at least 8 characters in length and must contain at least one number, one upper case letter, one lower case letter and one special character.";
} 
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
    <form method=post action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" > 
	      <label for="email"><b>Email:</b></label> 
     <input type="text" placeholder="Enter Email" name="email"size="32" required><br><?php echo $email_err; ?>
            <label>Password : </label>   
            <input type="password" placeholder="Enter Password" name="password" size="32" required> <?php echo $password_err; ?> 
           <br><br> <button type="submit" name="submit" class="btn">Login</button>   <br><br>
             
	    Don't have account? <a href="finaldonor.php" > Register Here </a><br><br><br>
        </div>   
    </form> 
<?php
if(isset($_POST['submit']))
{
   if( $email_err==""  && $password_err=="")
   {  
      $con=pg_connect("host=localhost dbname=finalproject user=postgres password=postgres");
   
       $email=$_POST['email'];
       $password=$_POST['password'];
       echo "$email,$password";
       
      $sql ="select * from finaldonor1 where email = '".pg_escape_string($_POST['email'])."' and password ='".$password."'";
        $data = pg_query($con,$sql);
             $login_check = pg_num_rows($data);
    if($login_check > 0)
       { 
       
         $hh=pg_query("insert into login (emalid,password) values('$email','$password')");
          

         if($hh)
         {
               echo '<script>alert("Your login is successful.")</script>';
               echo '<script> location.replace("personalinfo.php") </script>';    
         }
         else 
                echo '<script>alert("Record not inserted.")</script>';

        }
   else
        echo '<script>alert("you have not registered")</script>';
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
        <li><a href="camp.php" style="color:white"><u>Camp</u></a></li>
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


