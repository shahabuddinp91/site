<section class="examsectionadd">
    <div class="col-md-offset-1 col-md-8 col-md-offset-1">
        <div class="exam">
            <div class="row">
                <div class="panel panel-info">
                    <div class="panel-danger text-center">Manage Marks Sutdents</div>
                    <form method="post" action="../Dashboard/manageMarksstd">
                        <!--                    <div class="col-sm-2">
                                                <div class="examfld">
                                                    <span class="text-center">Exam</span>
                        <?php //echo form_dropdown('examname', $allexamlist, set_value('examname'), array('class' => 'form-control examname')); ?>
                                                    <select name="examname" id="examname" class="form-control">
                                                        <option value="">Select One</option>
                        <?php foreach ($allexamlist as $allexamlistrec) { ?>
                                                                                    <option value="<?php echo $allexamlistrec->exam_id; ?>"><?php echo $allexamlistrec->exam_name; ?></option>
                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>-->
                        <div class="col-sm-2">
                            <script type="text/javascript">
                                $(document).ready(function () {
                                    $("#classname").change(function () {
                                        var classval = $(this).val();
                                        //                                alert(classval);
                                        $.get("ajax_sectionidexam/" + classval, function (sec) {
                                            $('.sectionfld').html(sec);
                                            $('#hiddensection').val(sec);
                                            //                                        $('.subjectfld').html(r);
                                            //                                        alert(r);
                                        });
                                        $.get("ajax_subjectidexam/" + classval, function (sub) {
                                            $('.subjectfld').html(sub);
                                            $('#hiddensubject').val(sub);
                                            //                                       alert(sub);
                                        });
                                    });
                                });
                            </script>
                            <div class="classfld">
                                <?php //echo "<pre/>"; ?>
                                <?php
                                //print_r($allstd); 
                                //echo "Class id: ".$cid; 
                                ?>
                                <span class="text-center">Class</span>
                                <select name="classname" id="classname" class="form-control">
                                    <option value="">Select One</option>
                                    <?php foreach ($allclass as $allclassrec) { ?>
                                        <option value="<?php echo $allclassrec->class_id; ?>"><?php echo $allclassrec->class_name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="sectionfld">
                                <span class="text-center">Section</span><br>
                                <select name="sectionid" id="sectionid" class="form-control">
                                    <option >Select One</option>
                                </select>
                            </div>
                            <input type="hidden" name="hiddensection" id="hiddensection"/>
                        </div>
                        <div class="col-sm-2">
                            <div class="subjectfld">
                                <span class="text-center">Subject</span><br>
                                <select name="subjectid" id="subjectid" class="form-control">
                                    <option>Select One</option>
                                </select>
                            </div>
                            <input type="hidden" name="hiddensubject" id="hiddensubject"/>
                        </div>
                        <div class="col-sm-2">
                            <div class="managemarks">
                                <input type="submit" class="btn btn-success managebtn" value="Manage Marks">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <hr>
            <div class="row">
                <form class="navbar-form" role="search" action="<?php echo $baseurl . 'index.php/Dashboard/searchManageMarksStd' ?>" method="post">
                    <div class="input-group">
                        <input type="text" class="form-control search" placeholder="...." name="search">
                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-default">
                                <span class="glyphicon glyphicon-search">
                                </span>
                            </button>
                        </span>
                    </div>
                </form>
                <?php
                if ($allmanagemarksstd) {
                    ?>
                    <table class="table ">
                        <tr>
                            <th>S Name</th>
                            <th>Roll No</th>
                            <th>class</th>
                            <th>Section</th>
                            <th>Subject</th>
                            <th>Exam</th>
                        </tr>
                        <?php
                        foreach ($allmanagemarksstd as $singleMng):
                            ?>
                            <tr>
                                <td><?php echo $singleMng->student_name; ?></td>
                                <td><?php echo $singleMng->roll_no; ?></td>                        
                                <td><?php echo $singleMng->class_name; ?></td>                     
                                <td><?php echo $singleMng->section_name; ?></td>                                          
                                <td><?php echo $singleMng->subject_name; ?></td>
                                <td><?php echo $singleMng->exam_name; ?></td>
                            </tr>
                            <?php
                        endforeach;
                    }else {
                        echo '<h3>Data Not Found</h3>';
                    }
                    ?>

                </table>
                <?php echo $pagination; ?>
            </div>
            <!--            <div class="row">
                            <form action="../Dashboard/showclssubmarks" method="post">
                                <div class="col-md-2">
                                    <div class="classfld">
                                        <span class="text-center">Class</span>
                                        <select name="clsname" id="classname" class="form-control">
                                            <option value="">Select One</option>
            <?php foreach ($allclass as $allclassrec) { ?>
                                                        <option value="<?php echo $allclassrec->class_id; ?>"><?php echo $allclassrec->class_name; ?></option>
            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="managemarks">
                                        <input type="submit" class="btn btn-success managebtn" value="Submit">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="row">
                            <table class="table table-striped" style="margin-top: 5px;">
                                <tr>
                                    <th>Class Name</th>
                                    <th>Subject Name</th>
                                </tr>
            <?php
            foreach ($allclssubexam as $singsub):
                ?>
                                        <tr>
                                            <td><?php echo $singsub->class_name; ?></td>
                                            <td><?php echo $singsub->subject_name; ?></td>
                                        </tr>
                <?php
            endforeach;
            ?>
                            </table>
                        </div>-->
        </div>
    </div>
</section>
