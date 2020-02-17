<?php
if(isset($_SESSION['user'])){
    header('Location: index.php');
}
?>
<section class="ftco-section contact-section">
    <div class="container">
        <div class="row block-9 no-gutters">
            <div class="col-lg-6 order-md-last d-flex">

                <form id="registation" action="#" class="bg-light p-4 p-md-5 contact-form">
                    <h2>Sing in</h2>
                    <div class="form-group">
                        <input type="text" class="form-control" id="firstName" placeholder="Your Name">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="lastName" placeholder="Your Last Name">
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" id="emailR" placeholder="Your Email">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="passwordR" placeholder="Your Password">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="repassword" placeholder="Re-type Password">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Sing in" id="btnregistration" class="btn btn-primary py-3 px-5">
                    </div>
                    <span id="regError"></span>
                </form>

            </div>

            <div class="col-lg-6 d-flex">

                <form id="login" action="#" class="bg-light p-4 p-md-5 contact-form">
                    <h2>Sing up</h2>
                    <div class="form-group">
                        <input type="email" id="emailL" class="form-control" placeholder="Your Email">
                    </div>
                    <div class="form-group">
                        <input type="password" id="passwordL" class="form-control" placeholder="Your Password">
                    </div>
                    <div class="form-group">
                        <input type="submit" id="btnlogin" value="Sing up" class="btn btn-primary py-3 px-5">
                    </div>
                    <span id="logError"></span>
                </form>
            </div>
        </div>
    </div>
</section>