<?php 

include_once('config.php');

$id = $_GET['id'];

$sql = "SELECT * FROM products WHERE id=:id";
$sqlPrep = $connect->prepare($sql);
$sqlPrep->bindParam(":id", $id);
$sqlPrep->execute();
$model_data = $sqlPrep->fetch();

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="view.css">
    <title>Details page</title>
</head>
<body>

<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-5 col-md-5 col-sm-6">
                    <div class="white-box text-center"><img width="auto" height="auto" src=" <?php echo $model_data['model_image']; ?>" class="img-responsive"></div>
                </div>
                <div class="col-lg-7 col-md-7 col-sm-6">
                    <h4 class="box-title mt-5"><?php echo $model_data['model_name']; ?></h4>
                    <p><?php echo $model_data['model_description']; ?></p>
                
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <h3 class="box-title mt-5">More Info</h3>
                    <div class="table-responsive">
                    <table class="table table-product bg-dark">
    <tbody>
        <tr> 
            <td class="bg-cell-header" width="390">Try ChatBot</td>
            <td class="bg-cell-highlight"><button type="button" class="btn btn-primary btn-lg"><a href="chatbot.php" class="linku">See More</a></button></td>
        </tr>
        <tr>
            <td class="bg-cell-header" width="390">Try Image Generator</td>
            <td class="bg-cell-highlight"><button type="button" class="btn btn-primary btn-lg"><a href="generator.php" class="linku">See More</a></button></td>
        </tr>
        <tr>
            <td class="bg-cell-header" width="390">Go Back to Home Page</td>
            <td class="bg-cell-highlight"><button type="button" class="btn btn-primary btn-lg"><a href="index.php" class="linku">Go Back-></a></button></td>
        </tr>
        <tr> 
            <td class="bg-cell-header" width="390">Pricing</td>
            <td class="bg-cell-highlight"><button type="button" class="btn btn-primary btn-lg"><a href="contact.php" class="linku">Contact Us</a></button></td>
        </tr>
    </tbody>
</table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .table-product {
        width: 100%;
        margin: 20px auto;
        border-collapse: collapse;
        font-family: Arial, sans-serif;
        color: #ffffff;
    }

    .table-product tbody tr {
        border-bottom: 1px solid #333;
    }

    td .

    .table-product td {
        padding: 15px 20px;
        vertical-align: middle;
    }

    /* Dark-themed cell background colors */
    .table-product .bg-cell-header {
        background-color: #2d2d2d; /* Deep Black */
        color: #fff;
    }

    .table-product .bg-cell-highlight {
        background-color: #2d2d2d; /* Dark Gray */
    }

    .table-product .bg-cell-secondary {
        background-color: #2d2d2d; /* Slightly Lighter Gray */
    }

    .btn-primary {
        font-size: 1em;
        padding: 10px 20px;
        border-radius: 25px;
        background-color: #c934eb; /* Purple */
        border: none;
        transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .btn-primary a {
        color: #fff;
        text-decoration: none;
    }

    .btn-primary:hover {
        background-color: #a51ed5;
        transform: scale(1.05);
    }

    .bg-dark {
        background-color: #121212; /* Ultra-dark background */
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.7);
    }
</style>
</body>
</html>