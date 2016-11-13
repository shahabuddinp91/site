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
<!--                                <th>1st Period</th>
                                <th>2nd Period</th>
                                <th>3rd Period</th>
                                <th>4th Period</th>
                                <th>5th Period</th>
                                <th>6th Period</th>
                                <th>7th Period</th>
                                <th>8th Period</th>-->
                            </tr>
                            <tr>
                                <th><?php echo $allDay[0]->dayName; ?></th>
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
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php echo $classid; ?>
<?php echo $sectionID; ?>