<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/leaflet/leaflet.css'); ?>">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">

    <!-- Main CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css')?>">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://api.mapbox.com/mapbox.js/plugins/leaflet-fullscreen/v1.0.1/leaflet.fullscreen.css' rel='stylesheet' />
    <link rel="stylesheet" href="<?php echo base_url('assets/css') ?>/L.Control.Sidebar.css" />
    <link rel="stylesheet" href="<?php echo base_url('assets/css/leaflet-gps.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/leaflet-search.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/leaflet-panel-layers.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/leaflet.groupedlayercontrol.css" />

    <title>Sistem Informasi Geografi</title>
    <style type="text/css">
        #mapid {
            width: auto;
            height: 580px;
        }
    </style>
    </head>
    <body>