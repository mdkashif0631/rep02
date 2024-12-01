<?php

include 'component/connect.php';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   $user_id = '';
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){

   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $pass = sha1($_POST['pass']);
   $pass = filter_var($pass, FILTER_SANITIZE_STRING);

   $select_user = $conn->prepare("SELECT * FROM `users` WHERE email = ? AND password = ? LIMIT 1");
   $select_user->execute([$email, $pass]);
   $row = $select_user->fetch(PDO::FETCH_ASSOC);
   
   if($select_user->rowCount() > 0){
     setcookie('user_id', $row['id'], time() + 60*60*24*30, '/');
     header('location:profile.php');
   }else{
      $message[] = 'incorrect email or password!';
   }

}

?>
 <div class="login_interface" id="loginInterface">
    <a href="javascript:void(0)" class="back_button" id="backButton">
        <i class="fa fa-angle-double-left " aria-hidden="true"></i>
    </a>

    <div class="login_page">
        <div class="login_logo">
            <a href="#">
                <img src="img/adl3.png" alt="alwaysdial_logo">
            </a>
        </div>
        <form class="login_box" action="#" method="post" enctype="multipart/form-data">

            <input class="username" name="email" type="text" id="text_user_here" placeholder="email">
            <input class="password" name = "pass" type="text" id="text_password_here" placeholder="Password">
            <button class="login_button" type="submit">
                Login
            </button>
            <a href="#" class="forgot_password">Forgot password</a>
            <p>OR</p>
            <div class="socalmedia">
                <i class="fa fa-google" aria-hidden="true"></i>
                <i class="fa fa-instagram" aria-hidden="true"></i>
                <i class="fa fa-twitter" aria-hidden="true"></i>
                <i class="fa fa-facebook" aria-hidden="true"></i>
            </div>
            </form>
        
    </div>
</div>