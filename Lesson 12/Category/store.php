<?php
require_once 'pdo.php';
require_once 'helper.php';

$request = $_POST;

$category = [
    'name' => $request['name'],
];

// create($category);
$getinf = new Query();
$getinf->create($category);
redirectHome();
