<?php

namespace App\Controllers\Admin;

use App\Controller;

class Add extends Controller
{
    protected function access(): bool
    {
        return true;
    }

    public function action()
    {
        $newArticle = new \App\Models\Article();
        $newArticle->title = $_GET['title'];
        $newArticle->contents = $_GET['contents'];
        $newArticle->author_id = $_GET['author'];
        $newArticle->save();
    }
}