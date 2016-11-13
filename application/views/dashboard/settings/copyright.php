<section class="logosection">
    <div class="col-md-offset-1 col-md-8 col-md-offset-1">
        <div class="logo">
            <div class="panel-info modal-content">
                <div class="panel-heading text-center">Change Copyright Settings</div>
                <p class="msg"><?php echo $this->session->flashdata('msg'); ?></p>
                <p class="msg"><?php // echo validation_errors();       ?></p>
                <?php echo form_open('Dashboard/copyrightProcess', array('class' => 'form-horizontal')); ?>
                <div class="form-group cmndiv">
                    <label for="cpname" class="col-md-offset-2 col-md-2 ttl">Copyright Year</label>
                    <div class="col-md-6">
                        <input type="text" id="cpname" class="samefld" name="cpname" placeholder="Write Your Copyright Year!">
                    </div>
                </div>
                <div class="form-group cmndiv">
                    <label for="orgname" class="col-md-offset-2 col-md-2 ttl">Orgnization Name</label>
                    <div class="col-md-6">
                        <input type="text" id="orgname" name="orgname" class="samefld" placeholder="Write Orgnization Name!">
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
