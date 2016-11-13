<section class="managePeriodTime">
    <div class="col-md-offset-1 col-md-8 col-md-offset-1">
        <div class="managePeriod">
            <button class="btn btn-primary"  data-toggle="modal" data-target="#dayModal">
                Add Day 
            </button>
            <p class="msg"><?php echo $this->session->flashdata('msg'); ?></p>
            <p class="success"><?php echo $this->session->flashdata('success'); ?></p>            
            <p class="exist"><?php echo $this->session->flashdata('exist'); ?></p>
            <!--modal--> 
            <div class="modal fade" id="dayModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Manage Day</h4> 
                        </div>
                        <div class="modal-body">
                            <?php echo form_open('Dashboard/manageTimePeriod', array('class' => 'form-horizontal')); ?>
                            <div class="form-group">
                                <label for="name" class="col-md-offset-1 col-md-3 ttl">Time<span class="red">*</span></label>                                
                                <div class="col-md-6">
                                    <input type="text" id="name" class="form-control" name="name" placeholder="Write Period Time!">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-md-offset-1 col-md-3 ttl">Period<span class="red">*</span></label>                                
                                <div class="col-md-6">
                                    <select name="period" class="form-control">
                                        <option value="">Select One</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group cmndiv">
                                <label for="" class="col-md-offset-2 col-md-2 ttl"></label>
                                <div class="col-md-6">
                                    <input type="submit" class="btn btn-primary submitbtn" name="save" value="Save">
                                </div>
                            </div>
                            <?php echo form_close(); ?>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>            
            <!--modal close-->
            <div class="listPeriodTime">
                <div class="well">
                    <table class="table table-hover">
                        <tr>
                            <th>Sl No</th>
                            <th>Time</th>
                            <th>Period</th>
                            <th>Action</th>
                        </tr>
                        <?php
                        $sl = 0;
                        foreach ($allmanagetime as $singleTime):
                            $sl++;
                            ?>
                            <tr>
                                <td><?php echo $sl; ?></td>
                                <td><?php echo $singleTime->time; ?></td>
                                <td><?php echo $singleTime->period; ?></td>
                                <td>
                                    <?php echo anchor('Dashboard/manageDayEdit', ' ', array('class' => 'glyphicon glyphicon-edit btn btn-primary btn-lg samebtn')); ?> |

                                    <?php
                                    $onclick = array('onclick' => "return confirm('Do you want to delete it?')");
                                    echo anchor('Dashboard/manageDayDelete/' . $singleTime->time_id, '<span class="glyphicon glyphicon-trash btn btn-danger samebtn" aria-hidden="true"></span>', $onclick);
                                    ?>
                                </td>
                            </tr>                        
                            <?php
                        endforeach;
                        ?>
                    </table>
                    <?php echo $pagination; ?>
                </div>
            </div>
        </div>
    </div>
</section>