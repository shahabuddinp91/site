<section class="createRoutineSection">
    <div class="col-sm-10">
        <div class="createRoutine">
            <button class="btn btn-primary"  data-toggle="modal" data-target="#vanuModal">
                Routine Create 
            </button>
            <p class="msg"><?php echo $this->session->flashdata('msg'); ?></p>
            <p class="success"><?php echo $this->session->flashdata('success'); ?></p>            
            <p class="exist"><?php echo $this->session->flashdata('exist'); ?></p>
            <!--modal--> 
            <div class="modal fade bs-example-modal-lg" id="vanuModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Routine Create</h4> 
                        </div>
                        <div class="modal-body">
                            <?php echo form_open('Dashboard/routineProcess', array('class' => 'form-horizontal')); ?>
                            <div class="form-group col-sm-6" >
                                <label for="year" class="col-sm-5 ttl">Year<span class="red">*</span></label>                                
                                <div class="col-sm-7">
                                    <input type="text" id="year" class="form-control" name="year" value="<?php echo date('Y'); ?>">
                                </div>
                            </div>
                            <script type="text/javascript">
                                $(document).ready(function () {
                                    $("#classname").change(function () {
                                        var classval = $(this).val();
                                        //                                alert(classval);
                                        $.get("ajax_sectionid/" + classval, function (sec) {
                                            $("#section_id").html(sec);
//                                             $('#hiddensection').val(sec);
                                            //                                        $('.subjectfld').html(r);
                                            //                                        alert(r);
                                        });
                                        $.get("ajax_subjectid/" + classval, function (sub) {
                                            $('#subjectid').html(sub);
//                                             $('#hiddensubject').val(sub);
//                                                                                   alert(sub);
                                        });
                                    });
                                });
                            </script>

                            <div class="form-group col-sm-6" >
                                <label for="year" class="col-sm-5 ttl">Class<span class="red">*</span></label>                                
                                <div class="col-sm-7">
                                    <select name="classname" id="classname" class="form-control">
                                        <option value="">Select class</option>
                                        <?php foreach ($allclass as $allclassrec) { ?>
                                            <option value="<?php echo $allclassrec->class_id; ?>"><?php echo $allclassrec->class_name; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-sm-6" >
                                <label for="section_id" class="col-sm-5 ttl">Section<span class="red">*</span></label>                                
                                <div class="col-sm-7">
                                    <select name="section_id" id="section_id" class="form-control">
                                        <option>Select One</option>
                                    </select>
                                </div>
                                <!--<input type="hidden" name="hiddensection" id="hiddensection">-->
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="subjectid" class="col-sm-5 ttl">Subject<span class="red">*</span></label>
                                <div class="col-sm-7">
                                    <select name="subjectid" id="subjectid" class="form-control">
                                        <option>Select One</option>
                                    </select>
                                </div>
                                <!--<input type="hidden" name="hiddensubject" id="hiddensubject">-->
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="teacherid" class="col-sm-5 ttl">Teacher<span class="red">*</span></label>
                                <div class="col-sm-7">
                                    <script type="text/javascript">
                                        $(document).ready(function () {
                                            $("#subjectid").change(function () {
                                                var subid = $(this).val();
//                                              alert(subid);
                                                $.get("ajax_teacherid/" + subid, function (tid) {
                                                    $("#teacherid").html(tid);
                                                });
                                            });
                                        });
                                    </script>
                                    <select name="teacherid" id="teacherid" class="form-control">
                                        <option value="">Select Teacher</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="teacherid" class="col-sm-5 ttl">Day<span class="red">*</span></label>
                                <div class="col-sm-7">
                                    <select name="dayid" id="dayid" class="form-control">
                                        <option value="">Select One</option>
                                        <?php foreach ($allday as $singDay) { ?>
                                            <option value="<?php echo $singDay->day_id; ?>">
                                                <?php echo $singDay->dayName; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="fromtime" class="col-sm-5 ttl">From<span class="red">*</span></label>
                                <div class="col-sm-7">
                                    <select name="fromtime" id="fromtime" class="form-control">
                                        <option value="">Select One</option>
                                        <?php foreach ($allTime as $singleTime):
                                            ?>
                                            <option value="<?php echo $singleTime->time; ?>">
                                                <?php echo $singleTime->time; ?>
                                            </option>
                                            <?php
                                        endforeach;
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="totime" class="col-sm-5 ttl">To<span class="red">*</span></label>
                                <div class="col-sm-7">
                                    <select name="totime" id="totime" class="form-control">
                                        <option value="">Select One</option>
                                        <?php foreach ($allTime as $singleTime):
                                            ?>
                                            <option value="<?php echo $singleTime->time; ?>">
                                                <?php echo $singleTime->time; ?>
                                            </option>
                                            <?php
                                        endforeach;
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="campusname" class="col-sm-5 ttl">Campus Name<span class="red">*</span></label>
                                <div class="col-sm-7">
                                    <select name="campusname" class="form-control" id="campusname">
                                        <option>Select One</option>
                                        <?php foreach ($allCampusname as $singleCampus):
                                            ?>
                                            <option value="<?php echo $singleCampus->campus_id; ?>">
                                                <?php echo $singleCampus->campusName; ?>
                                            </option>
                                            <?php
                                        endforeach;
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <script type="text/javascript">
                                $(document).ready(function () {
                                    $("#campusname").change(function () {
                                        var camid = $(this).val();
//                                              alert(camid);
                                        $.get("ajax_campus/" + camid, function (rid) {
                                            $("#roomNo").html(rid);
                                        });
                                    });
                                });
                            </script>
                            <div class="form-group col-sm-6">
                                <label for="roomNo" class="col-sm-5 ttl">Room No<span class="red">*</span></label>
                                <div class="col-sm-7">
                                    <select name="roomNo" class="form-control" id="roomNo">
                                        <option>Select One</option>
                                    </select>
                                </div>
                            </div>


                            <div class="form-group cmndiv">
                                <label for="" class="col-md-offset-2 col-md-2 ttl"></label>
                                <div class="col-md-6">
                                    <input type="submit" class="btn btn-primary submitbtn" name="save" value="Save">
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
            <!--modal close-->
            <div class="listRoutine">
                <div class="well">
                    <table class="table table-hover">
                        <tr>
                            <th>Sl No</th>
                            <th>Class Name</th>
                            <th>Section</th>
                            <th>Subject Name</th>
                            <th>Teacher Name</th>
                            <th>Day</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Campus Name</th>
                            <th>Room No</th>
                            <th>Action</th>
                        </tr>
                        <?php
                        $sl = 0;
                        foreach ($allroutine as $singleroutine):
                            $sl++;
                            ?>
                            <tr>
                                <td><?php echo $sl; ?></td>
                                <td><?php echo $singleroutine->class_name; ?></td>
                                <td><?php echo $singleroutine->section_name; ?></td>
                                <td><?php echo $singleroutine->subject_name; ?></td>
                                <td><?php echo $singleroutine->teacher_name; ?></td>
                                <td><?php echo $singleroutine->dayName; ?></td>
                                <td><?php echo $singleroutine->time_from; ?></td>
                                <td><?php echo $singleroutine->time_to; ?></td>
                                <td><?php echo $singleroutine->campusName; ?></td>
                                <td><?php echo $singleroutine->room_no; ?></td>
                                <td>
                                    <?php echo anchor('Dashboard/manageDayEdit', ' ', array('class' => 'glyphicon glyphicon-edit btn btn-primary btn-lg samebtn')); ?> |

                                    <?php
                                    $onclick = array('onclick' => "return confirm('Do you want to delete it?')");
                                    echo anchor('Dashboard/manageDayDelete/' . $singleroutine->routine_id, '<span class="glyphicon glyphicon-trash btn btn-danger samebtn" aria-hidden="true"></span>', $onclick);
                                    ?>
                                </td>
                            </tr>                        
                            <?php
                        endforeach;
                        ?>
                    </table>
                    <?php echo $pagination; ?>
                </div>
            </div>
        </div>
    </div>
</section>