<div class="col-md-10">
    <div class="checkfeesCollection" style="margin-top: 50px;">
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
            <input type="hidden" name="hiddensection" id="hiddensection">
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

<div class="col-md-10">
    <p class="msg"><?php echo $this->session->flashdata('msg'); ?></p>
    <p class="success"><?php echo $this->session->flashdata('success'); ?></p>
    <div class="showfeesCollection">
        <div class="panel panel-info">
            <div class="panel-heading text-center" >All Payments </div>
            <div class="col-md-5">
                <?php echo form_open('Dashboard/insertStdPayment', array('class' => '')); ?>
                <?php if ($allStdPayable) { ?>
                    <table class="table" style="font-size: 11px;">
                        <tr>
                            <th>Sl No</th>
                            <th>Date</th>
                            <th>Fees Name</th>
                            <th>Amount</th>
                        </tr>
                        <?php
//                                                            print_r($allStdPayable);die();
                        $sl = 0;
                        $sum = 0;
                        foreach ($allStdPayable as $singleSub):
                            $sl++;
                            ?>
                            <tr>
                                <td><?php echo $sl; ?></td>
                                <td><?php echo $singleSub->created; ?></td>
                                <td><?php echo $singleSub->fees_name; ?></td>
                                <td><?php echo $singleSub->amount; ?></td>

                            </tr>
                            <?php
                            $sum += $singleSub->amount;
                        endforeach;
                    }else {
                        echo '<h4 class="text-center notFound">Data Not Found!';
                    }
                    ?>
                </table>
            </div>
            <div class="col-md-5">
                <?php if ($allStdPayable) { ?>
                        <!--<table class="" style="margin: 10px;">-->
                    <input type="hidden" name="clsid" value="<?php echo $singleSub->class_id; ?>">
                    <input type="hidden" name="secid" value="<?php echo $singleSub->section_id; ?>">
                    <input type="hidden" name="rollno" value="<?php echo $singleSub->roll_no; ?>">
                    <input type="hidden" name="examid" value="<?php echo $singleSub->exam_id; ?>">

                    <div class="form-group extraTop">
                        <label for="ttlamount" class="col-md-4" style="font-size: 12px">Total Amount :</label>
                        <div class="col-md-8" style="margin-bottom: 5px;">
                            <input type="text" name="ttlamount" readonly id="ttlamount" class="form-control" value="<?php echo $sum ?>">
                        </div>
                    </div>
                    <div class="form-group " style="font-size: 12px">
                        <label for="paidamount" class="col-md-4">Paid Amount :</label>
                        <div class="col-md-8" style="margin-bottom: 5px;">
                            <input type="text" name="paidamount"  id="paidamount" class="form-control" placeholder="Enter Payment!" >
                        </div>
                    </div>
                    <div class="form-group " style="font-size: 12px;">
                        <label for="dueamount" class="col-md-4">Due Amount :</label>
                        <div class="col-md-8">
                            <input type="text" name="dueamount"  id="dueamount" class="form-control" value="<?php echo $sum ?>" readonly="">
                        </div>
                    </div>
                    <script type="text/javascript">
                        $(document).ready(function () {
                            $("#paidamount").keyup(function () {
                                //                                alert("ok");
                                var paidAmount = parseInt($(this).val());
                                //alert(<?php echo $sum; ?>);
                                var totalAmount = <?php echo $sum; ?>;
                                //alert(totalAmount);
                                var dueAmount = totalAmount - paidAmount;
                                //alert(dueAmount);
                                $("#dueamount").val(dueAmount);
                            });
                        });
                    </script>
                    <div class="form-group " style="font-size: 12px;">
                        <label for="paymentStatus" class="col-md-4">Payment Status :</label>
                        <div class="col-md-8">
                            <input type="radio" name="paymentStatus" id="paymentStatus" value="Paid"> Paid |
                            <input type="radio" name="paymentStatus" id="paymentStatus" value="Unpaid">Unpaid
                        </div>
                    </div>
                    <?php
                } else {
                    echo '<h4 class="text-center notFound">Data Not Found!';
                }
                ?>
                <!--</table>-->
                <div class="form-group col-md-6" >
                    <div class=" col-md-offset-4">
                        <input type="submit" name="save" value="Save" class="btn btn-success">
                    </div>
                </div>
            </div>            
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
</div>


</div>
</div>
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
<!--<section class="feesCollectionSection">
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
                    <input type="hidden" name="hiddensection" id="hiddensection">
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
<section class="showList" style="margin-left: 300px;">
    <div class="container">
        <div class="row">
            <div class=" col-md-10">
                <div class="panel panel-info">
                    <div class="panel-heading text-center" >All Payments of </div>
<?php echo form_open(); ?>
<?php if ($allStdPayable) { ?>
                                                            <table class="table subtbl">
                                                                <tr>
                                                                    <th>Sl No</th>
                                                                    <th>Date</th>
                                                                    <th>Fees Name</th>
                                                                    <th>Amount</th>
                                                                </tr>
    <?php
//                                                            print_r($allStdPayable);die();
    $sl = 0;
    $sum = 0;
    foreach ($allStdPayable as $singleSub):
        $sl++;
        ?>
                                                                                                        <tr>
                                                                                                            <td><?php echo $sl; ?></td>
                                                                                                            <td><?php echo $singleSub->created; ?></td>
                                                                                                            <td><?php echo $singleSub->fees_name; ?></td>
                                                                                                            <td><?php echo $singleSub->amount; ?></td>

                                                                                                        </tr>
        <?php
        $sum += $singleSub->amount;
    endforeach;
}else {
    echo '<h4 class="text-center notFound">Data Not Found!';
}
?>
                    </table>
                    <table class="">
                        <tr>
                            <td>Total Amount</td>
                            <td>:</td>
                            <td><input type="text" name="ttlamount" readonly class="form-control" value="<?php echo $sum ?>"></td>
                            <td><input type="text" name="paidamount" placeholder="Enter Payment!" class="form-control"> </td>
                        </tr>
                    </table>
                    <div class="form-group col-md-6" >
                    <div class=" col-md-offset-4">
                        <input type="submit" name="save" value="Save" class="btn btn-success">
                    </div>
                </div>
<?php echo form_close(); ?>
                </div>
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

</script>-->