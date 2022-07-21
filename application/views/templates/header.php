<!doctype html>
<html class="no-js " lang="en">

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">

<title>Aplikasi Monitoring | <?=$halaman?></title>
<!-- Favicon-->
<link rel="icon" href="<?=base_url('public/')?>assets/images/favicon.png" type="image/x-icon">
<link rel="stylesheet" href="<?=base_url('public/')?>assets/plugins/bootstrap/css/bootstrap.min.css">

<!-- JQuery DataTable Css -->
<link rel="stylesheet" href="<?=base_url('public/')?>assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?=base_url('public/')?>assets/css/style.min.css">
<script src="<?=base_url('public/')?>assets/js/jquery-3.5.1.min.js"></script>
<link href="<?=base_url('public/')?>assets/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />


</head>

<body class="theme-blush">

<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="m-t-30"><img class="zmdi-hc-spin" src="<?=base_url('public/')?>assets/images/loader.svg" width="48" height="48" alt="Aero"></div>
        <p>Tunggu sebentar ya...</p>
    </div>
</div>

<!-- Overlay For Sidebars -->
<div class="overlay"></div>

<!-- Main Search -->
<!-- <div id="search">
    <button id="close" type="button" class="close btn btn-primary btn-icon btn-icon-mini btn-round">x</button>
    <form>
        <input type="search" value="" placeholder="Search..." />
        <button type="submit" class="btn btn-primary">Search</button>
    </form>
</div> -->

<!-- Right Icon menu Sidebar -->
<div class="navbar-right">
    <ul class="navbar-nav">
        <!-- <li><a href="#search" class="main_search" title="Search..."><i class="zmdi zmdi-search"></i></a></li> -->
        
        <li><a href="<?=base_url('logout')?>" class="mega-menu" title="Sign Out"><i class="zmdi zmdi-power"></i></a></li>
    </ul>
</div>

<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar">
    <div class="navbar-brand">
        <button class="btn-menu ls-toggle-btn" type="button"><i class="zmdi zmdi-menu"></i></button>
        <a href="<?=base_url('beranda-utama')?>"><img src="<?=base_url('public/')?>assets/images/logo-icon.png" width="25" alt="Aero"><span class="m-l-10">NurJa</span></a>
    </div>
    <div class="menu">
        <ul class="list">
            <li>
                <div class="user-info">
                    <a class="image" href="profile.html"><img src="<?=base_url('public/')?>assets/images/utama.jpg" alt="User"></a>
                    <div class="detail">
                        <h4><?=$this->session->userdata('nama_lengkap')?></h4>
                        <small>Super Admin</small>                        
                    </div>
                </div>
            </li>
            
            <li class="<?php if($menu=="beranda"){ ?>active open <?php } ?>"><a href="<?=base_url('beranda-utama')?>"><i class="zmdi zmdi-home"></i><span>Beranda</span></a></li>
           
            <li class="<?php if($pusat=="datakampus"){ ?>active open <?php } ?>"><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-apps"></i><span>Data Kampus</span></a>
                <ul class="ml-menu">
                    <li class="<?php if($menu=="fakultas"){ ?>active<?php } ?>"><a href="<?=base_url('beranda-fakultas')?>">Fakultas</a></li>
                    <li  class="<?php if($menu=="prodi"){ ?>active<?php } ?>"><a href="<?=base_url('beranda-prodi')?>">Prodi</a></li>
                    <li class="<?php if($menu=="th"){ ?>active<?php } ?>"><a href="<?=base_url('beranda-tahun_akademik')?>">Tahun Akademik</a></li>                 
                </ul>
            </li>
           
            <li class="<?php if($menu=="dosen"){ ?>active open <?php } ?>"><a href="<?=base_url('beranda-dosen')?>"><i class="zmdi zmdi-airline-seat-recline-extra"></i><span>Dosen</span></a></li>
            <li class="<?php if($menu=="mahasiswa"){ ?>active open <?php } ?>"><a href="<?=base_url('beranda-mahasiswa')?>"><i class="zmdi zmdi-male-alt"></i><span>Mahasiswa</span></a></li>
            <li class="<?php if($pusat=="datapematerian"){ ?>active open <?php } ?>"><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-case-check"></i><span>Pemeterian</span></a>
                <ul class="ml-menu">
                    <li class="<?php if($menu=="materi"){ ?>active open <?php } ?>"><a href="<?=base_url('beranda-materi')?>">Materi</a></li>
                    <li class="<?php if($menu=="standar_kompetensi"){ ?>active open <?php } ?>"><a href="<?=base_url('beranda-standar_kompetensi')?>">Standart Kompetensi</a></li>
                    <li class="<?php if($menu=="kompetensi_dasar"){ ?>active open <?php } ?>"><a href="<?=base_url('beranda-kompetensi_dasar')?>">Kompetensi Dasar</a></li>                 
                </ul>
            </li>
            <li class="<?php if($menu=="tugas"){ ?>active open <?php } ?>"><a href="<?=base_url('beranda-tugas')?>"><i class="zmdi zmdi-graduation-cap"></i><span>Tugas</span></a></li>
            <li class="<?php if($menu=="setting"){ ?>active open <?php } ?>"><a href="<?=base_url('beranda-settingdosen')?>"><i class="zmdi zmdi-wrench"></i><span>Setting</span></a></li>
            <li class="<?php if($menu=="monitoring"){ ?>active open <?php } ?>"><a href="<?=base_url('beranda-hasilmonitoring')?>"><i class="zmdi zmdi-border-color"></i><span>Monitoring</span></a></li>
            <li class="<?php if($menu=="cetak"){ ?>active open <?php } ?>"><a href="<?=base_url('beranda-cetaksertifkat')?>"><i class="zmdi zmdi-book-image"></i><span>Cetak Sertifikat</span></a></li>
        </ul>
    </div>
</aside>
<!-- Main Content -->
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Halaman <?= $awal?></h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?=base_url('beranda-utama')?>"><i class="zmdi zmdi-home"></i> Beranda</a></li>
                        <li class="breadcrumb-item active"><?= $awal?></li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">                
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div>
