<?php
session_start();
require __DIR__ . '/../vendor/autoload.php';
use App\DB\Database as DB;
//for authorization start
use App\Auth as Auth;
Auth::AdminCheck();
// if(!Auth::isAdmin()){ 
//     header("location: ../index.php");
//     die("You are not admin");
//  } 
 //for authorization end
$conn = DB::connect();
$query = "select * from users where 1";
$result = $conn->query($query);
// echo $result->num_rows;
$conn->close();
?>
<?php 
$page = "Users Management";
include "inc/header.php";
?>
        <div id="layoutSidenav">
<?php include "inc/sidebar.php"; ?>
            <div id="layoutSidenav_content">
                <main>
                <?php include "inc/message.php"; ?>  
                <div class="d-flex justify-content-between">
                <h3>User Management</h3>
                <a class="btn btn-outline-primary" href="useradd.php"> <i class="bi bi-plus"></i></a>
                </div>              

<table class="table table-hover">
<tr>
    <th>ID</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Email</th>
    <th>User Role</th>
    <th>Created At</th>
    <th>Action</th>
</tr>    
    <?php
    if($result->num_rows){
        while($row = $result->fetch_assoc()){
            echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['firstname']}</td>
            <td>{$row['lastname']}</td>
            <td>{$row['email']}</td>
            <td>{$row['role']}</td>
            <td>{$row['created']}</td>
            <td>
            <a href='useredit.php?id={$row['id']}' title='edit'><i class='bi bi-pencil-square'></i></a> | 
            <a onclick=\"return confirm('Are you sure?')\" href='userdelete.php?id={$row['id']}' title='delete'><i class='bi bi-trash3'></i></a>
            </td>
            </tr>";
        }
    }
    ?>
    </table>
                </main>
                <?php include "inc/footer.php" ?>
