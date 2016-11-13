<section class="testimonialsection">
    <div class="col-md-offset-1 col-md-8 col-md-offset-1">
        <div class="testimonial">
            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">Add Testimonial</button>
            <p class="msg"><?php echo $this->session->flashdata('msg'); ?></p>
            <div class="well">
                <table class="table table-hover" width="100%">
                    <tr>
                        <th>Sl No</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Author Name</th>
                        <th>Action</th>
                    </tr>
                    <?php
                    $sl = 0;
                    foreach ($alltestimonial as $singleTest):
                        $sl++;
                        ?>
                        <tr>
                            <td><?php echo $sl; ?></td>
                            <td><?php echo $singleTest->title; ?></td>
                            <td><?php echo $singleTest->description; ?></td>
                            <td><?php echo $singleTest->name; ?></td>
                            <td>
                                <?php echo anchor('Dashboard/editTestimonial/' . $singleTest->testimonial_id, ' ', array('class' => 'glyphicon glyphicon-edit btn btn-primary samebtn')); ?>
                                <?php echo anchor('Dashboard/deleteTestimonial/' . $singleTest->testimonial_id, ' ', array('class' => 'glyphicon glyphicon-trash btn btn-danger samebtn','onclick'=>"return confirm('Do you want to delete it ?')")); ?>
                            </td>
                        </tr>

                        <?php
                    endforeach;
                    ?>
                </table>
                    <?php echo $pagination; ?>
            </div>
            <!--Modal--> 
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Add Testimonial</h4> 
                        </div>
                        <div class="modal-body">
                            <?php echo form_open('Dashboard/addTestimonial', array('class' => 'form-horizontal')); ?>
                            <div class="form-group cmndiv">
                                <label for="title" class=" col-md-2 ttl">Title</label>
                                <div class="col-md-8">
                                    <input type="text" id="title" class="samefld" name="title" placeholder="Write Your Testimonials Title!">
                                </div>
                            </div>
                            <div class="form-group cmndiv">
                                <label for="mytextarea" class=" col-md-2 ttl">Description</label>
                                <div class="col-md-8">
                                    <textarea class="desc" id="mytextarea" cols="40" rows="10" name="desc" placeholder="Write Description" ></textarea>
                                </div>
                            </div>
                            <div class="form-group cmndiv">
                                <label for="name" class=" col-md-2 ttl">Author Name</label>
                                <div class="col-md-8">
                                    <input type="text" id="name" class="samefld" name="name" placeholder="Write Author Name!">
                                </div>
                            </div>

                            <div class="form-group cmndiv">
                                <label for="" class=" col-md-2 ttl"></label>
                                <div class="col-md-8">
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

