<!DOCTYPE html>
<html>
    <head>
        <title>School Management</title>
        <link rel="stylesheet" href="<?php echo $baseurl; ?>asset/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo $baseurl; ?>asset/css/style.css">
<!--        <link rel="stylesheet" href="<?php echo $baseurl; ?>asset/fonts/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo $baseurl; ?>asset/fonts/font-awesome.css">-->
        <script src="<?php echo $baseurl; ?>asset/js/bootstrap.js"></script>
        <script src="<?php echo $baseurl; ?>asset/js/bootstrap.min.js"></script>
        <script src="<?php echo $baseurl; ?>asset/js/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>        
        <!--<script src='//cdn.tinymce.com/4/tinymce.min.js'></script>-->
    </head>
    <body>
        <header class="headersection">
            <div class="container">
                <div class="row">
                    <div class="col-md-2">
                        <div class="logosection">
                            <a href="<?php echo $baseurl;?>">
                               <?php if($allsettings){?>
                                <img src="<?php echo $baseurl; ?>uploads/logo/<?php echo $allsettings[0]->logo; ?>" alt="Logo">
                                <?php 
                                } else { ?>
                                <img src="<?php echo $baseurl; ?>asset/images/logo.png">  
                                <?php 
                                }
                                ?>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="slogan">
                            <?php if($allsettings){ ?>
                            <h4><?php echo $allsettings[0]->versityname; ?></h4>
                            <p><?php echo $allsettings[0]->title; ?></p>
                            <?php 
                            }else {?>
                            <h4>School Name</h4>
                            <p>School Title</p>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="search">
                            <form class="navbar-form navbar-right">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Search">
                                </div>
                                <button type="submit" class="btn btn-default">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </header>