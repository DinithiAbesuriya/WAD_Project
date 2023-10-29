<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
	
</head>

<body>
   
	      <form id="form1" name="form1" method="post" action="TEST3.php">
   
    <p>&nbsp; </p>
	   
	 <p>
		  
           <label for="checkbox">Checkbox </label>
		 </p>
	<p><?php
		
		echo "See";	
		
	if(isset($_GET['catergoryid']))
	{
	$catergory=$_GET['catergoryid'];
		echo $catergory;
	}
		$i=1;
		
			 echo "<input type='checkbox' name='box$i'>Remove";
			$_SESSION['check'."$i"]=""."box$i";
	
		
		
			
		if(isset($_POST['btn']))
		{
		if(isset($_POST[$_SESSION['check'."$i"]]))
		{echo "checked";
			
		}
		}
		
		?></p>
			  

		 <p> <button style="align-items: center" type="submit" name="btn" >Add to cart</button></p>
			  <P><button style="align-items: center" type="submit" name="btn" >cHECK</button></p></P>
		 <table width="563" height="192" border="1">
			 
		   <tbody>
		     <tr>
		       <td width="180">1</td>
		       <td width="132" bordercolorlight="white">2</td>
		       <td width="229" bordercolorlight="white" bordercolordark="white">3</td>
	         </tr>
		     <tr>
		       <td>4</td>
		       <td>5</td>
		       <td>6</td>
	         </tr>
	       </tbody>
</table>
		
			         
</body>
	</form>
</html>