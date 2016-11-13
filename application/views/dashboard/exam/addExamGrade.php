<section class="examsectionadd">
    <div class="col-md-offset-1 col-md-8 col-md-offset-1">
        <div class="exam">
            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                Add Grade
            </button>
            <form class="navbar-form" role="search" action="<?php echo $baseurl . 'index.php/Dashboard/searchGrade' ?>" method="post">
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
                            <?php if ($allgradelist) { ?>
                                <tr>
                                    <th>Sl No</th>
                                    <th>Grade Name</th>
                                    <th>Grade Point</th>
                                    <th>Mark From</th>
                                    <th>Mark Upto</th>
                                    <th>Comments</th>
                                    <th>Action</th>

                                </tr>
                                <?php
                                $sl = 0;
                                foreach ($allgradelist as $single):
                                    $sl++;
                                    ?>
                                    <tr>
                                        <td><?php echo $sl; ?></td>
                                        <td><?php echo $single->grade_name; ?></td>
                                        <td><?php echo $single->grade_point; ?></td>
                                        <td><?php echo $single->mark_from; ?></td>
                                        <td><?php echo $single->mark_upto; ?></td>
                                        <td><?php echo $single->comments; ?></td>
                                        <td>
                                            <?php echo anchor('Dashboard/' . $single->grade_id, ' ', array('title' => 'Edit', 'class' => 'glyphicon glyphicon-edit btn btn-primary samebtn')); ?> |
                                            <?php
                                            echo anchor('Dashboard/examGradeDelete/' . $single->grade_id, ' ', array('title' => 'Delete', 'class' => 'glyphicon glyphicon-trash btn btn-danger samebtn', 'onclick' => "return confirm('Do you want to delete it ?')"));
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
                            <h4 class="modal-title" id="myModalLabel">Add Grade</h4> 
                        </div>
                        <div class="modal-body">
                            <?php echo form_open('Dashboard/examgradeaddProcess', array('class' => 'form-horizontal')); ?>
                            <div class="form-group cmndiv">
                                <label for="name" class="col-md-offset-1 col-md-3 ttl">Grade Name</label>
                                <div class="col-md-6">
                                    <input type="text" id="name" class="samefld" name="name" placeholder="Write Your Exam Grade Name!">
                                </div>
                            </div>                            
                            <div class="form-group cmndiv">
                                <label for="point" class="col-md-offset-1 col-md-3 ttl">Grade Point</label>
                                <div class="col-md-6">
                                    <input type="text" id="point" class="samefld" name="point" placeholder="Grade Point!">
                                </div>
                            </div>
                            <div class="form-group cmndiv">
                                <label for="markfrom" class="col-md-offset-1 col-md-3 ttl">Mark From</label>
                                <div class="col-md-6">
                                    <input type="text" id="markfrom" class="samefld" name="markfrom" placeholder="Mark From!">
                                </div>
                            </div>
                            <div class="form-group cmndiv">
                                <label for="markupto" class="col-md-offset-1 col-md-3 ttl">Mark Upto</label>
                                <div class="col-md-6">
                                    <input type="text" id="markupto" class="samefld" name="markupto" placeholder="Mark Upto!">
                                </div>
                            </div>
                            <div class="form-group cmndiv">
                                <label for="comment" class="col-md-offset-1 col-md-3 ttl">Comment's</label>
                                <div class="col-md-6">
                                    <input type="text" id="comment" class="samefld" name="comment" placeholder="Write Your Comment's!">
                                </div>
                            </div>
                            <div class="form-group cmndiv">
                                <label for="" class="col-md-offset-2 col-md-2 ttl"></label>
                                <div class="col-md-6">
                                    <input type="submit" class="btn-success submitbtn" name="save" value="Add Grade">
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
