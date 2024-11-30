<?php
session_start();

if(isset($_SESSION['user_id'])) {
	header("Location: index.php");
	exit;
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Log In</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="signin.css">
</head>
<body>

	<main class="form-signin w-50 m-auto">
	  <form action="loginLogic.php" method="POST">
	    <h1 class="h3 mb-3 fw-normal">Log In To Your Account</h1>

	    </div>
	    <div class="mb-2 py-2">
	      <input type="email" class="form-control py-3" id="floatingInput" placeholder="name@example.com" name="email">
	      <label for="floatingInput">Email address</label>
	    </div>
	    <div class="mb-2 py-2">
	      <input type="password" class="form-control py-3" id="floatingPassword" placeholder="Password" name="password">
	      <label for="floatingPassword">Password</label>
	    </div>

	    <button class="btn btn-bd-primary w-100 py-3" type="submit" name="submit">Log In</button>
	    
	  </form>
</main>

</body>
</html>