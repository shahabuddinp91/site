<section class="logosection">
    <div class="col-md-offset-1 col-md-8 col-md-offset-1">
        <div class="logo">
            <div class="panel-info modal-content">
                <div class="panel-heading text-center">Change Your Settings</div>
                <p class="msg"><?php echo $this->session->flashdata('msg'); ?></p>
                <p class="msg"><?php // echo validation_errors();       ?></p>
                <?php echo form_open_multipart('Dashboard/logoSloganProcess', array('class' => 'form-horizontal')); ?>
                <div class="form-group cmndiv">
                    <label for="name" class="col-md-offset-2 col-md-2 ttl">University Name</label>
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
                    <label for="logofile" class="col-md-offset-2 col-md-2 ttl">Change Logo</label>
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
        </div>
    </div>
</section>
