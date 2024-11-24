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
                        <table class="table table-striped table-product">
                            <tbody>
                                <tr>
                                    <td width="390">Try ChatBot</td>
                                    <td><button type="button" class="btn btn-primary btn-lg"><a href="" class="linku">See More</a></button></td>
                                </tr>
                                <tr>
                                    <td width="390">Try Image Generator</td>
                                    <td><button type="button" class="btn btn-primary btn-lg"><a href="" class="linku">See More</a></button></td>
                                </tr>
                                <tr>
                                    <td><button type="button" class="btn btn-primary btn-lg"><a href="index.php" class="linku">Go Back-></a></button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>