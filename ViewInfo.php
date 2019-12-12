<?php
session_start();
		
		

	if(isset($_POST['Update'])) {
			//header('location: AdminHome.php');
	$id=$_POST['id'];
		$pass = $_POST['pass'];
		$cpass = $_POST['cpass'];
		$uname = $_POST['uname'];
		$email = $_POST['email'];
		$utype= $_POST['utype'];

		

		 if (empty($pass)==false && empty($cpass)==false) 
		 	{
          if($pass==$cpass){
            $conn=mysqli_connect('localhost','root','','web');
			$sql="update info SET pass='{$pass}',cpass='{$cpass}' where id='{$id}'";
			$set=mysqli_query($conn,$sql);
		header('location: viewinfo.php');
		mysqli_close($conn);
				}
		}

	}
	
		

		
elseif (isset($_POST['Back'])) {
			header('location: AdminHome.php');
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
		

		
		
if(isset($_COOKIE['uname'])){

?>



<!DOCTYPE html>
<html>
<head>
	<title>
		Info table
	</title>
</head>
<body>
	<table>
	<center>
	<tr>
						
						
						
						<a href = "logout.php"><h3>LogOut</h3></a></td>
					</tr>
					
					 
					
		
	

	<form method="POST" action="">
		<fieldset>	
		
			
			<table cellpadding="5px">
			<tr>
					<td>
		
			
			
				<td>
			Password <br><input type="password" name="pass" value="">
			</td>
			
			
				<td>
			Confirm Password<br><input type="password" name="cpass" value="">
			</td>
			

		
			
			
			
			<tr>
			<td style="border-top:1px solid #888;">
			<input type="submit" name="Add" value="Add"/>
			<input type="submit" name="Update" value="Update"/>
			<input type="submit" name="Delete" value="Delete"/>
			</td>
			</tr>

			
			</table>

			

		</fieldset>	
		

	</form>
<form method="POST" action="">
	<table>
				<tr>
				<td>
				<input type="submit" name="Back" value="Back" method="POST" action=""/>
				</td>
			</tr>
			</table>

</form>

</body>
</html>
<?php
}
else{
	header('location:signin.php');
}
?>