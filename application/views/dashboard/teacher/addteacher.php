        
<section class="teacherectionadd">
    <div class="col-md-offset-1 col-md-8 col-md-offset-1">
        <div class="teacher">
            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                Add Teacher
            </button>
            <?php echo form_error('name'); ?>
            <?php echo form_error('mobile'); ?>
            <?php echo form_error('dob'); ?>
            <?php echo form_error('email'); ?>
            <?php echo form_error('password'); ?>
            <?php echo form_error('address'); ?>
            <?php echo validation_errors(); ?>
            <div class="collapse navbar-collapse navbar-form navbar-right searchbtn" id="bs-example-navbar-collapse-1">
                <form class="navbar-form" role="search" id="frmsearch" >
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search..." id="dataMatch" name="dataMatch">
<!--                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-default">
                                <span class="glyphicon glyphicon-search">
                                    <span class="sr-only">Search...</span>
                                </span>
                            </button>
                        </span>-->
                    </div>
                </form>
            </div>
            <p class="success"><?php echo $this->session->flashdata('success'); ?></p>
            <p class="msg"><?php echo $this->session->flashdata('msg'); ?></p>
            <p class="msg"><?php echo validation_errors(); ?></p>
            <div class="panel">
                <?php echo '<span style="color:red">Total Teacher ('.$teacherCount  . ')</span>' ;?>
                <div id="searchLoad">
                    <div class="well">
                        <div class="panel-info">
                            <table class="table table-hover">
                                <tr>
                                    <th>Sl No</th>
                                    <th>Name</th>
                                    <th>Mobile</th>
                                    <th>Email</th>
                                    <th>Photo</th>
                                    <th>Action</th>
                                </tr>
                                <?php
                                $sl = 0;
                                foreach ($allteacher as $single):
                                    $sl++;
                                    ?>
                                    <tr>
                                        <td><?php echo $sl; ?></td>
                                        <td><?php echo $single->teacher_name; ?></td>
                                        <td><?php echo $single->mobile; ?></td>
                                        <td><?php echo $single->email; ?></td>
                                        <td>
                                            <img src="<?php echo $baseurl . 'uploads/teachers/' . $single->photo; ?>" class="tpic">
                                        </td>
                                        <td>
                                            <?php echo anchor('Dashboard/' . $single->teacher_id, 'Details', array('class' => 'btn btn-primary samebtnde')); ?> |
                                            <?php echo anchor('Dashboard/teacherEdit/' . $single->teacher_id, ' ', array('title' => 'Edit', 'class' => 'glyphicon glyphicon-edit btn btn-primary samebtn', 'onclick' => "return confirm('Do you want to edit it ?')")); ?> |
                                            <?php
//                                    $onclick = array('onclick'=>"return confirm('Do you want to delete it ?')");
                                            echo anchor('Dashboard/teacherDelete/' . $single->teacher_id, ' ', array('title' => 'Delete', 'class' => 'glyphicon glyphicon-trash btn btn-danger samebtn', 'onclick' => "return confirm('Do you want to delete it ?')"));
//                                    echo anchor('' . $single->teacher_id,'<span class="glyphicon glyphicon-trash btn btn-danger samebtn" aria-hidden="true"></span>',$onclick);
                                            ?>
                                        </td>

                                    </tr>
                                    <?php
                                endforeach;
                                ?>
                            </table>
                        </div>
                        <?php echo $pagination; ?>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Add Teacher</h4> 
                        </div>
                        <div class="modal-body">
                            <?php echo form_open_multipart('Dashboard/teacheraddProcess', array('class' => 'form-horizontal')); ?>
                            <div class="form-group cmndiv">
                                <label for="name" class="col-md-offset-1 col-md-3 ttl">Name</label>
                                <div class="col-md-6">
                                    <input type="text" id="name" class="samefld" value="<?php echo set_value('name'); ?>" name="name" placeholder="Write Teacher's Name!">
                                    <?php // echo form_error('name');?>
                                </div>
                            </div>
                            <div class="form-group cmndiv">
                                <label for="mobile" class="col-md-offset-1 col-md-3 ttl">Mobile</label>
                                <div class="col-md-6">
                                    <input type="text" id="mobile" class="samefld" value="<?php echo set_value('mobile'); ?>" name="mobile" placeholder="Write Teacher's Mobile No!">
                                </div>
                            </div>
                            <div class="form-group cmndiv">
                                <label for="dob" class="col-md-offset-1 col-md-3 ttl">Date of Birth</label>
                                <div class="col-md-6">
                                    <input type="text" id="datepicker" class="samefld" value="<?php echo set_value('dob'); ?>" name="dob" placeholder="Date of Birth!">
                                </div>
                            </div>
                            <div class="form-group cmndiv">
                                <label for="gender" class="col-md-offset-1 col-md-3 ttl">Gender</label>
                                <div class="col-md-6" >
                                    <select name="gender" class="samefld">
                                        <option value="">Select One</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group cmndiv">
                                <label for="email" class="col-md-offset-1 col-md-3 ttl">Email</label>
                                <div class="col-md-6">
                                    <input type="email" id="email" class="samefld" value="<?php echo set_value('email'); ?>" name="email" placeholder="Write Email Address!">
                                </div>
                            </div>
                            <div class="form-group cmndiv">
                                <label for="password" class="col-md-offset-1 col-md-3 ttl">Password</label>
                                <div class="col-md-6">
                                    <input type="password" id="password" class="samefld" value="<?php echo set_value('password'); ?>" name="password" placeholder="">
                                </div>
                            </div>
                            <div class="form-group cmndiv">
                                <label for="address" class="col-md-offset-1 col-md-3 ttl">Address</label>
                                <div class="col-md-6">
                                    <textarea id="address" value="<?php echo set_value('address'); ?>" name="address" placeholder="Write Your Address" cols="35" rows="5"></textarea>
                                </div>
                            </div>
                            <div class="form-group cmndiv">
                                <label for="photo" class="col-md-offset-1 col-md-3 ttl">Photo</label>
                                <div class="col-md-6">
                                    <input type="file" id="photo" class="" name="photo" placeholder="">
                                </div>
                            </div>


                            <div class="form-group cmndiv">
                                <label for="" class="col-md-offset-2 col-md-2 ttl"></label>
                                <div class="col-md-6">
                                    <input type="submit" class="btn-success submitbtn" name="save" value="Add Teacher">
                                </div>
                            </div>

                            <?php echo form_close(); ?>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!--it's for edit modal-->

            <!--close edit modal-->
        </div>
    </div>
</section>
<script language="javascript">
    $(document).ready(function () {
        $('#dataMatch').keyup(function () {
//            alert("ok");
            var frm = $('#frmsearch').serializeArray();
            $.post("<?php echo site_url('Dashboard/searchTeachers'); ?>", frm, function (data) {
                $('#searchLoad').html(data);
            });
        });
    });
</script>

