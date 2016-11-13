<?php
foreach ($studentsinfo as $single):

endforeach;
?>
<section class="studentprofile">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="studentpro">
                    <div class="row">
                        <div class="stdphoto col-md-2">
                            <img src="<?php echo $baseurl; ?>uploads/students/<?php echo $single->photo; ?>" class="stdpic">
                        </div>
                        <div class="stdtxt">
                            <h3>Welcome to students panel</h3>
                        </div>
                    </div>
                </div>
                <div class="stdothersinfo">                    
                    <div class="row">
                            <div class="col-md-6">
                                <h4 class="text-center">General Information</h4>
                                <table class="table stdtbl">
                                    <tr>
                                        <td>Student's Name</td>
                                        <td>:</td>
                                        <td><?php echo $single->student_name; ?> <?php echo $single->student_id; ?> </td>
                                    </tr>
                                    <tr>
                                        <td>Guardian Name</td>
                                        <td>:</td>
                                        <td><?php echo $single->guardian_name; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Roll No</td>
                                        <td>:</td>
                                        <td><?php echo $single->roll_no; ?></td>
                                    </tr>
                                    <tr>
                                        <td>E-Mail</td>
                                        <td>:</td>
                                        <td><?php echo $single->email; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Mobile</td>
                                        <td>:</td>
                                        <td><?php echo $single->phone; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Birthday</td>
                                        <td>:</td>
                                        <td><?php echo $single->birthday; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Gender</td>
                                        <td>:</td>
                                        <td><?php echo $single->gender; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Address</td>
                                        <td>:</td>
                                        <td><?php echo $single->address; ?></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <h4 class="text-center">Educational Information</h4>
                                <table class="table stdtbl">
                                    <tr>
                                        <td>Class</td>
                                        <td>:</td>
                                        <td><?php echo $single->class_name; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Section</td>
                                        <td>:</td>
                                        <td><?php echo $single->section_name; ?></td>
                                    </tr>
                                </table>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>