<?php

require_once 'pdo.php';
require_once 'helper.php';

$request = $_POST;

 $name = $request['name'];
 $id = $request['id'];
 $price = $request['price'];
 $ca_id = $request['ca_id'];

// update($name, $price, $ca_id, $id);
$getinf = new Query();
$products = $getinf->update($name, $price, $ca_id, $id);
redirectHome();

