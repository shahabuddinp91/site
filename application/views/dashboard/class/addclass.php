<section class="classsectionadd">
    <div class="col-md-offset-1 col-md-8 col-md-offset-1">
        <div class="class">
            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                Add Class
            </button>
            <p class="success"><?php echo $this->session->flashdata('success'); ?></p>
            <p class="msg"><?php echo $this->session->flashdata('msg'); ?></p>
            <p class="msg"><?php echo validation_errors(); ?></p>
<!--            <script>
            $(document).ready(function(){
                $(".search").keyup(function (){
                    var txt = $(this).val();
                    if(txt != '')
                    {
                        
                    }
                    else{
                        $(".result").html('');
                        $.ajax({
                           url:"fetch.php",
                           method:"post",
                           data:{search:txt},
                           dataType:"text",
                           success:function(data)
                           {
                               $('.result').html(data);
                           }
                        });
                    }
                });
            });
            </script>-->
            <form class="navbar-form" role="search" action="<?php echo $baseurl . 'index.php/Dashboard/searchClass' ?>" method="post">
                <div class="input-group">
                    <input type="text" class="form-control search" placeholder="Class Name or Numeric No" name="search">
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-default">
                            <span class="glyphicon glyphicon-search">
                            </span>
                        </button>
                    </span>
                </div>
            </form>
            <div class="result"></div>
            <div class="panel">
                <div class="well">
                    <div class="panel-info">
                        <table class="table table-hover">
                            <tr>
                                <th>Sl No</th>
                                <th>Class Name</th>
                                <th>Numeric No</th>
                                <th>Action</th>
                            </tr>
                            <?php
                            if ($allclasslist) {
                                $sl = 0;
                                foreach ($allclasslist as $single):
                                    $sl++;
                                    ?>
                                    <tr>
                                        <td><?php echo $sl; ?></td>
                                        <td><?php echo $single->class_name; ?></td>
                                        <td><?php echo $single->numeric_no; ?></td>
                                        <td>
                                            <?php echo anchor('', ' ', array('class' => 'glyphicon glyphicon-edit btn btn-primary samebtn')); ?> |

                                            <?php
                                            $onclick = array('onclick' => "return confirm('Do you want to delete it?')");
                                            echo anchor('Dashboard/classDelete/' . $single->class_id, '<span class="glyphicon glyphicon-trash btn btn-danger samebtn" aria-hidden="true"></span>', $onclick);
                                            ?>
                                        </td>
                                    </tr>
                                    <?php
                                endforeach;
                            }else {
                                echo "Data Not Found!";
                            }
                            ?>
                        </table>
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
                            <h4 class="modal-title" id="myModalLabel">Add Class</h4> 
                        </div>
                        <div class="modal-body">
                            <?php echo form_open('Dashboard/classAddProcess', array('class' => 'form-horizontal')); ?>
                            <div class="form-group cmndiv">
                                <label for="name" class="col-md-offset-1 col-md-3 ttl">Class Name</label>
                                <div class="col-md-6">
                                    <input type="text" id="name" class="samefld" name="name" placeholder="Write Your Class Name!">
                                </div>
                            </div>
                            <div class="form-group cmndiv">
                                <label for="n_no" class="col-md-offset-1 col-md-3 ttl">Numeric No</label>
                                <div class="col-md-6">
                                    <input type="text" id="n_no" name="n_no" class="samefld" placeholder="Write Numeric No!">
                                </div>
                            </div>

                            <div class="form-group cmndiv">
                                <label for="" class="col-md-offset-2 col-md-2 ttl"></label>
                                <div class="col-md-6">
                                    <input type="submit" class="btn-success submitbtn" name="save" value="Add Class">
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
