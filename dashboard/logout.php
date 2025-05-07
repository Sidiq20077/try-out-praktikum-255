<?php
session_start();
session_unset(); // Hapus semua session
session_destroy(); // Hancurkan session

// Redirect ke halaman login
header("Location: ../index.php");
exit();
?>