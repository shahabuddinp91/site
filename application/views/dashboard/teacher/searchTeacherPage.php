<div id="searchLoad">
    <div class="well">
        <div class="panel-info">
            <table class="table table-hover">
                <tr>
                    <th>Sl No</th>
                    <th>Name</th>
                    <th>Mobile</th>
                    <th>Email</th>
                    <th>Photo</th>
                    <th>Action</th>
                </tr>
                <?php
                $sl = 0;
                foreach ($allteacher as $single):
                    $sl++;
                    ?>
                    <tr>
                        <td><?php echo $sl; ?></td>
                        <td><?php echo $single->teacher_name; ?></td>
                        <td><?php echo $single->mobile; ?></td>
                        <td><?php echo $single->email; ?></td>
                        <td>
                            <img src="<?php echo $baseurl . 'uploads/teachers/' . $single->photo; ?>" class="tpic">
                        </td>
                        <td>
                            <?php echo anchor('Dashboard/' . $single->teacher_id, 'Details', array('class' => 'btn btn-primary samebtnde')); ?> |
                            <?php echo anchor('Dashboard/teacherEdit/' . $single->teacher_id, ' ', array('title' => 'Edit', 'class' => 'glyphicon glyphicon-edit btn btn-primary samebtn', 'onclick' => "return confirm('Do you want to edit it ?')")); ?> |
                            <?php
//                                    $onclick = array('onclick'=>"return confirm('Do you want to delete it ?')");
                            echo anchor('Dashboard/teacherDelete/' . $single->teacher_id, ' ', array('title' => 'Delete', 'class' => 'glyphicon glyphicon-trash btn btn-danger samebtn', 'onclick' => "return confirm('Do you want to delete it ?')"));
//                                    echo anchor('' . $single->teacher_id,'<span class="glyphicon glyphicon-trash btn btn-danger samebtn" aria-hidden="true"></span>',$onclick);
                            ?>
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