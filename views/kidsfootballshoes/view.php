<?php
$userModel = new \models\Users();
$user = $userModel->GetCurrentUser();
?>
    <p><a href="/" class="link-dark">Головна</a>>><a href="/kidsfootballshoes" class="link-dark">Дитяче взуття</a><span>>></span><span class="link-dark"><?=$model['title']?></span></p>

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="tovar-block">
            <div class="row">
                <div class="col-6">
                    <div class="photo">
                        <? if (is_file('files/kidsfootballshoes/'.$model['photo'].'_m.jpg')) : ?>
                            <? if (is_file('files/kidsfootballshoes/'.$model['photo'].'_b.jpg')) : ?>
                                <a href="/files/kidsfootballshoes/<?=$model['photo']?>_b.jpg" data-fancybox="gallery">
                            <? endif;?>
                            <img class="bd-placeholder-img rounded" width="90%" height="90%" src="/files/kidsfootballshoes/<?=$model['photo']?>_b.jpg">
                            <? if (is_file('files/kidsfootballshoes/'.$model['photo'].'_b.jpg')) : ?>
                                </a>
                            <? endif;?>
                        <? endif;?>
                    </div>
                </div>
                <div class="col-6">
                    <div>
                        Опис: <?=$model['short_text']?>
                    </div>
                    <div>
                        Бренд: <?=$model['brand']?>
                    </div>
                    <div>
                        Артикул: <?=$model['article']?>
                    </div>
                    <div>
                        <h2><b><?=$model['price']?> грн.</b></h2>
                    </div>
                </div>
            </div>
            <br/>
            <div class="buttons">
                <? if($userModel->IsUserAuthenticated()) :?>
                    <a href="/basket/add?id=<?=$model['id']?>&tableName=kidsfootballshoes" class="btn btn-success">Додати у кошик</a>
                    <a href="/responseforkidsfootballshoes/add?id=<?=$model['id']?>" class="btn btn-warning">Залишити відгук</a>
                <? else:?>

                <?endif;?>
            </div>
            <? if(!empty($comments)) :?>
            <hr/>
            <h3>Відгуки про товар:</h3>
            <div class="row">
                <div class="col-12">
                    <? foreach ($comments as $comment) : ?>
                        <div class="comment">
                            <?=$comment['user_firstname']?> <?=$comment['user_lastname']?>
                            <hr/>
                            <?=$comment['text']?>
                        </div>
                        <? if($_SESSION['user']['login'] == 'admin') :?>
                            <a href="/responseforkidsfootballshoes/edit?id=<?=$comment['id']?>" class="btn btn-success" >Редагувати</a>
                            <a href="/responseforkidsfootballshoes/delete?id=<?=$comment['id']?>" class="btn btn-danger">Видалити</a>
                        <? else:?>

                        <? endif;?>
                    <? endforeach;?>
                </div>
            <? else: ?>

            <? endif;?>
            </div>
        </div>
    </div>
</div>


<style>
    .comment{
        margin: 10px;
        padding: 10px;
        border: 1px solid grey;
        border-radius: 10px;
    }
    .buttons{
        position: relative;
        margin-bottom: 10px;
    }
</style>