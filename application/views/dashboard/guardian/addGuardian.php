<section class="guardianectionadd">
    <div class="col-md-offset-1 col-md-8 col-md-offset-1">
        <div class="guardian">
            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                Add Guardian
            </button>
            <p class="msg"><?php echo $this->session->flashdata('msg'); ?></p>
            <p class="msg"><?php // echo validation_errors();             ?></p>
            <div class="panel">
                <div class="well">
                    <div class="panel-info">
                        <table class="table table-hover">
                            <tr>
                                <th>Sl No</th>

                            </tr>
                            <?php
                            $sl = 0;
//                    foreach ($allslider as $single):
                            $sl++;
                            ?>
                            <tr>
        <!--                        <td><?php echo $sl; ?></td>
                                <td><?php echo $single->shortname; ?></td>
                                <td><?php echo $single->title; ?></td>
                                <td>
                                    <img src="<?php echo $baseurl . 'uploads/sliders/' . $single->slider; ?>" width="100" height="100">
                                </td>-->

                            </tr>
                            <?php
//                    endforeach;
                            ?>
                        </table>
                    </div>
                    <?php // echo $pagination; ?>
                </div>
            </div>



            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Add Guardian</h4> 
                        </div>
                        <div class="modal-body">
                            <?php echo form_open_multipart('', array('class' => 'form-horizontal')); ?>
                            <div class="form-group cmndiv">
                                <label for="name" class="col-md-offset-1 col-md-3 ttl">Name</label>
                                <div class="col-md-6">
                                    <input type="text" id="name" class="samefld" name="name" placeholder="Write Guardian's Name!">
                                </div>
                            </div>
                            <div class="form-group cmndiv">
                                <label for="email" class="col-md-offset-1 col-md-3 ttl">Email</label>
                                <div class="col-md-6">
                                    <input type="email" id="email" class="samefld" name="email" placeholder="Write Email Address!">
                                </div>
                            </div>
                            <div class="form-group cmndiv">
                                <label for="password" class="col-md-offset-1 col-md-3 ttl">Password</label>
                                <div class="col-md-6">
                                    <input type="password" id="password" class="samefld" name="password" placeholder="">
                                </div>
                            </div>
                            <div class="form-group cmndiv">
                                <label for="mobile" class="col-md-offset-1 col-md-3 ttl">Mobile</label>
                                <div class="col-md-6">
                                    <input type="text" id="mobile" class="samefld" name="mobile" placeholder="Write Guardian's Mobile No!">
                                </div>
                            </div>
                            <div class="form-group cmndiv">
                                <label for="address" class="col-md-offset-1 col-md-3 ttl">Address</label>
                                <div class="col-md-6">
                                    <textarea id="address" name="address" placeholder="Write Your Address" cols="35" rows="5"></textarea>
                                </div>
                            </div>
                            <div class="form-group cmndiv">
                                <label for="gender" class="col-md-offset-1 col-md-3 ttl">Gender</label>
                                <div class="col-md-6" >
                                    <select name="gender" class="samefld">
                                        <option value="">Select One</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group cmndiv">
                                <label for="proffesion" class="col-md-offset-1 col-md-3 ttl">Profession</label>
                                <div class="col-md-6">
                                    <input type="text" id="proffesion" class="samefld" name="proffesion" placeholder="Write Guardian's Proffesion!">
                                </div>
                            </div>

                            <div class="form-group cmndiv">
                                <label for="" class="col-md-offset-2 col-md-2 ttl"></label>
                                <div class="col-md-6">
                                    <input type="submit" class="btn-success submitbtn" name="save" value="Add Teacher">
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
