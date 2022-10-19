<?php require_once('./includes/script-verif.php'); ?>
<!DOCTYPE html>
<html lang="en">
<?php require_once('./includes/head.php'); ?>
<title>Créer un article</title>
<link rel="stylesheet" href="./assets/css/add-article.css">

<body>
    <div class="container">
        <?php require_once './includes/header.php' ?>
        <div class="content">
            <div class="block p-20">
                <form action="#" method="POST" enctype="multipart/form-data">
                    <?= $errors_succes ?? '' ?>
                    <div class="form-control">
                        <label for="title">Title</label>
                        <input type="text" name="title" placeholder="title" value="<?= $title ?>">
                    </div>
                    <div class="form-control">
                        <label for="image">.jpg and .png only</label>
                        <input name="image" type="file">
                    </div>
                    <div class="form-control">
                        <label for="description">Description</label>
                        <textarea name="description" id="" cols="30" rows="10"><?= $description ?></textarea>
                    </div>
                    <div class="form-control">
                        <label for="category">Choose option :</label>
                        <select name="category" id="">
                            <option value="">--Please choose an option--</option>
                            <option value="nature" <?= $option === 'nature' ? 'selected':''; ?>>Nature</option>
                            <option value="technology" <?= $option === 'technology' ? 'selected':''; ?>>
                                Technology</option>
                            <option value="politics" <?= $option === 'politics' ? 'selected':''; ?>>Politics
                            </option>
                        </select>
                    </div>
                    <div class="form-actions">
                        <input type="hidden" name="article-index" value="<?= $article_index ?>">
                        <button class="btn" name="validate" type="submit">Validate</button>
                        <button class="btn" name="cancel" type="submit">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>