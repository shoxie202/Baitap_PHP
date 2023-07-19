
<?php
require_once 'pdo.php';
$id = $_GET['id'];
$getinf = new Query();
$products = $getinf->select($id);
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Edit Product</title>
</head>
<body>
        <tbody>
        <?php 
        $i = 1; 
        foreach ($products as $product) : ?>
        
                <form id="" action="./edit-car.php" method="post">
                    <input type="hidden" value="<?= $product['id'] ?>" name="id">
                </form>
        <?php endforeach; 
        ?>
        </tbody>
<div class="container mt-3">
    <div class="container-fluid"><h3>Edit Category</h3></div>
    <a href="./index.php" class="btn btn-primary">Back</a>
    <form method="POST" action="./edit-car.php">
        <div class="mb-3">
            <label for="" class="form-label">Name</label>
            <input type="hidden" value="<?= $id ?>" name="id">
            <input required type="text" class="form-control" name="name" value = "<?= $product['name'] ?>">
            <label for="" class="form-label">Price</label>
            <input required type="text" class="form-control" name="price" value = "<?= $product['price'] ?>">
            <label for="" class="form-label">Category_id</label>
            <input required type="text" class="form-control" name="ca_id" value = "<?= $product['category_id'] ?>">
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
    </form>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>