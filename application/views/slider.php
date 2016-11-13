<section class="slidersection">
    <div class="container">
        <style>
            .carousel-inner > .item > img,
            .carousel-inner > .item > a > img {
                width: 100%;
                height: 290px;
                margin: auto;
            }
        </style>
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
                <li data-target="#myCarousel" data-slide-to="3"></li>
            </ol>
            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">

                <?php
                foreach ($allslider as $single):
                    ?>
                    <div class="item">
                        <img src="<?php echo $baseurl; ?>uploads/sliders/<?php echo $single->slider; ?> ">
                        <div class="carousel-caption">
                            <h3><?php echo $single->shortname; ?></h3>
                            <p><?php echo $single->title; ?></p>
                        </div>
                    </div>
                    <?php
                endforeach;
                ?>
                <script type="text/javascript">
                    $('.carousel-inner .item:first-child').addClass('active');
                </script>
            </div>
            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</section>

