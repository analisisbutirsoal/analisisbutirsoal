<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="<?=base_url();?>/asset/themee/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=base_url();?>/asset/themee/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?=base_url();?>/asset/themee/css/owl.carousel.css">
    <link rel="stylesheet" href="<?=base_url();?>/asset/themee/css/owl.theme.css">
    <link rel="stylesheet" href="<?=base_url();?>/asset/themee/css/owl.transitions.css">
    <link rel="stylesheet" href="<?=base_url();?>/asset/themee/css/animate.css">
    <link rel="stylesheet" href="<?=base_url();?>/asset/themee/css/normalize.css">
    <link rel="stylesheet" href="<?=base_url();?>/asset/themee/css/meanmenu.min.css">
    <link rel="stylesheet" href="<?=base_url();?>/asset/themee/css/main.css">
    <link rel="stylesheet" href="<?=base_url();?>/asset/themee/css/form/all-type-forms.css">
    <link rel="stylesheet" href="<?=base_url();?>/asset/themee/css/educate-custon-icon.css">
    <link rel="stylesheet" href="<?=base_url();?>/asset/themee/css/morrisjs/morris.css">
    <link rel="stylesheet" href="<?=base_url();?>/asset/themee/css/dropzone/dropzone.css">
    <link rel="stylesheet" href="<?=base_url();?>/asset/themee/css/scrollbar/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="<?=base_url();?>/asset/themee/css/metisMenu/metisMenu.min.css">
    <link rel="stylesheet" href="<?=base_url();?>/asset/themee/css/metisMenu/metisMenu-vertical.css">
    <link rel="stylesheet" href="<?=base_url();?>/asset/themee/css/calendar/fullcalendar.min.css">
    <link rel="stylesheet" href="<?=base_url();?>/asset/themee/css/calendar/fullcalendar.print.min.css">
    <link rel="stylesheet" href="<?=base_url();?>/asset/themee/css/touchspin/jquery.bootstrap-touchspin.min.css">
    <link rel="stylesheet" href="<?=base_url();?>/asset/themee/css/chosen/bootstrap-chosen.css">
    <link rel="stylesheet" href="<?=base_url();?>/asset/themee/css/data-table/bootstrap-table.css">
    <link rel="stylesheet" href="<?=base_url();?>/asset/themee/css/style.css">
    <link rel="stylesheet" href="<?=base_url();?>/asset/themee/css/responsive.css">
    <link rel="stylesheet" href="<?=base_url();?>/asset/themee/css/select2/select2.min.css">
    <link rel="stylesheet" href="<?=base_url();?>/asset/themee/css/ionRangeSlider/ion.rangeSlider.css">
    <link rel="stylesheet" href="<?=base_url();?>/asset/themee/css/ionRangeSlider/ion.rangeSlider.skinFlat.css">
    <link rel="stylesheet" href="<?=base_url();?>/asset/themee/css/datetimepicker/bootstrap-datetimepicker.min.css">
    <script src="<?=base_url();?>/asset/themee/js/datepicker/bootstrap-datetimepicker.min.js"></script>
    <script src="<?=base_url();?>/asset/themee/js/vendor/modernizr-2.8.3.min.js"></script>
    <link rel="shortcut icon" type="image/x-icon" href="<?=base_url();?>/asset/themee/img/favicon.ico">
    <title>Online Test</title>
</head>
<body>
    <div class="left-sidebar-pro">
        <nav id="sidebar" class="">
            <div class="sidebar-header">
                <img class="main-logo" src="<?=base_url();?>/asset/themee/img/custom.png" alt=""/>
                <strong><a href="index.html"><img src="<?=base_url();?>/asset/themee/img/logo/logosn.png" alt="" /></a></strong>
            </div>
            <div class="left-custom-menu-adp-wrap comment-scrollbar">
                <nav class="sidebar-nav left-sidebar-menu-pro">
                    <ul class="metismenu" id="menu1">
                        <li class="active">
                            <a title="Dashboard" href="<?=site_url("siswa")?>">
								   <span class="educate-icon educate-home icon-wrap"></span>
								   <span class="mini-click-non">Daftar Ujian</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>
    </div>
    <!-- End Left menu area -->
    <!-- Start Welcome area -->
    <div class="all-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="logo-pro">
                        <a href="#"><img class="main-logo" src="<?=base_url();?>/asset/themee/img/logo.png" alt="" /></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-advance-area">
            <div class="header-top-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="header-top-wraper">
                                <div class="row">
                                    <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                                        <div class="menu-switcher-pro">
                                            <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
                                                <i class="educate-icon educate-nav"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-lg-11 col-md-12 col-sm-12 col-xs-12">
                                        <div class="header-right-info">
                                            <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                                <li class="nav-item">
                                                    <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
															<img src="<?=base_url();?>/asset/themee/img/user.png" alt="" />
															<span class="admin-name"><?=$this->session->userdata('level');?></span>
															<i class="fa fa-angle-down edu-icon edu-down-arrow"></i>
														</a>
                                                    <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn">
                                                        <li><a href="<?=site_url("siswa/editProfil/" . $this->session->userdata('username'))?>">Edit Profil</a></li>
                                                        <li><a href="<?=site_url('home/logout')?>">Logout</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Header end -->
            <!-- Mobile Menu start -->
            <div class="mobile-menu-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="mobile-menu">
                                <nav id="dropdown">
                                    <ul class="mobile-menu-nav">
                                        <li><a data-toggle="collapse" href="">Daftar Ujian<span class="admin-project-icon edu-icon"></span></a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mobile Menu end -->
        </div>
