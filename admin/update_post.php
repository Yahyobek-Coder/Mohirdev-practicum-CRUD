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
    $post_row = getPostById($id);
}



if (isset($_POST['update'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $author_id = $_POST['author_id'];
    $created_at = $_POST['created_at'];
    updatePostList($id, $title, $content, $author_id, $created_at);
    header("Location: /admin/news.php");
    exit;
}

?>

<div class="container">
    <div class="row">
        <form method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Post name</label>
                <input type="text" class="form-control" name="title" value="<?=$post_row['title'] ?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Content name</label>
                <input type="text" class="form-control" name="content" value="<?=$post_row['content'] ?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Content name</label>
                <input type="text" class="form-control" name="author_id" value="<?=$post_row['author_id'] ?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Create time</label>
                <input type="text" class="form-control" name="created_at" value="<?=$post_row['created_at'] ?>">
            </div>
            <button type="submit" name="update" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>

<?php require '../admin/footer.php' ?>