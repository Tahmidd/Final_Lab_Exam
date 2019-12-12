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
						
						
						<td width="100px"><a href="viewinfo.php">View Info</a></td>
						<br>
						<a href = "logout.php"><h3>LogOut</h3></a></td>
					</tr>
					
					 <tr>
                        <td colspan="11" style="border-top:4px solid #888;"></td>
                    </tr>
					
		
	
	</table></center>

<center>
	<table border="1">
		<thead>
		<tr>
			<th>ID</th>
			<th>Email</th>
			<th>Password</th>
			<th>User Name</th>				
			<th>User Type</th>
		</tr>	
          </thead>

          <tbody>
          	   <?php
          	  $conn=mysqli_connect('localhost','root','','web');
			$sql="select * from info";
			$get=mysqli_query($conn,$sql);
			
   if(count($get)>0){
	while ($user=mysqli_fetch_assoc($get)) {
	
	?>
					<tr>
						<td><?php echo $user["id"];?></td>
		          		<td><?php echo $user["email"];?></td>
		          		<td><?php echo $user["pass"];?></td>
		          		<td><?php echo $user["uname"];?></td>
		          		<td><?php echo $user["utype"];?></td>
		          		 <td><a href="edit.php?id=<?php echo $user['id'];?>"/>Edit</a></td>

		          	</tr>
		         	

    <?php
    		}
    	}
	
	?>	

         
			
			

			
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