<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title><?= $title ?> | Client</title>
        <link rel="shortcut icon" href="<?= $this->config->base_url() ?>images/logo/ecor-logo.png">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- Bootstrap core CSS-->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
        <!-- SweetAlert -->
        <link rel = "stylesheet" href ="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
        <!-- JQUERY -->
        <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="<?= base_url() ?>assets/user/custom/css/styles.css">
    </head>
    <style>
        .breadcrumb{
            background-color:rgba(113,91,167,0.8) !important;
        }
        .breadcrumb-item{
            color:rgb(211,211,211) !important;
        }
        .star-rating {
            line-height:32px;
            font-size:1.25em;
        }

        .star-rating .fa-star{
            color: #F1C40F;
            opacity: 0.7;
        }
        .intro{
            background:#E0E0E0;
            margin-top:10px;
            border-radius: 10px;
        }
    </style>
    <body class="sidebar-fixed header-fixed">
        <div class="page-wrapper">