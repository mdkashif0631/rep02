<?php
if (isset($message)) {
    foreach ($message as $message) {
        echo '
      <div class="message">
         <span>' . $message . '</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
    }
}
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <img src="img/adl3.png" alt="alwaysdial_logo" style="height: 70px;">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-3 mb-2 mb-lg-0">
                <li class="nav-item mx-1">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item mx-1">
                    <a class="nav-link active" href="home.php">Career</a>
                </li>
                <li class="nav-item mx-1">
                    <a class="nav-link" href="#">Listing</a>
                </li>
                <li class="nav-item mx-1">
                    <a class="nav-link" href="#">Contact Us</a>
                </li>
                <li class="nav-item mx-1">
                    <a class="nav-link" href="#">About Us</a>
                </li>
            </ul>
            <div class="profile">
                <?php
                include 'component/connect.php';

                if (isset($_COOKIE['user_id'])) {
                    $user_id = $_COOKIE['user_id'];
                } else {
                    $user_id = '';
                }

                $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
                $select_profile->execute([$user_id]);
                if ($select_profile->rowCount() > 0) {
                    $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
                    ?>
                    <!-- <img src="uploaded_files/" alt="" style = > -->
                    <a href="profile.php">
                    <button type="button" class="btn btn-outline-primary btn-lg" id="signupButton">profile</button></a>

                    <?php
                } else {
                    ?>
                    <form class="d-flex justify-content-left">
                        <button type="button" class="btn btn-outline-primary mx-1" id="signinButton">Login</button>
                        <button type="button" class="btn btn-outline-primary btn-lg" id="signupButton">Sign-up</button>
                    </form>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</nav>

<?php
include 'login.php';
include 'register.php';
?>


<!-- js script -->
<script src="practice.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>