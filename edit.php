<?php 
	

 include_once("config.php");

 $id = $_GET['id'];

 $sql = "SELECT * FROM users WHERE id = :id";

 $sqlPrep = $connect->prepare($sql);

 $sqlPrep->bindParam(':id', $id);

 $sqlPrep->execute();

 $data = $sqlPrep->fetch();


?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit form</title>
</head>
<body>

	<form action="update.php" method="post">
		<input type="hidden" name="id" value="<?php echo $data['id']; ?>">
		<label>Email:</label><br>	
		<input type="email" name="email" value="<?php echo $data['email']; ?>"><br>	
		<label>Password:</label><br>	
		<input type="password" name="password" value="<?php echo $data['password']; ?>"><br><br>	
		<input type="submit" name="submit" value="Submit">
	</form>

</body>
</html>