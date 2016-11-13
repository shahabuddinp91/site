<section class="logosection">
    <div class="col-md-offset-1 col-md-8 col-md-offset-1">
        <div class="logo">
            <div class="panel-info modal-content">
                <div class="panel-heading text-center">Uploaded Logo & Slogan</div> 
                <table class="table table-hover">
                    <tr>
                        <th>Sl No</th>
                        <th>University Name</th>
                        <th>Title</th>
                        <th>Logo</th>
                        <th>Action</th>
                    </tr>
                    <?php
                    $sl = 0;
                    foreach ($alllogoslogan as $single):
                        $sl++;
                        ?>
                        <tr>
                            <td><?php echo $sl; ?></td>
                            <td><?php echo $single->versityname; ?></td>
                            <td><?php echo $single->title; ?></td>
                            <td><img src="<?php echo $baseurl . 'uploads/logo/' . $single->logo; ?>" width="90" height="100"></td>
                            <td>
                                <?php // echo anchor('Dashboard/editLogoSlogan/'.$single->id,'Edit', array('title'=>'Edit','class'=>'fa fa-pencil','aria-hidden'=>'true'));?> 
                                <?php
                                $enable = $single->enable;
                                if ($enable == 0) {
                                    echo anchor('Dashboard/enablelogoSlogan/' . $single->id, 'Enable', array('class' => 'btn btn-primary dtl'));
                                } else {
                                    echo anchor('Dashboard/disablelogoSlogan/' . $single->id, 'Disable', array('class' => 'btn disable dtl'));
                                }
                                ?>
                                <?php echo anchor('Dashboard/editLogoSlogan/' . $single->id, ' ', array('class' => 'glyphicon glyphicon-edit btn btn-primary samebtn')); ?>
                                <?php echo anchor('Dashboard/deleteLogoSlogan/' . $single->id, ' ', array('class' => 'glyphicon glyphicon-trash btn btn-danger samebtn','onclick'=>"return confirm('Do you want to delete it ?')")); ?>
                            </td>
                            <!--<td><input type="hidden" name="id" id="id" value="<?php echo $single->id ?>"</td>-->
                        </tr>
                        <?php
                    endforeach;
                    ?>
                </table>
            </div>
        </div>
    </div>
</section>
