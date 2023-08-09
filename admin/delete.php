<?php

require_once "header.php";
require "../sql.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $category_row = getCategoryById($id);
    if(isset($_GET['confirm'])){
        deleteCategory($id);
        header("Location: category.php");
    }
}
?>
<a href='/admin/delete.php?id=<?=$id?>&confirm=0' class='btn btn-danger'>Delete</a>
<a href='/admin/category.php?id=<?=$id?>&confirm=1' class='btn btn-success'>Back</a>