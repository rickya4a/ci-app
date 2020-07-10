<?php $class = service('page') ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Medicamp Responsive Bootstrap Template">
    <meta name="keywords" content="Pixel">
    <meta name="author" content="rkwebdesigns">
    <!-- Site Title -->
    <title><?= esc($title) ?></title>
    <!-- Fav Icons -->
    <link
      rel="icon"
      href="<?php echo base_url('assets/images/favicon.png') ?>"
      type="image/x-icon">
    <!-- Font Awesome -->
    <?= link_tag('assets/css/all.min.css') ?>
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <?= link_tag('assets/css/tempusdominus-bootstrap-4.min.css') ?>
    <!-- Theme style -->
    <?= link_tag('assets/css/adminlte.min.css') ?>
    <!-- overlayScrollbars -->
    <?= link_tag('assets/css/OverlayScrollbars.min.css') ?>
    <!-- Daterange picker -->
    <?= link_tag('assets/css/daterangepicker.css') ?>
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- summernote -->
    <?= link_tag('assets/css/summernote-bs4.min.css') ?>
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  </head>
  <body class="<?php $class->admin_body() ?>">