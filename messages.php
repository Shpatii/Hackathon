<?php

include_once("config.php");

$sql = "SELECT * FROM contact";

$sqlPrep = $connect->prepare($sql);
$sqlPrep->execute();

$contact = $sqlPrep->fetchAll();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="dashboard.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container-fluid">
<div class="row">
  <div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
    <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="sidebarMenuLabel">Company name</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2 active" aria-current="page" href="dashboard.php">
              <svg class="bi"><use xlink:href="#house-fill"/></svg>
              Users
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2" href="addModel.php">
              <svg class="bi"><use xlink:href="#file-earmark"/></svg>
              Add Model
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2" href="models.php">
              <svg class="bi"><use xlink:href="#cart"/></svg>
              Models
            </a>
          </li>
        </ul>

        

        <hr class="my-3">

        <ul class="nav flex-column mb-auto">
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2" href="logout.php">
              <svg class="bi"><use xlink:href="#gear-wide-connected"/></svg>
              Sign Out
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2" href="index.php">
              <svg class="bi"><use link:href="/index.php"/></svg>
              Back to Home
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>

  <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Admin Dashboard</h1>
      <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">          
        </div>      
        </button>
      </div>
    </div>


    <h2>Users</h2>
    <div class="table-responsive small">
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Full Name</th>
            <th scope="col">Email</th>
            <th scope="col">Subject</th>
            <th scope="col">Messages</th>
            <th scope="col">Delete</th>
          </tr>
        </thead>
  <tbody>

  <?php

  foreach ($contact as $contacts) { ?>
   
    <tr>
      <td><?php echo $contacts['id']; ?></td>
      <td><?php echo $contacts['name']; ?></td>
      <td><?php echo $contacts['email']; ?></td>
      <td><?php echo $contacts['subject']; ?></td>
      <td><?php echo $contacts['message']; ?></td>
      <td><button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="<?php echo $user['id']; ?>">
      Delete</td>
	
    </tr>
 <?php } ?>  
          
          
        </tbody>
      </table>
    </div>
  </main>

  <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete this message?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
        <a href="#" id="confirmDeleteBtn" class="btn btn-danger">Yes</a>
      </div>
    </div>
  </div>
</div>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
  const deleteModal = document.getElementById('deleteModal');
  const confirmDeleteBtn = document.getElementById('confirmDeleteBtn');

  deleteModal.addEventListener('show.bs.modal', function (event) {
    const button = event.relatedTarget; // Button that triggered the modal
    const userId = button.getAttribute('data-id'); // Extract user ID from data-id attribute
    confirmDeleteBtn.setAttribute('href', `delete.php?id=${userId}`); // Set the delete URL dynamically
  });
</script>
</body>
</html>
