<?php session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Order Page</title>
	<link rel="stylesheet" type="text/css" href="CSS/OrderPageStyle.css">
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
			<table align="center" width="1051" height="366" border="1">
  <tbody>
   
     
		<p>
		  <?php
		  
			 
			 $temp_row=$_SESSION["temp"];
					$con=mysqli_connect("localhost","root","","website_it21712654");
if(!$con)
{
die("Cannot connect to DB Server");
}
			$sql="SELECT * FROM `order`";
			$result1=mysqli_query($con,$sql);
	        $no_rows=mysqli_num_rows($result1);
		
			echo "<tr><td><h1 align='center'>Products</h1></td><td><h1 align='center'>Total Price(Rs)</h1></td></tr>";
							$Sum=0;

			for($i=$temp_row;$i<=$no_rows;$i++)
			{
			
			$sql1="SELECT `clothing_item`.clothing_title,`clothing_item`.`image`,`clothing_item`.`price`,`order`.`quantity`,`order`.`size`,`order`.`color`
FROM `clothing_item`
INNER JOIN `order` 
ON `order`.`itemID`=`clothing_item`.`itemID` AND `email`='".$_SESSION['userName']."' AND `orderID`='".$i."'";
				$result2=mysqli_query($con,$sql1);
				
	if(mysqli_num_rows($result2)>0)
	{
$row=mysqli_fetch_assoc($result2);
		echo "<p></p><p></p>";
		
		
		echo "<tr><td bordercolorlight='white'><u><p><b>".$row["clothing_title"]."</b></p></u>";
		echo "<img width='100' height='100' src=".$row["image"].">";
		echo "<p><b> Ordered Quantity: ".$row["quantity"]."</b></p>";
		echo "<p><b> Ordered Size: ".$row["size"]."</p></b>";
		echo "<p><b> Ordered Color: ".$row["color"]."</b></p>";
	    echo "<p><b> Price/unit : Rs.".$row["price"]."/unit</b></p></td>";
		
		
		$quantity=$row["quantity"];
		$price=$row["price"];
		$TotalPrice=$quantity*$price;
		$Sum+=$TotalPrice;
	
		
		echo "
		      <td width='525' ><h1 align='center'>Rs.".$TotalPrice."</h1></td></tr>";
		
		echo "<p></p>";
		
		
		  
		  
	}
			}
			if(isset($_POST['btn_cancel']))
				{
				for($i=$temp_row;$i<=$no_rows;$i++)
			{
					header('Location:ProductPage_IT21712654.php');
					$sql="DELETE FROM `order` WHERE `orderID`='".$i."' AND `email`='".$_SESSION['userName']."'";
					$result2=mysqli_query($con,$sql);
				}
				
				
				
				}
			$_SESSION['sum']=$Sum;
		  
		  ?>
		  </p>
	  <tr></tr>
		<td>
		<h1> Total Sum </h1>
	
		</td>
			<td><?php
			$sum=$_SESSION['sum'];
			
			echo "<h1 align='center' ><u>Rs.".$sum."</u></h1>";
				if(isset($_POST['btn_payment']))
				{
					header('Location:PaymentPortalPage.html');
				}
			
			
			?>
			
			</td>
			</tr>
		
  </tbody>
</table>
	<p align="center">
			
		  <button style="align-items: center" type="submit" name="btn_payment">Proceed to Payment</button><button style="align-items: center" type="submit" name="btn_cancel"> Cancel Order</button>
		</p>
					
		
		<p>
			
		  <p><script src="https://apps.elfsight.com/p/platform.js" defer></script>
<div class="elfsight-app-10552175-d675-467f-a948-369d17bb7f50"></div>
			  
	  </p>

	</form>
</body>
</html>