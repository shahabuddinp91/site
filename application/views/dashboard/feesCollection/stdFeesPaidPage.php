<section class="feesCollectionSection">
    <div class="container">
        <div class="feesCollection">
            <div class="row">
                <h3 class="text-center">Fees Collection</h3>
                <?php echo form_open('Dashboard/searchstdtotalFees', array('class' => 'form-horizontal')); ?>
                <p class="msg"><?php echo $this->session->flashdata('msg'); ?></p>
                <p class="success"><?php echo $this->session->flashdata('success'); ?></p>
                <div class="form-group col-md-4" >
                    <label for="classname" class="col-md-4">Class<span class="red">*</span></label>                                
                    <div class="col-sm-6">
                        <select name="classname" id="classname" class="form-control">
                            <option value="">Select class</option>
                            <?php foreach ($allclass as $allclassrec) { ?>
                                <option value="<?php echo $allclassrec->class_id; ?>"><?php echo $allclassrec->class_name; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group col-sm-4" >
                    <label for="section_id" class="col-sm-4">Section<span class="red">*</span></label>                                
                    <div class="col-sm-6">
                        <select name="section_id" id="section_id" class="form-control">
                            <option>Select One</option>
                        </select>
                    </div>
                    <!--<input type="hidden" name="hiddensection" id="hiddensection">-->
                </div>
                <div class="form-group col-md-4" >
                    <label for="stdID" class="col-md-4 ttl">Roll No<span class="red">*</span></label>                                
                    <div class="col-sm-6">
                        <select name="stdID" id="stdID" class="form-control">
                            <option value="">Select One</option>
                        </select>
                    </div>
                </div>
                <div class="form-group col-md-4" >
                    <label for="exam" class="col-md-4 ttl">Exam<span class="red">*</span></label>                                
                    <div class="col-sm-6">
                        <select name="exam" id="exam" class="form-control">
                            <option value="">Select One</option>
                            <?php foreach ($allexamlist as $singleData):
                                ?>
                                <option value="<?php echo $singleData->exam_id; ?>">
                                    <?php echo $singleData->exam_name; ?>
                                </option>
                                <?php
                            endforeach;
                            ?>
                        </select>
                    </div>
                </div>

                <div class="form-group col-md-6" >
                    <div class=" col-md-offset-4">
                        <input type="submit" name="save" value="Submit" class="btn btn-success">
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
    $(document).ready(function () {

        $("#classname").change(function () {
            var classval = $(this).val();
//                                            alert(classval);
            $.get("ajax_sectionid/" + classval, function (sec) {
                $("#section_id").html(sec);
//                                             $('#hiddensection').val(sec);
                //                                        $('.subjectfld').html(r);
                //                                        alert(r);
            });
        });
        $("#section_id").change(function () {
            var sectionID = $(this).val();
//            alert(sectionID);
            $.get("ajax_std/" + sectionID, function (std) {
//                alert(sectionID);
                $("#stdID").html(std);
            })
        });
        


    });

</script>