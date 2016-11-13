<section class="slidersectionadd">
    <div class="col-md-offset-1 col-md-8 col-md-offset-1">
        <div class="logo">
            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                Add Slider
            </button>
            <p class="msg"><?php echo $this->session->flashdata('msg'); ?></p>
            <p class="msg"><?php // echo validation_errors();           ?></p>
            <div class="panel">
                <div class="well">
                    <div class="panel-info">
                        <table class="table table-hover">
                            <tr>
                                <th>Sl No</th>
                                <th>Short Name</th>
                                <th>Title</th>
                                <th>Slider</th>
                                <th>Action</th>
                            </tr>
                            <?php
                            $sl = 0;
                            foreach ($allslider as $single):
                                $sl++;
                                ?>
                                <tr>
                                    <td><?php echo $sl; ?></td>
                                    <td><?php echo $single->shortname; ?></td>
                                    <td><?php echo $single->title; ?></td>
                                    <td>
                                        <img src="<?php echo $baseurl . 'uploads/sliders/' . $single->slider; ?>" width="100" height="100">
                                    </td>
                                    <td>
                                        <?php echo anchor('Dashboard//' . $single->slider_id, ' ', array('class' => 'glyphicon glyphicon-edit btn btn-primary samebtn')); ?>
                                        <?php echo anchor('Dashboard/sliderDelete/' . $single->slider_id, ' ', array('class' => 'glyphicon glyphicon-trash btn btn-danger samebtn', 'onclick' => "return confirm('Do you want to delete it ?')")); ?>
                                    </td>
                                </tr>
                                <?php
                            endforeach;
                            ?>
                        </table>
                    </div>
                    <?php echo $pagination; ?>
                </div>
            </div>



            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Sliders Add</h4> 
                        </div>
                        <div class="modal-body">
                            <?php echo form_open_multipart('Dashboard/sliderProcess', array('class' => 'form-horizontal')); ?>
                            <div class="form-group cmndiv">
                                <label for="name" class="col-md-offset-2 col-md-2 ttl">Short Name</label>
                                <div class="col-md-6">
                                    <input type="text" id="name" class="samefld" name="name" placeholder="Write Your University Name!">
                                </div>
                            </div>
                            <div class="form-group cmndiv">
                                <label for="title" class="col-md-offset-2 col-md-2 ttl">Title</label>
                                <div class="col-md-6">
                                    <input type="text" id="title" name="title" class="samefld" placeholder="Write Versity Title!">
                                </div>
                            </div>
                            <div class="form-group cmndiv">
                                <label for="logofile" class="col-md-offset-2 col-md-2 ttl">Slider</label>
                                <div class="col-md-6">
                                    <input type="file" name="logofile" class="logofile" id="logofile" placeholder="Change Your Logo">
                                </div>
                            </div>
                            <div class="form-group cmndiv">
                                <label for="" class="col-md-offset-2 col-md-2 ttl"></label>
                                <div class="col-md-6">
                                    <input type="submit" class="btn-success submitbtn" name="save" value="Save">
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
        </div>
    </div>
</section>
