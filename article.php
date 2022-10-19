<?php 
$filename='./data/data.json';
if (file_exists($filename)) {
    $json = file_get_contents($filename);
    $articles = json_decode($json, true) ?? [];
}
$article_index = $_POST['article-index'];
$article = $articles[$article_index];
?>
<head>
        <?php require_once './includes/head.php' ?>
        <title>Article</title>
</head>

<body>
    <div class="container">
        <?php require_once './includes/header.php' ?>
        <div class="content">
            <h1><?= $article['title']; ?></h1>
            <img src="<?= $article['image']; ?>" alt="image">
            <p><?= $article['description']; ?></p>
        </div>
        <form action="./add-article.php" method="POST">
            <input type="hidden" name="article-index" value="<?= $article_index ?>" id="">
            <button name="modifier">Edit</button>
        </form>
        <form action="./includes/delete.php" method="POST">
            <input type="hidden" name="article-index" value="<?= $article_index ?>" id="">
            <button type="submit" name="delete">Delete</button>
        </form>
    </div>