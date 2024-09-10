<?php

// start session
session_start();

// import all the required files
require "includes/functions.php";

/*
    simple routing system -> decide what page to load depending the url the user visit

    localhost:9000/ -> home.php
    localhost:9000/login -> login.php
    localhost:9000/signup -> signup.php
    localhost:9000/logout -> logout.php
  */

  // figure out the url the user is visiting
  $path = $_SERVER["REQUEST_URI"];

  // once you figure out the path the user is visiting, load relevant content
  switch ( $path ){
    //actions
    case '/auth/login':
      require 'includes/auth/login.php';
      break;
    case '/auth/signup':
      require 'includes/auth/signup.php';
      break;
    //pages
    case '/login':
      require 'pages/login.php';
      break;
    case '/signup':
      require 'pages/signup.php';
      break;
    case '/logout':
      require 'pages/logout.php';
      break;
    case '/manage_posts_add':
      require 'pages/manage_posts_add.php';
      break;
    case '/manage_users_add':
      require 'pages/manage_users_add.php';
      break;
    case '/manage_users_changepwd':
      require 'pages/manage_users_changepwd.php';
      break;
    case '/dashboard':
      require 'pages/dashboard.php';
      break;
    case '/manage_post_edit':
      require 'pages/manage_post_edit.php';
      break;
    case '/manage_users_edit':
      require 'pages/emanage_users_edit.php';
      break;
    case '/manage_posts':
      require 'pages/manage_posts.php';
      break;
    case '/manage_users':
      require 'pages/manage_users.php';
      break;
    case '/post':
      require 'pages/post.php';
      break;
    default:
      require 'pages/home.php';
      break;
  }