<?php
    require_once 'pdo.php';
    $products = all();
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>
<body>
<div class="container mt-3">
    <div class="container-fluid"><h3>List Category</h3></div>
    <a class="btn btn-success" href="./create.php">Create</a>
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">STT</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Category_id</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php $i = 1; 
        foreach ($products as $product) : ?>
            
        <tr>
            <th scope="row"><?= $i++ ?></th>
            <td><?= $product['name'] ?></td>
            <td><?= $product['price'] ?></td>
            <td><?= $product['category_id'] ?></td>
            <td>
                <form id="delete_<?= $product['id'] ?>" action="./delete.php" method="post">
                    <input type="hidden" value="<?= $product['id'] ?>" name="id">
                    <button type="button" class="btn btn-danger" onclick="confirmDelete(<?= $product['id'] ?>)">Delete</button>
                    <a class="btn btn-primary" href="edit.php?id=<?= $product['id'] ?>">Edit</a>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script>
    function confirmDelete(id) {
        let result = confirm('Are you sure?');
        if (result === true) {
            document.getElementById(`delete_${id}`).submit();
        }
    }
</script>
</body>
</html>