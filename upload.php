<?php
if(!empty($_POST)) {
    //coś przyszło postem
    $postTitle = $_POST['postTitle'];
    $postDescription = $_POST['postDescription'];
    //wgrywanie pliku
    //zdefiniuj folder docelowe
    $targetDirectory = "img/";
    //użyj oryginalnej nazwy pliku
    $fileName = $_FILES['file']['name'];
    //przesuń plik z lokalizacji tymczasowej do docelowej
    move_uploaded_file($_FILES['file']['tmp_name'], $targetDirectory.$fileName);

    //dopisz posta do bazy
    //tymczasowo - autorID
    
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodaj nowy post</title>
</head>
<body>
    <!--musi byc multipart/form-data dla transferu plików -->
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <label for="postTitleInput">Tytuł posta:</label>
        <input type="text" name="postTitle" id="postTitleInput">
        <br>
        <label for="postDescriptionInput">Opis posta:</label>
        <input type="text" name="postDescription" id="postDescriptionInput">
        <br>
        <label for="fileInput">Obrazek:</label>
        <input type="file" name="file" id="fileInput">
        <br>
        <input type="submit" value="Wyślij!">
    </form>
</body>
</html>