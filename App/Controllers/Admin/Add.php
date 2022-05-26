<?php

namespace App\Controllers\Admin;

use App\Controller;
use App\Exeptions\MultiExeption;

class Add extends Controller
{
    protected function access(): bool
    {
        return true;
    }

    public function action()
    {
        $newArticle = new \App\Models\Article();
        try {
            $newArticle->fill($_GET);
            $newArticle->save();
        } catch (MultiExeption $errors) {
            foreach ($errors->getAll() as $error) {
                echo $error->getMessage() . '<br>';
            }
            die();
        }
        header('Location: /AdminPanel/index.php');
    }
}