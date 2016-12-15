<section class="studentprofile" style="margin-top: 50px;">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="panel panel-info">
                    <div class="panel-heading text-center">Total Students of Class Eight in <?php echo date('Y'); ?></div>
                    <?php
//                        echo '<pre>';                        print_r($allData); echo '</pre>';
                    if ($allData) {
                        ?>
                        <table class="table table-bordered table-striped">
                            <tr>
                                <th>Sl No</th>
                                <th>Student's Name</th>
                                <th>Class</th>
                                <th>Section</th>
                                <th>Roll No</th>
                                <th>Mobile</th>
                                <th>Address</th>
                            </tr>
                            <?php
                            $sl = 0;
                            foreach ($allData as $single):
                                $sl++;
                                ?>
                                <tr>
                                    <td><?php echo $sl; ?></td>
                                    <td><?php echo $single->student_name ?></td>
                                    <td><?php echo $single->class_name ?></td>
                                    <td><?php echo $single->section_name ?></td>
                                    <td><?php echo $single->roll_no ?></td>
                                    <td><?php echo $single->phone ?></td>
                                    <td><?php echo $single->address ?></td>
                                </tr>
                                <?php
                            endforeach;
                            ?>
                        </table>
                        <?php
                    }else {
                        echo '<h4 class="notFound text-center">Data not found</h4>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>