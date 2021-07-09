<h2>Товар</h2>

<div>
    <h3><?= $product->name ?></h3>
    <img src="/img/<?=$product->image?>" alt="Товар" width="189">
    <p>Описание: <?= $product->description ?></p>
    <p>Цена: <?= $product->price ?> рублей</p>
    <button>Добавить в корзину</button>
    <button>Купить</button>
</div>