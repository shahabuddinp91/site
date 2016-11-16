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
                                <?php // foreach ($allPeriodClsSec as $singlesub):
                                    ?>
                                <!--<td class="text-center"><?php // echo $singlesub->subject_name; ?></td>-->
                                    <?php
//                                endforeach;
                                ?>
                                <td><?php echo $allPeriodClsSec[0]->subject_name?></td>
                                <td><?php // echo $allPeriodClsSec[1]->subject_name?></td>
                                <td><?php // echo $allPeriodClsSec[2]->subject_name?></td>
                            </tr>
                            <tr>
                                <th><?php echo $allDay[1]->dayName; ?></th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <th><?php echo $allDay[2]->dayName; ?></th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <th><?php echo $allDay[3]->dayName; ?></th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <th><?php echo $allDay[4]->dayName; ?></th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <th><?php echo $allDay[5]->dayName; ?></th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
<!--                            <tr>
                                <th><?php echo $allDay[6]->dayName; ?></th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>-->
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php // echo $getclassid;  ?>
<?php // echo $sectionID; ?>
<?php
echo "<pre>";
print_r($allPeriodClsSec);
echo "</pre>";
?>