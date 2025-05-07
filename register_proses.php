<?php
require 'config/koneksi.php';

// Ambil data dari form
$name = $_POST['fullname'] ?? '';
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

// Validasi sederhana
if (empty($name) || empty($email) || empty($password)) {
    echo "<script>alert('Semua field harus diisi.'); window.location.href = 'register.php';</script>";
    exit();
}

// Hash password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Simpan ke database
$sql = "INSERT INTO users (fullname, email, password) VALUES (?, ?, ?)";
$stmt = mysqli_prepare($con, $sql);

if ($stmt) {
    mysqli_stmt_bind_param($stmt, "sss", $name, $email, $hashed_password);
    if (mysqli_stmt_execute($stmt)) {
        echo "<script>alert('Registrasi berhasil!'); location.href = 'login.php';</script>";
    } else {
        echo "<script>alert('Gagal menyimpan data: " . mysqli_error($con) . "'); location.href = 'register.php';</script>";
    }
    mysqli_stmt_close($stmt);
} else {
    echo "<script>alert('Query error: " . mysqli_error($con) . "'); location.href = 'register.php';</script>";
}
?>
