<?php
session_start(); 

include_once('config.php');

$sql = "SELECT * FROM products";
$prep = $connect->prepare($sql);
$prep->execute();
$models_data = $prep->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
  <link href="style.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <style>
    .dropdown-menu {
  min-width: 200px;
}
  </style>
</head>
<body>

<header>
  <div class="navbar navbar-dark bg-dark shadow-sm">
    <div class="container">
      <a href="#" class="navbar-brand d-flex align-items-center">
        <strong>GPT Market</strong>
      </a>

      <?php if (isset($_SESSION['username'])): ?>
        <div class="dropdown">
          <button class="btn btn-dark dropdown-toggle" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
            <span class="bi-person-circle"></span> <?php echo htmlspecialchars($_SESSION['username']); ?>
          </button>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
            <li><span class="dropdown-item-text">Logged in as <strong><?php echo htmlspecialchars($_SESSION['username']); ?></strong></span></li>
            <li><hr class="dropdown-divider"></li>
            <li>
              <form action="/Hackathon/logout.php" method="POST" class="d-inline">
                <button class="dropdown-item text-danger" type="submit">Logout</button>
              </form>
              
          </ul>
        </div>
      <?php else: ?>
        <!-- If user is not logged in -->
        <a href="/Hackathon/signup.php" class="btn btn-dark">
          <span class="bi-person-circle"></span> Sign Up
        </a>
      <?php endif; ?>
    </div>
  </div>
</header>

<main>
  <section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto headeri">
        <h1 class="fw-light">GPT Market</h1>
        <p class="lead text-body-secondary">Leading Market for AI models, tailor made for every business.</p>
        <p>
          <a href="#" class="btn btn-primary my-2">Contact Us</a>
          <a href="#" class="btn btn-secondary my-2">Gallery</a>
        </p>
      </div>
    </div>
  </section>

  <div class="album py-5 bg-body-black">
    <div class="container">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
    <?php foreach ($models_data as $model_data) { ?>
        <div class="col">
            <div class="card shadow-sm">
                <img src="<?php echo $model_data['model_image']; ?>" class="card-img-top" alt="Model Image" style="height: 225px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $model_data['model_name']; ?></h5>
                    <p class="card-text"><?php echo $model_data['model_description']; ?></p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <a href="view.php?id=<?php echo $model_data['id']; ?>" class="btn btn-sm btn-outline-secondary">View</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
     </div>
  </div>
</main>

<footer class="text-body-secondary py-5">
  <div class="container">
    <p class="float-end mb-1">
      <a href="#">Back to top</a>
    </p>
    <p class="mb-1">Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>
    <p class="mb-0">New to Bootstrap? <a href="/">Visit the homepage</a> or read our <a href="/docs/5.3/getting-started/introduction/">getting started guide</a>.</p>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
      return new bootstrap.Tooltip(tooltipTriggerEl);
    });
  });
</script>
</body>
</html>
