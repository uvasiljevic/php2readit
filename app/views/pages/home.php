<section class="ftco-section" id="to">
    <div class="container">
        <div class="row">
            <div class="col-md-12" >
                <div id="articles">
                <?php
                foreach ($articles as $a):
                    $date = date("M/d/Y H:i", strtotime($a->dateCreate));
                ?>

                <div class="case">
                    <div class="row">
                        <div class="col-md-6 col-lg-6 col-xl-8 d-flex">
                            <a href="index.php?page=article&id=<?= $a->id ?>" class="img w-100 mb-3 mb-md-0" style="background-image: url(app/assets/images/<?= $a->imgLink?>);"></a>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-4 d-flex">
                            <div class="text w-100 pl-md-3">
                                <span class="subheading"><?= $a->categoryName?></span>
                                <h2><a href="index.php?page=article&id=<?= $a->id ?>"><?= $a->title?></a></h2>
                                <ul class="media-social list-unstyled">
                                    <li class="ftco-animate"><a href="https://twitter.com/"><span class="icon-twitter"></span></a></li>
                                    <li class="ftco-animate"><a href="https://facebook.com/"><span class="icon-facebook"></span></a></li>
                                    <li class="ftco-animate"><a href="https://instagram.com/"><span class="icon-instagram"></span></a></li>
                                </ul>
                                <div class="meta">
                                    <p class="mb-0"><a href="index.php?page=article&id=<?= $a->id ?>"><?= $date?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
                endforeach;
                ?>
                </div>
            <div class="row mt-5">
                <div class="col text-center">
                <div class="block-27">
                    <ul>
                        <?php
                        $br=0;
                        for($i=0; $i<count($allArticles); $i+=6):
                        $br++;
                        ?>
                        <li class = "active"><a href="#" class="homepagination" data-id="<?= $i ?>"><?= $br ?></a></li>
                        <?php
                        endfor;
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>