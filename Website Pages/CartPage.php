<?php session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Cart Page</title>
	<link rel="stylesheet" type="text/css" href="CSS/CartPageStyle.css">
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
		  <td width="228" align="center"><a href="ProfilePage.php"><img  width="150" height="84" src="../Images/Profile.png"></a></td>
        
      </tr>
    </tbody>
  </table>
<table width="1010" height="531" border="1" align="center">
  <tbody>
    <tr>
      <td><?php 
		  $length=$_SESSION['count'];
		 
		  $email=$_SESSION["userName"];
		  
		  $cartid=$_SESSION['cart']-1;
		  
		 
		            
					$con=mysqli_connect("localhost","root","","website_it21712654");
if(!$con)
{
die("Cannot connect to DB Server");
}
		 
			for($i=1;$i<=$cartid;$i++)
			{
		  $sql2= "SELECT `itemID` FROM `cart` WHERE `cartID`='".$i."' AND `email`='".$email."';"; 
		 
		  
					$result1=mysqli_query($con,$sql2);
	if(mysqli_num_rows($result1)>0)
	{
$row=mysqli_fetch_assoc($result1);
		$itemid=$row["itemID"];
		
	
	}
	
		
		 
		$sql3="SELECT `clothing_item`.clothing_title,`clothing_item`.`image`,`cart`.`quantity`,`cart`.`size`,`cart`.`color`
FROM `clothing_item`
INNER JOIN `cart` 
ON `cart`.`itemID`=`clothing_item`.`itemID` AND `cartID`='".$i."' AND `email`='".$email."';";
	
	
					$result2=mysqli_query($con,$sql3);
	if(mysqli_num_rows($result2)>0)
	{
$row=mysqli_fetch_assoc($result2);
		
		
		echo "<u><h1><b>".$row["clothing_title"]."</b></h1></u>";
		echo "<img width='100' height='100' src=".$row["image"].">";
		echo "<p><b>Quantity: ".$row["quantity"]."</b></p>";
		echo "<p><b>Size: ".$row["size"]."</b></p>";
		echo "<p><b>Color: ".$row["color"]."</b></p>";
		
		
		echo "<p></p>";
		
		
		
				}
			}
		
		
				
	
					
		  if(isset($_POST["btn_continue"]))
		  {
			 
			  header('Location:ProductPage_IT21712654.php');
		  }
		  if(isset($_POST["btn_order"]))
		  {
			  	for($i=1;$i<=$cartid;$i++)
			{
		  $sql2= "SELECT * FROM `cart` WHERE `cartID`='".$i."' AND `email`='".$email."';"; 
			$result1=mysqli_query($con,$sql2);
				  if(mysqli_num_rows($result1)>0)
	{
$row=mysqli_fetch_assoc($result1);
		$itemid=$row["itemID"];
		echo "Itemid: ".$itemid;
				
					  $sql="SELECT * FROM `order`";
					  $result1=mysqli_query($con,$sql);
				      $temp=mysqli_num_rows($result1);

					  $_SESSION["temp"]=$temp;
					  if($temp==0)
					  {
						  $orderid=1;
					  }
					  else{
						  $orderid=$temp+1;
						 
					  }
					  
				   
			  $sql4="INSERT INTO `order`(`orderID`, `email`, `itemID`,`quantity`, `size`, `color`) VALUES ('".$orderid."','".$email."','".$itemid."','". $row['quantity']."','".$row['size']."','".$row['color']."');";
					  
					
			  
			 
					mysqli_query($con,$sql4);
					  
					    $sql5="DELETE FROM `cart` WHERE `email`='".$email."' AND `itemID`='".$itemid."';";
					  mysqli_query($con,$sql5);
					  }
			  }
			  header('Location:OrderPage_IT21712654.php');
		  }
		  
		  
					mysqli_close($con);
	 
				
				?>
		  <p><button style="align-items: center" type="submit" name="btn_order">Confirm Order</button>
       
			
          <button style="align-items: center" type="submit" name="btn_continue">Continue shopping</button>
			 
		  
		<p><script src="https://apps.elfsight.com/p/platform.js" defer></script>
<div class="elfsight-app-10552175-d675-467f-a948-369d17bb7f50"></div>
			  
	  </p></td>
    </tr>
  </tbody>
</table>
	</form>
</body>
</html>