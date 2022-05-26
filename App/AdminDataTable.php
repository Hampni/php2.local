<?php

namespace App;

use App\Models\Article;

class AdminDataTable
{
    protected array $models;
    protected array $functions;

    public View $view;

    public function __construct(array $models, array $functions)
    {
        $this->models = $models;
        $this->functions = $functions;

        $this->view = new View();
    }

    public function render()
    {
        $this->view->news = $this->models;
        $this->view->functions = $this->functions;
        $this->view->display(__DIR__ . '/Templates/tAdminPanel.php');
    }

}