<?php ob_start(); ?>
<?php session_start(); ?>

<?php include("../includes/db.php"); ?>
<?php include("function.php"); ?>




<?php

if(!isset($_SESSION['user_role'])){
    header("Location: ../index.php");
}


?>





<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CMS Admin</title>

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet" type="text/css" media="all">

    <link rel="stylesheet" type="text/css" href="css/admin_style.css" media="all">

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/29.1.0/classic/ckeditor.js"></script>
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

</head>

<body>