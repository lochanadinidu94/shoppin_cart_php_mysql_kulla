<!-- jQuery -->
<script src="vendors/jquery/dist/jquery.min.js"></script>
<div class="row tile_count">
    <div class="col-md-2"></div>

    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <div class="count">
            <?php
            include_once("classes/product.class.php");
            include_once("classes/ip.class.php");

            $products = new products();
            echo $products->getTotProCount()->iCount; ?>
        </div>
        <span class="count_bottom">products</span>
    </div>
<!--    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">-->
<!--        <div class="count">-->
<!--            --><?php
//            $testi = new Testimonials();
//            echo $testi->getTotTestiCount()->iCount; ?>
<!--        </div>-->
<!--        <span class="count_bottom">Testimonials</span>-->
<!--    </div>-->
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <div class="count" id="vCount"></div>
        <span class="count_bottom">Visitors</span>
        <script>
            // Enter num from and to
            $({countNum: 00}).animate({
                countNum: <?php
                $ip = new ip  ();
                echo $ip->getTotVisitors()->vCount;   ?>}, {
                duration: 3000,
                easing: 'linear',
                step: function () {
                    // What todo on every count
                    document.getElementById('vCount').innerHTML = Math.round(this.countNum);

                },
                complete: function () {

                }
            });
        </script>
    </div>
    <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
        <div class="count" id="visiCount"></div>
        <span class="count_bottom">Visits</span>
        <script>
            // Enter num from and to
            $({countNum: 00}).animate({
                countNum: <?php
                echo $ip->getTotVisits();   ?>}, {
                duration: 4000,
                easing: 'linear',
                step: function () {
                    // What todo on every count
                    document.getElementById('visiCount').innerHTML = Math.round(this.countNum);

                },
                complete: function () {

                }
            });
        </script>
    </div>
    <div class="col-md-2"></div>

</div>