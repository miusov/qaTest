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
        $page = $_GET['page']; if (empty($_GET['page'])) $page = 1;
        $start =($page-1)*$this->countEntryInPage;
        $sql = R::findAll('ads', 'ORDER BY created_at DESC LIMIT '.$start.','.$this->countEntryInPage);
        return $sql;
    }

    public function getFilterEtrys()
    {
        $page = $_GET['page']; if (empty($_GET['page'])) $page = 1;
        $start =($page-1)*$this->countEntryInPage;
        $sql = R::getAll(" SELECT * FROM `ads` WHERE `region` LIKE '%{$region}%' AND `city` LIKE '%{$city}%' AND `brand` LIKE '%{$brand}%' AND `model` LIKE '%{$model}%' AND `masters` BETWEEN {$masters} AND {$masters2} AND `amount` BETWEEN {$amount} AND {$amount2} AND `mileage` BETWEEN {$mileage} AND {$mileage2} AND `price` BETWEEN {$price} AND {$price2} ORDER BY created_at DESC LIMIT 2,3 ");
        return $sql;
    }
}