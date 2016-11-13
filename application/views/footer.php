<footer class="footersection">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="socialservice">
<!--                    <i class="fa fa-facebook-official" aria-hidden="true"></i>
                    <i class="fa fa-twitter-square" aria-hidden="true"></i>
                    <i class="fa fa-google-plus" aria-hidden="true"></i>
                    <i class="fa fa-pinterest-p" aria-hidden="true"></i>-->

                </div>
            </div>
            <div class="col-md-6">
                <div class="copyright">
                    <!--<p>&copy; Copyright 2016 Md. Shahab uddin. All Rights Reserved. </p>-->
                    <P><?php echo $allcopyright[0]->copyright . ' ' . $allcopyright[0]->orgname; ?> </P>
                </div>
            </div>
        </div>
        <div class="gototop"></div>
        <script>
            $(window).scroll(function (){
                if($(this).scrollTop()>350){
                    $(".gototop").fadeIn();
                }else{
                    $(".gototop").fadeOut();
                }
            });
            $(".gototop").click(function (){
                $("html,body").animate({scrollTop:0},500);
            });            
        </script>
    </div>
</footer>

</body>
</html>

