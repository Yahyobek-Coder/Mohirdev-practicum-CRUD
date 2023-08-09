<?php

require_once "header.php";
require "../sql.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $delete_row = TagdeleteById($id);
    if(isset($_GET['confirm'])){
        deleteTag($id);
        header("Location: /admin/tag.php");
    }
}
?>
<a href='/admin/delete_tag.php?id=<?=$id?>&confirm=0' class='btn btn-danger'>Delete</a>
<a href='/admin/tag.php?id=<?=$id?>&confirm=1' class='btn btn-success'>Back</a>

<?php require '../admin/footer.php' ?>