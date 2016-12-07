<section class="feesCollectionSection">
    <div class="container">
        <div class="feesCollection">
            <div class="row">
                <h3 class="text-center">Fees Collerction</h3>
                <?php echo form_open('Dashboard/insertstdFees', array('class' => 'form-horizontal')); ?>
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
                <div class="form-group col-md-8" >
                    <table class="table table-bordered table-hover" id="tab_logic">
                        <thead>
                            <tr ><th class="text-center">#</th>
                                <th class="text-center">Fees Name</th>
                                <th class="text-center">Amount</th>
                                <!--<th class="text-center">Paid Amount</th>-->
                            </tr>
                        </thead>
                        <tbody>
                            <tr id='addr0'>
                                <td>
                                    1
                                </td>
                                <td>
                                    <input type="hidden" name="0" id="0" value="0"/>
                                    <select name="feesID[]" class="form-control feesID">
                                        <option value="">Select One</option>
                                        <?php foreach ($allFees as $singleData):
                                            ?>
                                            <option value="<?php echo $singleData->fees_id; ?>"><?php echo $singleData->fees_name; ?></option>
                                            <?php
                                        endforeach;
                                        ?>
                                    </select>
                                </td>
                                <td>
                                    <div class='x'>
                                        <select name="amount[]" id="amount0" class="form-control amount">
                                            <option value="">Select One</option>
                                        </select>       
                                    </div>    
                                </td>
<!--                                <td>
                                    <input type="text" name="paidAmount[]" placeholder="Enter Paid Amount!" id="paidAmount" class="form-control paidAmount">
                                </td>-->
                            </tr>
                            <tr id='addr1'></tr>
                        </tbody>
                    </table>                    
                    <a id="add_row" class="btn btn-success pull-left">Add Row</a><a id='delete_row' class="pull-right btn btn-danger">Delete Row</a>
                </div>
<!--                <div class="row">
                    <div class="form-group col-md-6" >
                        <label for="ttlamount" class="col-md-offset-2 col-md-4 ttl">Total Amount<span class="red">*</span></label>                                
                        <div class="col-sm-6">
                            <input name="ttlamount" id="ttlamount" class="form-control" placeholder="Enter Total Amount">
                        </div>
                    </div>
                    <div class="form-group col-md-6" >
                        <label for="paidamount" class="col-md-4 ttl">Paid Amount<span class="red">*</span></label>                                
                        <div class="col-sm-6">
                            <input name="paidamount" id="paidamount" class="form-control" placeholder="Enter Paid Amount">
                        </div>
                    </div>
                
                </div>-->
<div class="form-group col-md-6" >
                    <div class=" col-md-offset-4">
                        <input type="submit" name="save" value="Save" class="btn btn-success">
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
        //its for fees collection
        $(".feesID").change(function () {
            var cval = $(this).prev().attr('name');
            // alert(cval);
            var fees_ID = $(this).val();
            $.get("ajax_feesAmount/" + fees_ID, function (amt) {
                $('#amount' + cval).html(amt);
//                its for start fees amount summation
//                alert("ok");
                    var ttlPrice = 0;
                    $('.amount').each(function (){
                        ttlPrice += parseInt($(this).val());
                    });
                    $('#ttlamount').val(ttlPrice);
//                    its close fees amount summation
            });
        });
//                close fees collection

//       its for dynamically add row
        var i = 1;
        $("#add_row").click(function () {
            $('#addr' + i).html("<td>" + (i + 1) + "</td>\n\
    <td ><input type='hidden' name='" + i + "' id='" + i + "' value='" + i + "'/><select name='feesID[]' class='form-control feesID'><option value=''>Select One</option><?php foreach ($allFees as $singleData): ?><option value='<?php echo $singleData->fees_id; ?>'><?php echo $singleData->fees_name; ?></option><?php endforeach; ?></select></td>\n\
    <td><div class='x'><select name='amount[]'  id='amount" + i + "' class='form-control input-md amount'><option value=''>Select One</option></select></div></td>");
//<td><input type='text'  name='paidAmount[]' id='paidAmount' class='form-control input-md' placeholder='Enter Paid Amount!'></td>
            //its for fees collection
            $(".feesID").change(function () {
                var cval = $(this).prev().attr('name');
                var fees_ID = $(this).val();
                $.get("ajax_feesAmount/" + fees_ID, function (amt) {
                    $('#amount' + cval).html(amt);
//                its for start fees amount summation
//                    alert("ok");
                    var ttlPrice = 0;
                    $('.amount').each(function (){
                        ttlPrice += parseInt($(this).val());
                    });
                    $('#ttlamount').val(ttlPrice);
//                    its close fees amount summation
                });
            });
//                close fees collection

            $('#tab_logic').append('<tr id="addr' + (i + 1) + '"></tr>');
            i++;
        });
        $("#delete_row").click(function () {
            if (i > 1) {
                $("#addr" + (i - 1)).html('');
                i--;      
//                its for start fees amount minus
//                    alert("ok");
                    var ttlPrice = 0;
                    $('.amount').each(function (){
                        ttlPrice += parseInt($(this).val());
                    });
                    $('#ttlamount').val(ttlPrice);
//                    its for close fees amount minus
            }
        });


    });

</script>