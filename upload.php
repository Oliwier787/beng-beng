<?php
require_once('class/Post.class.php');
require_once('class/User.class.php');
session_start();
if(!empty($_POST) && isset($_SESSION['user'])) {
    //coś przyszło postem
    Post::CreatePost($_POST['postTitle'], $_POST['postDescription']);
}
?>
<style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }

        form {
            width: 300px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-size: 14px;
            font-weight: bold;
        }

        input[type="text"], input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 14px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
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
