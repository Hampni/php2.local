<html>
<head>
    <title> Все новости </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>

<div class="container">
    <a href="/AdminPanel/index.php">admin panel</a>
    <h1> Новости: </h1>
    <table class="table table-striped">
        <tr>
            <th>Заголовок</th>
            <th>Текст</th>
            <th>Автор</th>
        </tr>
        <?php foreach ($this->news as $article):?>
            <tr> 
                <th>
                    <a href="/article?id=<?php echo $article->id?>">
                        <?php echo $article->title?>
                    </a>
                </th>
                <th><?php echo $article->contents?></th>
                <th><?php echo $article->author->name?></th>
            </tr>
        <?php endforeach;?>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>