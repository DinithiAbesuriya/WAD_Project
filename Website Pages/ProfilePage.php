<?php session_start();
if(!isset($_SESSION["userName"]))
{
	
	header('Location:LoginPage.php');
	
}

?>
<!doctype html> 
<html>
<head>
	
<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="CSS/ProfilePageStyle.css">
	<title>Profile</title>
	<style>
		p{
			font-size: 18px;
		}
	
	</style>
	
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
<p><table width="484" height="301" border="1" align="right">
    <tbody>
      <tr>
        <td width="134" height="91"><h1><u>Purchase History</u></h1>
        <p><?php 
			$con=mysqli_connect("localhost","root","","website_it21712654");
if(!$con)
{
die("Cannot connect to DB Server");
	
}
			$sql1="SELECT * FROM `order`";
			$result=mysqli_query($con,$sql1);
	$no_rows=mysqli_num_rows($result);
			for($i=1;$i<=$no_rows;$i++)
			{
			$sql2="SELECT `clothing_item`.clothing_title,`clothing_item`.`image`,`order`.`quantity`,`order`.`size`,`order`.`color`
FROM `clothing_item`
INNER JOIN `order` 
ON `order`.`itemID`=`clothing_item`.`itemID` AND `email`='".$_SESSION["userName"]."' AND `orderID`='".$i."'";
			
			$result=mysqli_query($con,$sql2);
	if(mysqli_num_rows($result)>0)
	{
$row=mysqli_fetch_assoc($result);
		
		echo "<u><p><b>".$row["clothing_title"]."</b></p></u>";
		echo "<img width='80' height='100' src=".$row["image"].">";
		echo "<p><b>Ordered quantity: ".$row["quantity"]."</b></p>";
		echo "<p><b>Ordered Size: ".$row["size"]."</b></p>";
		
	}
			
	}
			
			?>
			</p>
        
        <p>&nbsp;</p></td>
      </tr>
    </tbody>
  </table></p>
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
  <p>
  <table width="547" height="295" border="1" align="center">
    <tbody>
      <tr>
        <td height="80" colspan="2"><h1 align="center" style="text-decoration-color: #E74DE5">My Profile</h1>
        <p align="center" style="text-decoration-color: #E74DE5"><img src="../Images/Profile.png"</p></td>
      </tr>
      <tr>
		  
        <td width="431" height="80" colspan="2" style="align-content: center"><p>
          <label for="textfield" >Name </label>
          <input type="text" name="textfield" id="fullName" value="<?php echo $row["fullName"]; ?>" readonly >
        </p> 
        <p>&nbsp;</p></td> 
      </tr>
      <tr>
        <td colspan="2"><p>
          <label for="textfield">Contact </label>
          <input type="text" name="textfield" id="contact"  value="<?php echo $row["contact"]; ?>" readonly >
        </p></td>
      </tr>
      <tr>
        <td colspan="2"><p>
          <label for="textfield">Delivery Address </label>
          <input type="text" name="textfield" id="address"  value="<?php echo $row["address"];}  ?>" readonly />
        </p></td>
      </tr>
      <tr>
        <td height="77" colspan="2"><p><?php
			 if(isset($_POST["update"]))
	  {
		  header('Location:UpdateProfile.php');
	  }
		 if(isset($_POST["delete"]))
	  {
		  header('Location:DeleteProfile.php');
	  }
		
			
			?>
          </p>
          <p>
			  <button type="submit" name="update" >Update Account Details</button>
			  <button type="submit" name="delete" >Delete Account</button>
            
        </p></td>
      </tr>
    </tbody>
	  
  </table>
  
	</p>
  <p>&nbsp;</p>
	
</form>
	<?php
		mysqli_close($con);
	 
		
		
		?>

</body>
</html>
