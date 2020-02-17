<?php
if(isset($_SESSION['user']) and $_SESSION['user']->roleId == 1){

}else{
    header('Location: index.php');
}
?>
<section class="ftco-section contact-section">
    <div class="container">
        <div class="row block-9 no-gutters " >


                <table class="text-center" id="user">
                    <tr>
                        <th>
                            id
                        </th>
                        <th>
                            first name
                        </th>
                        <th>
                            last name
                        </th>
                        <th>
                            email
                        </th>
                        <th>
                            date created
                        </th>
                        <th>
                            delete
                        </th>
                    </tr>
                    <tbody id="tbodyusers">
                    <?php
                    foreach($users as $u):
                    ?>
                    <tr>
                        <td>
                            <?= $u->id?>
                        </td>
                        <td>
                            <?= $u->firstName?>
                        </td>
                        <td>
                            <?= $u->lastName?>
                        </td>
                        <td>
                            <?= $u->email?>
                        </td>
                        <td>
                            <?= $u->dateCreate?>
                        </td>
                        <td>
                            <input type="submit" class="btndeleteuser btn btn-primary py-3 px-5" data-id="<?= $u->id?>" value="delete">
                        </td>
                    </tr>
                    <?php
                    endforeach;
                    ?>
                    </tbody>
                </table>

        </div>
    </div>
    <div class="container-fluid">
        <div class="row block-9 no-gutters">
            <table class="text-center" id="articles">
            <tr>
                <th>
                    id
                </th>
                <th>
                    title
                </th>
                <th>
                    text
                </th>
                <th>
                    description
                </th>
                <th>
                    image
                </th>
                <th>
                    category
                </th>
                <th>
                    date created
                </th>
                <th>
                    update
                </th>
                <th>
                    delete
                </th>
            </tr>
            <tbody id="tbody">
            <?php
            foreach($articles as $a):
            ?>
            <tr>
                <td>
                    <?= $a->id?>
                </td>
                <td>
                    <?= $a->title?>
                </td>
                <td>
                    <?= $a->text?>
                </td>
                <td>
                    <?= $a->description?>
                </td>
                <td>
                    <img  href="app/assets/images/<?= $a->imgLink ?>" alt="article"/>
                </td>
                <td>
                    <?= $a->categoryName?>
                </td>
                <td>
                    <?= $a->dateCreate?>
                </td>
                <td>
                    <input type="submit" class="btnupdate btn btn-primary py-3 px-5" data-id="<?= $a->id?>" value="update">
                </td>
                <td>
                    <input type="submit" class="btndelete btn btn-primary py-3 px-5" data-id="<?= $a->id?>" value="delete">
                </td>
            </tr>
            <?php
            endforeach;
            ?>
            </tbody>
            </table>
        </div>
        <div class="row mt-5">
            <div class="col text-center">
                <div class="block-27">
                    <ul>
                    <?php
                    $br=0;
                    for($i=0; $i<count($allArticles); $i+=10):
                        $br++;
                    ?>
                    <li class = "active"><a href="#" class="adminpagination" data-id="<?= $i ?>"><?= $br ?></a></li>
                    <?php
                    endfor;
                    ?>
                    </ul>
                </div>
            </div>

    </div>
    <div class="container">
        <div class="row block-9 no-gutters">
            <div class="col-lg-6 order-md-last d-flex" id="updateForm">

                <form id="update" action="#" class="bg-light p-4 p-md-5 contact-form">
                    <h2>Update Article</h2>
                    <input type="hidden" id="updateid" class="form-control">
                    <div class="form-group">
                        <input type="text" id="updatetitle" class="form-control" placeholder="Article title">
                    </div>
                    <div class="form-group">
                        <input type="text" id="updatedescription" class="form-control" placeholder="Articel description">
                    </div>
                    <div class="form-group">
                        <textarea rows="20" id="updatetext" class="form-control" placeholder="Article text"></textarea>
                    </div>
                    <div class="form-group">
                        <select id="updatecategories" class="form-control">
                            <option value="0">Select category</option>
                            <?php
                            foreach($categories as $c):
                                ?>
                                <option value="<?=$c->id?>"><?=$c->categoryName?></option>
                            <?php
                            endforeach;
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="submit" id="btnupdatefinish" value="Update" class="btn btn-primary py-3 px-5">
                        <input type="button" id="btnhide" value="Hide" class="btn btn-primary py-3 px-5">
                    </div>
                    <span id="updateError"></span>
                </form>

            </div>

            <div class="col-lg-6 d-flex">

                <form id="insert" enctype="multipart/form-data" method="post" action="index.php?page=insertArticle" class="bg-light p-4 p-md-5 contact-form">
                    <h2>Insert Article</h2>
                    <div class="form-group">
                        <input type="text" id="title" name="title" class="form-control" placeholder="Article title">
                    </div>
                    <div class="form-group">
                        <input type="text" id="description" name="description" class="form-control" placeholder="Articel description">
                    </div>
                    <div class="form-group">
                        <textarea rows="20" id="text" name="text" class="form-control" placeholder="Article text"></textarea>
                    </div>
                    <div class="form-group">
                        <select id="categories" name="categoryId" class="form-control">
                            <option value="0">Select category</option>
                            <?php
                            foreach($categories as $c):
                            ?>
                            <option value="<?=$c->id?>"><?=$c->categoryName?></option>
                            <?php
                            endforeach;
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="file" id="image" name="image" class="form-control" placeholder="Choose file">
                    </div>
                    <div class="form-group">
                        <input type="submit" id="btninsert" name="btninsert" value="Insert" class="btn btn-primary py-3 px-5">
                    </div>
                    <span id="insertError"></span>
                </form>
            </div>
        </div>
    </div>
</section>