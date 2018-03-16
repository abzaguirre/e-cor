<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>E-Cor | <?= $title ?></title>
        <link rel="shortcut icon" href="<?= $this->config->base_url() ?>images/logo/ecor-logo.png">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
        <!-- SweetAlert -->
        <link rel = "stylesheet" href ="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
        <!-- JQUERY -->
        <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

        <!-- Bootstrap Lightbox-->
        <link rel="stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css">

        <!-- Page level plugin CSS-->
        <link href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css" rel="stylesheet">

        <!-- Full Calendar -->
        <link rel ="stylesheet" href ="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.6.2/fullcalendar.css">

        <!-- Bootstrap Datepicker -->
        <link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/smalot-bootstrap-datetimepicker/2.4.4/css/bootstrap-datetimepicker.min.css">

        <!-- Bootstrap File Upload with preview -->
        <link rel="stylesheet" type="text/css" href="https://unpkg.com/file-upload-with-preview/dist/file-upload-with-preview.min.css">

        <link rel="stylesheet" href="<?= base_url() ?>assets/user/custom/css/styles.css">
    </head>
    <script  type="text/javascript">
        $(document).ready(function () {
            var january = "<?php echo $januaryCount ?>";
            var february = "<?php echo $februaryCount ?>";
            var march = "<?php echo $marchCount ?>";
            var april = "<?php echo $aprilCount ?>";
            var may = "<?php echo $mayCount ?>";
            var june = "<?php echo $juneCount ?>";
            var july = "<?php echo $julyCount ?>";
            var august = "<?php echo $augustCount ?>";
            var september = "<?php echo $septemberCount ?>";
            var october = "<?php echo $octoberCount ?>";
            var november = "<?php echo $novemberCount ?>";
            var december = "<?php echo $decemberCount ?>";
            // Chart.js scripts
            // -- Set new default font family and font color to mimic Bootstrap's default styling

            var ctx = document.getElementById("myAreaChart");
            var myLineChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
                    datasets: [{
                            label: "Transactions",
                            lineTension: 0.3,
                            backgroundColor: "rgba(2,117,216,0.2)",
                            borderColor: "rgba(2,97,116,1)",
                            pointRadius: 5,
                            pointBackgroundColor: "rgba(2,107,116,1)",
                            pointBorderColor: "rgba(255,255,255,0.8)",
                            pointHoverRadius: 5,
                            pointHoverBackgroundColor: "rgba(2,117,216,1)",
                            pointHitRadius: 20,
                            pointBorderWidth: 2,
                            data: [january, february, march, april, may, june, july, august, september, october, november, december],
                        }],
                },
                options: {
                    scales: {
                        xAxes: [{
                                time: {
                                    unit: 'date'
                                },
                                gridLines: {
                                    display: false
                                },
                                ticks: {
                                    maxTicksLimit: 12
                                }
                            }],
                        yAxes: [{
                                ticks: {
                                    min: 0,
                                    max: 10,
                                    maxTicksLimit: 5
                                },
                                gridLines: {
                                    color: "rgba(0, 0, 0, .125)",
                                }
                            }],
                    },
                    legend: {
                        display: false
                    }
                }
            });
        });

    </script>
    <body class="sidebar-fixed header-fixed">
        <div class="page-wrapper">