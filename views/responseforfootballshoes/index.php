<?php
$userModel = new \models\Users();
$user = $userModel->GetCurrentUser();
?>
<?php foreach ($lastResponse as $response) : ?>
        <div class="news-record">
            <table class="table table-bordered">
                <th><?=$response['tovar_title']?></th>
                <td><?=$response['user_firstname']?> <?=$response['user_lastname']?></td>
                <td><?=$response['text']?></td>
            </table>
            <? if($_SESSION['user']['login'] == 'admin') :?>
                <a href="/responseforfootballshoes/edit?id=<?=$response['id']?>" class="btn btn-success" >Редагувати</a>
                <a href="/responseforfootballshoes/delete?id=<?=$response['id']?>" class="btn btn-danger">Видалити</a>
                <br/>
                <br/>
            <? else:?>

            <? endif;?>
        </div>
<?php endforeach;?>