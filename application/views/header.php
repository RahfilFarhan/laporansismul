<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>

<head>
    <!-- Tambahin Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <link href="<?= site_url('asset/font/material-icon/material-icons.css'); ?>" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="<?= site_url('asset/css/materialize.min.css'); ?>" media="screen,projection" />
    <link rel="stylesheet" href="<?= base_url('asset/css/style.css'); ?>">
    <title>Loker.id</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <style>

    </style>
</head>

<body>
    <script type="text/javascript" src="<?= site_url('asset/js/materialize.min.js'); ?>"></script>

    <div class="navbar-fixed">
        <nav>
            <div class="nav-wrapper light-blue darken-4">
                <a href="<?= site_url(); ?>" class="brand-logo" style="padding-left: 20px;">LOKER.ID</a>
                <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                <ul class="right hide-on-med-and-down">
                    <?php if ($this->session->userdata('logged_in')): ?>
                        <li><a href="<?= site_url('controller/create'); ?>">Create</a></li>
                        <li><a href="<?= site_url('controller/logout'); ?>">Logout</a></li>
                    <?php else: ?>
                        <li><a href="<?= site_url('controller/login'); ?>">Login</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </nav>
    </div>

    <ul class="sidenav" id="mobile-demo">
        <li class="divider"></li>
        <?php if ($this->session->userdata('logged_in')): ?>
            <li><a href="<?= site_url('controller/create'); ?>">Create</a></li>
            <li><a href="<?= site_url('controller/logout'); ?>">Logout</a></li>
        <?php else: ?>
            <li><a href="<?= site_url('controller/login'); ?>">Login</a></li>
        <?php endif; ?>
    </ul>

    <main class="container">