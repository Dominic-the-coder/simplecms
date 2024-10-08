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
  $path = parse_url( $path, PHP_URL_PATH ); 

  // once you figure out the path the user is visiting, load relevant content
  switch ( $path ){
    //actions
    case '/auth/login':
      require 'includes/auth/login.php';
      break;
    case '/auth/signup':
      require 'includes/auth/signup.php';
      break;
    //users  
    case '/user/add':
      require 'includes/user/add.php';
      break;
    case '/user/delete':
      require 'includes/user/delete.php';
      break;
    case '/user/edit':
      require 'includes/user/edit.php';
      break;
    case '/user/changepwd':
      require 'includes/user/changepwd.php';
      break;
    //posts
    case '/post/add':
      require 'includes/post/add.php';
      break;
    case '/post/delete':
      require 'includes/post/delete.php';
      break;
    case '/post/edit':
      require 'includes/post/edit.php';
      break;
    case '/post/view':
      require 'includes/post/view.php';
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
    case '/manage-posts-add':
      require 'pages/manage_posts_add.php';
      break;
    case '/manage-users-add':
      require 'pages/manage_users_add.php';
      break;
    case '/manage-users-changepwd':
      require 'pages/manage_users_changepwd.php';
      break;
    case '/dashboard':
      require 'pages/dashboard.php';
      break;
    case '/manage-posts-edit':
      require 'pages/manage_posts_edit.php';
      break;
    case '/manage-users-edit':
      require 'pages/manage_users_edit.php';
      break;
    case '/manage-posts':
      require 'pages/manage_posts.php';
      break;
    case '/manage-users':
      require 'pages/manage_users.php';
      break;
    case '/post':
      require 'pages/post.php';
      break;
    default:
      require 'pages/home.php';
      break;
  }