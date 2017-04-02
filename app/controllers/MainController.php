<?php

namespace app\controllers;
use app\models\Main; //для загрузки модели
use R; //для подключения ReadBean
use vendor\core\App;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use vendor\core\base\View;
use vendor\core\Paginate;

class MainController extends AppController
{
//    $this->layout = 'main';  //Задаем шаблон(layouts) для всех экшнов

    public function indexAction()
    {
        $model = new Main;
        View::setMeta('Главная', 'description', 'keywords');
//        App::$app->getList();
//        $this->>layout = 'main';  //Задаем шаблон(layouts) для данного экшна
//        $this->layout = false;  //Запрещаем подключение шаблонов
//        $this->layout = 'default';  //подключаем дефолтный шаблон
//        $this->view = 'test';  //указываем с каким видом будем работать, если не указан, то вид выбирается по имени экшна
//        $city = R::findOne('city', 'id=5');
//        $citys = R::findAll('city');
//        echo $city['name'];
//        App::$app->cache->delete('users');
//        $this->set(['citys'=>$citys]);
//        View::setMeta('indexAction', 'Описание страницы', 'Ключевые слова');

//        $logger = new Logger('find city');
//        $logger->pushHandler(new StreamHandler(ROOT.'/logs/log', Logger::DEBUG));
//        $logger->debug('find city');

//        $pag = new Paginate(4);
//        echo $pag->numberPages();

//        $ads = $pag->getAllEntrys();
        $ads = R::findAll('ads', 'ORDER BY created_at DESC');
        $adsF = '';
        if (isset($_POST['filter']))
        {
            $region = $_POST['region'];
            $city = $_POST['city'];
            $brand = $_POST['brand']; if (empty($brand)) echo '<div class="alert-danger text-center">Для более точного поиска укажите марку авто!</div>';
            $model = $_POST['model']; if (empty($model)) echo '<div class="alert-danger text-center">Для более точного поиска укажите модель авто!</div>';
            $masters = $_POST['masters']; $masters2 = $_POST['masters']; if (empty($masters)) {$masters = 0;$masters2 = 99;}
            $amount = $_POST['amount']; if (empty($amount)) $amount = 0;
            $amount2 = $_POST['amount2']; if (empty($amount2)) $amount2 = 9;
            $mileage = $_POST['mileage']; if (empty($mileage)) $mileage = 0;
            $mileage2 = $_POST['mileage2']; if (empty($mileage2)) $mileage2 = 9999999;
            $price = $_POST['price']; if (empty($price)) $price = 0;
            $price2 = $_POST['price2']; if (empty($price2)) $price2 = 9999999;

            if ($region OR $city OR $brand OR $model OR $masters OR $amount OR $amount2 OR $mileage OR $mileage2 OR $price OR $price2)
            {
                $adsF = R::getAll(" SELECT * FROM `ads` WHERE `region` LIKE '%{$region}%' AND `city` LIKE '%{$city}%' AND `brand` LIKE '%{$brand}%' AND `model` LIKE '%{$model}%' AND `masters` BETWEEN {$masters} AND {$masters2} AND `amount` BETWEEN {$amount} AND {$amount2} AND `mileage` BETWEEN {$mileage} AND {$mileage2} AND `price` BETWEEN {$price} AND {$price2} ORDER BY `created_at` DESC ");
            }
        }

        $this->set(['ads'=>$ads, 'adsF'=>$adsF]);

    }

}
