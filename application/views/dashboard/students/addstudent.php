<section class="studentsectionadd">
    <div class="col-md-offset-1 col-md-8 col-md-offset-1">
        <div class="student">
            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                Add Student
            </button>
            <form class="navbar-form" role="search" action="<?php echo $baseurl . 'index.php/Dashboard/searchStudents' ?>" method="post">
                <div class="input-group">
                    <input type="text" class="form-control search" placeholder="Search......" name="search">
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-default">
                            <span class="glyphicon glyphicon-search">
                            </span>
                        </button>
                    </span>
                </div>
            </form>
            <p class="msg"><?php echo $this->session->flashdata('msg'); ?></p>
            <p class="success"><?php echo $this->session->flashdata('success'); ?></p>
            <p class="msg"><?php // echo $error;         ?></p>
            <p class="msg"><?php echo validation_errors(); ?></p>
            <div class="panel">
                <div class="well">
                    <div class="panel-info">
                        <table class="table table-hover">
                            <?php if ($allstudents) { ?>
                                <tr>
                                    <th>Sl No
                                        <?php
//                                    echo date('F');
//                                    echo "<pre/>";
//                                    print_r($allstudent); 
                                        ?>
                                    </th>
                                    <th>Students Name</th>
                                    <th>Class Name</th>
                                    <th>Mobile</th>
                                    <th>E-Mail</th>
                                    <th>Picture</th>
                                    <th>Action</th>

                                </tr>
                                <?php
                                $sl = 0;
                                foreach ($allstudents as $single):
                                    $sl++;
                                    ?>
                                    <tr>
                                        <td><?php echo $sl; ?></td>
                                        <td><?php echo $single->student_name; ?></td>
                                        <td><?php echo $single->class_name; ?></td>
                                        <td><?php echo $single->phone; ?></td>
                                        <td><?php echo $single->email; ?></td>
                                        <td>
                                            <img src="<?php echo $baseurl . 'uploads/students/' . $single->photo; ?>" class="tpic">
                                        </td>
                                        <td>
                                            <?php echo anchor('Dashboard/' . $single->student_id, 'Details', array('class' => 'btn btn-primary samebtnde')); ?>
                                            <?php echo anchor('Dashboard/' . $single->student_id, ' ', array('title' => 'Edit', 'class' => 'glyphicon glyphicon-edit btn btn-primary samebtn')); ?>
                                            <?php 
                                            echo anchor('Dashboard/studentDelete/' . $single->student_id, ' ', array('title' => 'Delete', 'class' => 'glyphicon glyphicon-trash btn btn-danger samebtn','onclick'=>"return confirm('Do you want to delete it ?')")); 
                                            ?>

                                        </td>

                                    </tr>
                                    <?php
                                endforeach;
                            }else {
                                echo '<h4>Data Not Found!</h4>';
                            }
                            ?>
                        </table>
                    </div>
                    <?php echo $pagination; ?>
                </div>
            </div>



            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Add Student's</h4> 
                        </div>
                        <div class="modal-body">
                            <?php
//                             print_r($allsection);
//                            die();
                            ?>
                            <?php echo form_open_multipart('Dashboard/studentAddProcess', array('class' => 'form-horizontal')); ?>
                            <div class="form-group cmndiv">
                                <label for="name" class="col-md-offset-1 col-md-3 ttl">Student's Name</label>
                                <div class="col-md-6">
                                    <input type="text" id="name" class="samefld form-control" name="name" placeholder="Write Student's Name!">
                                </div>
                            </div>
                            <div class="form-group cmndiv">
                                <label for="guardian_name" class="col-md-offset-1 col-md-3 ttl">Guardian Name</label>
                                <div class="col-md-6">
                                    <input type="text" id="guardian_name" class="samefld form-control" name="guardian_name" placeholder="Write Guardian's Name!">
                                </div>
                            </div>
                            <script type="text/javascript">
                                $(document).ready(function () {
                                    $("#classname").change(function () {
                                        var classval = $(this).val();
                                        //                                alert(classval);
                                        $.get("ajax_sectionid/" + classval, function (sec) {
                                            $('#section_id').html(sec);
//                                            $('#hiddensection').val(sec);
                                            //                                        $('.subjectfld').html(r);
                                            //                                        alert(r);
                                        });
                                    });
                                });
                            </script>
                            <div class="form-group cmndiv">
                                <label for="classname" class="col-md-offset-1 col-md-3 ttl">Class Name</label>
                                <div class="col-md-6">
                                    <?php
//                                    echo form_dropdown('classname', $allclass, set_value('classname'), array('class' => 'form-control classname', 'id' => 'clsname'));
                                    ?>
                                    <select name="classname" id="classname" class="form-control">
                                        <option value="">Select class</option>
                                        <?php foreach ($allclass as $allclassrec) { ?>
                                            <option value="<?php echo $allclassrec->class_id; ?>"><?php echo $allclassrec->class_name; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group cmndiv">
                                <label for="section" class="col-md-offset-1 col-md-3 ttl">Section</label>
                                <div class="col-md-6">
                                    <div class="section_id">
                                        <select name="sectionid" id="section_id" class="form-control">
                                            <option>Select One</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group cmndiv">
                                <label for="rollno" class="col-md-offset-1 col-md-3 ttl">Roll No</label>
                                <div class="col-md-6">
                                    <input type="text" id="rollno" class="samefld form-control" name="rollno" placeholder="Enter Roll No!">
                                </div>
                            </div>
                            <div class="form-group cmndiv">
                                <label for="dob" class="col-md-offset-1 col-md-3 ttl">Birthday</label>
                                <div class="col-md-6">
                                    <input type="text" id="datepicker" class="samefld form-control" name="dob" placeholder="Date of Birth!">
                                </div>
                            </div>
                            <div class="form-group cmndiv">
                                <label for="gender" class="col-md-offset-1 col-md-3 ttl">Gender</label>
                                <div class="col-md-6" >
                                    <select name="gender" class="samefld form-control">
                                        <option value="">Select One</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group cmndiv">
                                <label for="address" class="col-md-offset-1 col-md-3 ttl">Address</label>
                                <div class="col-md-6">
                                    <textarea id="address" class=" form-control" name="address" placeholder="Write Your Address" cols="35" rows="5"></textarea>
                                </div>
                            </div>
                            <div class="form-group cmndiv">
                                <label for="mobile" class="col-md-offset-1 col-md-3 ttl">Mobile</label>
                                <div class="col-md-6">
                                    <input type="text" id="mobile" class="samefld form-control" name="mobile" placeholder="Write Teacher's Mobile No!">
                                </div>
                            </div>
                            <div class="form-group cmndiv">
                                <label for="email" class="col-md-offset-1 col-md-3 ttl">Email</label>
                                <div class="col-md-6">
                                    <input type="email" id="email" class="samefld form-control" name="email" placeholder="Write Email Address!">
                                </div>
                            </div>
                            <div class="form-group cmndiv">
                                <label for="password" class="col-md-offset-1 col-md-3 ttl">Password</label>
                                <div class="col-md-6">
                                    <input type="password" id="password" class="samefld form-control" name="password" placeholder="">
                                </div>
                            </div>                            
                            <div class="form-group cmndiv">
                                <label for="photo" class="col-md-offset-1 col-md-3 ttl">Photo</label>
                                <div class="col-md-6">
                                    <input type="file" id="photo" class=" form-control" name="photo" placeholder="">
                                </div>
                            </div>


                            <div class="form-group cmndiv">
                                <label for="" class="col-md-offset-2 col-md-2 ttl"></label>
                                <div class="col-md-6">
                                    <input type="submit" class="btn-success submitbtn form-control" name="save" value="Add Student">
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
        </div>
    </div>
</section>
