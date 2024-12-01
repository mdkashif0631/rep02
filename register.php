<?php
include 'component/connect.php';
include 'function/essen.php';

if (isset($_COOKIE['user_id'])) {
    $user_id = $_COOKIE['user_id'];
} else {
    $user_id = '';
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id = unique_id();
    $name = $_POST['name'];
    $name = filter_var($name, FILTER_SANITIZE_STRING);
    $email = $_POST['email'];
    $email = filter_var($email, FILTER_SANITIZE_STRING);
    $idname = $_POST['idname'];
    $idname = filter_var($idname, FILTER_SANITIZE_STRING);
    $pass = sha1($_POST['pass']);
    $pass = filter_var($pass, FILTER_SANITIZE_STRING);
    $cpass = sha1($_POST['cpass']);
    $cpass = filter_var($cpass, FILTER_SANITIZE_STRING);
    $image = $_FILES['image']['name'];
    $image = filter_var($image, FILTER_SANITIZE_STRING);
    $ext = pathinfo($image, PATHINFO_EXTENSION);
    $rename = unique_id() . '.' . $ext;
    $image_size = $_FILES['image']['size'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = 'uploaded_files/' . $rename;


    $select_user = $conn->prepare("SELECT * FROM `users` WHERE email = ?");
    $select_user->execute([$email]);

    if ($select_user->rowCount() > 0) {
        $message[] = 'email already taken!';
    } else {
        if ($pass != $cpass) {
            $message[] = 'confirm passowrd not matched!';
        } else {
            $insert_user = $conn->prepare("INSERT INTO `users`(id, name, email, idname, password, image) VALUES(?,?,?,?,?,?)");
            $insert_user->execute([$id, $name, $email, $idname, $cpass, $rename]);
             move_uploaded_file($image_tmp_name, $image_folder);

            $verify_user = $conn->prepare("SELECT * FROM `users` WHERE email = ? AND password = ? LIMIT 1");
            $verify_user->execute([$email, $pass]);
            $row = $verify_user->fetch(PDO::FETCH_ASSOC);

            if ($verify_user->rowCount() > 0) {
                setcookie('user_id', $row['id'], time() + 60 * 60 * 24 * 30, '/');
                header('location:home.php');
            }
        }
    }
}
?>

<div class="signup_interface" id="signupInterface">
    <a href="javascript:void(0)" class="back_button2" id="backButton2">
        <i class="fa fa-angle-double-left " aria-hidden="true"></i>
    </a>
    <div class="signup_page">
        <div class="signup_logo">
            <a href="#">
                <img src="img/adl3.png" alt="alwaysdial_logo">
            </a>
        </div>
        <!-- <h3>Create Account</h> -->
        <form class="signup_box" action="#" method="post" enctype="multipart/form-data">
            <input class="name" name="name" type="text" id="name" placeholder="Full name">
            <input class="email" name="email" type="text" id="email" placeholder="email">
            <input class="username" name="idname" type="text" id="username" placeholder="Username">
            <input class="password" name="pass" type="password" id="password" placeholder="Password">
            <input class="cnfm_password" name="cpass" type="password" id="cnfmPassword" placeholder="Confirm Password">
            <div class="input-group mb-3">
                <input type="file"  name="image" accept="image/*" class="form-control" id="inputGroupFile02">
                <label class="input-group-text" for="inputGroupFile02">Upload</label>
            </div>
            <button class="login_button" type="submit">
                Signup
            </button>
            <!-- <p>OR</p>
            <div class="socalmedia">
                <i class="fa fa-google" aria-hidden="true"></i>
                <i class="fa fa-instagram" aria-hidden="true"></i>
                <i class="fa fa-twitter" aria-hidden="true"></i>
                <i class="fa fa-facebook" aria-hidden="true"></i>
            </div> -->
        </form>
    </div>
</div>