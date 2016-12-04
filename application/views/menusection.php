<section class="menusection">
    <div class="container">
        <nav class="navbar navbar-inverse menuoption">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>                        
                    </button>
                    <a class="navbar-brand" href="#">WebSiteName</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">Home</a></li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Page 1-1</a></li>
                                <li><a href="#">Page 1-2</a></li>
                                <li><a href="#">Page 1-3</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Page 2</a></li>
                        <li><a href="#">Page 3</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Login <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <?php echo anchor('Frontpage/loginpage', ' Admin Login ', array('class' => 'login glyphicon glyphicon-user', 'title' => 'Login')); ?>
                                </li>
                                <li>
                                    <?php echo anchor('Frontpage/studentlogin', ' Students Login', array('class' => 'glyphicon glyphicon-user')); ?>
                                </li>
                                <li>
                                    <?php echo anchor('Frontpage/teacherlogin', ' Teachers Login ', array('class' => 'glyphicon glyphicon-user')); ?>
                                </li>
                            </ul>
                        </li>
                        <?php ?>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</section>