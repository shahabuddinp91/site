<section class="stdclsRoutineSection">
    <div class="container">
        <div class="stdClsArea">
            <div class="row">
                <div class="col-md-10">
                    <div class="panel panel-info">
                        <div class="panel-heading text-center">individual Class Routine</div>
                        <table class="table table-hover table-bordered">
                            <tr>
                                <th >Day / Period </th>
                                <?php foreach ($allPeriodTime as $sinData):
                                    ?>
                                    <th><?php echo $sinData->time ?></th>
                                    <?php
                                endforeach;
                                ?>
                            </tr>
                            <tr>
                                <th><?php echo $allDay[0]->dayName; ?></th>
                                <?php
                                foreach ($allPeriodClsSec as $singlesub):
                                    ?>
                                    <td class="text-center"><?php echo $singlesub->subject_name; ?></td>
                                    <?php
                                endforeach;
                                ?>
                            </tr>
                            <tr>
                                <th><?php echo $allDay[1]->dayName; ?></th>             
                                <?php foreach ($secallPeriodClsSec as $single):
                                    ?>
                                    <td class="text-center"><?php echo $single->subject_name; ?></td>
                                    <?php
                                endforeach;
                                ?>
                            </tr>
                            <tr>
                                <th><?php echo $allDay[2]->dayName; ?></th>
                                <?php foreach ($trd_allPeriodClsSec as $single):
                                    ?>
                                    <td class="text-center"><?php echo $single->subject_name; ?></td>
                                    <?php
                                endforeach;
                                ?>
                                    
                            </tr>
                            <tr>
                                <th><?php echo $allDay[3]->dayName; ?></th>
                                <?php foreach ($frt_allPeriodClsSec as $single):
                                    ?>
                                    <td class="text-center"><?php echo $single->subject_name; ?></td>
                                    <?php
                                endforeach;
                                ?>
                            
                            </tr>
                            <tr>
                                <th><?php echo $allDay[4]->dayName; ?></th>
                                <?php foreach ($fift_allPeriodClsSec as $single):
                                    ?>
                                    <td class="text-center"><?php echo $single->subject_name; ?></td>
                                    <?php
                                endforeach;
                                ?>

                            </tr>
                            <tr>
                                <th><?php echo $allDay[5]->dayName; ?></th>
                                <?php foreach ($six_allPeriodClsSec as $single):
                                    ?>
                                    <td class="text-center"><?php echo $single->subject_name; ?></td>
                                    <?php
                                endforeach;
                                ?>

                            </tr>
                            
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php // echo $getclassid;    ?>
<?php // echo $sectionID;   ?>
<?php
echo "<pre>";
print_r($allPeriodClsSec);
echo "</pre>";
?>