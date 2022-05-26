<?php

namespace App\Controllers\Admin;

use App\Controller;
use App\Exeptions\MultiExeption;
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
        try {
            $updateArticle->fill($_GET);
            $updateArticle->save();
        } catch (MultiExeption $errors) {
            foreach ($errors->getAll() as $error) {
                echo $error->getMessage() . '<br>';
            }
            die();
        }
        header('Location: /AdminPanel/index.php');
    }
}