<section class="editTeacherSection">
    <div class="col-md-offset-1 col-md-8 col-md-offset-1">
        <div class="editTeacher">
            <p class="text-center editTeacherheading">Edit information of teacher id <span class="extid"><?php echo $teacherid;?></span></p>
            <?php echo form_open_multipart('Dashboard/teacherUpdate', array('class' => 'form-horizontal')); ?>
            <div class="form-group cmndiv">
                <label for="name" class="col-md-offset-1 col-md-3 ttl">Name</label>
                <div class="col-md-6">
                    <input type="text" id="name" class="samefld" value="<?php echo $tName; ?>" name="name" placeholder="Write Teacher's Name!">
                    <?php // echo form_error('name');?>
                </div>
            </div>
            <div class="form-group cmndiv">
                <label for="mobile" class="col-md-offset-1 col-md-3 ttl">Mobile</label>
                <div class="col-md-6">
                    <input type="text" id="mobile" class="samefld" value="<?php echo $mobile; ?>" name="mobile" placeholder="Write Teacher's Mobile No!">
                </div>
            </div>
            <div class="form-group cmndiv">
                <label for="dob" class="col-md-offset-1 col-md-3 ttl">Date of Birth</label>
                <div class="col-md-6">
                    <input type="text" id="datepicker" class="samefld" value="<?php echo $birthday; ?>" name="dob" placeholder="Date of Birth!">
                </div>
            </div>
            <div class="form-group cmndiv">
                <label for="gender" class="col-md-offset-1 col-md-3 ttl">Gender</label>
                <div class="col-md-6" >
                    <select name="gender" class="samefld">
                        <option value="<?php echo $gender; ?>"><?php echo $gender; ?></option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
            </div>
            <div class="form-group cmndiv">
                <label for="address" class="col-md-offset-1 col-md-3 ttl">Address</label>
                <div class="col-md-6">
                    <textarea id="address" name="address" placeholder="Write Your Address" cols="35" rows="5"><?php echo $address; ?></textarea>
                </div>
            </div>
            <div class="form-group cmndiv">
                <label for="photo" class="col-md-offset-1 col-md-3 ttl">Photo</label>
                <div class="col-md-6">
                    <input type="file" id="photo" class="" name="teacherphoto" value="<?php echo $photo; ?>">
                    <span class="teacherpicEdit">
                        <img src="<?php echo $baseurl ?>uploads/teachers/<?php echo $photo; ?>">
                    </span>
                </div>
            </div>


            <div class="form-group cmndiv">
                <label for="" class="col-md-offset-2 col-md-2 ttl"></label>
                <div class="col-md-6">
                    <input type="submit" class="btn-success submitbtn" name="save" value="Update Teacher">
                    <input type="hidden" name="te_id" value="<?php echo $teacherid;?>">
                </div>
            </div>

            <?php echo form_close(); ?>
        </div>
    </div>
</section>


