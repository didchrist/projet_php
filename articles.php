<?php 
require_once './database.php';
?>
<head>
        <?php require_once './includes/head.php' ?>
        <title>Articles</title>
        <link rel="stylesheet" href="./assets/css/articles.css">
</head>

<body>
    <div class="container">
        <?php require_once './includes/header.php' ?>
        <div class="content">
            <div class="block-articles">
                <?php foreach($pdo as $key => $article): ?>
                <div class="card">
                    <div class="card-image-div">
                        <img class="card-image" src="<?= $article['image'] ?? ''; ?>" alt="image">
                    </div>
                    <h2 class="card-title"><?= $article['title'] ?></h2>
                    <p class="card-category"><?= $article['category'];?></p>
                    <form action="./article.php" method="POST">
                        <input name="article-index" value="<?= $key; ?>"  type="hidden">
                        <button class="btn btn-color-card" type="submit">More details</button>
                    </form>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</body>

</html>
