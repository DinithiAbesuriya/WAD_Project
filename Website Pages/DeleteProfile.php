<?php session_start();
?>
<!doctype html>
 
<html>
<head>
<meta charset="utf-8">
	<title>Update Profile</title>
	
</head>

<body>
<form id="form1" name="form1" method="post">
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
        
      </tr>
    </tbody>
  </table>
  	<?php
	
	$con=mysqli_connect("localhost","root","","website_it21712654");
if(!$con)
{
die("Cannot connect to DB Server");
}
$sql="SELECT * FROM `user` WHERE `email`='".$_SESSION["userName"]."'";
$result=mysqli_query($con,$sql);
	if(mysqli_num_rows($result)>0)
	{
$row=mysqli_fetch_assoc($result);

		
		
							  
?>
  <table width="441" height="295" border="1" align="center">
    <tbody>
      <tr>
        <td height="80" colspan="2"><h1 align="center" style="text-decoration-color: #E74DE5">Delete Account</h1>
        <p align="center" style="text-decoration-color: #E74DE5"><img src="../Images/Profile.png"</p></td>
      </tr>
      <tr>
		  
        <td width="431" height="80" colspan="2" style="align-content: center"><p>
          <label for="textfield" >Name </label>
          <input type="text" name="fullName" id="fullName" value="<?php echo $row["fullName"]; ?>" readonly >
        </p> 
        <p>&nbsp;</p></td> 
      </tr>
      <tr>
        <td colspan="2"><label for="textfield">Contact </label>
        <input type="text" name="contact" id="contact"  value="<?php echo $row["contact"]; ?>" readonly ></td>
      </tr>
      <tr>
        <td colspan="2"><label for="textfield">Delivery Address </label>
        <input type="text" name="address" id="address"  value="<?php echo $row["address"]; } ?>" readonly  /></td>
      </tr>
      <tr>
        <td height="77" colspan="2"><p>
			<?php  
					 if(isset($_POST["delete"]))
	  {
						
			

	$con=mysqli_connect("localhost","root","","website_it21712654");
if(!$con)
{
die("Cannot connect to DB Server");
}
$sql="DELETE FROM `user` WHERE `email`='".$_SESSION["userName"]."'";


	if(mysqli_query($con,$sql))
	{
		echo "Deleted";
		header('Location:Home Page.php');
		
	}
		
	  }
			
			?>
			 <button type="submit" name="delete" >Confirm to Delete Account</button>
        </td>
      </tr>
    </tbody>
  </table>
	
</form>
	<?php
		mysqli_close($con);
	 
		
		
		?>

</body>
</html>
