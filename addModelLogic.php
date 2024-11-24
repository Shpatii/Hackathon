<!-- <<--?php 

  include_once('config.php');

  if (isset($_POST['submit'])) {

  	$model_name = $_POST['model_name'];
  	$model_description = $_POST['model_description'];
  	$model_image = $_POST['model_image'];


  	$sql = "INSERT INTO products (model_name, model_description, model_image) VALUES (:model_name, :model_description, :model_image)";

  	$prep = $connect->prepare($sql);

  	$prep->bindParam(':model_name', $model_name);
  	$prep->bindParam(':model_description', $model_description);
  	$prep->bindParam(':model_image', $model_image);

  	$prep->execute();

  	header("Location: index.php");

  }	 -->
  <?php
include_once('config.php'); // Include your database connection

if (isset($_POST['submit'])) {

    // Get the data from the form
    $model_name = $_POST['model_name'];
    $model_description = $_POST['model_description'];

    // Check if a file was uploaded
    if (isset($_FILES['model_image']) && $_FILES['model_image']['error'] == 0) {

        // File information
        $file_name = $_FILES['model_image']['name'];
        $file_tmp = $_FILES['model_image']['tmp_name'];

        // Set the directory where the file will be uploaded
        $upload_dir = 'images/'; // The folder where the images will be stored

        // Create the directory if it doesn't exist
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }

        // Generate a unique filename to avoid overwriting
        $file_extension = pathinfo($file_name, PATHINFO_EXTENSION);
        $new_file_name = uniqid('model_', true) . '.' . $file_extension;

        // Set the target file path
        $target_file = $upload_dir . $new_file_name;

        // Move the uploaded file to the target directory
        if (move_uploaded_file($file_tmp, $target_file)) {

            // Prepare the SQL query to save the data (including the image path)
            $sql = "INSERT INTO products (model_name, model_description, model_image) 
                    VALUES (:model_name, :model_description, :model_image)";
            
            $prep = $connect->prepare($sql);
            $prep->bindParam(':model_name', $model_name);
            $prep->bindParam(':model_description', $model_description);
            $prep->bindParam(':model_image', $target_file); // Save the path of the image (relative path)

            // Execute the query
            $prep->execute();

            // Redirect to another page after success
            header("Location: index.php");
        } else {
            echo "Error uploading the file.";
        }
    } else {
        echo "No file uploaded or there was an error with the file.";
    }
}
?>
