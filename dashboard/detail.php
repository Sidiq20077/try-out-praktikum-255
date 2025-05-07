<?php
//ambil nilai id yang ada di url
$id = $_GET['id'];
require '../config/koneksi.php';


$query = "SELECT * FROM posts WHERE id = $id";
// jalankan queiry di atas
$result = mysqli_query($con, $query);

//ubah menjadi array asosiatif
$show = mysqli_fetch_assoc($result);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
      <style>
  .content {
    word-wrap: break-word;
    white-space: pre-line; /* supaya \n jadi baris baru */
  }
</style>

    
  </head>
  <body>

  <!-- Navbar -->
<nav class="navbar navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <a class="text-white" href="index.php">Home</a>
  </div>
</nav>



    <div class="container my-5">
    <h1><div>Judul <?= $show["title"]?></div></h1>
    <div><?= $show["create_at"]?></div>
    <div class="content"><?= htmlspecialchars($show["content"]) ?></div>
    </div> 

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>