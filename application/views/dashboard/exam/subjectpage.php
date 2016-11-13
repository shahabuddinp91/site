<span class="text-center">Subject</span><br>
<select name="subjectid" id="subjectid" class="form-control">
    <option value="">Select One</option>
    <?php
    foreach ($allsubject as $section):
        ?>
        <option value="<?php echo $section->subject_id; ?>">
            <?php echo $section->subject_name; ?>
        </option>
        <?php
    endforeach;
    ?>
</select>
<script type="text/javascript">
    $(document).ready(function () {
        $('#hiddensubject').val($("#subjectid").val());
        $("#subjectid").change(function () {
            var classval = $(this).val();
            //                                alert(classval);
            
                $('#hiddensubject').val(classval);
                
        });


    });
</script>
