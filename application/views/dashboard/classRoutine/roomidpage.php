<select name="roomNo" id="roomNo" class="form-control">
    <!--<option>Select One</option>-->
    <?php
    foreach ($allroomid as $singleRoom):
        ?>
        <option value="<?php echo $singleRoom->roomno; ?>">
            <?php echo $singleRoom->roomno; ?>
        </option>
        <?php
    endforeach;
    ?>
</select>