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