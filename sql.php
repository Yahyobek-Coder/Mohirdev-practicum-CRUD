<?php
require './constants.php';
function getCategoryList($page, $withoutLimit = false){

    require 'config.php';
    $offset = ($page - 1) * LIMIT;
    if($withoutLimit){
        $sql = "select * from category";
        $state = $conn->prepare($sql);
    } else {
        $sql = "select * from category limit :offset, :limit";
        $state = $conn->prepare($sql);
        $state->bindvalue(":limit", LIMIT, PDO::PARAM_INT);
        $state->bindvalue(":offset", $offset, PDO::PARAM_INT);
    }
    $state->execute();
    $result = $state->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function addCategory($title){
    require 'config.php';
    $sql_insert = "insert into category (title) values(:title)";
    $state = $conn->prepare($sql_insert);
    $state->bindValue(":title", $title);
    $state->execute();
}

function getPagination(){
    require 'config.php';
    $sql = "select * from category";
    $state = $conn->prepare($sql);
    $state->execute();
    $total_rows = $state->rowCount();
    return ceil($total_rows / LIMIT);
}

function getPagination2(){
    require 'config.php';
    $sql = "select * from post";
    $state = $conn->prepare($sql);
    $state->execute();
    $total_rows = $state->rowCount();
    return ceil($total_rows / LIMIT);
}

function getPagination3(){
    require 'config.php';
    $sql = "select * from tag";
    $state = $conn->prepare($sql);
    $state->execute();
    $total_rows = $state->rowCount();
    return ceil($total_rows / LIMIT);
}

function getCategoryById($id){
    require 'config.php';
    $sql = "select * from category where id = :id";
    $state = $conn->prepare($sql);
    $state->bindValue(":id", $id, PDO::PARAM_INT);
    $state->execute();
    return $state->fetch(PDO::FETCH_ASSOC);
}

function TagdeleteById($id){
    require 'config.php';
    $sql = "select * from tag where id = :id";
    $state = $conn->prepare($sql);
    $state->bindValue(":id", $id, PDO::PARAM_INT);
    $state->execute();
    return $state->fetch(PDO::FETCH_ASSOC);
}

function getTagById($id){
    require 'config.php';
    $sql = "select * from tag where id = :id";
    $state = $conn->prepare($sql);
    $state->bindValue(":id", $id, PDO::PARAM_INT);
    $state->execute();
    return $state->fetch(PDO::FETCH_ASSOC);
}

function getPostById($id){
    require 'config.php';
    $sql = "select * from post where id = :id";
    $state = $conn->prepare($sql);
    $state->bindValue(":id", $id, PDO::PARAM_INT);
    $state->execute();
    return $state->fetch(PDO::FETCH_ASSOC);
}

function updateCategoryList($id, $title){
    require 'config.php';
    $sql = "update category set title = :title where id = :id";
    $state = $conn->prepare($sql);
    $state->bindValue(":id", $id, PDO::PARAM_INT);
    $state->bindValue(":title", $title);
    $state->execute();
}
function updateTagList($id, $name){
    require 'config.php';
    $sql = "update tag set name = :name where id = :id";
    $state = $conn->prepare($sql);
    $state->bindValue(":id", $id, PDO::PARAM_INT);
    $state->bindValue(":name", $name);
    $state->execute();
}

function updatePostList($id, $title, $content, $author_id, $created_at){
    require 'config.php';
    $sql = "update post set title = :title, content = :content, author_id = :author_id, created_at = :created_at where id = :id";
    $state = $conn->prepare($sql);
    $state->bindValue(":id", $id, PDO::PARAM_INT);
    $state->bindValue(":title", $title);
    $state->bindValue(":content", $content);
    $state->bindValue(":author_id", $author_id);
    $state->bindValue(":created_at", $created_at);
    $state->execute();
}

function deleteCategory($id){
    require 'config.php';
    $sql = "delete from category where id = :id";
    $state = $conn->prepare($sql);
    $state->bindValue(":id", $id, PDO::PARAM_INT);
    $state->execute();
}

function deleteTag($id){
    require 'config.php';
    $sql = "delete from tag where id = :id";
    $state = $conn->prepare($sql);
    $state->bindValue(":id", $id, PDO::PARAM_INT);
    $state->execute();
}

function deletePost($id){
    require 'config.php';
    $sql = "delete from post where id = :id";
    $state = $conn->prepare($sql);
    $state->bindValue(":id", $id, PDO::PARAM_INT);
    $state->execute();
}

function getPostList($page, $withoutLimit = false){

    require 'config.php';
    $offset = ($page - 1) * LIMIT;
    if($withoutLimit){
        $sql = "select * from post";
        $state = $conn->prepare($sql);
    } else {
        $sql = "select * from post limit :offset, :limit";
        $state = $conn->prepare($sql);
        $state->bindvalue(":limit", LIMIT, PDO::PARAM_INT);
        $state->bindvalue(":offset", $offset, PDO::PARAM_INT);
    }
    $state->execute();
    $result = $state->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function addPost($title, $content, $authorId){
    require 'config.php';
    $sql_insert = "INSERT INTO post (title, content, author_id, created_at) 
    values(:title, :content, :author_id, :created_at)";
    $state = $conn->prepare($sql_insert);
    $state->bindValue(":title", $title);
    $state->bindValue(":content", $content);
    $state->bindValue(":author_id", $authorId);
    $state->bindValue(":created_at", date("Y-m-d H:i:s"));
    $state->execute();
}

function getAuthor($id){
    require 'config.php';
    $sql = "select * from post where id = :id";
    $state = $conn->prepare($sql);
    $state->bindValue(":id", $id, PDO::PARAM_INT);
    $state->execute();
    return $state->fetch(PDO::FETCH_ASSOC);
}

function getTagList($page, $withoutLimit = false){

    require 'config.php';
    $offset = ($page - 1) * LIMIT;
    if($withoutLimit){
        $sql = "select * from tag";
        $state = $conn->prepare($sql);
    } else {
        $sql = "select * from tag limit :offset, :limit";
        $state = $conn->prepare($sql);
        $state->bindvalue(":limit", LIMIT, PDO::PARAM_INT);
        $state->bindvalue(":offset", $offset, PDO::PARAM_INT);
    }
        $state->execute();
        $result = $state->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function addTag($name){
        require 'config.php';
        $sql_insert = "insert into tag (name) values(:name)";
        $state = $conn->prepare($sql_insert);
        $state->bindValue(":name", $name);
        $state->execute();
    }

function getAuthorList($page, $withoutLimit = false){

    require 'config.php';
    $offset = ($page - 1) * LIMIT;
    if($withoutLimit){
        $sql = "select * from user";
        $state = $conn->prepare($sql);
    } else {
        $sql = "select * from user limit :offset, :limit";
        $state = $conn->prepare($sql);
        $state->bindvalue(":limit", LIMIT, PDO::PARAM_INT);
        $state->bindvalue(":offset", $offset, PDO::PARAM_INT);
    }
    $state->execute();
    $result = $state->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

