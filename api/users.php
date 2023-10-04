<?php
require "xallow.php";
require __DIR__ . '/../vendor/autoload.php';
use App\DB\Database as DB;
$conn = DB::connect();
if(isset($_GET['id'])){
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $q = "select id,email,role from users where id ='{$id}'";
}
else{
    $q = "select id,email,role from users where 1";
}
$r = $conn->query($q);
$users = [];
if($r->num_rows){
while($row = $r->fetch_assoc()){
    $users[] = $row;
}
echo json_encode(['users'=>$users,'total'=>$r->num_rows]);
}
