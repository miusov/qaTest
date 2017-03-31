<h2 class="text-center">Авторизация</h2>
<hr>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 col-md-offset-5 text-center">
<form action="/auth/login" method="post">
    <div class="form-group">
    <label for="email">Email</label><br>
    <input type="text" name="email" id="email" value="<?php echo @$_POST['email'] ?>">
    </div>
    <div class="form-group">
    <label for="pass">Пароль</label><br>
    <input type="password" name="password" id="password" value="<?php echo @$_POST['password'] ?>">
        </div>

    <button type="submit" name="auth">Авторизоваться</button>
</form>
            <br>
            <p><a href="/auth/signup/">Зарегистрироваться</a></p>
    </div>
</div>
</div>
