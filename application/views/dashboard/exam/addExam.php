<section class="examsectionadd">
    <div class="col-md-offset-1 col-md-8 col-md-offset-1">
        <div class="exam">
            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                Add Exam
            </button>
            <form class="navbar-form" role="search" action="<?php echo $baseurl . 'index.php/Dashboard/searchExam' ?>" method="post">
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
                            <tr>
                                <th>Sl No</th>
                                <th>Exam Name</th>
                                <th>Exam Date</th>
                                <th>Comments</th>
                                <th>Action</th>

                            </tr>
                            <?php
                            $sl = 0;
                            foreach ($allexamlist as $single):
                                $sl++;
                                ?>
                                <tr>
                                    <td><?php echo $sl; ?></td>
                                    <td><?php echo $single->exam_name; ?></td>
                                    <td><?php echo $single->date; ?></td>
                                    <td><?php echo $single->comments; ?></td>
                                    <td>
                                        <?php echo anchor('Dashboard/' . $single->exam_id, ' ', array('title' => 'Edit', 'class' => 'glyphicon glyphicon-edit btn btn-primary samebtn')); ?> |
                                        <?php
                                        echo anchor('Dashboard/examDelete/' . $single->exam_id, ' ', array('title' => 'Delete', 'class' => 'glyphicon glyphicon-trash btn btn-danger samebtn','onclick'=>"return confirm('Do you want to delete it ?')")); 
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



            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Add Exam</h4> 
                        </div>
                        <div class="modal-body">
                            <?php echo form_open('Dashboard/examaddProcess', array('class' => 'form-horizontal')); ?>
                            <div class="form-group cmndiv">
                                <label for="name" class="col-md-offset-1 col-md-3 ttl">Exam Name</label>
                                <div class="col-md-6">
                                    <input type="text" id="name" class="samefld" name="name" placeholder="Write Your Exam Name!">
                                </div>
                            </div>
                            <div class="form-group cmndiv">
                                <script type="text/javascript">
                                    $(document).ready(function () {
                                        $(".datepic").datepicker({
                                            dateFormat: 'dd/mm/yy',
                                            dayNames: ["Dimanche", "Lundi"],
                                            monthNames: ["January", "February"],
                                            changeMonth: true,
                                            changeYear: true,
                                        });
                                    });
                                </script>
                                <label for="date" class="col-md-offset-1 col-md-3 ttl">Date</label>
                                <div class="col-md-6">
                                    <input type="text" id="datepic" class="samefld datepic" name="examdate" placeholder="Date of Exam!">
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
                                    <input type="submit" class="btn-success submitbtn" name="save" value="Add Exam">
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
