<?php
require_once "app/config/autoload.php";
require_once "app/config/database.php";

use app\Models\DB;
$db = new DB(SERVER, DATABASE, USERNAME, PASSWORD);
$footerControler  = new \app\Controllers\FooterController($db);
$footerArticles   = $footerControler->footerArticles();
$menuControler    = new \app\Controllers\MenuController($db);
$footerMenu       = $menuControler->getMenu();
?>
<footer class="ftco-footer ftco-bg-dark ftco-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="logo"><a href="#">Read<span>it</span>.</a></h2>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                    <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                        <li class="ftco-animate"><a href="https://twitter.com/" target="blank"><span class="icon-twitter"></span></a></li>
                        <li class="ftco-animate"><a href="https://facebook.com/" target="blank"><span class="icon-facebook"></span></a></li>
                        <li class="ftco-animate"><a href="https://instagram.com/" target="blank"><span class="icon-instagram"></span></a></li>
                        <li class="ftco-animate"><a href="https://www.linkedin.com/in/uro%C5%A1-vasiljevi%C4%87-9a01781a0/" target="blank" title="About author"><span class="icon-linkedin"></span></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md">

                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">latest News</h2>
                    <?php
                    foreach($footerArticles as $fa):
                        $date = date("M/d/Y", strtotime($fa->dateCreate));
                    ?>
                    <div class="block-21 mb-4 d-flex">
                        <a class="img mr-4 rounded" style="background-image: url(app/assets/images/<?= $fa->imgLink ?>);"></a>
                        <div class="text">
                            <h3 class="heading"><a href="index.php?page=article&id=<?= $fa->id ?>"><?= $fa->title ?></a></h3>
                            <div class="meta">
                                <div></span><?= $date ?></div>
                            </div>
                        </div>
                    </div>
                    <?php
                    endforeach;
                    ?>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4 ml-md-5">
                    <h2 class="ftco-heading-2">Menu</h2>
                    <ul class="list-unstyled">
                        <?php
                        foreach($footerMenu as $fm):
                        ?>
                        <li><a href="index.php?&page=<?= $fm->link ?>" class="py-1 d-block"><span class="ion-ios-arrow-forward mr-3"></span><?= $fm->title ?></a></li>
                        <?php
                        endforeach;
                        ?>
                        <li><a href="documentation.pdf" class="py-1 d-block" target="blank"><span class="ion-ios-arrow-forward mr-3"></span>Documentation</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Have a Questions?</h2>
                    <div class="block-23 mb-3">
                        <ul>
                            <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
                            <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
                            <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@yourdomain.com</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">

                <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
            </div>
        </div>
    </div>
</footer>



<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>



<script src="app/assets/js/jquery.min.js"></script>
<script src="app/assets/js/jquery-migrate-3.0.1.min.js"></script>
<script src="app/assets/js/popper.min.js"></script>
<script src="app/assets/js/bootstrap.min.js"></script>
<script src="app/assets/js/jquery.easing.1.3.js"></script>
<script src="app/assets/js/jquery.waypoints.min.js"></script>
<script src="app/assets/js/jquery.stellar.min.js"></script>
<script src="app/assets/js/owl.carousel.min.js"></script>
<script src="app/assets/js/jquery.magnific-popup.min.js"></script>
<script src="app/assets/js/aos.js"></script>
<script src="app/assets/js/jquery.animateNumber.min.js"></script>
<script src="app/assets/js/scrollax.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="app/assets/js/google-map.js"></script>
<script src="app/assets/js/main.js"></script>
<script src="app/assets/js/articles.js"></script>
<script src="app/assets/js/pagination.js"></script>
<script src="app/assets/js/admin.js"></script>
<script src="app/assets/js/comments.js"></script>
<script src="app/assets/js/login.js"></script>

</body>
</html>