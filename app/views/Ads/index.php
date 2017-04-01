<div class="container">
    <div class="row">
<h2 class="text-center">Опубликовать обьявление</h2>
        <form action="/ads" method="post" enctype="multipart/form-data">
<div class="col-md-4">
<div id="inp">
    <p class="areas">Область</p>
    <p class="cities">Город</p>
</div>
</div>
        <div class="col-md-4">
            <p>Марка</p>
            <input type="text" name="brand">
            <p>Модель</p>
            <input type="text" name="model">
        </div>
        <div class="col-md-4">
            <p>Обьем двигателя</p>
            <input type="text" name="amount">
            <p>Пробег</p>
            <input type="text" name="mileage">
            <p>Кол-во хозяев</p>
            <input type="text" name="masters">
            <p>Цена</p>
            <input type="text" name="price">
        </div>
            <div>
                <p>Добавить фото</p>
                <input type="file" name="file[]" multiple accept="image/*" id="files">
            </div>
            <div class="text-right">
                <input type="submit" name="add" value="Добавить" id="add">
            </div>
        </form>
</div>
</div>