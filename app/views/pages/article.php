<section class="ftco-section ftco-degree-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 ftco-animate">
                <p class="mb-5">
                    <img src="app/assets/images/<?= $article->imgLink ?>" alt="" class="img-fluid">
                </p>
                <h2 class="mb-3"><?= $article->title ?></h2>
                <p><?= $article->text ?></p>
                <div class="tag-widget post-tag-container mb-5 mt-5">
                    <div class="tagcloud">
                        <a href="#" class="tag-cloud-link"><?= $article->categoryName ?></a>
                    </div>
                </div>


                <div class="pt-5 mt-5">
                    <?php
                    $number = $countComments['0']->number;
                    if($number == 0){
                        echo "<h3 class=\"mb-5\">Be first to leave a comment</h3>";
                    }
                    elseif ($number == 1){
                        echo "<h3 class=\"mb-5\">$number comment </h3>";
                    }
                    else{
                        echo "<h3 class=\"mb-5\">$number comments </h3>";
                    }
                    ?>

                    <ul class="comment-list" id="comments">
                        <?php
                        //var_dump($comments);
                        foreach($comments as $c):
                            $dateComm = date("M/d/Y H:i", strtotime($c->commDateCreate));
                        ?>
                        <li class="comment">
                            <div class="vcard bio">
                                <img src="app/assets/images/avatar.png" alt="Image placeholder">
                            </div>
                            <div class="comment-body">
                                <h3><?= $c->firstName ?> <?= $c->lastName ?></h3>
                                <div class="meta mb-3"><?= $dateComm ?></div>
                                <p><?= $c->commentText ?></p>
                                <p><a href="#" class="reply">Reply</a></p>
                            </div>
                        </li>
                        <?php
                        endforeach;
                        ?>
                    <!-- END comment-list -->
                    </ul>

                        <?php
                        if(isset($_SESSION['user'])):
                        ?>
                        <div class="comment-form-wrap pt-5">
                            <h3 class="mb-5">Leave a comment</h3>
                            <form action="#" class="p-5 bg-light">
                                <div class="form-group">
                                    <label for="message">Message</label>
                                    <textarea name="" id="comment" cols="30" rows="10" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="submit" id="btncomment" value="Post Comment" class="btn py-3 px-4 btn-primary">
                                </div>
                                <span id="commentError"></span>
                            </form>
                        </div>
                        <?php
                        else:
                        ?>
                        <div class="comment-form-wrap pt-5">
                            <h3 class="mb-5">Sing up to leave a comment</h3>
                        </div>
                        <?php
                        endif;
                        ?>
                </div>

            </div> <!-- .col-md-8 -->
            <div class="col-lg-4 sidebar pl-lg-5 ftco-animate">
                <div class="sidebar-box">
                    <h3>Category</h3>
                    <div class="tagcloud">
                        <a href="#" class="tag-cloud-link"><?= $article->categoryName ?></a>
                    </div>
                </div>

                <div class="sidebar-box ftco-animate">
                    <h3>Recent Blog</h3>
                    <?php
                    foreach($recentArticles as $ra):
                        $date = date("M/d/Y", strtotime($ra->dateCreate));
                    ?>
                    <div class="block-21 mb-4 d-flex">
                        <a class="blog-img mr-4" style="background-image: url(app/assets/images/<?= $ra->imgLink ?>);"></a>
                        <div class="text">
                            <h3 class="heading"><a href="index.php?page=article&id=<?= $ra->id ?>"><?= $ra->title ?></a></h3>
                            <div class="meta">
                                <div><span class="icon-calendar"></span> <?= $date ?></div>
                                <div><span class="icon-person"></span> Admin</div>
                            </div>
                        </div>
                    </div>
                    <?php
                    endforeach;
                    ?>


                <div class="sidebar-box ftco-animate">
                    <h3>Paragraph</h3>
                    <p><?= $article->description ?>...</p>
                </div>
            </div>

        </div>
    </div>
</section> <!-- .section -->

