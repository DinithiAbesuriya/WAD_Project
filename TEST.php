<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<form id="form1" name="form1" method="post">
	<p><?php 
		
		
		if(isset($_POST['btn_Q']))
		{
		$size=$_POST['size'];
		echo "SIZE: ".$size;
			
			
			$quan=$_POST['quantity'];
			echo "Quantity: ".$quan;
		}
		
		?></p>

		 <p style="font-size: 18px">Size
          <select name="size" id="size">
            <option value="XS">XS</option>
            <option value="S">S</option>
            <option value="M">M</option>
            <option value="L">L</option>
            <option value="XL">XL</option>
			 </select></p>
			 <p style="font-size: 18px">Quantity<select name="quantity" id="quantity"><?php   
		
		
		for($i=1;$i<=10;$i++)
		{
		echo  "<option value=".$i.">".$i."</option>";
		}
			  ?></select>
        </p>
	<button style="align-items: center" type="submit" name="btn_Q">QUAN</button>
</p>
	</form>
</body>
</html>