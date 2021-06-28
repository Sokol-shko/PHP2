<? use app\models\Cart;?>

<h2>Корзина</h2>

<?php foreach ($cart as $item) :?>
    <div>
        <p>ФИО клиента: <?= $item['name'] ?></p>
        <p>Товар: <?= $item['goodsName'] ?></p>
        <p>Цена: <?= $item['price'] ?> рублей</p>
        <p>Количество: <?= $item['count'] ?></p>
        <? Cart::$totalSum += $item['count'] * $item['price'] ?>
        <br>
    </div>
<?php  endforeach;?>

<h3>Итого: <?=Cart::$totalSum ?> рублей</h3>
<button>Оформить</button>
