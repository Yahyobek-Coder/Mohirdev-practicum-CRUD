<?php

require_once "header.php";
require "../sql.php";

if (isset($_POST['send3'])){
    $name = $_POST['name'];
    addTag($name);
    header("Location: /admin/tag.php");exit;
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
            <h2>Yangi Tag qo'shish</h2>
            <div class="mb-3">
                <label for="tag_name_input" class="form-label">Tag name</label>
                <input type="text" class="form-control" id="tag_name_input" name="name">
            </div>
            <button type="submit" name="send3" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>

<?php require '../admin/footer.php' ?>