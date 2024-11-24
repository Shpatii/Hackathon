
  <?php
include_once('config.php'); 

if (isset($_POST['submit'])) {

    $model_name = $_POST['model_name'];
    $model_description = $_POST['model_description'];

    if (isset($_FILES['model_image']) && $_FILES['model_image']['error'] == 0) {


        $file_name = $_FILES['model_image']['name'];
        $file_tmp = $_FILES['model_image']['tmp_name'];

        
        $upload_dir = 'images/'; 

        
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }

      
        $file_extension = pathinfo($file_name, PATHINFO_EXTENSION);
        $new_file_name = uniqid('model_', true) . '.' . $file_extension;


        $target_file = $upload_dir . $new_file_name;

        if (move_uploaded_file($file_tmp, $target_file)) {


            $sql = "INSERT INTO products (model_name, model_description, model_image) 
                    VALUES (:model_name, :model_description, :model_image)";
            
            $prep = $connect->prepare($sql);
            $prep->bindParam(':model_name', $model_name);
            $prep->bindParam(':model_description', $model_description);
            $prep->bindParam(':model_image', $target_file); 

            $prep->execute();


            header("Location: addModel.php");
        } else {
            echo "Error uploading the file.";
        }
    } else {
        echo "No file uploaded or there was an error with the file.";
    }
}
?>
