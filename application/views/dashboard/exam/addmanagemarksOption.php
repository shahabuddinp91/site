<section class="examsectionadd">
    <div class="col-md-offset-1 col-md-8 col-md-offset-1">
        <div class="exam">
            <div class="row">
                <div class="panel panel-info">
                    <div class="panel-danger text-center">Manage Marks Sutdents</div>

                    <form method="post" action="../Dashboard/addManageMarksOption">
                        <div class="col-sm-2">
                            <div class="examfld">
                                <span class="text-center">Exam</span>
                                <?php //echo form_dropdown('examname', $allexamlist, set_value('examname'), array('class' => 'form-control examname')); ?>
                                <select name="examname" id="examname" class="form-control">
                                    <option value="">Select One</option>
                                    <?php foreach ($allexamlist as $allexamlistrec) { ?>
                                        <option value="<?php $allexamlistrec->exam_id; ?>"><?php echo $allexamlistrec->exam_name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
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
                                            //                                       alert(sub);
                                        });
                                    });
                                });
                            </script>
                            <div class="classfld">
                                <span class="text-center">Class</span>
                                <?php //echo form_dropdown('classname', $allclass, set_value('classname'), array('class' => 'form-control classname')); ?>
                                <select name="classname" id="classname" class="form-control">
                                    <option value="">Select class</option>
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
                        <!--                        <div class="col-sm-2">
                                                    <div class="subjectfld">
                                                        <span class="text-center">Subject</span><br>
                                                        <select name="subjectid" id="subjectid" class="form-control">
                                                            <option>Select One</option>
                                                        </select>
                                                    </div>
                                                </div>-->
                        <div class="col-sm-2">
                            <div class="managemarks">
                                <input type="submit" class="btn btn-success managebtn" value="Manage Marks">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="clswisestd" id="clswisestd">
                <div class="row">
                    <fieldset>
                        <legend>Students Marks Manage</legend>
                        <form action="" method="post" class="form-horizontal">
                            <div class="rolldiv col-md-2">
                                <?php
//                        echo '<pre>';
//                        print_r($allstdsubject); 
                                foreach ($allstdsubject as $single):
                                    ?>
                                <input type="hidden" class="clsidhide" name="clsidhide" id="clsidhide" value="<?php echo $single->class_id; ?>">
                                 <input type="hidden" class="secidhide" name="secidhide" id="secidhide" value="<?php echo $single->section_id; ?>">
                                <?php
                                endforeach;
                                ?>
                                
                                <span class="">Roll No</span>
                                <select name="stdname" id="stdname" class="stdname form-control col-sm-2">
                                    <option>Select One</option>
                                    <?php
                                    foreach ($allstdsubject as $single):
                                        ?>
                                        <option value="<?php echo $single->student_id; ?>">
                                            <?php echo $single->roll_no; ?>
                                        </option>
                                        <?php
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                        </form>
                    </fieldset>
                </div>
            </div>
            <!--            <div class="classwisestd" id="classwisestd">
                            <p class="text-center well">All Students of ....</p>
            <?php // echo "<pre/>"; ?>
            <?php
            // print_r($allstd); 
            //echo "Class id: ".$cid; 
            ?>
            <?php //echo form_open('', array('class' => 'form-horizontal'));   ?>
                            <form method="post" action="" class="form-horizontal">
                                <table class="table table-striped">
            <?php
            if ($allstd) {
                ?>
                                                <tr>
                                                    <th>Sl No</th>
                                                    <th>Name</th>
                                                    <th>Roll No</th>
                                                    <th>Marks</th>
                                                    <th>LG</th>
                                                    <th>GP</th>
                                                    <th></th>
                                                </tr>
                <?php
                $sl = 0;
                foreach ($allstd as $single):
                    $sl++;
                    ?>
                                                            <tr>
                                                                <td><?php echo $sl; ?></td>
                                                                <td><?php echo $single->student_name; ?></td>
                                                                <td><?php echo $single->roll_no; ?></td>
                                                                <td>
                                                                    <input type="text" name="marks" class="form-control samemark" id="marks" tabindex="1">
                                                                </td>
                                                                <td>
                                                                    <input type="text" name="lg" class="form-control samemark lg" id="lg" readonly="1">
                                                                </td>
                                                                <td>
                                                                    <input type="text" name="gp" class="form-control samemark gp" id="gp" readonly="1">
                                                                </td>
                                                            </tr>
                    <?php
                endforeach;
            }
            else {
                echo '<h4>Data Not Found</h4>';
            }
            ?>
                                </table>
                            </form>
                        </div>-->
        </div>
    </div>
</section>