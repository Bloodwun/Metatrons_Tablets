<?php

require_once "../db.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <!-- <link rel="stylesheet" href="../assets/css/style.css"> -->
    <link rel="stylesheet" href="../assets/css/style.css?v=<?= filemtime(__DIR__ . '/../assets/css/style.css'); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">



  </head>
  <body>
  <div class="mobile-wrap">
      <div class="mobile clearfix">
        <div class="header">
          <span class="ion-ios-navicon pull-left"><i></i></span>
          <span class="title">Home</span>
          <span class="ion-ios-search pull-right"></span>
          <div class="search">
            <form method="post">
              <input type="search" placeholder="Search Here" />
            </form>
          </div>
        </div>
<?php include '../layouts/user-sidebar.php'; ?>


