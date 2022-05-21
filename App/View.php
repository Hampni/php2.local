<?php

namespace App;

use App\Models\SetGetReadInterface;
use App\Models\SetGetReadTrait;
use JetBrains\PhpStorm\Internal;



class View implements SetGetReadInterface,
    \countable,
    \iterator
{

    private $position = 0;
    private $array = [
        "firstelement",
        "secondelement",
        "lastelement",
    ];

    private $data = [];

    /**
     * @deprecated
     * @param string $key
     * @param mixed $value
     * @return void
     */
    public function add($key, $value)
    {
        $this->data[$key] = $value;
    }

    /**
     * @param $template // path to the file
     * @return void
     */
    public function display($template)
    {
        include $template;
    }

    /**
     * @param $template //path to the file
     * @return false|string
     */
    public function render($template)
    {
        ob_start();
        include $template;
        $contents = ob_get_contents();
        ob_end_clean();
        return $contents;
    }

    use SetGetReadTrait;

    public function count()
    {
        return count($this->data);
    }

    public function rewind()
    {
        $this->position = 0;
    }

    public function current()
    {
        return $this->array[$this->position];
    }

    public function key()
    {
        return $this->position;
    }

    public function next()
    {
        ++$this->position;
    }

    public function valid()
    {
        return isset($this->array[$this->position]);
    }

}