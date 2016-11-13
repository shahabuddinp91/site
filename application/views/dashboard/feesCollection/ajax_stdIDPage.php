<select name="stdID" id="stdID" class="form-control">
    <option>Select One</option>
    <?php
//    print_r($allsubject);
//    die();
    foreach ($allStd as $sinData):
        ?>
        <option value="<?php echo $sinData->student_id; ?>">
            <?php echo $sinData->roll_no; ?>
        </option>
        <?php
    endforeach;
    ?>
</select>