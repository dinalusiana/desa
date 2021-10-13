<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title; ?></title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>vendor/bootstrap/css/bootstrap.min.css">

    <!-- Article css -->
    <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>css/articles.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>css/new-article.css">

    <!-- Chosen css -->
    <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>vendor/chosen/chosen.min.css">

    <!-- Summernote css -->
    <link href="<?php echo base_url('assets/'); ?>vendor/summernote/summernote.css" rel="stylesheet">

    <!-- DataTable style -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


    <!-- My style css -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>css/style.css">
    <style>
        .shownavbar {
            display: block !important;
        }

        .hidenavbar {
            display: none !important;
        }
    </style>
    <script src="<?php echo base_url()?>/assets/chart/Chart.js"></script>

</head>

<body>

    <div class="container-fluid display-table">
        <div class="row display-table-row">