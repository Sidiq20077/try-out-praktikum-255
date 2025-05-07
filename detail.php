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

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Detail Judul Post</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <a class="text-white" href="#">Home</a>
  </div>
</nav>

<!-- Konten -->
<div class="container my-5">
  <h1 class="mb-3">Detail Judul Post</h1>

  <p><strong>Tanggal Dibuat</strong><br>
  Pengarang</p>

  <p>
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae corporis deleniti, error temporibus mollitia deserunt in quod laborum animi unde dolores velit ex delectus ullam dolorem repudiandae, voluptas adipisci accusamus minima eum ut distinctio. Magni minima possimus ducimus iste facilis praesentium inventore, aspernatur quibusdam, debitis voluptas tempore officiis reiciendis totam.
  </p>

  <p>
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor officiis, eius necessitatibus recusandae reiciendis temporibus optio repellendus exercitationem explicabo perferendis voluptate cumque laborum rerum possimus hic quasi architecto porro accusantium! Officia repellendus nobis obcaecati non vel odit minus veritatis nemo dolor est excepturi consequatur cum maiores, qui ad. Ut incidunt consectetur fuga labore iste molestiae voluptate, at molestias odit sit blanditiis nemo tempora, cupiditate qui quos. Magnam voluptatem deserunt, earum est, natus, asperiores iusto molestias itaque a mollitia dolores rerum at? Fugiat accusamus eos deleniti at officiis odit, magnam voluptate distinctio dicta doloribus repellat beatae nulla? Harum, vitae sapiente? <span class="text-danger">Error!</span>
  </p>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
