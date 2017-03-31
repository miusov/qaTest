<?php


namespace app\controllers;
use vendor\core\base\Controller;

class AppController extends Controller
{
    public $meta = [];

    protected function setMeta($title = '', $description = '', $keywords = '')  //метод для заполнения метаданных
    {
        $this->meta['title'] = $title;
        $this->meta['description'] = $description;
        $this->meta['keywords'] = $keywords;
    }
}