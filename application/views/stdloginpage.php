<section class="studentslogin">
    <div class="container">
        <div class="row">
            <div class="col-md-offset-3 col-md-6 col-md-offset-3">
                <div class="stdlogin well">
                    <p class="stdpanel">Students Login Panel</p>
                    <p class="msg"><?php echo $this->session->flashdata('msg'); ?></p>
                    <p class="success"><?php echo $this->session->flashdata('success'); ?></p>
                    <p class="msg"><?php echo validation_errors(); ?></p>
                    <form class="form-horizontal" action="stdloginProcess" method="post">
                        <table class="table">
                            <tr>
                                <td class="stdsm">Email</td>
                                <td>:</td>
                                <td>
                                    <input type="email" name="stdemail" id="stdemail" class="stdemail form-control" placeholder="Enter E-Mail">
                                </td>
                            </tr>
                            <tr>
                                <td class="stdsm">Password</td>
                                <td>:</td>
                                <td>
                                    <input type="password" name="stdpassword" id="stdpassword" class="stdpassword form-control" placeholder="Enter Password">
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
</section>