<section class="loginsection">
    <div class="container">
        <div class="login">
            <div class="col-md-offset-3 col-md-6 col-md-offset-3">
                <div class="panel-info modal-content">
                    <div class="panel panel-heading text-center txtheading">Admin Login Panel</div>
                    <p class="msg"><?php echo $errorLogin; ?></p>
                    <p class="msg"><?php echo validation_errors(); ?></p>
                    <?php echo form_open('Frontpage/loginProcess');?>
                    <!--<form id="formlogin" >-->
                        <table class="table table-striped form-group">
                            <tr>
                                <td><label for="username" class="txt ">Username</label></td>
                                <td>:</td>
                                <td>
                                    <input type="text" class="txtinput" name="username" id="username" placeholder="Enter Username!">
                                </td>
                            </tr>
                            <tr>
                                <td><label for="password" class="txt">Password</label></td>
                                <td>:</td>
                                <td>
                                    <input type="password" class="txtinput" name="password" id="password" placeholder="Enter Password!">
                                </td>
                            </tr>
                            <th colspan="2">
                            <td>
                                <input type="submit" class="btn-success loginbtn" name="login" value="Login">
                            </td>
                            </th>
                        </table>
                    <!--</form>-->
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    var site_url = '<?php echo site_url();?>';
    $(function () {
//        alert("ok");
    $("#formlogin").on('submit',function(){
        var txtuser = $.trim($('#username').val());
        var txtpass = $.trim($('#password').val());
        
        if(txtuser == ""){
            alert('Enter Username');
            $('#username').focus();
            return false;
        }
        if(txtpass == ""){
            alert('Enter Password');
            $('#password').focus();
            return false;
        }
        
        $.post(site_url+'/Frontpage/login_ProcessAdmin',
  
        {
            username:txtuser,
            password:txtpass,
            rand:Math.random()
        },function(data){
            alert(data);
        });
        return false;
    })
    });
</script>