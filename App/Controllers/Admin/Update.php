<?php

namespace App\Controllers\Admin;

use App\Controller;
use App\Models\Article;


class Update extends Controller
{
    protected function access(): bool
    {
        return true;
    }

    public function action()
    {
        $updateArticle = Article::findById($_GET['id']);
        $updateArticle->title = $_GET['title'];
        $updateArticle->contents = $_GET['contents'];
        $updateArticle->author_id = $_GET['author'];
        $updateArticle->save();
    }
}