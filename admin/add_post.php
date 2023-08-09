<?php
require_once "header.php";
require "../sql.php";

if (isset($_POST['send'])){
    $title = $_POST['title'];
    $content = $_POST['content'];
    $authorId = $_POST['author_id'];
    addPost($title, $content, $authorId);
    header("Location: /admin/news.php");exit;
}

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location: login.php');
};

$taglist = getTagList(1, true);
?>

<div class="container">
    <div class="row">
        <form method="post">
            <h2>yangi post qo'shish</h2>
            <div class="mb-3">
                <label for="post_title_input" class="form-label">Title</label>
                <input type="text" class="form-control" id="post_title_input" name="title">
            </div>
            <div class="mb-3">
                <label for="post_content_input" class="form-label">Content</label>
                <input type="text" class="form-control" id="post_content_input" name="content">
            </div>

            <div class="mb-3">
                <label for="post_author_input" class="form-label">Muallif</label>
                    <input type="text" class="form-control" id="post_content_input" name="author_id">

            </div>
            <button type="submit" name="send" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>

<?php require '../admin/footer.php' ?>