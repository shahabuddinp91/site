<style >
    .supress_icon{
        display: none;
    }    
</style>
<section class="classsectionadd">
    <div class="col-md-offset-1 col-md-8 col-md-offset-1">
        <div class="class">
            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                Add Section
            </button>
            <p class="msg"><?php echo $this->session->flashdata('msg'); ?></p>
            <p class="success"><?php echo $this->session->flashdata('success'); ?></p>
            <p class="exist"><?php echo $this->session->flashdata('exist'); ?></p>
            <p class="msg"><?php echo validation_errors(); ?></p>
            <div class="panel">
                <div class="well">
                    <div class="panel-info">
                        <form class="navbar-form" role="search" action="<?php echo $baseurl . 'index.php/Dashboard/searchClass' ?>" method="post">
                            <div class="input-group">
                                <input type="text" class="form-control right search" placeholder="Section name...." name="search" id="combobox">
                                <span class="input-group-btn">
                                    <button type="submit" class="btn btn-default">
                                        <span class="glyphicon glyphicon-search">
                                        </span>
                                    </button>
                                </span>
                            </div>
                        </form>
                        <table class="table table-hover">
                            <tr>
                                <th>Sl No</th>
                                <th>Class Name</th>
                                <th>Section Name</th>
                                <th>Teacher Name</th>
                                <th>Action</th>
                            </tr>
                            <?php
                            $sl = 0;
                            foreach ($allsectionlist as $single):
                                $sl++;
                                ?>
                                <tr>
                                    <td><?php echo $sl; ?></td>
                                    <td><?php echo $single->class_name; ?></td>
                                    <td class="section_fld"><?php echo $single->section_name; ?></td>
                                    <td><?php echo $single->teacher_name; ?></td>
                                    <td>
                                        <span class="edit fa fa-pencil-square-o" data-toggle="tooltip" data-placement="top" title="Edit"></span>
                                        <span class="save fa fa-save supress_icon" data-toggle="tooltip" data-placement="top" title="Save"></span>
                                        <span class="cancel fa fa-times supress_icon" data-toggle="tooltip" data-placement="top" title="Cancel"></span>

                                        <input type="hidden" class="section_hdn" value="">
                                        <input type="hidden" class="sec_id" value="<?php echo $single->section_id; ?>"

                                               <?php
                                               $onclick = array('onclick' => "return confirm('Do you want to delete it?')");
                                               echo anchor('Dashboard/sectionDelete/' . $single->section_id, '<span class="fa fa-trash-o samebtn" aria-hidden="true"></span>', $onclick);
                                               ?>
                                    </td>
                                </tr>
                                <?php
                            endforeach;
                            ?>
                        </table>
                        <input id="base_url" type="hidden" value="<?php echo base_url(); ?>">
                        <input id="site_url" type="hidden" value="<?php echo site_url(); ?>">
                    </div>
                    <?php echo $pagination; ?>
                </div>
            </div>



            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Add Section</h4> 
                        </div>
                        <div class="modal-body">
                            <?php echo form_open('Dashboard/sectionaddProcess', array('class' => 'form-horizontal')); ?>
                            <div class="form-group cmndiv">
                                <label for="name" class="col-md-offset-1 col-md-3 ttl">Section Name</label>
                                <div class="col-md-6">
                                    <input type="text" id="name" class="samefld form-control" name="name">
                                </div>
                            </div>
                            <div class="form-group cmndiv">
                                <label for="sectionname" class="col-md-offset-1 col-md-3 ttl">Class Name</label>
                                <div class="col-md-6">
                                    <select class="classname form-control" id="classname" name="classname">
                                        <option>Select One</option>
                                        <?php
                                        foreach ($allclass as $single):
                                            ?>
                                            <option value="<?php echo $single->class_id; ?>"><?php echo $single->class_name; ?></option>
                                            <?php
                                        endforeach;
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group cmndiv">
                                <label for="teachername" class="col-md-offset-1 col-md-3 ttl">Teacher Name</label>
                                <div class="col-md-6">
                                    <select class="teachername form-control" id="teachername" name="teachername">
                                        <option>Select One</option>
                                        <?php
                                        foreach ($allteacher as $singlete):
                                            ?>
                                            <option value="<?php echo $singlete->teacher_id; ?>"><?php echo $singlete->teacher_name; ?></option>
                                            <?php
                                        endforeach;
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group cmndiv">
                                <label for="" class="col-md-offset-2 col-md-2 ttl"></label>
                                <div class="col-md-6">
                                    <input type="submit" class="btn-success submitbtn" name="save" value="Add Section">
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
<script type="text/javascript">
    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip()
        //when click on edit icon
        $('.edit').click(function () {
            $(this).hide().parent().find('.supress_icon').show();
            var sec_td = $(this).parent().siblings('.section_fld');
            var section = sec_td.text();
            var section_input = '<input class="form-control section_box" name="section" value="' + section + '"/>';
            $(this).parent().find('.section_hdn').val(section);
            sec_td.html(section_input);
        });
//    when click on cancel
        $('.cancel').click(function () {
            $(this).parent().find('.supress_icon').hide();
            $(this).parent().find('.edit').show();
            var section = $(this).parent().find('.section_hdn').val();
            var section_td = $(this).parent().siblings('.section_fld');
            section_td.html(section);
        });
//    when click on save 
        $('.save').click(function () {
            var base_url = $('#base_url').val();
            var site_url = $('#site_url').val();
            var section = $(this).parent().siblings('.section_fld').find('.section_box').val();
            var sec_id = $(this).parent().find('.sec_id').val();
            $.ajax({
                context: this,
                url: site_url + '/Dashboard/updateSection',
                type: 'post',
                dataType: 'text',
                data: {
                    section: section,
                    sec_id: sec_id,
                },
                beforeSend: function () {
                    $(this).parent().append('<img id="loader" src="' + base_url + 'asset/images/loader.gif" alt="loading"/>');
                },
                success: function (response) {
                    if (response !== 'problem') {
                        var info = response.split('|');
                        $(this).parent().find('.supress_icon').hide();
                        $(this).parent().find('.edit').show();
                        var sec_id = $(this).parent().siblings('.section_fld');
                        sec_id.html(info[0]);
                    } else {
                        alert('There ais a problem');
                    }
                    $('#loader').remove();
                }
            });
        });

    })
</script>
<!--
//    when click on save 
                     

        });-->