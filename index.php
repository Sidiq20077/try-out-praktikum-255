<?php
require "config/koneksi.php";

// Ambil semua data post dari database
$query = "SELECT * FROM posts ORDER BY create_at DESC";
$result = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Daftar Posts</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <a class="text-white" href="#">Home</a>
    <div class="d-flex">
      <a href="login.php" class="btn btn-dark me-2">Masuk</a>
      <a href="register.php" class="btn btn-dark me-2">Daftar</a>
    </div>
  </div>
</nav>

<!-- Konten -->
<div class="container my-5">
  <h1 class="mb-4">Posts</h1>
  <div class="row g-4">
    <?php while ($post = mysqli_fetch_assoc($result)) : ?>
      <div class="col-md-4 col-lg-3">
        <div class="card h-100">
          <div class="card-body">
            <h5 class="card-title">
              <a class= "text-dark" href="dashboard/detail.php?id=<?= $post['id']; ?>">
                <?= htmlspecialchars($post['title']); ?>
              </a>
            </h5>
            <p class="card-text"><?= htmlspecialchars($post['content']); ?></p>
            <p class="card-text">
              <small class="text-muted"><?= $post['create_at']; ?></small>
            </p>
          </div>
        </div>
      </div>
    <?php endwhile; ?>
  </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
