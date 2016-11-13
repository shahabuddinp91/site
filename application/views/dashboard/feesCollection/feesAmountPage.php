<select name="amount" id="amount" class="form-control">
    <!--<option value="">Select One</option>-->
    <?php foreach ($allFeesAmt as $singleData):
        ?>
    <option value="<?php echo $singleData->fees_amount?>"><?php echo $singleData->fees_amount;?></option>
        <?php
    endforeach;
?>
</select>  