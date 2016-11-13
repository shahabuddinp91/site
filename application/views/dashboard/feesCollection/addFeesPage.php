<section class="feesAddSection">
    <div class="container">
        <div class="feesAdd">
            <div class="row">
                <div class="col-md-6">
                    <div class="feesNewAdd">
                        <div class="panel panel-info">
                            <div class="panel-heading">Add Fees</div>
                            <?php echo form_open('Dashboard/addFeesProcess', array('class' => 'form-horizontal')); ?>
                            <p class="msg"><?php echo $this->session->flashdata('msg'); ?></p>
                            <p class="success"><?php echo $this->session->flashdata('success'); ?></p>
                            <p class="exist"><?php echo $this->session->flashdata('exist'); ?></p>
                            <div class="form-group extraTop">
                                <label for="name" class="col-md-3 control-label">Name :</label>
                                <div class="col-md-6">
                                    <input type="text" name="name" id="name"  class="form-control" placeholder="Enter Fees Name!">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="amount" class="col-md-3 control-label">Amount :</label>
                                <div class="col-md-6">
                                    <input type="text" name="amount" id="amount"  class="form-control" placeholder="Enter Fees Amount!">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-offset-4 col-md-4">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="dataList">
                        <form class="form-horizontal" id="frmsearch">
                            <div class="form-group col-md-3">
                                <input class="form-control" id="" Placeholder="Search.....">
                            </div>
                        </form>
                        <table class="table table-hover">
                            <tr>
                                <th>Sl No</th>
                                <th>Fees Name</th>
                                <th>Amount</th>
                                <th>Action</th>                                
                            </tr>
                            <?php
                            $sl = 0;
                            foreach ($allfeesList as $singleData):
                                $sl++;
                                ?>
                                <tr>
                                    <td><?php echo $sl; ?></td>
                                    <td><?php echo $singleData->fees_name; ?></td>
                                    <td><?php echo $singleData->fees_amount; ?></td>
                                    <td>
                                        <?php echo anchor('Dashboard/feesEdit/' . $singleData->fees_id, ' ', array('class' => 'fa fa-pencil-square-o')); ?> |
                                        <?php echo anchor('Dashboard/feesDelete/' . $singleData->fees_id, ' ', array('class' => 'fa fa-trash', 'onclick' => "return confirm('Do you want to delete it?');")); ?>
                                    </td>
                                </tr>
                                <?php
                            endforeach;
                            ?>
                        </table>
                        <?php echo $pagination; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>