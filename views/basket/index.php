<?php $sum = 0?>
<?php if(!empty($lastBasket)):?>
<div class="news-record">
    <h3><?=$model['title']?></h3>
    <table class="table table-dark table-striped text-center">
        <tr>
            <td>Товар:</td>
            <td>Ціна:</td>
            <td>Розмір:</td>
            <td>Кількість :</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <?php foreach ($lastBasket as $item) : ?>
        <tr>
            <td><?=$item['tovar_title']?></td>
            <td><?=$item['tovar_price']?> грн.</td>
            <td><?=$item['tovar_size']?></td>
            <td><?=$item['tovar_count']?></td>
            <td><a href="/basket?id=<?=$item['id']?>&type=add&tableName=<?=$item['name_category']?>" class="btn btn-primary">+</a></td>
            <td><a href="/basket?id=<?=$item['id']?>&type=del&tableName=<?=$item['name_category']?>" class="btn btn-primary">-</a></td>
            <td><a href="/basket/delete?id=<?=$item['id']?>" class="btn btn-danger">х</a></td>
        </tr>
        <? $sum += (int)$item['tovar_price'] * (int)$item['tovar_count'];?>
        <?php endforeach;?>
    </table>

    <h3>До сплати: <?=$sum?> грн.</h3>
    <br/>
    <br/>
    <a href="/orders/add?id=<?=$model['id']?>&tableName=basket" class="btn btn-primary">Купити</a>



<? else:?>
    <div class="alert alert-primary" role="alert">Кошик порожній</div>
<?endif;?>

