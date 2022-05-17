<?php

namespace App\Controllers;

use App\Controller;

class Article extends Controller
{
    protected function access(): bool
    {
        return true;
    }

    public function action()
    {
        $this->view->news = \App\Models\Article::findById($_GET['id']);
        $this->view->display(__DIR__ . '/../Templates/article.php');
    }
}