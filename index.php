<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
       <h1>Nagłowek strony</h1>
    </header>
    <div id="container">
      <?php
      //nowe połaczenie do bazy danych
       $db = new mysqli('localhost', 'root', '', 'cms');
      //przygotuj kwerendę
       $q = $db->prepare("SELECT * FROM post");
      //wywołaj kwerendę
       $q->execute();
      //pobierz dane
       $result = $q->get_result();
       while($row = $result->fetch_assoc()) {
      //$row to jeden wiersz z bazy danych echo 
      $row['imgUrl'];
}
?>
</body>
</html>