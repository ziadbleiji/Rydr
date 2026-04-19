<?php
$url = $_GET['url'] ?? 'home';

switch($url){

    case '':
    case 'home':
        require "pages/home.php";
        break;

    case 'ons-aanbod':
        require "pages/ons-aanbod.php";
        break;

    case 'over-ons':
        require "pages/over-ons.php";
        break;

    case 'car-detail':
        require "pages/car-detail.php";
        break;

    case 'account':
        require "pages/account.php";
        break;

    case 'login':
        require "login.php";
        break;

    case 'register':
        require "register.php";
        break;

    case 'login-form':
        require "pages/login-form.php";
        break;

    case 'register-form':
        require "pages/register-form.php";
        break;

    default:
        require "pages/404.php";
        break;
}