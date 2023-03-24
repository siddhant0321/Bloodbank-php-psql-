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

<div id="printableArea">
 <h1><Center> Blood Donation Slot Booking</center> </h1>
<?php

echo "Name:".$_SESSION["name"];
echo "<br><br>";
echo "Place:".$_SESSION["place"];
echo "<br><br>";
echo "Date:".$_SESSION["date"];
echo "<br><br>";
echo "Time:".$_SESSION["time"];
echo "<br><br>";
echo "THANK YOU FOR BLOOD DONATION";
?>


</div>
<input type="button" onclick="printDiv('printableArea')" value="Print" />
<script>
function printDiv(printableArea)
{
   var printContents = document.getElementById(printableArea).innerHTML;
   var originalContents = document.body.innerHTML;
   document.body.innerHTML=printContents;
     window.print();
   document.body.innerHTML = originalContents;
}

</script>




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

