<div class="container">
    <div class="row filter">
        <form action="/main" method="post">
            <div class="col-md-3">
                <p class="text-center">Местоположение</p>
                <label for="region">Область</label>
                <input type="text" name="region" id="region">
                <label for="city">Город</label>
                <input type="text" name="city" id="city">
            </div>
            <div class="col-md-3">
                <p class="text-center">Автомобиль</p>
                <label for="brand">Марка авто</label>
                <input type="text" name="brand" id="brand">
                <label for="model">Модель</label>
                <input type="text" name="model" id="model">
            </div>
            <div class="col-md-2">
                <p class="text-center">Обьем двигателя</p>
                <label for="amount">от</label>
                <input type="text" name="amount" id="amount" placeholder="0.5">
                <label for="amount2">до</label>
                <input type="text" name="amount2" id="amount2" placeholder="8.5">
            </div>
            <div class="col-md-2">
                <p class="text-center">Пробег</p>
                <label for="mileage">от</label>
                <input type="text" name="mileage" id="mileage" placeholder="0">
                <label for="mileage2">до</label>
                <input type="text" name="mileage2" id="mileage2" placeholder="999999">
            </div>
            <div class="col-md-2">
                <p class="text-center">Цена</p>
                <label for="price">от</label>
                <input type="text" name="price" id="price" placeholder="минимальная цена">
                <label for="price2">до</label>
                <input type="text" name="price2" id="price2" placeholder="максимальная цена">
                <label for="masters">Кол-во хозяев</label>
                <input type="text" name="masters" id="masters" placeholder="1">
            </div>
            <div class="col-md-12">
                <br>
                <button type="submit" name="filter">Фильтр</button>
            </div>
        </form>
    </div>
    <hr>
<?php
$var = '';

if (isset($_POST['filter'])) {$var = $adsF;} else {$var = $ads;}

    foreach ($var as $k => $v)
    {
        ?>
        <div class="row">
            <div class="ads">
                <div class="col-md-12">
                    <h3><?php echo $v['brand'] . ' ' . $v['model'] ?></h3>
                </div>
                <div class="col-md-7">
                    <?php
                    $img = R::findOne('images', 'ads_id=' . $v['id']);
                    echo '<img src="' . $img['path'] . '" width="90%">';
                    ?>
                </div>
                <div class="col-md-5 content">
                    <p>Область: <?php echo $v['region'] ?> </p>
                    <p>Город: <?php echo $v['city'] ?> </p>
                    <p>Обьем двигателя: <?php echo $v['amount'] ?> л </p>
                    <p>Пробег: <?php echo $v['mileage'] ?> км </p>
                    <p>Кол-во хозяев: <?php echo $v['masters'] ?> </p>
                    <p>Цена: $<?php echo $v['price'] ?> </p>
                </div>
            </div>
        </div>
        <p class="text-right" style="color: gray; font-style: italic">Дата
            публикации: <?php echo $v['created_at'] ?></p>
        <hr>
        <?php
    }
        ?>
</div>

<script>

</script>


