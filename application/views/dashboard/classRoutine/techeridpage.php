<select name="teacherid" id="teacherid" class="form-control">
    <?php
    foreach ($allteacher as $singleTid):
        ?>
        <option value="<?php echo $singleTid->teacher_id; ?>">
            <?php echo $singleTid->teacher_name; ?>
        </option>
        <?php
    endforeach;
    ?>
</select>