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
        <!-- Page level plugin CSS-->
        <link href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css" rel="stylesheet">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
        <!-- SweetAlert -->
        <link rel = "stylesheet" href ="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
        <!-- JQUERY -->
        <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <link href="<?= base_url() ?>assets/bootstrap-datepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
        <link rel="stylesheet" href="<?= base_url() ?>assets/user/custom/css/styles.css"> 
        <!-- Bootstrap File Upload with preview -->
        <link rel="stylesheet" type="text/css" href="https://unpkg.com/file-upload-with-preview/dist/file-upload-with-preview.min.css">

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
        .options{
            margin-top:100px;
        }
        .btn-options{
            height:300px;
            width:300px;

        }
        .btn-options:hover{
            opacity:10;
        }
        .icon-option{
            height:100px;
            opacity:0.8;
            -webkit-transition: all 1s ease; /* Safari and Chrome */
            -moz-transition: all 1s ease; /* Firefox */
            -ms-transition: all 1s ease; /* IE 9 */
            -o-transition: all 1s ease; /* Opera */
            transition: all 1s ease;
        }
        .icon-option:hover{
            opacity:10;
            -webkit-transform:scale(1.25); /* Safari and Chrome */
            -moz-transform:scale(1.25); /* Firefox */
            -ms-transform:scale(1.25); /* IE 9 */
            -o-transform:scale(1.25); /* Opera */
            transform:scale(1.25);
        }

    </style>
    <body class="sidebar-fixed header-fixed">
        <div class="page-wrapper">