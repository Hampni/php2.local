<?php

namespace App\Models;

use App\Db;
use App\Model;

class Article extends Model
{
    protected const TABLE = 'news';

    public string $title;
    public string $contents;
    public $author_id = null;

    /**
     * @param $sql  //request to db
     * @param $params // parametrs for execution
     * @return void // nothing to return
     */
    public static function edit($sql, $params = [])
    {
        $db = new Db();
        $db->execute($sql, $params);
    }

    /**
     * @param int $amount // amount of articles to show on page
     * @return array
     */
    public static function getSomeArticles(int $amount)
    {
        $db = new Db();
        $sql = 'SELECT * FROM ' . self::TABLE . ' ORDER BY id DESC LIMIT ' . $amount;
        return $data = $db->query($sql, [], static::class);
    }

    /**
     * @param $key // неизвестное или незаданное ранее свойство
     * @return mixed|void|null // если айди автора указано возвращает обьект класса автор с этим айди, если не указано возвращает ноль
     */
    public function __get($key)
    {
        if($key == 'author') {
            return $this->author_id ? Author::findById($this->author_id) : null;
        }

    }

}