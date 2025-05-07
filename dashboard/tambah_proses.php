<?php 
require "../config/koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $judul  = isset($_POST['title']) ? htmlspecialchars($_POST['title']) : '';
    $konten = isset($_POST['content']) ? htmlspecialchars($_POST['content']) : '';
    $date   = date("Y-m-d"); 

    if ($judul && $konten) {
        $query = "INSERT INTO posts (title, content, create_at) VALUES ('$judul', '$konten', '$date')";
        $result = mysqli_query($con, $query);

        if ($result) {
            echo "<div class='alert alert-success'>Data berhasil disimpan. Mengalihkan...</div>";
            echo "<meta http-equiv='refresh' content='1;url=index.php'>";
        } else {
            echo "<div class='alert alert-danger'>Gagal menyimpan data: " . mysqli_error($con) . "</div>";
        }
    } else {
        echo "<div class='alert alert-warning'>Judul dan konten wajib diisi.</div>";
    }

    mysqli_close($con);
}
?>
