<div>
    <table class="table table-dark table-striped text-center">
        <tr>
            <td>Ім'я користувача:</td>
            <td>Призвіще користувача:</td>
            <td>Назва товару:</td>
            <td>Ціна товару:</td>
            <td>Розмір:</td>
            <td>Кількість:</td>
            <td>Категорія товару:</td>
        </tr>
        <? foreach ($lastOrders as $lastOrder):?>
            <tr>
                <td><?=$lastOrder['user_firstname']?></td>
                <td><?=$lastOrder['user_lastname']?></td>
                <td><?=$lastOrder['tovar_title']?></td>
                <td><?=$lastOrder['tovar_price']?> грн.</td>
                <td><?=$lastOrder['tovar_size']?></td>
                <td><?=$lastOrder['tovar_count']?></td>
                <td><?=$lastOrder['name_category']?></td>
            </tr>
        <? endforeach;?>
    </table>
</div>
