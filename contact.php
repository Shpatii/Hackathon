<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Us</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
 body {
      background-color: #121212; /* Dark gray background */
      color: #ffffff; /* White text */
      font-family: Arial, sans-serif;
    }

    /* Container styling */
    .container {
      background-color: #1e1e1e; /* Slightly lighter gray */
      border-radius: 10px;
      padding: 20px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.7);
    }

    /* Form elements */
    .form-label {
      color: #c9c9c9; /* Light gray for labels */
    }

    .form-control {
      border: 1px solid #c934eb; /* Purple border for inputs */
      border-radius: 5px;
      color: #000000; /* Black text inside inputs */
    }

    .form-control:focus {
      border-color: #a51ed5; /* Slightly darker purple on focus */
      box-shadow: 0 0 5px rgba(201, 52, 235, 0.5); /* Purple glow */
    }

    /* Button styling */
    .btn-primary {
      background-color: #c934eb; /* Purple button */
      border: none;
      padding: 10px 20px;
      font-size: 1rem;
      border-radius: 25px;
      transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .btn-primary:hover {
      background-color: #a51ed5; /* Darker purple on hover */
      transform: scale(1.05);
    }

    /* Title */
    h1 {
      color: #ffffff;
    }
  </style>
</head>
<body>
  <div class="container py-5">
    <h1 class="text-center mb-4">Contact Us</h1>
    <form action="contactLogic.php" method="POST" class="w-75 m-auto">
      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Your Full Name" required>
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Your Email Address" required>
      </div>
      <div class="mb-3">
        <label for="subject" class="form-label">Subject</label>
        <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" required>
      </div>
      <div class="mb-3">
        <label for="message" class="form-label">Message</label>
        <textarea class="form-control" id="message" name="message" rows="5" placeholder="Your Message" required></textarea>
      </div>
      <button type="submit" class="btn btn-primary w-80">Send Message</button>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
