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

        $ads = R::dispense('ads');
        $ads->user_id = $_SESSION['id'];
        $ads->region = 'Запорожская';
        $ads->city = 'Запорожье';
        $ads->brand = 'BMW';
        $ads->model = 'M5';
        $ads->amount = 3.4;
        $ads->mileage = 987000.5;
        $ads->masters = 2;
        $ads->price = 22000;
        $ads->created_at = @date('Y-m-d H:i:s');
        $id = R::store($ads);

        $img = R::dispense('images');
        $img->ads_id = ;
        $img->path = ;
        $id2 = R::store($img);
    }
}