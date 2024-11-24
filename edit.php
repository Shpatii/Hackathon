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
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="signin.css">
</head>
<body>

<main class="form-signin w-50 m-auto">
	  <form action="update.php" method="POST">
	    <h1 class="h3 mb-3 fw-normal">Edit/Update User</h1>

	     <div class="form-floating">
	      <input type="hidden" class="form-control" id="floatingInput" placeholder="Username" name="id" value="<?php echo $data['id']; ?>">
	      <label for="floatingInput">Id</label>
	    </div>
	    <div class="form-floating">
	      <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="username" value="<?php echo $data['username']; ?>">
	      <label for="floatingInput">Username</label>
	    </div>
	    <div class="form-floating">
	      <input type="email" class="form-control" id="floatingPassword" placeholder="Email" name="email" value="<?php echo $data['email']; ?>">
	      <label for="floatingPassword">Email</label>
	    </div>
		<div class="form-floating">
	      <input type="passwrd" class="form-control" id="floatingPassword" placeholder="Password" name="password" value="<?php echo $data['password']; ?>">
	      <label for="floatingPassword">Email</label>
	    </div>
	    <button class="btn btn-primary w-100 py-2" type="submit" name="submit" value="submit">Submit</button>
	  </form>
	  <p class="mt-5 mb-3 text-body-secondary">Go back to dashboard <a href="dashboard.php">here</a></p>
</main>


</body>
</html>