<html>
<head>
    <title> Все новости </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>

<div class="container">


    <h1> Новости: </h1>
    <table class="table table-striped">
        <tr>
            <th>Статья №</th>
            <th>Заголовок</th>
            <th>Текст</th>
            <th>Автор</th>
        </tr>

        <?php foreach ($this->news as $article): ?>
            <tr>
                <?php foreach ($this->functions as $function): ?>

                    <th><?php echo $function($article) ?></th>

                <?php endforeach; ?>
            </tr>
        <?php endforeach; ?>
    </table>

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
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>
</html>
