<?php

$url = urlOf('pages/login');
if (!isset($_SESSION['LoggedIn'])) {
    header("Location: $url");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
   
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
      <title>EduSync</title>
      <link rel="shortcut icon" href="<?=urlOf("assets/img/logo1.png")?>">
      <link rel="stylesheet" href="<?=urlOf("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,500;0,600;0,700;1,400&amp;display=swap")?>">
      <link rel="stylesheet" href="<?=urlOf("assets/plugins/bootstrap/css/bootstrap.min.css")?>">
      <link rel="stylesheet" href="<?=urlOf("assets/plugins/fontawesome/css/fontawesome.min.css")?>">
      <link rel="stylesheet" href="<?=urlOf("assets/plugins/fontawesome/css/all.min.css")?>">
      <link rel="stylesheet" href="<?=urlOf("assets/plugins/fontawesome/css")?>">
      <link rel="stylesheet" href="<?=urlOf("assets/css/style.css")?>">
      <link rel="stylesheet" href="<?=urlOf("assets/plugins/simple-calendar/simple-calendar.css")?>">
   </head>
   <body>
      <div class="main-wrapper">
         <div class="header">
            <div class="header-left">
               <a class="logo mb-2 ml-0">
               <img src="<?=urlOf("assets/img/logo1.png")?>" alt="Logo">
            </a>
            <span class="h2 text-dark">EduSync</span>
               <a href="index.html" class="logo logo-small">
               <img src="<?=urlOf("assets/img/logo-small.png")?>" alt="Logo" width="30" height="30">
               </a>
            </div>
            <a href="javascript:void();" id="toggle_btn">
            <i class="fas fa-align-left"></i>
            </a>
            <ul class="nav user-menu">
               <li class="nav-item dropdown has-arrow">
                  <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                  <span class="user-img"><img class="rounded-circle" src="<?=urlOf("assets/img/profiles/avatar-01.jpg")?>" width="31" alt="Ryan Taylor"></span>
                  </a>
                  <div class="dropdown-menu">
                     <div class="user-header">
                        <div class="avatar avatar-sm">
                           <img src="<?=urlOf("assets/img/profiles/avatar-01.jpg")?>" alt="User Image" class="avatar-img rounded-circle">
                        </div>
                        <div class="user-text">
                           <h6>Ryan Taylor</h6>
                           <p class="text-muted mb-0">Administrator</p>
                        </div>
                     </div>
                     <a class="dropdown-item" href="profile.html">My Profile</a>
                     <a class="dropdown-item" href="inbox.html">Inbox</a>
                     <a class="dropdown-item" href="login.html">Logout</a>
                  </div>
               </li>
            </ul>
         </div>
