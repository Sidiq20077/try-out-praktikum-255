<?php
include 'config/koneksi.php';
session_start();

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

// Validasi input
if (empty($email) || empty($password)) {
    $_SESSION['login_error'] = "Email dan password harus diisi.";
    header("Location: login.php");
    exit();
}

// Ambil data user dari database berdasarkan email
$query = "SELECT * FROM users WHERE email = ?";
$stmt = mysqli_prepare($con, $query);
mysqli_stmt_bind_param($stmt, "s", $email);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

// Cek apakah user ditemukan
if (mysqli_num_rows($result) == 1) {
    $user = mysqli_fetch_assoc($result);

    // Verifikasi password
    if (password_verify($password, $user['password'])) {
        // Login berhasil
        $_SESSION['user_id'] = $user['id']; // asumsi kolom ID bernama 'id'
        $_SESSION['name'] = $user['name'];
        $_SESSION['email'] = $user['email'];

        header('Location: dashboard/index.php');
        exit();
    } else {
        $_SESSION['login_error'] = "Password salah.";
        header("Location: login.php");
        exit();
    }
} else {
    $_SESSION['login_error'] = "Email tidak ditemukan.";
    header("Location: login.php");
    exit();
}
?>
