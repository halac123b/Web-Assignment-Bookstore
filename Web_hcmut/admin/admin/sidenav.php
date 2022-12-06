<?php

if (!isset($_SESSION['admin_name'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: .././login.php');
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['admin_name']);
    header("location: .././login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-touch-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        TechShop|Admin
    </title>
    <meta
        content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet"
        href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link href="assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <script src="./assets/js/scrip.js" defer></script>
    <style>
    select option {
        color: black;
    }
    </style>
</head>

<body class="dark-edition">
    <div class="wrapper ">
        <div class="sidebar" data-color="purple" data-background-color="black"
            data-image="../assets/img/sidebar-2.jpg">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
            <div class="logo"><a href="index.php" class="simple-text logo-normal">
                    <p style="font-family: 'Brush Script MT', cursive;
    font-size: 25px;"> <i class="fa fa-book" aria-hidden="true"></i> BK Bookstore</p>
                </a></div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">
                            <i class="material-icons">dashboard</i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="addsuppliers.php">
                            <i class="material-icons">person_add</i>
                            <p>Add users</p>
                        </a>

                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="add_products.php">
                            <i class="material-icons">add</i>
                            <p>Add Products</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="products_list.php">
                            <i class="material-icons">list</i>
                            <p>Product List</p>
                        </a>

                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="manageuser.php">
                            <i class="material-icons">person</i>
                            <p>Manage users</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="activity.php">
                            <i class="material-icons">timeline</i>
                            <p>Activities</p>
                        </a>
                    </li>

                    <li class="nav-item ">
                        <a class="nav-link" href="profile.php">
                            <icons-image _ngcontent-aye-c22="" _nghost-aye-c19=""><i _ngcontent-aye-c19=""
                                    class="material-icons icon-image-preview">settings</i></icons-image>
                            <p>setting</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>