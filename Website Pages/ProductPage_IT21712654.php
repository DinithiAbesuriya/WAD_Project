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
<title>Collection</title>
	<link rel="stylesheet" type="text/css" href="CSS/ProductPageStyle.css">
	
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
			   <td width="228" align="center"><a href="CartPage.php"><img width="150" height="84" src="../Images/cart.png"</a></td>
     </tr>
    </tbody>
  </table>
	<p><button type="submit" name="btncatergory" >Choose another catergory</button></p>	

	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>
		<?php
		if(isset($_POST['btncatergory']))
		{
			header('Location:CatergoryPage_IT21712654.php');
		}
		if(isset($_GET['catergory']))
	{
	$temp=$_GET['catergory'];
			$_SESSION["selected"]=$temp;
		}
				$con=mysqli_connect("localhost","root","","website_it21712654");
if(!$con)
{
die("Cannot connect to DB Server");
}
		
		$sql="SELECT * FROM `clothing_item`;";
		$result1=mysqli_query($con,$sql);
	$no_rows=mysqli_num_rows($result1);
		
		
		
		
			$catergory=$_SESSION["selected"];
			
		
		 for($i=1;$i<=$no_rows;$i++)
				{
					
				
				if(isset($_POST["btn_dress$i"]))
				{
					echo "btn_dress$i";
					header('Location:ViewProduct.php');
					$_SESSION['ID']=$i;
					
					
				}
				
				
				}
	
		
			echo "<table width='1166' height='490' border='1' align='center'>
	  <tbody>
	    <tr>";
		$design_count=1;
		 for($i=1;$i<=$no_rows;$i++)
				{
		if($catergory=="all")
		{
			 $sql1="SELECT `image` FROM `clothing_item` WHERE `itemID`='".$i."';";
		}
		else{
		 
			
		  $sql1="SELECT `image` FROM `clothing_item`
WHERE `catergory`='".$catergory."' AND `itemID`='".$i."';";
		}
		 
		  
					$result1=mysqli_query($con,$sql1);
	if(mysqli_num_rows($result1)>0)
	{
		$no_row=mysqli_num_rows($result1);
		
$row=mysqli_fetch_assoc($result1);
		$image=$row["image"];
		
		
	 echo "<td width='405' height='392'><p><img  width='357' height='348' src=".$image."></p> <button style='align-items: center' type='submit' name='btn_dress".$i."' id='btn'>View Details</button>";
		echo "<p></p>";
		
		if($design_count==3)
		{
			echo "</tr><tr>";
			$design_count=0;
		}
		$design_count++;
		
	}
		 }
		 echo "</tr></td> </tbody>
		</table>
	     ";
		
		
		
		
		?>
		</p>
	<p>
	  </p>
			<p><script src="https://apps.elfsight.com/p/platform.js" defer></script>
<div class="elfsight-app-10552175-d675-467f-a948-369d17bb7f50"></div>
			  
	  </p>
	  
	</form>
</body>
</html>