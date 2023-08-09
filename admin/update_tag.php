<?php

require_once "header.php";
require "../sql.php";

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location: login.php');
};

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $tag_row = getTagById($id);
}

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    updateTagList($id, $name);
    header("Location: /admin/tag.php");
    exit;
}

?>

<div class="container">
    <div class="row">
        <form method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tag name</label>
                <input type="text" class="form-control" name="name" value="<?=$tag_row['name'] ?>">
            </div>
            <button type="submit" name="update" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>

<?php require '../admin/footer.php' ?>