<?php
$userModel = new \models\Users();
$user = $userModel->GetCurrentUser();
?>

<p><a href="/" class="link-dark">Головна</a>>><a href="/kidsfootballshoes" class="link-dark">Дитяче взуття</a></p>
<? if($_SESSION['user']['login'] == 'admin') :?>
    <a href="/kidsfootballshoes/add" class="btn btn-outline-success" >Додати товар</a>
    <a href="/orders" class="btn btn-outline-info">Переглянути замовлені товари</a>
    <br/>
    <br/>
<? else:?>

<? endif;?>
<? if(!empty($lastKidsFootballShoes)) :?>
    <form method="get" action="">
        <table class="table table-dark table-borderless">
            <select name="orderBy"  class="form-select form-select-lg mb-3 float-left" >
                <option>Сортувати за останніми</option>
                <option value="asc">Сортувати за ціною: від нижчої до вищої</option>
                <option value="desc">Сортувати за ціною: від вищої до нижчої</option>
            </select>
            <button type="submit" class="w-100 btn btn-lg btn-secondary">Фільтрувати</button>
        </table>
    </form>
    <div class="row text-center">
        <?php foreach ($lastKidsFootballShoes as $lastKidsFootballShoe) :?>
            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                <div class="tovar-block">
                    <div class="my-title">
                        <h3><?=$lastKidsFootballShoe['title']?></h3>
                    </div>
                    <div class="photo">
                        <? if (is_file('files/kidsfootballshoes/'.$lastKidsFootballShoe['photo'].'_s.jpg')) : ?>
                            <img class="bd-placeholder-img rounded " src="/files/kidsfootballshoes/<?=$lastKidsFootballShoe['photo']?>_s.jpg">
                        <? else: ?>
                            <!--                <svg class="bd-placeholder-img rounded float-start" width="200" height="200" xmlns="http:///www.w3.org/2000/svg" role="img" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#868e96"></rect></svg>-->
                        <? endif;?>
                    </div>
                    <div>
                        <h3><b><?=$lastKidsFootballShoe['price']?> грн.</b></h3>
                    </div>
                    <div>
                        <a href="/kidsfootballshoes/view?id=<?=$lastKidsFootballShoe['id']?>" class="btn btn-primary">Дізнатися більше</a>
                        <? if($_SESSION['user']['login'] == 'admin'):?>
                            <br/>
                            <a href="/kidsfootballshoes/edit?id=<?=$lastKidsFootballShoe['id']?>" class="btn btn-success mt-2">Редагувати</a>
                            <a href="/kidsfootballshoes/delete?id=<?=$lastKidsFootballShoe['id']?>" class="btn btn-danger mt-2">Видалити</a>
                        <? endif;?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php else:?>
    <div class="alert alert-primary" role="alert">Товар тимчасово відсутній</div>
<? endif;?>


<style>
    .tovar-block{
        border: 2px solid #F1F3F4;
        padding: 8px;
        margin: 10px;
        transition: 0.5s;
        border-radius: 10px;
    }
    .tovar-block:hover{
        background: #F1F3F4;
    }
    .my-title{
        position: relative;
    }
</style>