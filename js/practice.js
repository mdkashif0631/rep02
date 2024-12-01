document.addEventListener('DOMContentLoaded', function () {
    // var menuButton = document.getElementById('menuButton');
    // var menu = document.getElementById('menu');
    // var closeButton = document.getElementById('closeButton');
    var signinButton = document.getElementById('signinButton');
    var loginInterface = document.getElementById('loginInterface');
    var backButton = document.getElementById('backButton');
    var signupButton = document.getElementById('signupButton');
    var signupInterface = document.getElementById('signupInterface');
    var signupButton = document.getElementById('signupButton');
    var backButton2 = document.getElementById('backButton2');

    // menuButton.addEventListener('click', function () {
    //     menu.style.right = '0';
    // });

    // closeButton.addEventListener('click', function () {
    //     menu.style.right = '-100%';
    // });

    signinButton.addEventListener('click', function () {
        loginInterface.style.left = '0';
    });
    
    backButton.addEventListener('click', function () {
        loginInterface.style.left = '-100%';
    });
    signupButton.addEventListener('click', function () {
        signupInterface.style.left = '0';
    });
    backButton2.addEventListener('click', function () {
        signupInterface.style.left = '-100%';
    });
});