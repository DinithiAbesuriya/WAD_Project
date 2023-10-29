<?php session_start();

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Product details</title>
	<link rel="stylesheet" type="text/css" href="CSS/ViewPageStyle.css">
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
<p>&nbsp;</p>
<table width="1010" height="531" border="1" align="center">
  <tbody>
    <tr>
      <td><?php 
				
					$id=$_SESSION['ID'];
		
		  $cartid=$_SESSION["cart"];	
		
		          
		  
		 
					$con=mysqli_connect("localhost","root","","website_it21712654");
if(!$con)
{
die("Cannot connect to DB Server");
}
					$sql="SELECT * FROM `clothing_item` WHERE `itemID`='".$id."';";
					$result=mysqli_query($con,$sql);
	if(mysqli_num_rows($result)>0)
	{
$row=mysqli_fetch_assoc($result);
		
		echo "<u><h1><b>".$row["clothing_title"]."</b></h1></u>";
		echo "<img width='357' height='348' src=".$row["image"].">";
		echo "<p><b>Available Quantity: ".$row["quantity"]."</b></p>";
		echo "<p><b>Available Sizes: ".$row["size"]."</b></p>";
		echo "<p><b>Price: Rs.".$row["price"]."</b></p>";
		echo "<p><b>Product Description: ".$row["product_description"]."</b></p><p></p>";
		
		
		
		
		}
		
			
		  $count=1;
		 
		  if(isset($_POST["btn_cart"]))
		  {
			 $id=$_SESSION['ID']; 
			$quantity=$_POST['quantity'];
			  $_SESSION['quantity']=$quantity;
		
			  
			  $size=$_POST['size'];
			   $_SESSION['size']=$size;
			  
				 $color=$_POST['color'];
			   $_SESSION['color']=$color;
			
			  $cartid=$_SESSION['cart'];
			    $email=$_SESSION["userName"];
				
			  
			  $sql1="INSERT INTO `cart`(`email`,`itemID`,`cartID`,`quantity`,`size`,`color`) VALUES('".$email."','".$id."','".$cartid."','".$quantity."','".$size."','".$color."');";
		     
		      mysqli_query($con,$sql1);
		  
			
		
			  $count++;
			  	$_SESSION["count"]=$count;
			  $cartid++;			 
			 
			 

			 
			  header('Location:ProductPage_IT21712654.php');
			   $_SESSION['cart']=$cartid;
		  }
		  if(isset($_POST['btn_cancel']))
		  {
			  header('Location:ProductPage_IT21712654.php');
		  }
				
				?>
		  
      
        <p>&nbsp;</p>
        <p style="font-size: 18px">Size
          <select name="size" id="size">
            <option value="XS">XS</option>
            <option value="S">S</option>
            <option value="M">M</option>
            <option value="L">L</option>
            <option value="XL">XL</option>
            </select>
        </p>
		  <p style="font-size: 18px">Quantity<select name="quantity" id="quantity">
			  <?php   
		
		$quantity=$row["quantity"];
		for($i=1;$i<=$quantity;$i++)
		{
		echo  "<option value=".$i.">".$i."</option>";
		}
			  ?></select>
        </p>
		    <p style="font-size: 18px">Color<select name="color" id="color">
			  <?php   
		
		$color=$row["color"];
		
		echo  "<option value=".$color.">".$color."</option>";
	
			  ?></select>
        </p>
        <p>&nbsp;</p>
        <p>
          <img src="../Images/size_cart.jpeg" alt="" width="414" height="312"/>
          <iframe align="middle"width="560" height="315" src="https://www.youtube.com/embed/jvGEVbgIXPU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p> <button style="align-items: center" type="submit" name="btn_cart">Add to cart</button>
		   <button style="align-items: center" type="submit" name="btn_cancel">See another product</button></p>
      <p><script src="https://apps.elfsight.com/p/platform.js" defer></script>
<div class="elfsight-app-10552175-d675-467f-a948-369d17bb7f50"></div>
			  
	  </p></td>
    </tr>
  </tbody>
</table>
	</form>
</body>
</html>