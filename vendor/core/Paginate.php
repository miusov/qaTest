<?php

namespace vendor\core;

use R;

class Paginate
{
    public $countEntryInPage;  //кол-во записей на странице
    public $countEntry;        //подсчитывает кол-во записей в БД

    public function __construct($countEntryInPage = 0)
    {
        $this->countEntryInPage = $countEntryInPage;
        $this->countEntry = R::count('ads');
    }


    public function numberPages()  //подсчитывает нужное кол-во страниц для вывода из БД
    {
        $countPages = ceil($this->countEntry / $this->countEntryInPage);
        return $countPages;
    }

    public function getAllEntrys()
    {
        if (empty($_GET['pf']))
        {
            if (empty($_GET['page'])) $_GET['page'] = 1;
            $page = $_GET['page'];
            $start =($page-1)*$this->countEntryInPage;
            $sql = R::findAll('ads', 'ORDER BY created_at DESC LIMIT '.$start.','.$this->countEntryInPage);
            return $sql;
        }

    }

    public function getFilterEntrys()
    {
        if (empty($_GET['page'])) $_GET['page'] = 1;
        $page = $_GET['page'];
        $start =($page-1)*$this->countEntryInPage;

        $arr = [];

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
                $arr[0] = R::getAll(" SELECT * FROM `ads` WHERE `region` LIKE '%{$region}%' AND `city` LIKE '%{$city}%' AND `brand` LIKE '%{$brand}%' AND `model` LIKE '%{$model}%' AND `masters` BETWEEN {$masters} AND {$masters2} AND `amount` BETWEEN {$amount} AND {$amount2} AND `mileage` BETWEEN {$mileage} AND {$mileage2} AND `price` BETWEEN {$price} AND {$price2} ORDER BY `created_at` DESC LIMIT {$start},{$this->countEntryInPage} ");
                $arr[1] = R::getAll(" SELECT * FROM `ads` WHERE `region` LIKE '%{$region}%' AND `city` LIKE '%{$city}%' AND `brand` LIKE '%{$brand}%' AND `model` LIKE '%{$model}%' AND `masters` BETWEEN {$masters} AND {$masters2} AND `amount` BETWEEN {$amount} AND {$amount2} AND `mileage` BETWEEN {$mileage} AND {$mileage2} AND `price` BETWEEN {$price} AND {$price2} ORDER BY `created_at` DESC ");
            }
            return $arr;
        }

    }
}