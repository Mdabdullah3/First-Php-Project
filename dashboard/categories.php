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
$query = "select * from categories where 1";
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
                <h3>Category Management</h3>
                <a class="btn btn-outline-primary" href="categoryAdd.php"> <i class="bi bi-plus"></i></a>
            </div>

            <table class="table table-hover">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Action</th>
                </tr>
                <?php
                if ($result->num_rows) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['name']}</td>
            <td>{$row['created']}</td>
            <td>{$row['updated']}</td>
            <td>
            <a href='categoryEdit.php?id={$row['id']}' title='edit'><i class='bi bi-pencil-square'></i></a> | 
            <a onclick=\"return confirm('Are you sure?')\" href='categoryDelet.php?id={$row['id']}' title='delete'><i class='bi bi-trash3'></i></a>
            </td>
            </tr>";
                    }
                }
                ?>
            </table>
        </main>
        <?php include "inc/footer.php" ?>