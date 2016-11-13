<section class="gradesectionadd">
    <div class="col-md-offset-1 col-md-8 col-md-offset-1">
        <div class="grade">
            <div class="row">
                <?php 
                foreach ($allsubject as $single):
                    ?>
                <p><?php echo $single->subject_name;?></p>
                <?php
                endforeach;
                ?>
            </div>
        </div>
    </div>
</section>