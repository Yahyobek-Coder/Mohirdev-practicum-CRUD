<?php
include '../config.php';
session_start();


if(isset($_POST['login'])){
   $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
   $password = filter_input(INPUT_POST, 'pass');
   $hashed_password = sha1($password);

   $select_user = $conn->prepare("SELECT * FROM `user` WHERE email = ? AND password = ?");
   $select_user->execute([$email, $hashed_password]);
   $row = $select_user->fetch(PDO::FETCH_ASSOC);

   if($select_user->rowCount() > 0 && !empty($row['id'])){
      $_SESSION['user_id'] = $row['id'];
      header('Location: /admin/index.php');

   }else{
      $_SESSION['error'] = 'Incorrect email or password';
   }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login</title>
   <link rel="stylesheet" href="../css/bootstrap.min.css">
   <link rel="stylesheet" href="../css/style.css">
</head>
<body>
   <div class="container">
      <div class="row">
         <br><br><br><br><br><br>
         <h2 style="text-align: center; margin-top: 70px; padding: 0; box-sizing: 0;">LOGIN NOW</h2>
         <div class="row justify-content-center">
            <div class="col-md-5">
               <form method="POST">
                  <?php if (isset($_SESSION['error'])) : ?>
                     <div class="alert alert-danger">
                        <?= $_SESSION['error'] ?>
                     </div>
                     <?php unset($_SESSION['error']); ?>
                  <?php endif; ?>
                  <div class="mb-3">
                     <label for="exampleInputEmail1" class="form-label">Email address</label>
                     <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                  </div>
                  <div class="mb-3">
                     <label for="exampleInputPassword1" class="form-label">Password</label>
                     <input type="password" name="pass" class="form-control" id="exampleInputPassword1" required>
                  </div>
                  <button type="submit" name="login" class="btn btn-primary">Login Now</button>
               </form>
               <a href="register.php" class="option-btn">Register now</a>
            </div>
         </div>
      </div>
   </div>
</body>
</html>