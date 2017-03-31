<h2 class="text-center">Регистрация</h2>
<hr>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 col-md-offset-5 text-center">
<form action="/auth/signup" method="post">
    <div class="form-group">
    <label for="email">Email</label><br>
    <input type="email" autofocus name="email" id="email" value="<?php echo @$_POST['email'] ?>">
    </div>
    <div class="form-group">
    <label for="pass">Пароль</label><br>
    <input type="password" name="pass" id="pass" value="<?php echo @$_POST['pass'] ?>">
    </div>
    <div class="form-group">
    <label for="pass2">Повторите пароль</label><br>
    <input type="password" name="pass2" id="pass2" value="<?php echo @$_POST['pass2'] ?>">
    </div>
    <button type="submit" name="reg" class="btn btn-default">Зарегистрироваться</button>
</form>
            <br>
            <p><a href="/auth/login/">Войти</a></p>
</div>
</div>
</div>