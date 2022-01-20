<p>
    Ви дійсно бажаєте видалити товар <b><?=$model['tovar_title']?> </b> з кошику ?
</p>
<p>
    <a href="/basket/delete?id=<?=$model['id']?>&confirm=yes" class="btn btn-danger">Видалити</a>
    <a href="<?=$_SERVER['HTTP_REFERER']?>" class="btn btn-primary">Відмінити</a>
</p>
