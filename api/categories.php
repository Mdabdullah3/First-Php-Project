<?php
require "xallow.php";
require __DIR__ . '/../vendor/autoload.php';
use App\DB\Database as DB;
$conn = DB::connect();
$q = "select * from categories";
$r = $conn->query($q);
$categories = [];
if($r->num_rows){
while($row = $r->fetch_assoc()){
    $categories[] = $row;
}
echo json_encode(['categories'=>$categories]);
}
