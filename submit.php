<?php
// Konfigurasi untuk koneksi ke database
$servername = "localhost";
$username = "root";
$password = ""; // Default XAMPP, tanpa password
$dbname = "new_proyek";

// Membuat koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari form
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);
    
    // Menyiapkan query untuk memasukkan data ke tabel pesan
    $sql = "INSERT INTO pesan (nama, email, pesan) VALUES ('$name', '$email', '$message')";
    
    // Mengeksekusi query dan cek apakah berhasil
    if ($conn->query($sql) === TRUE) {
        echo "<h2>Terima kasih, $name! Pesan Anda telah terkirim.</h2>";
    } else {
        echo "<h2>Terjadi kesalahan saat mengirim pesan: " . $conn->error . "</h2>";
    }
} else {
    echo "<h2>Form belum diisi dengan benar.</h2>";
}

// Menutup koneksi
$conn->close();
?>
