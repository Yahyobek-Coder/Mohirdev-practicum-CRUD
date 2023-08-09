<?php

require '../config.php';
require_once 'header.php';


session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location: login.php');
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <link rel="stylesheet" href="../css/bootstrap.min.css">
   <link rel="stylesheet" href="../css/style.css">
   <link rel="stylesheet" href="../css/carousel.css">
</head>
<body>

  <?php

  $user_id = $_SESSION['user_id'];
  $select_user = $conn->prepare("SELECT * FROM `user` WHERE id = ?");
  $select_user->execute([$user_id]);
  $row = $select_user->fetch(PDO::FETCH_ASSOC);

    if(!$row){
   echo "Error: User details not found.";
   exit();
}

$_SESSION['username'] = $row['name'];

  ?>

  <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="var(--bs-secondary-color)"/></svg>
        <div class="container">
          <div class="carousel-caption text-start">
            <h2>Welcome, <span style="color: #2F9666; font-weight: bold; font-size: 2.5rem; text-decoration: underline;"><?php echo $row['name']; ?></span></h2>
            <br>
            <p><a class="btn btn-danger" name="" href="confirm_logout.php" style="width: 110px; height: 40px; text-align: center;">logout</a></p>
            
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="var(--bs-secondary-color)"/></svg>
        <div class="container">
          <div class="carousel-caption">
            <h2>Xush kelibsiz, <span style="color: #2F9666; font-weight: bold; font-size: 2.5rem; text-decoration: underline;"><?php echo $row['name']; ?></span></h2>
            <br>
            <p><a class="btn btn-danger" name="" href="confirm_logout.php" style="width: 110px; height: 40px; text-align: center;">logout</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="var(--bs-secondary-color)"/></svg>
        <div class="container">
          <div class="carousel-caption text-end">
            <h2>Добро пожаловать, <span style="color: #2F9666; font-weight: bold; font-size: 2.5rem; text-decoration: underline;"><?php echo $row['name']; ?></span></h2>
            <br>
            <p><a class="btn btn-danger" name="" href="confirm_logout.php" style="width: 110px; height: 40px; text-align: center;">logout</a></p>
          </div>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>


  <!-- Marketing messaging and featurettes
  ================================================== -->
  <!-- Wrap the rest of the page in another container to center all the content. -->

  <div class="container marketing">

    <!-- Three columns of text below the carousel -->
    <div class="row">
      <div class="col-lg-4">
        <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="var(--bs-secondary-color)"/></svg>
        <h2 class="fw-normal">Category</h2>
        <p>Kategroiya sahifasida siz bittalik so'z kiritishingiz mumkin keyin PHP CRUD (create, read, update, delete) operatsiyasi orqali uni tahrirlashingiz (update) yoki o'chirib (delete) tashlashingiz mumkin !</p>
        <p><a class="btn btn-secondary" href="category.php">Sahifaga o'tish &raquo;</a></p>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4">
        <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="var(--bs-secondary-color)"/></svg>
        <h2 class="fw-normal">Tag</h2>
        <p>Tagda ham Kategoriyaga o'xshab so'z kiritishingiz va uni Tahrirlashingiz (update) yoki o'chirishingiz (delete) mumkin, barcha ma'lotlar uchun LIMIT (me'yor) belgilangan va 5 ta ma'lumotdan keyin sahifani o'zgartiradi past qismida raqamli ko'rsatkichlar orqali o'tkizib ko'rishingiz mumkin !</p>
        <p><a class="btn btn-secondary" href="tag.php">Sahifaga o'tish &raquo;</a></p>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4">
        <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="var(--bs-secondary-color)"/></svg>
        <h2 class="fw-normal">News</h2>
        <p>Yangiliklarda (news)ni esa imkoniyati ko'proq, va unda mavzu uchun title, content uchun so'z, muallif va yaratilgan vaqtini ko'rishingiz mumkin vaqt kiritmaysiz o'zi avtomat vaqtni belgilab chiqaradi, boshqa ma'lumotlarni esa kiritishingiz mumkin !</p>
        <p><a class="btn btn-secondary" href="news.php">Sahifaga o'tish &raquo;</a></p>
      </div><!-- /.col-lg-4 -->
    </div><!-- /.row -->

    </div>
</body>
</html>

<?php require '../admin/footer.php' ?>