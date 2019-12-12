<?php

if(isset($_POST['signup'])){
		$id=$_POST['id'];
		$pass = $_POST['pass'];
		$cpass = $_POST['cpass'];
		$uname = $_POST['uname'];
		$email = $_POST['email'];
		$utype= $_POST['utype'];
		
			
		
		if(empty($id)==true || empty($pass)==true || empty($cpass) == true ||empty($uname) == true ||empty($email) == true ||empty($utype) == true){
			echo "fill all!";
		}
		elseif ($pass!=$cpass) {
		echo "password doesn't match";	
		} else{
			if (checkUniqueValue($uname)) {
				echo "Sorry. This username is already taken.";
				//header('location: Registration.php');
				
			
				//exit();
			}

			if (checkUniqueValue($email)) {
				echo "Sorry. This email has been used already.";
				//header('location: Registration.php');
				
				//exit();
			}
			if (checkUniqueValue($id)) {
				echo "Sorry. This id has been used already.";
				//header('location: Registration.php');
				
				//exit();
			}
			else{
            $conn=mysqli_connect('localhost','root','','web');
			$sql="insert into info(id,pass,cpass,email,uname,utype) values('{$id}','{$pass}','{$cpass}','{$email}','{$uname}','{$utype}')";
			$set=mysqli_query($conn,$sql);
		header('location: signin.php');
		mysqli_close($conn);
}
	}
			}


			function checkUniqueValue($value){
				 $conn=mysqli_connect('localhost','root','','web');						

			$found = 0;
						$sql="select * from info where uname='{$value}' or email='{$value}'";
			$get=mysqli_query($conn,$sql);
			$user=mysqli_fetch_assoc($get);
						if($user["uname"] == $value){
							$found = 1;

						}
						if($user["email"] == $value){
							$found = 1;
						}
					
			return $found;
		}

?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<center>
	<form method="POST" action="Registration.php">
			
			<legend><b>REGISTRATION<br><hr width="150"></b></legend>
			<table cellpadding="5px">
			<tr>
				<td>
					ID:<br><input type="number" name="id" value="">
				</td>
			</tr>
			<tr>
				<td>
					Password <br><input type="password" name="pass" value="">
			</td>
			</tr>
			<tr>
				<td>
					Confirm Password<br><input type="password" name="cpass" value="">
			</td>
			</tr>
			
						<tr>
				<td>
					Name:<br><input type="name" name="uname" value="">
			</td>
			</tr>
			
						<tr>
				<td>
					Email:<br><input type="email" name="email" value="">
			</td>
			</tr>
			
			<tr>
			<td>
			<font > User Type <i>[USER/Admin]</i> </font><br>
			<select name="utype">
			<option  value="Employee">User</option>
			<option  value="Admin">Admin</option>
			</select>
			
			</td>
			
			</tr>
			
			<tr>
			<td style="border-top:1px solid #888;">
			<input type="submit" name="signup" value="Register"/>

			 <a href="signin.php">LogIn</a>
			</td>
			</tr>
			
			</table>

			


	</form>


</body>
</html>