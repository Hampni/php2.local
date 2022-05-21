<?php

namespace App\Controllers;

use App\Controller;

class Index extends Controller
{
    protected function access(): bool
    {
        return true;
    }

    public function action()
    {
        $this->view->news = \App\Models\Article::findAll();
        $this->view->display(__DIR__ . '/../Templates/allNews.php');
    }
}