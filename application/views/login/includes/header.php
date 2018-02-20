<!DOCTYPE html>
<html lang="en-US" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--  
        Document Title
        =============================================
        -->
        <title><?= $title ?></title>
        <!--  
        Favicons
        =============================================
        -->
        <link rel="apple-touch-icon" sizes="57x57" href="<?= base_url() ?>images/favicons/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="<?= base_url() ?>images/favicons/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="<?= base_url() ?>images/favicons/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url() ?>images/favicons/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="<?= base_url() ?>images/favicons/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="<?= base_url() ?>images/favicons/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="<?= base_url() ?>images/favicons/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="<?= base_url() ?>images/favicons/apple-icon-152x152.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="<?= base_url() ?>images/favicons/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url() ?>images/favicons/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="<?= base_url() ?>images/favicons/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() ?>images/favicons/favicon-16x16.png">
        <link rel="manifest" href="/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">
        <!--  
        Stylesheets
        =============================================
        
        -->
        <!-- Default stylesheets-->
        <link href="<?= base_url() ?>assets/main/lib/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Template specific stylesheets-->
        <link href="<?= base_url() ?>https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700" rel="stylesheet">
        <link href="<?= base_url() ?>https://fonts.googleapis.com/css?family=Volkhov:400i" rel="stylesheet">
        <link href="<?= base_url() ?>https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
        <link href="<?= base_url() ?>assets/main/lib/animate.css/animate.css" rel="stylesheet">
        <link href="<?= base_url() ?>assets/main/lib/components-font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="<?= base_url() ?>assets/main/lib/et-line-font/et-line-font.css" rel="stylesheet">
        <link href="<?= base_url() ?>assets/main/lib/flexslider/flexslider.css" rel="stylesheet">
        <link href="<?= base_url() ?>assets/main/lib/owl.carousel/dist/assets/owl.carousel.min.css" rel="stylesheet">
        <link href="<?= base_url() ?>assets/main/lib/owl.carousel/dist/assets/owl.theme.default.min.css" rel="stylesheet">
        <link href="<?= base_url() ?>assets/main/lib/magnific-popup/dist/magnific-popup.css" rel="stylesheet">
        <link href="<?= base_url() ?>assets/main/lib/simple-text-rotator/simpletextrotator.css" rel="stylesheet">
        <!-- Main stylesheet and color file-->
        <link href="<?= base_url() ?>assets/main/css/style.css" rel="stylesheet">
        <link id="color-scheme" href="<?= base_url() ?>assets/main/css/colors/default.css" rel="stylesheet">
    </head>
    <style>
        .shadow{
            text-shadow: 6px 4px 5px #800000;

        }
        .work-image{
            height:250px;
        }
        @keyframes heartbeat
        {
            0%
            {
                transform: scale( .75);
            }

            20%
            {
                transform: scale( 1);
            }

            40%
            {
                transform: scale( .75);
            }

            60%
            {
                transform: scale( 1);
            }
            80% {
                transform: scale( .75);
            }

            100%
            {
                transform: scale( .75);
            }
        }

        #heart
        {
            position: relative;
            width: 100px;
            height: 90px;
            animation: heartbeat 1s infinite;
        }

        #heart:before,
        #heart:after
        {
            position: absolute;
            content: "";
            left: 50px;
            top: 0;
            width: 50px;
            height: 80px;
            background: red;
            -moz-border-radius: 50px 50px 0 0;
            border-radius: 50px 50px 0 0;
            -webkit-transform: rotate(-45deg);
            -moz-transform: rotate(-45deg);
            -ms-transform: rotate(-45deg);
            -o-transform: rotate(-45deg);
            transform: rotate(-45deg);
            -webkit-transform-origin: 0 100%;
            -moz-transform-origin: 0 100%;
            -ms-transform-origin: 0 100%;
            -o-transform-origin: 0 100%;
            transform-origin: 0 100%;
        }

        #heart:after
        {
            left: 0;
            -webkit-transform: rotate(45deg);
            -moz-transform: rotate(45deg);
            -ms-transform: rotate(45deg);
            -o-transform: rotate(45deg);
            transform: rotate(45deg);
            -webkit-transform-origin: 100% 100%;
            -moz-transform-origin: 100% 100%;
            -ms-transform-origin: 100% 100%;
            -o-transform-origin: 100% 100%;
            transform-origin: 100% 100%;
        }
        .footer {
            position: absolute;
            right: 0;
            bottom: 0;
            left: 0;
        }
        .bg-violet{
            background-color:#715ba7;
            border: 0;
        }
    </style>
    <body data-spy="scroll" data-target=".onpage-navigation" data-offset="60">
        <main>
            <div class="page-loader">
                <div class="loader">Loading...</div>
            </div>
            <nav class="navbar navbar-custom navbar-fixed-top bg-violet" role="navigation">
                <div class="container">
                    <div class="navbar-header">
                        <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#custom-collapse"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><a class="navbar-brand" href="<?= base_url() ?>main/">E-COR</a>
                    </div>
                </div>
            </nav>