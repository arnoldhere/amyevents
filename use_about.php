<?php
session_start();
include "dbconnect.php";
$db = new newdb();
$conn = $db->openConnection();
$query = "SELECT * FROM feedback";
$prepare = $conn->prepare($query);
$execute = $prepare->execute();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Alkalami&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Silkscreen&display=swap');

        *,
        *::before,
        *::after {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        }

        .container {
            width: min(100% - 15%, 840px);
            margin-inline: auto;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: "Open Sans", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            background-color: #343a40a5;
            height: auto;
            width: 100%;
            overflow-x: hidden;
        }


        p {
            color: #b3b3b3;
            font-weight: 300;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        .h1,
        .h2,
        .h3,
        .h4,
        .h5,
        .h6 {
            font-family: "Open Sans", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
        }

        a {
            -webkit-transition: .3s all ease;
            -o-transition: .3s all ease;
            transition: .3s all ease;
        }

        a,
        a:hover {
            text-decoration: none !important;
        }

        .hero {
            background-image: url(../img/hero_1.jpg);
            height: 100%;
            width: 100%;
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
        }

        .site-navbar {
            margin-bottom: 0px;
            z-index: 1999;
            position: sticky;
            top: 0;
            background-color: #74bde0;
            width: 100%;
            height: 5rem;
            padding: 0.8rem;
            box-shadow: 2px 2px 4px 2px #f4f4f6;
        }

        .site-navbar.transparent {
            background: transparent;
        }

        .site-navbar.absolute {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
        }

        .site-navbar .site-logo {
            position: absolute;
            top: 1rem;
            left: 1rem;
            margin-right: 5rem !important;
            font-size: 24px !important;
        }

        .site-navbar .site-navigation .site-menu {
            margin-bottom: 0;
        }

        .site-navbar .site-navigation .site-menu .active>a span {
            background: #007bff;
            color: #fff;
            border-radius: 30px;
            display: inline-block;
            font-size: 1.2rem;
            padding: 5px 20px;
        }

        .site-navbar .site-navigation .site-menu a {
            text-decoration: none !important;
            display: inline-block;
        }

        .site-navbar .site-navigation .site-menu>li {
            display: inline-block;
        }

        .site-navbar .site-navigation .site-menu>li>a {
            padding: 10px 0px;
            color: #fff;
            font-size: 16px;
            text-decoration: none !important;
        }

        .site-navbar .site-navigation .site-menu>li>a>span {
            padding: 5px 20px;
            display: inline-block;
            -webkit-transition: .3s all ease;
            -o-transition: .3s all ease;
            transition: .3s all ease;
            border-radius: 30px;
        }

        .site-navbar .site-navigation .site-menu>li>a:hover>span {
            background: #007bff;
            color: #fff;
            border-radius: 30px;
            display: inline-block;
        }

        .site-navbar .site-navigation .site-menu .has-children {
            position: relative;
        }

        .site-navbar .site-navigation .site-menu .has-children>a span {
            position: relative;
            padding-right: 30px;
        }

        .site-navbar .site-navigation .site-menu .has-children>a span:before {
            position: absolute;
            content: "\e313";
            font-size: 16px;
            top: 50%;
            right: 10px;
            -webkit-transform: translateY(-50%);
            -ms-transform: translateY(-50%);
            transform: translateY(-50%);
            font-family: 'icomoon';
        }

        .site-navbar .site-navigation .site-menu .has-children .dropdown {
            visibility: hidden;
            opacity: 0;
            top: 100%;
            position: absolute;
            text-align: left;
            border-top: 2px solid #007bff;
            -webkit-box-shadow: 0 2px 10px -2px rgba(0, 0, 0, 0.1);
            box-shadow: 0 2px 10px -2px rgba(0, 0, 0, 0.1);
            padding: 0px 0;
            margin-top: 20px;
            margin-left: 0px;
            background: #fff;
            -webkit-transition: 0.2s 0s;
            -o-transition: 0.2s 0s;
            transition: 0.2s 0s;
        }

        .site-navbar .site-navigation .site-menu .has-children .dropdown.arrow-top {
            position: absolute;
        }

        .site-navbar .site-navigation .site-menu .has-children .dropdown.arrow-top:before {
            bottom: 100%;
            left: 20%;
            border: solid transparent;
            content: " ";
            height: 0;
            width: 0;
            position: absolute;
            pointer-events: none;
        }

        .site-navbar .site-navigation .site-menu .has-children .dropdown.arrow-top:before {
            border-color: rgba(136, 183, 213, 0);
            border-bottom-color: #fff;
            border-width: 10px;
            margin-left: -10px;
        }

        .site-navbar .site-navigation .site-menu .has-children .dropdown a {
            text-transform: none;
            letter-spacing: normal;
            -webkit-transition: 0s all;
            -o-transition: 0s all;
            transition: 0s all;
            color: #343a40;
        }

        .site-navbar .site-navigation .site-menu .has-children .dropdown .active>a {
            color: #007bff !important;
        }

        .site-navbar .site-navigation .site-menu .has-children .dropdown>li {
            list-style: none;
            padding: 0;
            margin: 0;
            min-width: 200px;
        }

        .site-navbar .site-navigation .site-menu .has-children .dropdown>li>a {
            padding: 9px 20px;
            display: block;
        }

        .site-navbar .site-navigation .site-menu .has-children .dropdown>li>a:hover {
            background: #fafafb;
        }

        .site-navbar .site-navigation .site-menu .has-children .dropdown>li.has-children>a {
            position: relative;
        }

        .site-navbar .site-navigation .site-menu .has-children .dropdown>li.has-children>a:after {
            position: absolute;
            right: 0;
            content: "\e315";
            right: 20px;
            font-family: 'icomoon';
        }

        .site-navbar .site-navigation .site-menu .has-children .dropdown>li.has-children>.dropdown,
        .site-navbar .site-navigation .site-menu .has-children .dropdown>li.has-children>ul {
            left: 100%;
            top: 0;
        }

        .site-navbar .site-navigation .site-menu .has-children .dropdown>li.has-children:hover>a,
        .site-navbar .site-navigation .site-menu .has-children .dropdown>li.has-children:active>a,
        .site-navbar .site-navigation .site-menu .has-children .dropdown>li.has-children:focus>a {
            background: #fafafb;
        }

        .site-navbar .site-navigation .site-menu .has-children:hover>a,
        .site-navbar .site-navigation .site-menu .has-children:focus>a,
        .site-navbar .site-navigation .site-menu .has-children:active>a {
            color: #007bff;
        }

        .site-navbar .site-navigation .site-menu .has-children:hover>a span,
        .site-navbar .site-navigation .site-menu .has-children:focus>a span,
        .site-navbar .site-navigation .site-menu .has-children:active>a span {
            background: #007bff;
            color: #fff;
        }

        .site-navbar .site-navigation .site-menu .has-children:hover,
        .site-navbar .site-navigation .site-menu .has-children:focus,
        .site-navbar .site-navigation .site-menu .has-children:active {
            cursor: pointer;
        }

        .site-navbar .site-navigation .site-menu .has-children:hover>.dropdown,
        .site-navbar .site-navigation .site-menu .has-children:focus>.dropdown,
        .site-navbar .site-navigation .site-menu .has-children:active>.dropdown {
            -webkit-transition-delay: 0s;
            -o-transition-delay: 0s;
            transition-delay: 0s;
            margin-top: 0px;
            visibility: visible;
            opacity: 1;
        }

        .site-mobile-menu {
            width: 300px;
            position: fixed;
            right: 0;
            z-index: 2000;
            padding-top: 20px;
            background: #fff;
            height: calc(100vh);
            -webkit-transform: translateX(110%);
            -ms-transform: translateX(110%);
            transform: translateX(110%);
            -webkit-box-shadow: -10px 0 20px -10px rgba(0, 0, 0, 0.1);
            box-shadow: -10px 0 20px -10px rgba(0, 0, 0, 0.1);
            -webkit-transition: .3s all ease-in-out;
            -o-transition: .3s all ease-in-out;
            transition: .3s all ease-in-out;
        }

        .offcanvas-menu .site-mobile-menu {
            -webkit-transform: translateX(0%);
            -ms-transform: translateX(0%);
            transform: translateX(0%);
        }

        .site-mobile-menu .site-mobile-menu-header {
            width: 100%;
            float: left;
            padding-left: 20px;
            padding-right: 20px;
        }

        .site-mobile-menu .site-mobile-menu-header .site-mobile-menu-close {
            float: right;
            margin-top: 8px;
        }

        .site-mobile-menu .site-mobile-menu-header .site-mobile-menu-close span {
            font-size: 30px;
            display: inline-block;
            padding-left: 10px;
            padding-right: 0px;
            line-height: 1;
            cursor: pointer;
            -webkit-transition: .3s all ease;
            -o-transition: .3s all ease;
            transition: .3s all ease;
        }

        .site-mobile-menu .site-mobile-menu-header .site-mobile-menu-close span:hover {
            color: #f8f9fa;
        }

        .site-mobile-menu .site-mobile-menu-header .site-mobile-menu-logo {
            float: left;
            margin-top: 10px;
            margin-left: 0px;
        }

        .site-mobile-menu .site-mobile-menu-header .site-mobile-menu-logo a {
            display: inline-block;
            text-transform: uppercase;
        }

        .site-mobile-menu .site-mobile-menu-header .site-mobile-menu-logo a img {
            max-width: 70px;
        }

        .site-mobile-menu .site-mobile-menu-header .site-mobile-menu-logo a:hover {
            text-decoration: none;
        }

        .site-mobile-menu .site-mobile-menu-body {
            overflow-y: scroll;
            -webkit-overflow-scrolling: touch;
            position: relative;
            padding: 0 20px 20px 20px;
            height: calc(100vh - 52px);
            padding-bottom: 150px;
        }

        .site-mobile-menu .site-nav-wrap {
            padding: 0;
            margin: 0;
            list-style: none;
            position: relative;
        }

        .site-mobile-menu .site-nav-wrap a {
            padding: 10px 20px;
            display: block;
            position: relative;
            color: #212529;
        }

        .site-mobile-menu .site-nav-wrap a:hover {
            color: #007bff;
        }

        .site-mobile-menu .site-nav-wrap li {
            position: relative;
            display: block;
        }

        .site-mobile-menu .site-nav-wrap li.active>a {
            color: #007bff;
        }

        .site-mobile-menu .site-nav-wrap .arrow-collapse {
            position: absolute;
            right: 0px;
            top: 10px;
            z-index: 20;
            width: 36px;
            height: 36px;
            text-align: center;
            cursor: pointer;
            border-radius: 50%;
        }

        .site-mobile-menu .site-nav-wrap .arrow-collapse:hover {
            background: #f8f9fa;
        }

        .site-mobile-menu .site-nav-wrap .arrow-collapse:before {
            font-size: 12px;
            z-index: 20;
            font-family: "icomoon";
            content: "\f078";
            position: absolute;
            top: 50%;
            left: 50%;
            -webkit-transform: translate(-50%, -50%) rotate(-180deg);
            -ms-transform: translate(-50%, -50%) rotate(-180deg);
            transform: translate(-50%, -50%) rotate(-180deg);
            -webkit-transition: .3s all ease;
            -o-transition: .3s all ease;
            transition: .3s all ease;
        }

        .site-mobile-menu .site-nav-wrap .arrow-collapse.collapsed:before {
            -webkit-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        }

        .site-mobile-menu .site-nav-wrap>li {
            display: block;
            position: relative;
            float: left;
            width: 100%;
        }

        .site-mobile-menu .site-nav-wrap>li>a {
            padding-left: 20px;
            font-size: 20px;
        }

        .site-mobile-menu .site-nav-wrap>li>ul {
            padding: 0;
            margin: 0;
            list-style: none;
        }

        .site-mobile-menu .site-nav-wrap>li>ul>li {
            display: block;
        }

        .site-mobile-menu .site-nav-wrap>li>ul>li>a {
            padding-left: 40px;
            font-size: 16px;
        }

        .site-mobile-menu .site-nav-wrap>li>ul>li>ul {
            padding: 0;
            margin: 0;
        }

        .site-mobile-menu .site-nav-wrap>li>ul>li>ul>li {
            display: block;
        }

        .site-mobile-menu .site-nav-wrap>li>ul>li>ul>li>a {
            font-size: 16px;
            padding-left: 60px;
        }

        .site-mobile-menu .site-nav-wrap[data-class="social"] {
            float: left;
            width: 100%;
            margin-top: 30px;
            padding-bottom: 5em;
        }

        .site-mobile-menu .site-nav-wrap[data-class="social"]>li {
            width: auto;
        }

        .site-mobile-menu .site-nav-wrap[data-class="social"]>li:first-child a {
            padding-left: 15px !important;
        }

        .navbar-brand {
            font-family: 'Silkscreen', cursive;
            font-size: 2rem !important;
        }

        .dropdown-toggle::after {
            transition: transform 0.15s linear;
        }

        .show.dropdown .dropdown-toggle::after {
            transform: translateY(3px);
        }

        .selectpicker {
            /*     height: 1.5rem; */
            /*     margin: 1.5rem 0; */
            margin-bottom: 1.5rem;
            width: 100%;
            border: 1px solid #394554;
            border-radius: 0;
        }

        .form-book {
            height: 750px;
            font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
            /* width: 80%; */
        }

        @media (min-width: 550px) and (max-width: 750px) {

            html,
            body,
            .intro {
                height: 750px;
            }
        }

        @media (min-width: 800px) and (max-width: 850px) {

            html,
            body,
            .intro {
                height: 750px;
            }
        }

        .mask-custom {
            backdrop-filter: blur(15px);
            background-color: rgba(255, 255, 255, .2);
            border-radius: 3em;
            border: 2px solid rgba(255, 255, 255, .1);
            background-clip: padding-box;
            box-shadow: 10px 10px 10px rgba(46, 54, 68, 0.03);
        }

        @import url('https://fonts.googleapis.com/css2?family=Alkalami&family=Playfair+Display:wght@500&display=swap');

        .mid-content {
            display: flex;
            justify-content: center;
            font-family: 'Alkalami', serif;
            background-color: #f8f9fa;
            width: 100%;
            height: auto;
            position: relative;
            top: 35rem;
            padding: 5rem;
            z-index: 3;
            align-items: center;
        }

        .mid-head h4 {
            font-weight: 100;
            text-align: center;
            text-transform: capitalize;
        }

        .mid-body .para {
            font-size: 20px;
            margin: 3rem auto;
            font-weight: normal;
            align-content: center;
        }

        .abt-btn {
            border-radius: 0 !important;
        }

        .event-preview {
            position: relative;
            top: 35rem;
            font-family: Verdana, Geneva, Tahoma, sans-serif !important;
            width: 100%;
        }

        .event-cards {
            position: relative;
            top: 1rem;
            width: 100%;
            height: auto;
            margin: 0 auto !important;
        }

        .event-cards figcaption {
            margin: 1rem 0;
            text-transform: uppercase;
        }

        .event-cards img {
            border-radius: 50%;
            width: 90%;
            border: 0;
            transition: ease-in-out 0.3s;
            height: 20rem;
            width: 20rem;
        }

        .event-cards img:hover {
            filter: contrast(2);
        }

        .services-preview {
            position: relative;
            height: auto;
            top: 40rem;
            width: 100%;
            height: auto;
            background-color: #fafafb;
            padding: 4rem;
        }

        .services-preview h3 {
            border-bottom: 3px solid #b3d3f4;
            margin: 2rem auto;
            padding: 1rem;
            width: 20%;
            text-align: center;
        }

        .services-preview img {
            margin: 2rem 5rem;
            height: 10rem;
            width: 10rem;
        }

        .services-preview .btn {
            padding: 1.5rem;
            font-size: 14px;
            margin: 1rem auto;
            border-radius: 0;
        }

        .services-preview .row {
            margin: 1rem 0 !important;
        }

        .services-preview .desc {
            font-family: calibri light;
            font-size: 18px;
        }

        .footer-content {
            width: 100% !important;
            position: relative;
            font-family: 'Times New Roman', Times, serif;
            font-size: 16px;
            color: #fff;
            top: 40rem;
        }

        .footer-content .btn {
            background-color: #007bff;
        }

        .foot-add p {
            color: #fff;
        }

        .icons .btn,
        .icons i {
            font-size: 1.2rem;
            transition: 0.3s ease-in-out;
        }

        .icons .btn:hover,
        .icons i:hover {
            transform: scale(1.3);
            padding-top: 0.6rem;
        }

        .gradient-custom {
            /* fallback for old browsers */
            background: #accbee;

            /* Chrome 10-25, Safari 5.1-6 */
            background: -webkit-linear-gradient(to right, rgba(172, 203, 238, 0.5), rgba(0, 231, 240, 0.5));

            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            background: linear-gradient(to right, rgba(172, 203, 238, 0.5), rgba(0, 231, 240, 0.5));
            background-blend-mode: screen, color-dodge, overlay, difference, normal;
        }

        .review-content {
            height: 100%;
            padding: 4rem;
        }

        .preview {
            background-color: rgba(255 255 255 /50%);
            padding: 2rem 3rem;
            border-radius: 10px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 17px;
            border: 1px solid;
            text-align: center;
        }

        .preview .msgcol {
            text-align: right;
        }

        .preview .emailcol {
            text-align: left;
        }

        .gradient-custom {
            /* fallback for old browsers */
            background: #accbee;

            /* Chrome 10-25, Safari 5.1-6 */
            background: -webkit-linear-gradient(to right, rgba(172, 203, 238, 0.5), rgba(0, 231, 240, 0.5));

            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            background: linear-gradient(to right, rgba(172, 203, 238, 0.5), rgba(0, 231, 240, 0.5));
            background-blend-mode: screen, color-dodge, overlay, difference, normal;
        }

        .review-content {
            height: 100%;
            padding: 4rem;
        }

        .preview {
            background-color: rgba(255 255 255 /50%);
            padding: 2rem 3rem;
            border-radius: 10px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 17px;
            border: 1px solid;
            text-align: center;
        }

        .preview .msgcol {
            text-align: right;
        }

        .preview .emailcol {
            text-align: left;
        }
    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://fonts.googleapis.com/css2?family=Alkalami&family=Playfair+Display:wght@500&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AMY events </title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <!-- AOS library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" integrity="sha512-1cK78a1o+ht2JcaW6g8OXYwqpev9+6GqOkz9xmBN9iUUhIndKtxwILGWYOSibOKjLsEdjyjZvYDq/cZwNeak0w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <link rel="stylesheet" href="../EMS/assets/css/user.css"> -->
    <!-- <link rel="stylesheet" href="../EMS/assets/css/style.css"> -->
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    </script>
    <!-- font awsome -->
    <script src="https://kit.fontawesome.com/24b1cc3df5.js" crossorigin="anonymous"></script>

</head>

<body>
    <!--Navbar-->
    <header class="site-navbar" role="banner">

        <nav class="site-navigation text-right" role="navigation">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-3 ">
                        <h1 class="mb-0 site-logo"><a href="" class="text-danger mb-0 navbar-brand">AMY Events</a></h1>
                    </div>
                    <div class="col-7  d-xl-block">
                        <ul class="site-menu js-clone-nav mr-auto d-none d-lg-block">
                            <li><a href="use_home.php"><span>Home</span></a></li>
                            <li class="dropdown dropdown-center"><a href="use_bookevent.php" class="dropdown-toggle" role="button" aria-haspopup="true" aria-expanded="false"><span>Book Events</span></a>
                                <!-- <div class="dropdown-menu">
                            <a href="use_bookevent.php" class="dropdown-item">Book Events</a>
                            <a href="" class="dropdown-item">View Events</a>
                            <a href="" class="dropdown-item">Delete Events</a>
                        </div> -->
                            </li>
                            <li><a href="use_about.php"><span>About Us</span></a></li>
                            <li><a href="use_contact.php"><span>Contact us</span></a></li>
                            <!-- <li><a href=""><span>Contact</span></a></li> -->
                        </ul>
                    </div>
                    <div class="col-2 d-flex justify-content-end">
                        <a href="user_profile.php">
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 12a5.25 5.25 0 1 0 0-10.499A5.25 5.25 0 0 0 12 12Zm0 1.5c-3.254 0-9.75 2.01-9.75 6v3h19.5v-3c0-3.99-6.496-6-9.75-6Z"></path>
                                    </svg>&nbsp;&nbsp; My Profile
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="user_profile.php">Visit Profile</a>
                                    <button class="dropdown-item" href="use_logout.php">Log out</button>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle text-white"><span class="icon-menu h3"></span></a></div>
                </div>
            </div>
            </div>
        </nav>
    </header>


    <section class="gradient-custom review-content">

        <h4 class="text-dark text-center" style="font-family:Georgia, 'Times New Roman', Times, serif;">Reviews by users</h4>
        <div class="col-md-12">
            <div class="text-center mb-4 pb-2">
                <i class="fas fa-quote-left fa-3x text-white"></i>
            </div>
        </div>
        <div class="preview container bg-opacity-50">
            <?php
            $reviews = $prepare->fetchAll(PDO::FETCH_ASSOC);
            foreach (array_slice($reviews, 0, 5) as $review) {
                $index = 1;
            ?>
            
                <div class="row w-100 container">
                    <div class="col text-left emailcol text-danger p-2">
                        <?php echo htmlentities($review['email']); ?>
                    </div>
                    <div class="col text-right msgcol p-2">
                        <?php echo htmlentities($review['feedback']); ?>
                    </div>
                    <hr>
                </div>
            <?php
                $index += 1;
            } ?>
        </div>
        <div class="container w-75 my-3  p-lg-5">
            <h5 class="text-center text-white">ABOUT</h5>
            <h2 class="text-center text-muted">AMY EVENTS</h2>
            <hr>
            <div class="row flex">
                <div class="col">
                    <h1 class="mt-lg-5 text-dark ">OUR POSSIBILITIES</h1>
                </div>
                <div class="col d-flex justify-content-center ">
                    <h6 class="text-muted text-right fw-normal">
                        Founded in 2022, AMY events was created out of a love for dynamic events and fine dining. Our goal is to provide unparalleled event services and outstanding customer service.
                        <br> <br>
                        Because with us, there are infinite possibilities. Big or small, we are committed to creating one-of-a-kind events that your guests will remember for years to come. Customization is guaranteed, from your floor plan to your bar menu and signature lounge furniture.
                        <br> <br>
                        We work with the best vendors in the around your nearby area to provide planning and design services at the venue of your dreams, and we also offer full services at The Bridge Building Event Spaces, The Bell Tower, and The Estate at Cherokee Dock through exclusive venue management and in-house catering.
                    </h6>
                </div>
            </div>
            <hr>
        </div>
    </section>
    <!-- Remove the container if you want to extend the Footer to full width. -->



    <div class="footer-content position-relative top-0">
        <!-- Footer -->
        <footer class="text-center text-lg-start text-white" style="background-color: #929fba">
            <!-- Grid container -->
            <div class="container p-4 pb-0">
                <!-- Section: Links -->
                <section class="">
                    <!--Grid row-->
                    <div class="row">
                        <!-- Grid column -->
                        <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                            <h6 class="text-uppercase mb-4 font-weight-bold">
                                AMY Events
                            </h6>
                            <p class="text-left text-white">
                                AMY events is always ready to serve you the best event as you want . Feel free to contact us anytime and anywhere . It's always been pleasure to have clients likes you
                            </p>
                        </div>
                        <!-- Grid column -->
                        <hr class="w-100 clearfix d-md-none" />
                        <hr class="w-100 clearfix d-md-none" />
                        <!-- Grid column -->
                        <hr class="w-100 clearfix d-md-none" />

                        <!-- Grid column -->
                        <div class="col-md-4 mx-auto mt-3 foot-add">
                            <h6 class="text-uppercase mb-4 font-weight-bold">Contact</h6>
                            <p><i class="fa-solid fa-house"></i> Gandhinagar- 382002</p>
                            <p><i class="fas fa-envelope mr-3"></i> eventsamy@gmail.com </p>
                            <p><i class="fas fa-phone mr-3"></i> + 01 234 567 88</p>
                            <p><i class="fas fa-print mr-3"></i> + 01 234 567 89</p>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-lg-3 col-xl-3 mx-auto mt-3 icons">
                            <h6 class="text-uppercase mb-4 font-weight-bold">Follow us</h6>

                            <!-- Facebook -->
                            <a class="btn btn-primary btn-floating m-1" style="background-color: #3b5998" href="https://facebook.com" role="button"><i class="fab fa-facebook-f"></i></a>

                            <!-- Twitter -->
                            <a class="btn btn-primary btn-floating m-1" style="background-color: #55acee" href="https://twitter.com" role="button"><i class="fab fa-twitter"></i></a>

                            <!-- Google -->
                            <!-- <a class="btn btn-primary btn-floating m-1" style="background-color: #dd4b39" href="https://google.com" role="button"><i class="fab fa-google"></i></a> -->

                            <!-- Instagram -->
                            <a class="btn btn-primary btn-floating m-1" style="background-color: #ac2bac" href="https://instagram.com" role="button"><i class="fab fa-instagram"></i></a>

                            <!-- Linkedin -->
                            <a class="btn btn-primary btn-floating m-1" style="background-color: #0082ca" href="https://linkedincom" role="button"><i class="fab fa-linkedin-in"></i></a>
                            <!-- Github -->
                            <a class="btn btn-primary btn-floating m-1" style="background-color: #333333" href="https://github.com" role="button"><i class="fab fa-github"></i></a>
                        </div>
                    </div>
                    <!--Grid row-->
                </section>
                <!-- Section: Links -->
            </div>
            <!-- Grid container -->

            <!-- Copyright -->
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
                © 2022 Copyright:
                <a class="text-white" href="">eventsbyamy@gmail.com</a>
            </div>
            <!-- Copyright -->
        </footer>
        <!-- Footer -->
    </div>
    <!-- End of .container -->


    <script>
        const $dropdown = $(".dropdown");
        const $dropdownToggle = $(".dropdown-toggle");
        const $dropdownMenu = $(".dropdown-menu");
        const showClass = "show";

        $(window).on("load resize", function() {
            if (this.matchMedia("(min-width: 768px)").matches) {
                $dropdown.hover(
                    function() {
                        const $this = $(this);
                        $this.addClass(showClass);
                        $this.find($dropdownToggle).attr("aria-expanded", "true");
                        $this.find($dropdownMenu).addClass(showClass);
                    },
                    function() {
                        const $this = $(this);
                        $this.removeClass(showClass);
                        $this.find($dropdownToggle).attr("aria-expanded", "false");
                        $this.find($dropdownMenu).removeClass(showClass);
                    }
                );
            } else {
                $dropdown.off("mouseenter mouseleave");
            }
        });
    </script>
    <!-- JS for hemburger -->
    <script>
        $(document).ready(function() {

            $('.first-button').on('click', function() {

                $('.animated-icon1').toggleClass('open');
            });
            $('.second-button').on('click', function() {

                $('.animated-icon2').toggleClass('open');
            });
            $('.third-button').on('click', function() {

                $('.animated-icon3').toggleClass('open');
            });
        });
    </script>
    <!-- AOS library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js" integrity="sha512-A7AYk1fGKX6S2SsHywmPkrnzTZHrgiVT7GcQkLGDe2ev0aWb8zejytzS8wjo7PGEXKqJOrjQ4oORtnimIRZBtw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.js"></script>
    <script src="assets/vendor/js/vendor.bundle.base.js"></script>
    <script src="assets/vendor/chart.js/Chart.min.js"></script>
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <script src="assets/js/todolist.js"></script>
    <script src="assets/js/file-upload.js"></script>
    <!-- <script src="assets/vendor/datatables/jquery.dataTables.min.js"></script> -->
    <script src="assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
</body>

</html>