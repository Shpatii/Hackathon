<!DOCTYPE html>
<html>
<head>
	<title>Sign up</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="/signin.css">
</head>
<body>

	<main class="form-signin w-100 m-auto">
	  <form action="signupLogic.php" method="POST">
	    <h1 class="h3 mb-3 fw-normal">Sign up</h1>

	     <div class="form-floating">
	      <input type="text" class="form-control" id="floatingInput" placeholder="Username" name="username">
	      <label for="floatingInput">Username</label>
	    </div>
	    <div class="form-floating">
	      <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
	      <label for="floatingInput">Email address</label>
	    </div>
	    <div class="form-floating">
	      <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
	      <label for="floatingPassword">Password</label>
	    </div>
	    <button class="btn btn-primary w-100 py-2" type="submit" name="submit">Sign up</button>
	  </form>
      <p class="mt-5 mb-3 text-body-secondary">Already have an account ? <a href="login.php">Log In</a> here.</p>
</main>

</body>
</html>