<?php $_POST = filter_input_array(INPUT_POST, [
    'validate' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
    'cancel' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
    'title' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
    'description' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
    'category' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
    'modifier' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
    'article-index' => FILTER_SANITIZE_NUMBER_INT
]);

$filename='./data/data.json';
$title = $_POST['title'] ?? '';
$description = $_POST['description'] ?? '';
$option = $_POST['category'] ?? '';
$image_chemin = '';

$article_index = $_POST['article-index'] ?? '';

if (file_exists($filename)) {
    $json = file_get_contents($filename);
    $data = json_decode($json, true) ?? [];
}
if (isset($_POST['cancel'])) {
    header('Location: ./index.php');
}
if(isset($_POST['validate'])){
    if ($_FILES['image']['error'] ==4) {
        $errors_succes = "Veuillez insérer une image valide.";
    }
    if ($_FILES['image']['error'] ==0) {
        if($_FILES['image']['size'] > 150000) {
            $errors_succes = "Votre image est trop lourde.";
        }
        $extension = strchr($_FILES['image']['name'],'.');
        if ($extension != '.jpg' and $extension != '.png') {
            $errors_succes = "Votre format d'image n'est en .png ou .jpg.";
        }
        if(!isset($errors_succes)) {
            $errors_succes= "l'image est chargée";
            $image_chemin = './img/'.uniqid().$extension;
            move_uploaded_file($_FILES['image']['tmp_name'], $image_chemin);
        }
    }
}
if(isset($_POST['title'])) {
    $title = $_POST['title'];
}
else {
    $errors_succes = "Missing title field";
}
if (isset($_POST['description'])) {
    $description = $_POST['description'];
}
else {
   $errors_succes = "Missing description field.";
}
if (isset($title) and isset($description) and isset($option) and file_exists($image_chemin) and $article_index === '') {
    $data = [...$data, [
        'title' => $title,
        'image' => $image_chemin,
        'description' => $description,
        'category' => $option
    ]];
    file_put_contents($filename, json_encode($data));
}
if (isset($_POST['modifier'])) {
    $title = $data[$article_index]['title'];
    $description = $data[$article_index]['description'];
    $option = $data[$article_index]['category'];
}
if (isset($_POST['validate']) and $article_index != '' and isset($title) and isset($description) and isset($option)) {
    if ($image_chemin !== ''){ 
        $imagename = $data [$article_index]['image'];
        unlink($imagename);
    }
    else {
        $image_chemin = $data [$article_index]['image'];
    }
    $data[$article_index]= [
        'title' => $title,
        'image' => $image_chemin,
        'description' => $description,
        'category' => $option 
    ];
    file_put_contents($filename, json_encode($data));
}