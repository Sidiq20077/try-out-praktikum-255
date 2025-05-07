<?php
require "../config/koneksi.php";

// Ambil data post dari database
$query = "SELECT * FROM posts ORDER BY create_at DESC";
$result = mysqli_query($con, $query);
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <a class="text-white me-3" href="../index.php">Home</a>
    <a class="text-white" href="logout.php">Logout</a>
  </div>
</nav>

<div class="container my-5">
  <h1>Posts</h1>
  <a href="tambah.php" class="btn btn-info mb-3">Tambah Data</a>

  <table class="table table-bordered">
    <thead>
      <tr>
        <th>No</th>
        <th>Judul</th>
        <th>Pengarang</th>
        <th>Tanggal</th>
        <th>#</th>
      </tr>
    </thead>
    <tbody>
      <?php
      if (mysqli_num_rows($result) > 0) {
          $no = 1;
          while ($show = mysqli_fetch_assoc($result)) {
              echo "<tr>
                      <td>" . $no++ . "</td>
                      <td>" . htmlspecialchars($show['title']) . "</td>
                      <td>" . htmlspecialchars($show['content']) . "</td>
                      <td>" . $show['create_at'] . "</td>
                      <td>
                        <a href='detail.php?id={$show['id']}' class='btn btn-info btn-sm'>Detail</a>
                        <form action='hapus_proses.php' method='POST' style='display:inline-block;'>
                          <input type='hidden' name='id' value='{$show['id']}' />
                          <button type='submit' class='btn btn-danger btn-sm' onclick='return confirm(\"Yakin ingin hapus?\")'>Hapus</button>
                        </form>
                      </td>
                    </tr>";
          }
      } else {
          echo "<tr><td colspan='5' class='text-center text-danger'>Data tidak ada</td></tr>";
      }
      ?>
    </tbody>
  </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
