<div class="news">
    <p><a href="/" class="link-dark">Головна</a><span>>></span><a href="/news" class="link-dark">Новини</a><span>>></span><span class="link-dark"><?=$model['title']?></span></p>
    <div>
    <? if (is_file('files/news/'.$model['photo'].'_m.jpg')) : ?>
        <? if (is_file('files/news/'.$model['photo'].'_b.jpg')) : ?>
            <a href="/files/news/<?=$model['photo']?>_b.jpg" data-fancybox="gallery">
        <? endif;?>
        <img class="bd-placeholder-img rounded float-start" src="/files/news/<?=$model['photo']?>_m.jpg">
        <? if (is_file('files/news/'.$model['photo'].'_b.jpg')) : ?>
            </a>
        <? endif;?>
    <? endif;?>
    </div>
    <div>
        <?=$model['text']?>
    </div>
</div>
