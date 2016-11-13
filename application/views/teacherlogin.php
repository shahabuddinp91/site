<section class="teacherslogin">
    <div class="container">
        <div class="row">
            <div class="col-md-offset-3 col-md-6 col-md-offset-3">
                <div class="teachlogin well">
                    <p class="teacherpanel">Teachers Login Panel</p>
                    <p class="msg"><?php echo $this->session->flashdata('msg'); ?></p>
                    <p class="success"><?php echo $this->session->flashdata('success'); ?></p>
                    <p class="msg"><?php echo validation_errors(); ?></p>
                    <form class="form-horizontal" action="../Frontpage/teacherLoginProcess" method="post">
                    <?php // echo form_open('Frontpage/teacherLoginProcess'); ?>
                    <table class="table">
                        <tr>
                            <td class="temail">Email</td>
                            <td>:</td>
                            <td>
                                <input type="email" name="temail" id="temail" class="temail form-control" placeholder="Enter E-Mail">
                            </td>
                        </tr>
                        <tr>
                            <td class="tpassword">Password</td>
                            <td>:</td>
                            <td>
                                <input type="password" name="tpassword" id="tpassword" class="tpassword form-control" placeholder="Enter Password">
                            </td>
                        </tr>
                        <th colspan="2">
                        <td>
                            <input type="submit" name="login" class="btn btn-primary" value="Login">
                        </td>
                        </th>
                    </table>
                    </form>
                    <?php // echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!--<section class="studentslogin">
    <div class="container">
        <div class="row">
            <div class="col-md-offset-3 col-md-6 col-md-offset-3">
                <div class="stdlogin well">
                    <p class="stdpanel">Students Login Panel</p>
                    <p class="msg"><?php echo $this->session->flashdata('msg'); ?></p>
                    <p class="success"><?php echo $this->session->flashdata('success'); ?></p>
                    <p class="msg"><?php echo validation_errors(); ?></p>
                    <form class="form-horizontal" action="../Frontpage/stdloginProcess" method="post">
                        <table class="table">
                            <tr>
                                <td class="temail">Email</td>
                                <td>:</td>
                                <td>
                                    <input type="email" name="temail" id="temail" class="temail form-control" placeholder="Enter E-Mail">
                                </td>
                            </tr>
                            <tr>
                                <td class="tpassword">Password</td>
                                <td>:</td>
                                <td>
                                    <input type="password" name="tpassword" id="tpassword" class="tpassword form-control" placeholder="Enter Password">
                                </td>
                            </tr>
                            <th colspan="2">
                            <td>
                                <input type="submit" name="login" class="btn btn-primary" value="Login">
                            </td>
                            </th>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>-->