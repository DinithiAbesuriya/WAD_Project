<?php session_start() ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Registration Page</title>
<link rel="stylesheet" type="text/css" href="CSS/RegistrationPageStyle.css"> 
<style type="text/css">
	body {
    background-image: url("../Images/Glitter_ Green. Blue. Glitter Sparkle Collage.png");
    color: #2B1812;
    font-size: 12px;
		background-repeat:repeat;
		
	
}
	a{
		align-content: center;
		color: black;
		font-size: 20px;
		
	}
</style>
	
		<script type="text/javascript">
			function validateEmail()
			{
				var email=document.getElementById("txtEmail").value;
				var length=email.length;
				var character_index,valid1,valid2;
				for(var i=0;i<=length;i++)
					{
						if(email[i]=='@')
							{
								character_index=i;
								valid1=true;
								
							}
					}
				var split=email.substring(character_index,length);
				
				if(split=="@gmail.com"||split=="@yahoo.com")
					{
						valid2=true;
					}
				else{
					valid2=false;
				}
				if(valid1==true&&valid2==true)
					{
						
						return true;
					}
				else{
					alert("Please enter a valid email");
					event.preventDefault();

					return false;
					
				}
				
			}
			function validateContact()
			{
				var contact=document.getElementById("txtContact").value;
				var wrong_length;
				if(!isNaN(contact))
					{
						
						var length=contact.length;
						
						if(length==10)
							{
						      return true;
							}
						else{
							wrong_length=true;
						}
					}
				else{
					alert("Please enter a valid contact");
					event.preventDefault();
					return false;
					
					
				}
				if(wrong_length==true)
						{
							alert("Please enter a valid contact");
							event.preventDefault();
								return false;
						}
				
			}
			function validatePassword()
			{
				var password=document.getElementById("txtpassword").value;
				var Confirm_password=document.getElementById("txtCpassword").value;
				if(password==Confirm_password)
					{
						return true;
					}
				else{
					alert("Please enter the same password for confirm password");
					event.preventDefault();
					return false;
				}
			}
			function validate()
			{
				if(validateEmail()&&validateContact()&&validatePassword())
					{
						return true;
					}
				else{
					return false;
				}
			}
			
	</script>
</head>

<body> 
	<form id="form1" name="form1" method="post">
		<?php
				if(isset($_POST["submit"]))
				{
					$fullname=$_POST["txtFullName"];
					$bday=$_POST["date"];
					
					$email=$_POST["txtEmail"];
					$contact=$_POST["txtContact"];
					$address=$_POST["txtEmail"];
					$password=$_POST["txtpassword"];
					
					$gender=$_POST["gender"];
						
						
$con=mysqli_connect("localhost","root","","website_it21712654");
if(!$con)
{
die("Cannot connect to DB Server");
}
$sql="INSERT INTO `user` (`email`, `fullName`, `contact`, `address`, `password`, `bday`, `gender`) VALUES ('".$email."', '".$fullname."', '".$contact."', '".$address."', '".$password."', '".$bday."', '".$gender."');";
mysqli_query($con,$sql);
					  header('Location:LoginPage.php');
								}

				
				?>
  <table width="156" height="137" border="0" align="left">
    <tbody>
      <tr>
        <td width="148" height="125"><img src="../Images/logo1.png" width="307" height="108" alt=""/></td>
      </tr>
    </tbody>
  </table>
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
	</form>
<table width="1181" height="701" border="1" align="center">
  <tbody>
    <tr>
      <td height="695"><table width="373" height="87" border="2" bgcolor="#FAF9F9" align="center">
        <tbody>
          <tr>
            <td align="center" width="580" height="79" style="font-size: 24px; font-family: Consolas, 'Andale Mono', 'Lucida Console', 'Lucida Sans Typewriter', Monaco, 'Courier New', monospace; text-align: center; color: #FA031A;">LIFE ISN'T PERFECT BUT YOUR OUTFIT CAN BE</td>
          </tr>
        </tbody>
      </table>
        <h1 align="center">REGISTRATION</h1>
      <form id="form1" name="form1" method="post">
        <table width="736" height="463" border="1" align="center">
          <tbody>
            <tr>
              <td bgcolor="#FCFCFC" style="text-align: center"><p>Full Name</p></td>
              <td> <input type="text" name="txtFullName" id="txtFullName" autocomplete="on" required ></td>
            </tr>
            <tr>
              <td bgcolor="#FCFCFC" style="text-align: center" ><p>Birthday Date</p></td>
              <td><input type="date" name="date" id="date" width="100%"></td>
            </tr>
            <tr>
              <td bgcolor="#FCFCFC" style="text-align: center"><p>Gender</p></td>
              <td>
                <select name="gender" id="gender">
                  <option value="Female">Female</option>
                  <option value="Male">Male</option>
                </select></td>
            </tr>
            <tr>
              <td bgcolor="#FEFEFE" style="text-align: center"><p>Email Address</p></td>
              <td><input type="text" name="txtEmail" id="txtEmail"  required></td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF" style="text-align: center"><p>Contact Number</p></td>
              <td><input type="text" name="txtContact" id="txtContact"></td>
            </tr>
            <tr>
              <td bgcolor="#FAFAFA" style="text-align: center"><p>Delivery Address</p></td>
              <td><textarea name="txtAddress" id="txtAddress"  required ></textarea></td>
            </tr>
            <tr>
              <td bgcolor="#FCFCFC" style="text-align: center"><p>Password</p></td>
              <td><input type="password" name="txtpassword" id="txtpassword" required></td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF" style="text-align: center"><p>Confirm Password</p></td>
              <td><input type="password" name="txtCpassword" id="txtCpassword"></td>
            </tr>
            <tr>
              <td height="45" colspan="2" bgcolor="#FAFAFA" style="text-align: center"><input type="radio" name="rdoption" id="" value="radio">
                Send Emails </td>
			
              </tr>
            <tr>
              <td height="77" colspan="2" style="text-align: center"><input type="submit" name="submit" id="submit" value="Submit" onClick="validate()">
                <input type="reset" name="reset" id="reset" value="Reset"></td>
            </tr>
          </tbody>
      </table>
        <h1>&nbsp;</h1>
      </form></td>
    </tr>
  </tbody>
</table>
</body>
</html>
