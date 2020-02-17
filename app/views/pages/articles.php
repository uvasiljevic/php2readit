<section class="ftco-section ftco-no-pt ">
    <div class="container">

        <div class="row mt-5">
            <div class="col text-center">
                <div id="categories">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link categories active categoryfilter" data-id="0" href="#">All</a> <!-- Dodati class active kad se bude radio dogadjaj klik-->
                        </li>
                        <?php
                        foreach($categories as $c):
                        ?>
                        <li class="nav-item">
                            <a class="nav-link categories categoryfilter" data-id="<?= $c->id ?>" href="#"><?= $c->categoryName ?></a> <!-- Dodati class active kad se bude radio dogadjaj klik-->
                        </li>
                        <?php
                        endforeach;
                        ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row d-flex art">

            <?php
            foreach($articles as $a):
                $day   = date("d", strtotime($a->dateCreate));
                $month = date("F", strtotime($a->dateCreate));
                $year  = date("Y", strtotime($a->dateCreate));
            ?>
            <div class="col-md-4 ftco-animate">
                <div class="blog-entry justify-content-end">
                    <a href="index.php?page=article&id=<?= $a->id ?>" class="block-20" style="background-image: url('app/assets/images/<?= $a->imgLink?>');">
                    </a>
                    <div class="text p-4 float-right d-block">
                        <div class="topper d-flex align-items-center">
                            <div class="one py-2 pl-3 pr-1 align-self-stretch">
                                <span class="day"><?= $day ?></span>
                            </div>
                            <div class="two pl-0 pr-3 py-2 align-self-stretch">
                                <span class="yr"><?= $year ?></span>
                                <span class="mos"><?= $month ?></span>
                            </div>
                        </div>
                        <h3 class="heading mb-3"><a href="index.php?page=article&id=<?= $a->id ?>"><?= $a->title ?></a></h3>
                        <p><?= $a->description ?></p>
                        <p><a href="index.php?page=article&id=<?= $a->id ?>" class="btn-custom"><span class="ion-ios-arrow-round-forward mr-3"></span>Read more</a></p>
                    </div>
                </div>
            </div>
            <?php
            endforeach;
            ?>

        </div>

    </div>
</section>