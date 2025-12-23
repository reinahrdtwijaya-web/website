<?php
// Pastikan file koneksi.php sudah tersedia
include 'connection.php'; 

// Atur header untuk mengembalikan respons JSON
header('Content-Type: application/json');





// Pastikan permintaan datang melalui metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    

    // Ambil input dari form
    $username = $_POST['username']; 
    $password = $_POST['password']; 




    $sql = "SELECT password FROM user WHERE username = '$username'";

    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $password_db = $row['Password']; // Password teks biasa dari DB

        // 2. BANDINGKAN TEKS BIASA SECARA LANGSUNG
        if ($password === $password_db) {
            // Login Berhasil
            $response = array(
                'status' => 'success',
                'message' => 'Login Berhasil!'
            );
            // Lanjutkan ke halaman selanjutnya
        } else {
            // Password salah
            $response = array(
                'status' => 'error',
                'message' => 'Username atau Password salah.'
            );
        }
    } else {
        // Username tidak ditemukan
        $response = array(
            'status' => 'error',
            'message' => 'data kosong.'
        );
    }
    
    echo json_encode($response);
}

$con>close();
?>