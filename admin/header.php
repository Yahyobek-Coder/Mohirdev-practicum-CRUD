<?php session_start(); ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../css/carousel.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>
<?php
    session_start();

    $user_id = $_SESSION['user_id'];

    if(!isset($user_id)){
    header('location: login.php');
    };
?>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container">
      <a class="navbar-brand" href="index.php">Blog</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/admin/category.php">Category</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/admin/tag.php">Tag</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/admin/news.php">News</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>