<?php

namespace app\controllers;
use app\models\Main; //для загрузки модели
use R; //для подключения ReadBean
use vendor\core\App;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use vendor\core\base\View;

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

        $ads = R::findAll('ads', 'ORDER BY created_at DESC');
//        $this->set(['ads'=>$ads]);


//        if (isset($_POST['filter']))
//        {
//            $adsF = R::findAll('ads', 'WHERE region LIKE "%'.$_POST['region'].'%"');
//        }
//        else
//        {
//
//        }
//        xprint($_POST);
if (isset($_POST['filter']))
{
    if ($_POST['region'] OR $_POST['city'] OR $_POST['brand'] OR $_POST['model'])
    {
        $adsF = R::getAll(" SELECT * FROM `ads` WHERE `region` LIKE '%".$_POST['region']."%' AND `city` LIKE '%".$_POST['city']."%' AND `brand` LIKE '%".$_POST['brand']."%' AND `model` LIKE '%".$_POST['model']."%' ");
        xprint($adsF);
    }
//    $amount = R::getAll("SELECT * FROM `ads` WHERE `amount` BETWEEN '".$_POST['amount']."' and '".$_POST['amount2']."'");
//    $mileage = R::getAll("SELECT * FROM `ads` WHERE `mileage` BETWEEN '".$_POST['mileage']."' and '".$_POST['mileage2']."'");
//    $price = R::getAll("SELECT * FROM `ads` WHERE `price` BETWEEN '".$_POST['price']."' and '".$_POST['price2']."'");

//SELECT * FROM `ads` WHERE `region` LIKE '%зап%' AND `city` LIKE '%%' AND `brand` LIKE '%%' AND `model` LIKE '%%' AND `masters` LIKE '%%'
//SELECT * FROM `ads` WHERE `region` LIKE '%%' AND `city` LIKE '%%' AND `brand` LIKE '%%' AND `model` LIKE '%%' AND `masters` LIKE '%%' AND `amount`<=4 AND `amount`>=3


}


        $this->set(['ads'=>$ads]);


    }

}
