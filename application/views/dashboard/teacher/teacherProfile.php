<?php
foreach ($teachersinfo as $single):
    echo "Hello <b id='welcome'><i>" . $single->email . "</i> !</b>";

endforeach;
?>
<section class="teacherprofile">
    <div class="container">
        <div class="col-md-10">
            <div class="teacherpro">
                <div class="row">
                    <div class="photo col-md-2">
                        <img src="<?php echo $baseurl; ?>uploads/teachers/<?php echo $single->photo; ?>" class="teacherpic" >
                    </div>
                    <div class="teachertxt col-md-8">
                        <?php echo "<h3>Welcome to <i>" . $single->teacher_name . "</i></h3>"; ?>
                    </div>
                </div>
            </div>
            <div class="teacherothersinfo">                    
                <div class="row">
                    <div class="col-md-10">
                        <p class="success"><?php echo $this->session->flashdata('success'); ?></p>
                        <div class="col-md-offset-3 col-md-4 col-md-offset-3">
                            <table class="table teachertbl">
                                <tr>
                                    <td>Teacher's Name</td>
                                    <td>:</td>
                                    <td><?php echo $single->teacher_name; ?></td>
                                </tr>
                                <tr>
                                    <td>E-Mail</td>
                                    <td>:</td>
                                    <td><?php echo $single->email; ?></td>
                                </tr>
                                <tr>
                                    <td>Mobile</td>
                                    <td>:</td>
                                    <td><?php echo $single->mobile; ?></td>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>