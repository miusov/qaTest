<?php

namespace app\controllers;
use app\models\Auth;
use R;
use vendor\core\App;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use vendor\core\base\View;

class AuthController extends AppController
{

    public function indexAction()
    {
        $model = new Auth;
    }

    public function signupAction()
    {
        $model = new Auth;
        if (isset($_POST['reg']))
        {
            $errors = [];
            if (trim($_POST['email']) == '')
            {
                $errors[] = 'Введите Email!';
            }
            if ($_POST['pass'] == '')
            {
                $errors[] = 'Введите пароль!';
            }
            if ($_POST['pass2'] != $_POST['pass'])
            {
                $errors[] = 'Повторный пароль введен не верно!';
            }
            if (R::count('users', "email = ?", [$_POST['email']]) > 0)
            {
                $errors[] = 'Пользователь с таким Email уже существует!';
            }
            if (empty($errors))
            {
                $user = R::dispense('users');
                $user->email = $_POST['email'];
                $user->password = password_hash($_POST['pass'], PASSWORD_DEFAULT);
                $user->created_at = @date('Y-m-d H:i:s');
                R::store($user);

                $logger = new Logger('REG_USER');
                $logger->pushHandler(new StreamHandler(ROOT.'/logs/regs/log', Logger::INFO));
                $logger->info('Register user', ['email'=>$_POST['email']]);

                echo '<div style="color:green" class="col-md-12 text-center">
<p>Вы успешно зарегистрировались</p>
<p><a href="/auth/login">Войти</a></p>
</div><hr>';
            }
            else
            {
                echo '<div style="color:red" class="col-md-12 text-center">'.array_shift($errors).'</div><hr>';
            }

        }
    }

    public function loginAction()
    {
        $model = new Auth;
        if (isset($_POST['auth']))
        {
            $errors = [];
            $user = R::findOne('users', 'email = ?', [$_POST['email']]);
            if ($user)
            {
                if(password_verify($_POST['password'], $user->password))
                {
                    $_SESSION['user'] = $user->email;
                    $_SESSION['id'] = $user->id;

                    $logger = new Logger('LOGIN_USER');
                    $logger->pushHandler(new StreamHandler(ROOT.'/logs/login/log', Logger::INFO));
                    $logger->info('Login user', ['email'=>$_POST['email']]);

                    header('Location: /');
                }
                else
                {
                    $errors[] = 'Не верно введен пароль!';
                }
            }
            else
            {
                $errors[] = 'Пользователь с таким логином не найден!';
            }
            if (!empty($errors))
            {
                echo '<div style="color:red" class="col-md-12 text-center">'.array_shift($errors).'</div><hr>';
            }

        }
    }

    public function logoutAction()
    {
        unset($_SESSION['user']);
        unset($_SESSION['id']);
        header('Location: /auth/login');
    }
}