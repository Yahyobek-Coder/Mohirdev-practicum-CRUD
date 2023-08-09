<?php

include '../config.php';


if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

if(isset($_POST['register'])){

   $name = $_POST['name'];
   $name = filter_var($name);
   $email = $_POST['email'];
   $email = filter_var($email);
   $pass = sha1($_POST['pass']);
   $pass = filter_var($pass);
   $cpass = sha1($_POST['cpass']);
   $cpass = filter_var($cpass);

   $select_user = $conn->prepare("SELECT * FROM `user` WHERE email = ?");
   $select_user->execute([$email,]);
   $row = $select_user->fetch(PDO::FETCH_ASSOC);
   

   if($select_user->rowCount() > 0){
      $_SESSION['error'] = 'email already exists!';
   } else {
      if($pass != $cpass){
         $_SESSION['error'] = 'confirm password not matched!';
         
      } else {
         $insert_user = $conn->prepare("INSERT INTO `user`(name, email, password) VALUES(?,?,?)");
         $insert_user->execute([$name, $email, $pass]);
         $_SESSION['success'] = '';
      }
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register</title>
   
   <link rel="stylesheet" href="../css/bootstrap.min.css">
   <link rel="stylesheet" href="../css/style.css">

</head>
<body>

   <div class="container">
      <div class="row">
      <br><br><br><br><br><br>
      <h2 style="text-align: center; margin-top: 70px; padding: 0; box-sizing: 0;">REGISTER NOW</h2>
      <div class="row justify-content-center">
         <div class="col-md-5">
            <form method="POST">
               <?php
                  if (isset($_SESSION['success'])) {
                     echo '<div class="alert alert-success">
                     Ro\'yhatdan muvaffaqiyatli o\'tdingiz, endi Login qilishingiz mumkin!
                     ' . $_SESSION['success'] . 
                     '</div>';
                     unset($_SESSION['success']);
                  }
                  ?>

                  <?php
                  if (isset($_SESSION['error'])) {
                     echo '<div class="alert alert-danger">
                     ' . $_SESSION['error'] . 
                     '</div>';
                     unset($_SESSION['error']);
                  }
                  ?>
               <div class="mb-3">
                  <label for="exampleInputuser" class="form-label">Username</label>
                  <input type="text" class="form-control" name="name" id="exampleInputuser" aria-describedby="userHelp">
               </div>

               <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Email address</label>
                  <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
               </div>

               <div class="mb-3">
                  <label for="exampleInputpass" class="form-label">Password</label>
                  <input type="password" class="form-control" name="pass" id="exampleInputpass" aria-describedby="passHelp">
               </div>

               <div class="mb-3">
                  <label for="exampleInputCPassword" class="form-label">Confirm Password</label>
                  <input type="password" name="cpass" class="form-control" id="exampleInputCPassword">
               </div>

               <button type="submit" name="register" class="btn btn-primary">Register</button>

            </form>
            <a href="login.php" class="option-btn">Login now</a>
         </div>
      </div>
    </div>
   </div>




</body>
</html>