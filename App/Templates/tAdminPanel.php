<?php
foreach (\App\Models\Article::findAll() as $item) {
    echo $item->id. '. ';
    echo $item->title, ' --- ';
    echo $item->contents, ' --- ';
    echo $item->author->name; echo '<br>';

}
?>

<br>


<form action="../../AdminPanel/index.php/add" method="get">
    <article>add article</article>
    <input type="text" placeholder="title of the article" name="title">
    <input type="text" placeholder="text of the article" name="contents">
    <input type="number" placeholder="author of the article" name="author_id">
    <input type="submit" value="add">

</form>

<form action="../../AdminPanel/index.php/update" method="get">
    <br><br>
    <article>edit article</article>
    <input type="text" placeholder="id" name="id">
    <input type="text" placeholder="title of the article" name="title">
    <input type="text" placeholder="text of the article" name="contents">
    <input type="number" placeholder="author of the article" name="author_id">
    <input type="submit" value="edit">
</form>

<form action="../../AdminPanel/index.php/delete" method="get">
    <br><br>
    <article>delete article</article>
    <input type="text" placeholder="id" name="id">
    <input type="submit" value="delete">
</form>