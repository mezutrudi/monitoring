<!doctype html>
<html class="no-js " lang="en">


<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">

<title>::Halaman | Login::</title>
<!-- Favicon-->
<link rel="icon" href="<?=base_url('public/')?>assets/images/favicon.png" type="image/x-icon">
<!-- Custom Css -->
<link rel="stylesheet" href="<?=base_url('public/')?>assets/plugins/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="<?=base_url('public/')?>assets/css/style.min.css">    
</head>

<body class="theme-blush">

<div class="authentication">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-sm-12">
                <form class="card auth_form" action="<?=base_url('proses-login')?>" method="POST">
                    <div class="header">
                        <img class="logo" src="<?=base_url('public/')?>assets/images/logo.png" alt="">
                        <h5>Log in</h5>
                    </div>
                    <div class="body">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="username" placeholder="Username">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="zmdi zmdi-account-circle"></i></span>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" name="password" placeholder="Password">
                            <div class="input-group-append">                                
                                <span class="input-group-text"><a href="forgot-password.html" class="forgot" title="Forgot Password"><i class="zmdi zmdi-lock"></i></a></span>
                            </div>                            
                        </div>
                        
                        <button type="submit" class="btn btn-primary btn-block waves-effect waves-light">L O G I N</button>                        
                        <div class="signin_with mt-3">
                            <?php
                                if($pesan !=""){
                                    ?>
                                     <p class="mb-0"><div class="alert alert-danger"><?=$pesan?></div></p>
                                    <?php
                                }
                            ?>
                           
                            
                        </div>
                    </div>
                </form>
                <div class="copyright text-center">
                    &copy;
                    <script>document.write(new Date().getFullYear())</script>,
                    <span><a href="http://unuja.ac.id/">UNUJA</a></span>
                </div>
            </div>
            <div class="col-lg-8 col-sm-12">
                <div class="card">
                    <img src="<?=base_url('public/')?>assets/images/signin.svg" alt="Sign In"/>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Jquery Core Js -->
<script src="<?=base_url('public/')?>assets/bundles/libscripts.bundle.js"></script>
<script src="<?=base_url('public/')?>assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
</body>


</html>