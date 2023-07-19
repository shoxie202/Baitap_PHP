<?php

require_once 'pdo.php';
require_once 'helper.php';

$request = $_POST;

$category = [
    'name' => $request['name'],
    'id' => $request['id'],
];

$getinf = new Query();
$getinf->update($category);
// update($category);
redirectHome();

