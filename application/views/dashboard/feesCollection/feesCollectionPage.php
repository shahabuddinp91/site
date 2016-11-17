<section class="feesCollectionSection">
    <div class="container">
        <div class="feesCollection">
            <div class="row">
                <h3 class="text-center">Fees Collerction</h3>
                <?php echo form_open('', array('class' => 'form-horizontal')); ?>
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
                <div class="form-group col-md-8" >
                    <table class="table table-bordered table-hover" id="tab_logic">
                        <thead>
                            <tr >
                                <th class="text-center">
                                    #
                                </th>
                                <th class="text-center">
                                    Fees Name
                                </th>
                                <th class="text-center">
                                    Amount
                                </th>
                                <th class="text-center">Paid Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr id='addr0'>
                                <td>
                                    1
                                </td>
                                <td>
                                    <select name="feesID" class="form-control" id="feesID">
                                        <option value="">Select One</option>
                                        <?php foreach ($allFees as $singleData):
                                            ?>
                                            <option value="<?php echo $singleData->fees_id; ?>"><?php echo $singleData->fees_name; ?></option>
                                            <?php
                                        endforeach;
                                        ?>
                                    </select>
                                </td>
                        <script type="text/javascript">
                            $(document).ready(function () {
                                $("#feesID").change(function () {
//                                  alert("ok"); 
                                    var fees_ID = $(this).val();
//                                            alert(fees_ID);
                                    $.get("ajax_feesAmount/" + fees_ID, function (amt) {
                                        $("#amount").html(amt);
                                    });
                                });
                            });
                        </script>
                        <td>
                            <select name="amount" id="amount" class="form-control">
                                <option value="">Select One</option>
                            </select>                         
                        </td>
                        <td>
                            <input type="text" name="paidAmount" placeholder="Enter Paid Amount!" id="paidAmount" class="form-control">
                        </td>
                        </tr>
                        <tr id='addr1'></tr>
                        </tbody>
                    </table>
                    <a id="add_row" class="btn btn-default pull-left">Add Row</a><a id='delete_row' class="pull-right btn btn-default">Delete Row</a>
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

//       its for dynamically add row
        var i = 1;
        $("#add_row").click(function () {
            $('#addr' + i).html("<td>" + (i + 1) + "</td>\n\
    <td><select name='feesID"+ i +"' id='feesID' class='form-control input-md exfeesID'><option value=''>Select One</option><?php foreach ($allFees as $singleData): ?><option value='<?php echo $singleData->fees_id; ?>'><?php echo $singleData->fees_name; ?></option><?php endforeach; ?></select></td>\n\
    <td><select name='amount"+ i +"'  id='amount' class='form-control input-md examount'><option value=''>Select One</option></select></td>\n\
<td><input type='text'  name='paidAmount" + i +"' id='paidAmount' class='form-control input-md' placeholder='Enter Paid Amount!'></td>");

            //        its for dynamic row amount add
            $(".exfeesID").change(function () {
//            alert("ok");
                var feesVal = $(this).val();
//            alert(feesVal);
                $.get("ajax_feesAmount/" + feesVal, function (famt) {
                    $(".examount").html(famt);
                });
            });
            //  close  its for dynamic row amount add


            $('#tab_logic').append('<tr id="addr' + (i + 1) + '"></tr>');
            i++;
        });
        $("#delete_row").click(function () {
            if (i > 1) {
                $("#addr" + (i - 1)).html('');
                i--;
            }
        });


    });

</script>
<!--<input name='name" + i + "' type='text' placeholder='Name' class='form-control input-md'  />-->
<!--<select id="name" name="name" class='form-control input-md'><option value="">Select One</option></select>--> 