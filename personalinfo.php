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
$bgroup=$_POST['bgroup'];
$gender=$_POST['gender'];
$AYEP=$_POST['AYEP'];
$medic=$_POST['medic'];
$address=$_POST['address'];


$bgroup_err=$gender_err=$AYEP_err=$medic_err=$address_err="";
$bgroup==$gender=$AYEP=$medic=$address="";

if($_SERVER["REQUEST_METHOD"]=="POST")
{

 if($_POST['bgroup']=="")
     $bgroup_err="Blood group is required";
  else
  {
     $bgroup=input_data($_POST['bgroup']);
  }
   

   if($_POST['gender']=="")
     $gender_err="Gender is required";
  else
  {
     $gender=input_data($_POST['gender']);
  }

  
   if($_POST['AYEP']=="")
     $AYEP_err="This field is required";
  else
  {
     $AYEP=input_data($_POST['AYEP']);
  }

  if ($_POST['medic']=="") 
    $medic_err = "This is required";
   else {
    $medic =input_data($_POST["medic"]);
  }

  if($_POST['address']=="")
     $address_err="Address is required";
  else
    {
      $address=input_data($_POST['address']);
      if(!preg_match("/^[0-9a-zA-Z__\s]*$/",$address))
       $address_err="only characters and numbers are allowed";
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
	<h1><b style="color:#95103B"><center>--Personal Information--</center></b></h1>
	
	
	<b>Blood Group:</b>
	<select name = "bgroup" >
	    <option value = "select" selected>--SELECT--</option>
            <option value = "O+">O+</option>
            <option value = "O-">O-</option>
	    <option value = "A+">A+</option>
            <option value = "A-">A-</option>
            <option value = "B+">B+</option>
            <option value = "B-">B-</option>
	    <option value = "AB+">AB+</option>
            <option value = "AB-">AB-</option>
        </select> <br> <?php echo $bgroup_err; ?><br>


        <!--   <b>Blood Group:</b>
	<br>
    	<input type="radio" value="O+" name="bgroup" size="32" > O+
   	<input type="radio" value="O-" name="bgroup" size="32" > O-  
	<input type="radio" value="A+" name="bgroup" size="32" > A+   
    	<input type="radio" value="A-" name="bgroup" size="32" > A-   
    	<input type="radio" value="B+" name="bgroup" size="32" > B+   
    	<input type="radio" value="B-" name="bgroup" size="32" > B- 
	<input type="radio" value="AB+" name="bgroup" size="32" > AB+   
	<input type="radio" value="AB-" name="bgroup" size="32" > AB-     
  	 <br> <?php echo $bgroup_err; ?> <br>   -->
	

           <br> <b>Gender:</b>  
    	<input type="radio" value="Male" name="gender" > Male   
    	<input type="radio" value="Female" name="gender" > Female   
    	<input type="radio" value="Other" name="gender"> Other  
    	<br><?php echo $gender_err; ?> <br> 

	<b>Are you 18+? (Minimum age of blood donation is 18.)</b>
	<input type="radio" name="AYEP" value="yes">yes
  	<input type="radio" name="AYEP" value="no">no
  	<br><?php echo $AYEP_err;?><br>

	<b>Do you suffer from any ongoing medical condition(s) that may prevent you from donating blood? (Required)</b>
  	<input type="radio" name="medic" value="yes">yes
  	<input type="radio" name="medic" value="no">no
  	<br> <?php echo $medic_err;?><br>
 
	<b> Address : </b> 
    	<input type="text" name="address" placeholder="address" size="32" onkeypress.width="this.style.width=((this.value.length+1)*8)+ 'px';" required /> <?php echo $address_err; ?>  <br>
    </textarea> <br>

        <button type="submit" class="btn" name="submit">PROCEED TO BOOK APPOINTMENT</button>  <br><br>
</div>
    </form> 


<!--Database-->
<?php
if(isset($_POST['submit']))
{
   if($bgroup_err=="" &&  $gender_err=="" && $AYEP_err=="" && $medic_err=="" && $address_err=="")
   {
    $con=pg_connect("host=localhost dbname=finalproject user=postgres password=postgres");

echo $con;
$bgroup=$_POST['bgroup'];
$gender=$_POST['gender'];
$AYEP=$_POST['AYEP'];
$medic=$_POST['medic'];
$address=$_POST['address'];

//echo all values here  run on prompt
echo "$bgroup,$gender,$AYEP,$medic,$address";

$pi=pg_query("insert into personalinfo (bgroup,gender,AYEP,medic,address)
values('$bgroup','$gender','$AYEP','$medic','$address')");

if($pi)
{ 
     echo '<script>alert("Your details have been successfully added.")</script>';
     echo '<script> location.replace("booking.php") </script>';     
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
      <p class="btmspace-30">WEB BLOOD CENTER helps people to find donor and donate blood.We also organize various campaigns  for blood donation.</p>
    </div>
    <div class="one_third">
      <h6 class="heading">Quick Links</h6>
      <ul class="nospace clear latestimg">
        <li class="active"><a href="index.html" style="color:white"><u>Home</u></a></li>
        <li><a href="donor.php" style="color:white"><u>Donor</u></a></li>
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



</body>
</html>


