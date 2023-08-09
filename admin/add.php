<?php

require_once "header.php";
require "../sql.php";

if (isset($_POST['send2'])){
    $title = $_POST['title'];
    addCategory($title);
    header("Location: /admin/category.php");exit;
}

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location: login.php');
};

?>

<div class="container">
    <div class="row">
        <form method="post">
            <h2>yangi post qo'shish</h2>
            <div class="mb-3">
                <label for="category_name_input" class="form-label">Category name</label>
                <input type="text" class="form-control" id="category_name_input" name="title">
            </div>
            <button type="submit" name="send2" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>

<?php require '../admin/footer.php' ?>