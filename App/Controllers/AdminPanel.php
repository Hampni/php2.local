<?php

namespace App\Controllers;

use App\AdminDataTable;
use App\Controller;

class AdminPanel extends Controller
{

    public $password = null;
    protected AdminDataTable $adminDataTable;


    protected function access(): bool
    {
        if ($this->password == '2481632') {
            return true;
        } else {
            return false;
        }
    }

    public function action()
    {
        $news = \App\Models\Article::findAll();
        $functions = [
            function ($article) {
                return $article->id;
            },
            function ($article) {
                return $article->title;
            },
            function ($article) {
                return $article->contents;
            },
            function ($article) {
                return $article->author->name;
            },
        ];

        $this->adminDataTable = new AdminDataTable($news, $functions);
        $this->adminDataTable->render();

    }
}