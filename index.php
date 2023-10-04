<?php
session_start();
// echo __DIR__;
require __DIR__ . '/vendor/autoload.php';
use App\DB\Database as DB;
use App\Auth as Auth;
$user = Auth::User();
$conn = DB::connect();
$query = "select id,name from categories where 1";
$result = $conn->query($query);
// echo $result->num_rows;
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body>
    <div class="container">
        <?php 
        if($user){
            ?>
            <label for="">Welcome <?= $user['email'] ?></label> |
            <?= $user['role']=="2"?'<a href="dashboard/">Dashboard</a>':''; ?> | 
            <a href="logout.php">Logout</a> |

            <?php
        }
        else{
            ?>
    <a href="login.php">Login</a> | 
    <a href="register.php">Register</a>
            <?php
        }
        ?>
        

    <hr>
    <?php
if(isset($_SESSION['message'])){
    ?>
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Message = </strong> <?= $_SESSION['message']; ?>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
    <?php
    unset($_SESSION['message']);
}
    ?>
    <h1>Home Page</h1>
    <div class="row">
        <div class="col-3">
            <h3>Categories</h3>
            <!--  -->
            <ul class="list-group">
                <?php
                if($result->num_rows){
                    while($row = $result->fetch_assoc()){
?>
  <li class="list-group-item d-flex justify-content-between align-items-center">
    <a href="index.php?category=<?= $row['id'] ?>"> <?= $row['name'] ?></a>
    <span class="badge bg-primary rounded-pill">14</span>
  </li>
<?php
                    }
                }
                ?>


</ul>
            <!--  -->
        </div>
        <div class="col-9">
        <div class="row row-cols-1 row-cols-md-3 g-4">
  <div class="col">
    <div class="card h-100">
      <img src="assets/images/product.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card h-100">
      <img src="assets/images/product.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This is a short card.</p>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card h-100">
      <img src="assets/images/product.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content.</p>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card h-100">
      <img src="assets/images/product.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
      </div>
    </div>
  </div>
</div>
        </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>


