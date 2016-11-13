<select name="subjectid" id="subjectid" class="form-control">
    <option>Select One</option>
    <?php
//    print_r($allsubject);
//    die();
    foreach ($allsubject as $sinSub):
        ?>
        <option value="<?php echo $sinSub->subject_id; ?>">
            <?php echo $sinSub->subject_name; ?>
        </option>
        <?php
    endforeach;
    ?>
</select>