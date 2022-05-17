<?php

namespace App\Controllers;

use App\Controller;

class AdminPanel extends Controller
{

    public $password = null;

    protected function access(): bool
    {
        if ($this->password == '2481632') {
            return true;
        }   else {
            return false;
        }

    }

    public function action()
    {
        $this->view->news = \App\Models\Article::findAll();
        $this->view->display(__DIR__ . '/../Templates/tAdminPanel.php');
    }
}