<?php
session_start();
require __DIR__ . '/../vendor/autoload.php';

use App\DB\Database as DB;

// Post method
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conn = DB::connect();
    $idtoedit = $_POST['id'];
    $fname = $conn->escape_string($_POST['name']);
    $error = false;

    if (!$error) {
        // Update the 'category' table with the 'name' column
        $editquery = "UPDATE categories SET name='{$fname}' WHERE id='{$idtoedit}' LIMIT 1";
        $conn->query($editquery);

        if ($conn->affected_rows) {
            $_SESSION['message'] = "Category Updated Successfully";
            header("location: categories.php");
        } else {
            $message = "ERROR!!";
        }

        $conn->close();
    }
}
// Get method
if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_VALIDATE_INT);
    $conn = DB::connect();
    $query = "SELECT * FROM categories WHERE id={$id}";
    $result = $conn->query($query);

    if (!$result->num_rows) {
        echo "No category Data Found!!!";
        exit;
    }

    $row = $result->fetch_assoc();
    $conn->close();
}
?>

<?php
$page = "category Edit";
include "inc/header.php";
?>
<div id="layoutSidenav">
    <?php include "inc/sidebar.php"; ?>
    <div id="layoutSidenav_content">
        <main>
            <form class="mx-1 mx-md-4" action="categoryEdit.php?id=<?= $id; ?>" method="post">
                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                        <input type="text" name="name" id="form3Example1c" class="form-control" value="<?= $row['name'] ?>" />
                        <label class="form-label" for="form3Example1c"> Name</label>
                    </div>
                </div>
                <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" class="btn btn-primary btn-lg">Update</button>
                </div>

            </form>
        </main>
        <?php include "inc/footer.php" ?>