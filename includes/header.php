<header>
    <div class="contour-logo">
        <a class="logo" href="../index.php">Projet Blog PHP</a>
    </div>
    <ul class="header-menu">
        <li><a class="<?= $_SERVER['REQUEST_URI'] === '/add-article.php' ? 'active': '' ?>"
                href="../add-article.php">Créer un article</a></li>
        <li><a class="<?= $_SERVER['REQUEST_URI'] === '/index.php' ? 'active': '' ?>" href="../index.php">Home</a></li>
        <li><a class="<?= $_SERVER['REQUEST_URI'] === '/articles.php' ? 'active': '' ?>"
                href="../articles.php">Articles</a></li>
        <li><a href="../test.php">test</a></li>
    </ul>
</header>