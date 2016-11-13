<span class="text-center">Section</span><br>
<select name="sectionid" id="sectionid" class="form-control">
    <option>Select One</option>
    <?php
    foreach ($allsection as $section):
        ?>
        <option value="<?php echo $section->section_id; ?>">
            <?php echo $section->section_name; ?>
        </option>
        <?php
    endforeach;
    ?>
</select>
<script type="text/javascript">
    $(document).ready(function () {
        $('#hiddensection').val($("#sectionid").val());
        $("#sectionid").change(function () {
            var classval = $(this).val();
            //                                alert(classval);
            
                $('#hiddensection').val(classval);
                
        });


    });
</script>
