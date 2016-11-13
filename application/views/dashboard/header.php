<html>
    <head>
        <title>School Management</title>
        <link rel="stylesheet" type="text/css" href="<?php echo $baseurl; ?>asset/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="<?php echo $baseurl; ?>asset/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo $baseurl; ?>asset/css/dashboardstyle.css">

        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo $baseurl; ?>asset/fonts/font-awesome.css">-->
        <script src="<?php echo $baseurl; ?>/asset/js/bootstrap.js"></script>
        <script src="<?php echo $baseurl; ?>/asset/js/bootstrap.min.js"></script>
        <script src="<?php echo $baseurl; ?>/asset/js/jquery.min.js"></script>
        <script src="<?php echo $baseurl; ?>/asset/js/myscript.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <!--its for datepicker-->
        <link rel="stylesheet" href="<?php echo $baseurl; ?>asset/css/datepicker.css">
        <script src="<?php echo $baseurl; ?>asset/js/bootstrap-datepicker.js"></script>
        <script>
            $(function () {
                $('.datepicker').datepicker();
            });
        </script>
    </head>
    <body>
        <nav class="navbar navbar-default navbar-fixed-top headertop">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand linka" href="#">School Management</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                    <!--                    <form class="navbar-form navbar-right">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Search">
                                            </div>
                                            <button type="submit" class="btn btn-default">Submit</button>
                                        </form>-->
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <?php echo anchor('Dashboard/index', 'Dashboard', array('class' => 'linka')); ?>
                        </li>
                        <li>
                            <?php echo anchor('Frontpage/logout', ' Logout', array('title' => 'Logout', 'class' => 'glyphicon glyphicon-log-out logout linka')); ?>
                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
    </body>
</html>