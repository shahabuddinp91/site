<select name="teacherid" id="teacherid" class="form-control">
    <!--<option>Select One</option>-->
    <?php
//    print_r($allteacerid);
//    die();
    foreach ($allteacerid as $singleTid):
        ?>
        <option value="<?php echo $singleTid->teacher_id; ?>">
            <?php echo $singleTid->teacher_id; ?>
        </option>
        <?php
    endforeach;
    ?>
</select>
