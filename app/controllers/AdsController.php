<?php
namespace app\controllers;
use app\models\Ads;
use R;
use vendor\core\App;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use vendor\core\base\View;


class AdsController extends AppController
{
    public function indexAction()
    {
        $model = new Ads;
        View::setMeta('Добавить обьявление', 'description', 'keywords');

        if (isset($_POST['add']))
        {
            $var = R::findAll('ads','user_id = ?',[$_SESSION['id']]);
            $res = count($var);
            if ($res >= 3)
            {
                echo '<div style="color: red; text-align: center"><b>Максимум 3 обьявления!</b><br>
                        <a href="/ads">Назад</a> </div>';
                die;
            }
            else
            {
                $ads = R::dispense('ads');
                $ads->user_id = $_SESSION['id'];
                $ads->region = $_POST['region'];
                $ads->city = $_POST['city'];
                $ads->brand = $_POST['brand'];
                $ads->model = $_POST['model'];
                $ads->amount = $_POST['amount'];
                $ads->mileage = $_POST['mileage'];
                $ads->masters = $_POST['masters'];
                $ads->price = $_POST['price'];
                $ads->created_at = @date('Y-m-d H:i:s');
                $id = R::store($ads);

                $var2 = R::getCell( 'SELECT max(id) FROM ads' );
                $i=0;
                foreach($_FILES['file']['name'] as $k => $v)
                {
                    if($_FILES['file']['error'][$k] !=0)
                    {
                        echo '<script>alert("Неправильный размер файла'.$v.'")</script>';
                        continue;
                    }
                    if(move_uploaded_file($_FILES['file']['tmp_name'][$k],'img/avto/'.$v))
                    {
                        $path = R::dispense('images');
                        $path->ads_id = $var2;
                        $path->path = 'img/avto/'.$v;
                        $id2 = R::store($path);
                        $i++;
                    }
                }
                    echo '<div class="alert-success text-center">Обьявление добавлено!</div>';

            }
        }
    }
}