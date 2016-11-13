<section class="subjectsectionadd">
    <div class="col-md-offset-1 col-md-8 col-md-offset-1">
        <div class="subject">
            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                Add Subject
            </button>
            <form class="navbar-form" role="search" action="<?php echo $baseurl . 'index.php/Dashboard/searchSubject' ?>" method="post">
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
            <p class="msg"><?php echo validation_errors(); ?></p>
            <div class="panel">
                <div class="well">
                    <div class="panel-info">
                        <table class="table table-hover">
                            <?php if ($allsubjects) { ?>
                                <tr>
                                    <th>Sl No</th>
                                    <th>Subject Name</th>
                                    <th>Class Name</th>
                                    <th>Teacher Name</th>
                                    <th>Action</th>

                                </tr>
                                <?php
                                $sl = 0;
                                foreach ($allsubjects as $single):
                                    $sl++;
                                    ?>
                                    <tr>
                                        <td><?php echo $sl; ?></td>
                                        <td><?php echo $single->subject_name; ?></td>
                                        <td><?php echo $single->class_name; ?></td>
                                        <td><?php echo $single->teacher_name; ?></td>
                                        <td>
                                            <?php echo anchor('Dashboard/' . $single->subject_id, ' ', array('title' => 'Edit', 'class' => 'glyphicon glyphicon-edit btn btn-primary samebtn')); ?> |
                                            <?php echo anchor('Dashboard/subjectDelete/' . $single->subject_id, ' ', array('title' => 'Delete', 'class' => 'glyphicon glyphicon-trash btn btn-danger samebtn','onclick'=>"return confirm('Do you want to delete it ?')")); ?>

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
                            <h4 class="modal-title" id="myModalLabel">Add Subject</h4> 
                        </div>
                        <div class="modal-body">
                            <?php echo form_open('Dashboard/subjectaddProcess', array('class' => 'form-horizontal')); ?>
                            <div class="form-group cmndiv">
                                <label for="name" class="col-md-offset-1 col-md-3 ttl">Subject Name</label>
                                <div class="col-md-6">
                                    <input type="text" id="name" class="samefld form-control" name="name" placeholder="Write Your Subjects Name!">
                                </div>
                            </div>
                            <div class="form-group cmndiv">
                                <label for="classid" class="col-md-offset-1 col-md-3 ttl">Class Name</label>
                                <div class="col-md-6">
                                    <select class="classid form-control" id="classid" name="classid">
                                        <option>Select One</option>
                                        <?php
                                        foreach ($allclass as $single):
                                            ?>
                                        <option value="<?php echo $single->class_id; ?>"><?php echo $single->class_name; ?></option>
                                            <?php
                                        endforeach;
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group cmndiv">
                                <label for="teacherid" class="col-md-offset-1 col-md-3 ttl">Teacher Name</label>
                                <div class="col-md-6">
                                    <select class="teacherid form-control" id="teacherid" name="teacherid">
                                        <option>Select One</option>
                                        <?php
                                        foreach ($allteacher as $singlete):
                                            ?>
                                        <option value="<?php echo $singlete->teacher_id; ?>"><?php echo $singlete->teacher_name; ?></option>
                                            <?php
                                        endforeach;
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group cmndiv">
                                <label for="" class="col-md-offset-2 col-md-2 ttl"></label>
                                <div class="col-md-6">
                                    <input type="submit" class="btn-success submitbtn" name="save" value="Add Subject">
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
