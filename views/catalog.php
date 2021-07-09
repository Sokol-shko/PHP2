<h2>Каталог</h2>

<?php foreach ($catalog as $item) :?>
    <div>
        <h3><a href="/product/card/?&id=<?= $item['id'] ?>"><?= $item['name'] ?></a></h3>
        <img src="/img/<?=$item['image']?>" alt="Товар" width="189">
        <p>Цена: <?= $item['price']?> рублей</p>
        <button>Добавить в корзину</button>
        <button>Купить</button>
    </div>
<?php endforeach;?>
<br>
<a href="/product/catalog/?&page=<?= $page ?>">Еще товары</a>