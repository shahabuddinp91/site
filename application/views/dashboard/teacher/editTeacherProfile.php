<?php
foreach ($teachersinfo as $single):
    echo "Hello <b id='welcome'><i>" . $single->email . "</i> !</b>";

endforeach;
?>
<section class="editTeacherSection">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="editTeacher">
                    <p class="text-center editTeacherheading">Edit information of teacher id <span class="extid"><?php echo $single->teacher_id; ?></span></p>
                    <?php echo form_open('Frontpage/updateTeacherProfile', array('')) ?>
                    <table class="table table-bordered">
                        <tr>
                            <td>Teacher Name</td>
                            <td>:</td>
                            <td><input type="text" value="<?php echo $single->teacher_name; ?>" name="tName"></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td><input type="text" value="<?php echo $single->email; ?>" name="tEmail"></td>
                        </tr>
                        <tr>
                            <td>Mobile</td>
                            <td>:</td>
                            <td><input type="text" value="<?php echo $single->mobile; ?>" name="tMobile"></td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>:</td>
                            <td><input type="text" value="<?php echo $single->address; ?>" name="tAddress"></td>
                        </tr>
                        <tr>
                            <td>Birthday</td>
                            <td>:</td>
                            <td><input type="text" value="<?php echo $single->birthday; ?>" class="datepicker" name="tBirthday"></td>
                        </tr>
                        <tr>
                            <td>Gender</td>
                            <td>:</td>
                            <td>
                                <select name="tGender">
                                    <option value="<?php echo $single->gender; ?>"><?php echo $single->gender; ?></option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                        </tr>
                        <th colspan="2">
                        <td>
                            <input type="submit" value="Update" name="update" class="btn btn-primary">
                            <input type="hidden" name="tid" value="<?php echo $single->teacher_id; ?>"
                        </td>
                        </th>
                    </table>
                    <?php echo form_close(); ?>
                </div>
            </div>
            <div class="col-md-5">
                <div class="editTeacher">
                    <p class="text-center editTeacherheading">Change Profile Picture</p>
                    <?php echo form_open_multipart('Frontpage/updateTPpic', array('')) ?>
                    <p class="msg"><?php echo $this->session->flashdata('msg'); ?></p>
                    <table class="table table-bordered">
                        <tr>
                            <td class="cPic" for="tPic">Change Picture</td>
                            <td>:</td>
                            <td>
                                <input type="file" name="tPic" id="tPic"> 
                                <span class="tpicShow">
                                    <img src="<?php echo $baseurl ?>uploads/teachers/<?php echo $single->photo; ?>">
                                </span>
                            </td>
                        </tr>
                        <th colspan="2">
                        <td>
                            <input type="submit" class="btn btn-primary" value="Update Picture">
                            <input type="hidden" name="tid" value="<?php echo $single->teacher_id; ?>"
                        </td>
                        </th>
                    </table>
                    <?php echo form_close(); ?>
                </div>
                <div class="tSettings">
                    <p class="text-center editTeacherheading">Change Password</p>
                   <?php echo form_open('Frontpage/changeTPw', array('')) ?>
                    <p class="msg"><?php echo $this->session->flashdata('msg'); ?></p>
                        <table class="table table-bordered">
                            <tr>
                                <td>New Password</td>
                                <td>:</td>
                                <td>
                                    <input type="password" name="newpass" >
                                </td>
                            </tr>
                            <tr>
                                <td>Confirm Password</td>
                                <td>:</td>
                                <td>
                                    <input type="password" name="confirmpass" >
                                </td>
                            </tr>
                            <th colspan="2">
                            <td>
                                <input type="submit" value="Change Password" name="update" class="btn btn-primary">
                                <input type="hidden" name="tid" value="<?php echo $single->teacher_id; ?>"
                            </td>
                            </th>
                        </table>
                        <?php echo form_close(); ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


