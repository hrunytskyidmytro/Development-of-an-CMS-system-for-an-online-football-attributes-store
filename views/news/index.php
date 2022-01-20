<?php
$userModel = new \models\Users();
$user = $userModel->GetCurrentUser();
?>
    <p><a href="/" class="link-dark">Головна</a><span>>></span><a href="/news" class="link-dark">Новини</a></p>

<? if($_SESSION['user']['login'] == 'admin') :?>
    <a href="/news/add" class="btn btn-outline-success" >Додати новину</a>
<br/>
<br/>
<? else:?>

<? endif;?>

<? if(!empty($lastNews)) :?>
        <?php foreach ($lastNews as $lastNew) :?>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="new-block">
                    <div class="my-title">
                        <h3><?=$lastNew['title']?></h3>
                    </div>
                    <div class="photo">
                        <? if (is_file('files/news/'.$lastNew['photo'].'_s.jpg')) : ?>
                            <img class="bd-placeholder-img rounded " src="/files/news/<?=$lastNew['photo']?>_s.jpg">
                        <? else: ?>
                            <!--                <svg class="bd-placeholder-img rounded float-start" width="200" height="200" xmlns="http:///www.w3.org/2000/svg" role="img" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#868e96"></rect></svg>-->
                        <? endif;?>
                    </div>
                    <div>
                    <div>
                        <a href="/news/view?id=<?=$lastNew['id']?>" class="btn btn-primary mt-2">Дізнатися більше</a>
                        <? if($_SESSION['user']['login'] == 'admin'):?>
                            <a href="/news/edit?id=<?=$lastNew['id']?>" class="btn btn-success mt-2">Редагувати</a>
                            <a href="/news/delete?id=<?=$lastNew['id']?>" class="btn btn-danger mt-2">Видалити</a>
                        <? endif;?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php else:?>
    <div class="alert alert-primary" role="alert">Новини тимчасово відсутні</div>
<? endif;?>

