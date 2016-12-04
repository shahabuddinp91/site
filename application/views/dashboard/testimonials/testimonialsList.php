<style>
    .edit,.save,.cancel{
        cursor: pointer;
    }
    .supress_icon{
        display: none;
    }
</style>
<section class="testimonialsection">
    <div class="col-md-offset-1 col-md-8 col-md-offset-1">
        <div class="testimonial">
            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">Add Testimonial</button>
            <p class="msg"><?php echo $this->session->flashdata('msg'); ?></p>
            <div class="well">
                <table class="table table-hover" width="100%">
                    <tr>
                        <th width="10%">Sl No</th>
                        <th width="15%">Title</th>
                        <th width="50%" class="text-justify">Description</th>
                        <th width="15%">Author Name</th>
                        <th width="10%">Action</th>
                    </tr>
                    <?php
                    $sl = 0;
                    foreach ($alltestimonial as $singleTest):
                        $sl++;
                        ?>
                        <tr>
                            <td><?php echo $sl; ?></td>
                            <td class="title"><?php echo $singleTest->title; ?></td>
                            <td class="discription" ><?php echo $singleTest->description; ?></td>
                            <td class="author"><?php echo $singleTest->name; ?></td>
                            <td>
                                <span class="edit fa fa-pencil " data-toggle="tooltip" data-placement="left" title="Edit"></span>
                                <span class="save fa fa-floppy-o supress_icon"aria-hidden="true" data-toggle="tooltip" data-placement="left" title="Save"></span>
                                <span class="cancel fa fa-times supress_icon" data-toggle="tooltip" data-placement="top" title="Cancel" ></span>

                                <input class="title_in" type="hidden" value="">
                                <input class="discription_in" type="hidden" value="">
                                <input class="author_in" type="hidden" value="">
                                <input class="testi_id" type="hidden" value="<?php echo $singleTest->testimonial_id; ?>">

                                <?php // echo anchor('Dashboard/editTestimonial/' . $singleTest->testimonial_id, ' ', array('class' => 'fa fa-pencil samebtn')); ?>
                                <?php // echo anchor('Dashboard/deleteTestimonial/' . $singleTest->testimonial_id, ' ', array('class' => 'fa fa-trash samebtn','onclick'=>"return confirm('Do you want to delete it ?')")); ?>
                            </td>
                        </tr>
                        <?php
                    endforeach;
                    ?>
                </table>
                <input id="base_url" type="hidden" value="<?php echo base_url(); ?>">
                <input id="site_url" type="hidden" value="<?php echo site_url(); ?>">
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
<script type="text/javascript">
    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip()
        //when click on edit icon
        $('.edit').click(function () {
            $(this).hide().parent().find('.supress_icon').show();
            var testi_td = $(this).parent().siblings('.title');
            var discrip_td = $(this).parent().siblings('.discription');
            var author_td = $(this).parent().siblings('.author');
            var title = testi_td.text();
            var discription = discrip_td.text();
            var author = author_td.text();
            var title_input = '<input class="form-control title_box" name="title" value="' + title + '"/>';
            var discription_input = '<textarea class="form-control discription_box" name="discription" rows=5 > ' + discription + '</textarea>';
            var author_input = '<input class="form-control author_box" name="author" value="' + author + '"/>';
            $(this).parent().find('.title_in').val(title);
            $(this).parent().find('.discription_in').val(discription);
            $(this).parent().find('.author_in').val(author);
            testi_td.html(title_input);
            discrip_td.html(discription_input);
            author_td.html(author_input);
        });
//    when click on cancel
        $('.cancel').click(function () {
            $(this).parent().find('.supress_icon').hide();
            $(this).parent().find('.edit').show();
            var title = $(this).parent().find('.title_in').val();
            var discription = $(this).parent().find('.discription_in').val();
            var author = $(this).parent().find('.author_in').val();
//            var author = $(this).parent().find('.author_in').val();
            var title_td = $(this).parent().siblings('.title');
            var discription_td = $(this).parent().siblings('.discription');
            var author_td = $(this).parent().siblings('.author');
//            var author_td = $(this).parent().siblings('.author');
            title_td.html(title);
            discription_td.html(discription);
            author_td.html(author);
//            author_td.html(author);
        });
//    when click on save 
        $('.save').click(function () {
            var base_url = $('#base_url').val();
            var site_url = $('#site_url').val();
            var title = $(this).parent().siblings('.title').find('.title_box').val();
            var discription = $(this).parent().siblings('.discription').find('.discription_box').val();
            var author = $(this).parent().siblings('.author').find('.author_box').val();
            var testi_id = $(this).parent().find('.testi_id').val();
            $.ajax({
                context: this,
                url: site_url + '/Dashboard/updateTestimonial',
                type: 'post',
                dataType: 'text',
                data: {
                    title: title,
                    discription: discription,
                    author:author,
                    testi_id: testi_id,
                },
                beforeSend: function () {
                    $(this).parent().append('<img id="loader" src="' + base_url + 'asset/images/loader.gif" alt="loading"/>');
                },
                success: function (response) {
                    if (response !== 'problem') {
                        var info = response.split('|');
                        $(this).parent().find('.supress_icon').hide();
                        $(this).parent().find('.edit').show();
                        var testi_id = $(this).parent().siblings('.title');
                        var discrip_id = $(this).parent().siblings('.discription');
                        var author_id = $(this).parent().siblings('.author');
                        testi_id.html(info[0]);
                        discrip_id.html(info[1]);
                        author_id.html(info[2]);
                    } else {
                        alert('There ais a problem');
                    }
                    $('#loader').remove();
                }
            });
        });


    });

</script>