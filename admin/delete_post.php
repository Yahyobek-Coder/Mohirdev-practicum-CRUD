<?php

require_once "header.php";
require "../sql.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $post_row = getPostById($id);
    if(isset($_GET['confirm'])){
        deletePost($id);
        header("Location: /admin/news.php");
    }
}
?>
<a href='/admin/delete_post.php?id=<?=$id?>&confirm=0' class='btn btn-danger'>Delete</a>
<a href='/admin/news.php?id=<?=$id?>&confirm=1' class='btn btn-success'>Back</a>

<?php require '../admin/footer.php' ?>