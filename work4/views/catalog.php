<h2>Каталог</h2>

<?php foreach ($catalog as $item) :?>
    <div>
        <h3><a href="/?c=product&a=card&id=<?= $item['id'] ?>"><?= $item['name'] ?></a></h3>
        <img src="<?=IMG_DIR.$item['image']?>" alt="Товар" width="189">
        <p>Цена: <?= $item['price']?> рублей</p>
        <button>Добавить в корзину</button>
        <button>Купить</button>
        <img src="../img/img.jpg" alt="image" width="189">
    </div>
<?php endforeach;?>
<br>
<a href="/?c=product&a=catalog&page=<?= $page ?>">Еще товары</a>