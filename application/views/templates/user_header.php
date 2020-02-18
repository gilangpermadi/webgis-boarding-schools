<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?= $title ?></title>

  <!-- Custom fonts for this template-->
  <link href="<?= base_url('assets/');?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="<?= base_url('assets/');?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css"
   integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
   crossorigin=""/>
  <link rel="stylesheet" href="<?php echo base_url('assets/css/leaflet-search.css'); ?>">


  <!-- Custom styles for this template-->
  <link href="<?= base_url('assets/');?>css/sb-admin-2.min.css" rel="stylesheet">
  <script src="<?= base_url('assets/');?>vendor/jquery/jquery.min.js"></script>
  <style>
    .card {
  display: block;
    margin-bottom: 20px;
    line-height: 1.42857143;
    background-color: #fff;
    border-radius: 2px;
    box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12);
    transition: box-shadow .25s;
  }
  .card:hover {
    box-shadow: 0 8px 17px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
  }
  .img-card {
    width: 100%;
    height:200px;
    border-top-left-radius:2px;
    border-top-right-radius:2px;
    display:block;
      overflow: hidden;
  }
  .img-card img{
    width: 100%;
    height: 200px;
    object-fit:cover;
    transition: all .25s ease;
  }
  .card-content {
    padding:15px;
    text-align:left;
  }
  .card-title {
    margin-top:0px;
    font-weight: 700;
    font-size: 1.65em;
  }
  .card-title a {
    color: #000;
    text-decoration: none !important;
  }
  .card-read-more {
    border-top: 1px solid #D4D4D4;
  }
  .card-read-more a {
    text-decoration: none !important;
    padding:10px;
    font-weight:600;
    text-transform: uppercase
  }
  #mapid { height: 480px; }
  </style>
  
  
</head>

<body id="page-top">
  
    <!-- Page Wrapper -->
  <div id="wrapper">