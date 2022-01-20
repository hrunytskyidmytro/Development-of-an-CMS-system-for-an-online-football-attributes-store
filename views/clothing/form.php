<form method="post" action="" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="title" class="form-label">Заголовок товару</label>
        <input type="text" name="title" value="<?=$model['title']?>" class="form-control" id="title"/>
    </div>
    <div class="mb-3">
        <label for="short_text" class="form-label">Короткий текст про товар</label>
        <textarea name="short_text" class="form-control editor" id="short_text"><?=$model['short_text']?></textarea>
    </div>
    <div class="mb-3">
        <label for="price" class="form-label">Ціна</label>
        <input type="number" class="form-control" name="price" id="price" value="<?=$model['price']?>"/>
    </div>
    <div class="mb-3">
        <label for="article" class="form-label">Артикул</label>
        <textarea name="article" class="form-control editor" id="article"><?=$model['article']?></textarea>
    </div>
    <div class="mb-3">
        <label for="brand" class="form-label">Brand</label>
        <textarea name="brand" class="form-control editor" id="brand"><?=$model['brand']?></textarea>
    </div>
    <div class="mb-3">
        <label for="size" class="form-label">Розмір (см)</label>
        <input type="number" class="form-control" name="size" id="size"  min="5" max="120" value="<?=$model['size']?>"/>
    </div>
    <div class="mb-3">
        <label for="file" class="form-label">Фотографія товару</label>
        <input type="file" name="file" accept="image/jpeg, image/png" class="form-control" id="file"/>
    </div>
    <div class="mb-3">
        <? if (is_file('files/clothing/'.$model['photo'].'_m.jpg')) : ?>
            <img src="/files/clothing/<?=$model['photo']?>_m.jpg">
        <? endif;?>
    </div>
    <button type="submit" class="btn btn-primary">Зберегти</button>
</form>

