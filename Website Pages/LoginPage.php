<?php session_start(); ?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Login Page</title>
</head>

<body>

	<table width="156" height="137" border="0" align="left">
    <tbody>
      <tr>
        <td width="148" height="125"><img src="../Images/logo1.png" width="307" height="108" alt=""/></td>
      </tr>
    </tbody>
  </table>
	<p>&nbsp;</p>
	<table width="846" height="84" border="0" align="center" bgcolor="#FCFAFA">
    <tbody>
      <tr>
        <td width="155" align="center" >
			<a href="Home Page.php" style="font-size: 18px" >Home</a>
		 
	    </td>
        <td width="196" align="center">
		  <a href="ProductPage_IT21712654.php">Product</a>
	    </td>
        <td width="249" align="center"><a href="ContactPage.php">Contact Us</a></td>
        <td width="228" align="center"><a href="RegistrationPage_IT21712654.php">Register</a></td>
		  
      </tr>
    </tbody>
  </table>
	<p>&nbsp;</p>
	<table width="189" height="86" border="0" align="center">
    <tbody>
      <tr>
        <td>
		  <form id="form1" name="form1" method="post" >
  <div style="position: absolute; right: 229px; top: 328px; width: 383px; height: 423px; font-size: 30px"> 
	  <p>
		  <label><br>
		    Username</label>
		  <input type="text"  name="txtuname" >
	  </p>
		<p><br>
		  <label>Password</label>
		  <input type="password" name="txtpassword">
		  
	  </p>
	   <p>
	   <?php
	 	   if(isset($_POST["btnsubmit"]))
			   {
				$username=$_POST["txtuname"];
				$password=$_POST["txtpassword"];
				$valid = false;
				   
				$con = mysqli_connect("localhost","root","","website_it21712654"); 
				   
				if(!$con)
				{
					die("Cannot connect to DB Server");
				}
			   
				$sql = "SELECT * FROM `user` WHERE `email` = '".$username."' and `password` ='".$password."'";
				   
				$result=mysqli_query($con,$sql);
			   
				  
				
				if(mysqli_num_rows($result) > 0)
				
				{
					
					$valid = true;
				}
				else
				{
				
					$valid = false;
				}
				
				if($valid)
				{
					
					$_SESSION["userName"] = $username;
					header('Location:CatergoryPage_IT21712654.php');
				
				}
				else
				{
					echo "Please enter correct username & Password" ;
				}
			   $_SESSION['cart']=1;

			  }	
				
			?>
		    </p>
	 
	<button type="submit" name="btnsubmit" >Login</button>
</button>
			  
    </div>
  <img src="../Images/login2 image.png"  width="840" height="581" alt=""   />
  <p>&nbsp;</p>
</form>
		  
		  
	    </td>
      </tr>
    </tbody>
  </table>
	
</body>
</html>
