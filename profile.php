<?php

include 'component/connect.php';

if (isset($_COOKIE['user_id'])) {
    $user_id = $_COOKIE['user_id'];
} else {
    $user_id = '';
    header('location:login.php');
}

// $select_likes = $conn->prepare("SELECT * FROM `likes` WHERE user_id = ?");
// $select_likes->execute([$user_id]);
// $total_likes = $select_likes->rowCount();

// $select_comments = $conn->prepare("SELECT * FROM `comments` WHERE user_id = ?");
// $select_comments->execute([$user_id]);
// $total_comments = $select_comments->rowCount();

// $select_bookmark = $conn->prepare("SELECT * FROM `bookmark` WHERE user_id = ?");
// $select_bookmark->execute([$user_id]);
// $total_bookmarked = $select_bookmark->rowCount();

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"
        integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/hlo.css">
    <title>Profile</title>
</head>

<body>
    <div class="profile_section">
        <div class="profile_p1">
            <?php
            $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
            $select_profile->execute([$user_id]);
            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
            ?>
            <div class="profile_pic">
                <img src="uploaded_files/<?= $fetch_profile['image']; ?>" alt="">
                <h2><?= $fetch_profile['name']; ?></h2>
            </div>
            <div class="profile_ddt">
                <div class="profile_detail">
                    <h3><?= $fetch_profile['idname']; ?></h3>
                    <h2>Profession</h2>
                    <p>Location</p>
                </div>
                <div class="profile_btn">
                    <!-- <i class="fa fa-ellipsis-v" aria-hidden="true"></i> -->
                    <a href="component/user_logout.php" onclick="return confirm('logout from this website?');" class="delete-btn">logout</a>
                </div>
            </div>
        </div>
        <!-- <div class="profile_p2">
            <div class="profile_pp2">
                <div class="post_section">
                    <div class="post_navbar">
                        <div class="user_profile">
                            <a href="#">
                                <img src="/profile_id.png" alt="">
                            </a>
                        </div>
                        <div class="user_name">
                            <div class="id_and_name">
                                <a href="" class="id_name">User Id</a>
                            </div>
                            <div class="caption">
                                <p class="cap_text">
                                    caption...
                                </p>
                            </div>
                        </div>
                        <div class="three_dot">
                            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                        </div>
                    </div>
                    <div class="posts">
                        <textarea rows="3" id="text_exp" placeholder="Share Your experience here....."></textarea>
                    </div>
                    <div class="reaction">
                        <div class="like">
                            <i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
                        </div>
                        <div class="comment">
                            <i class="fa fa-comments-o" aria-hidden="true"></i>
                        </div>
                        <div class="share">
                            <i class="fa fa-share-square-o" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="user_skill">
                <p>web developer</p>
            </div>
        </div> -->
    </div>
</body>

</html>