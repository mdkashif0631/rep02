<?php include 'component/connect.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"
        integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/hlo.css">
    <title>Document</title>
</head>

<body>
    <?php include 'component/user_header.php'; ?>
    <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="10000">
                <img src="img/sld1.png" class="d-block" style="width: 100%; height: 45vh;" alt="...">
                <div class="carousel-caption-1">
                    <h1>First slide label</h1>
                    <p>Some representative placeholder content for the first slide.</p>
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="2000">
                <img src="img/sld2.png" class="d-block" style="width: 100%; height: 45vh;" alt="...">
                <div class="carousel-caption-2">
                    <h1>Second slide label</h1>
                    <p>Some representative placeholder content for the second slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="img/sld5.jpeg" class="d-block" style="width: 100%; height: 45vh;" alt="...">
                <div class="carousel-caption-3">
                    <h1>Third slide label</h1>
                    <p>Some representative placeholder content for the third slide.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="searchbar_container">
        <form action="" class="search_bar" id="search-bar">
            <div class="input_box" id="input_container">
                <din class="requirement" id="need">
                    <i class="fa fa-search" aria-hidden="true"></i>
                    <input class="loca_img" type="text" id="text_input_here" placeholder="job title, or company">
                </din>
                <div class="place" id="area">
                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                    <input type="text" id="input_location" placeholder="city, state, pin code, or remote">
                </div>
            </div>
            <div class="button_box" id="button_container">
                <button class="job_button" type="submit">
                    Find Jobs
                </button>
            </div>
        </form>
    </div>

    <script src="js/practice.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

</body>

</html>