<?php

require 'connect.php';

// (1) Mulai session
session_start();
//

// (2) Ambil nilai input dari form registrasi

    // a. Ambil nilai input email
    $Email = $_POST['email'];
    // b. Ambil nilai input name
    $Name = $_POST['name'];
    // c. Ambil nilai input username
    $Username = $_POST['username'];
    // d. Ambil nilai input password
    // e. Ubah nilai input password menjadi hash menggunakan fungsi password_hash()
    $Password = password_hash($_POST['password'], PASSWORD_DEFAULT);

//
// (3) Buat dan lakukan query untuk mencari data dengan email yang sama dari nilai input email
    $quary1 = "SELECT * FROM users WHERE email = '$Email'";
    $result = mysqli_query($db, $quary1);
//

// (4) Buatlah perkondisian ketika tidak ada data email yang sama ( gunakan mysqli_num_rows == 0 )
    if(mysqli_num_rows($result) == 0) {
    // a. Buatlah query untuk melakukan insert data ke dalam database
        $query2 = "INSERT INTO users (name, email, username, password) VALUES ('$Name','$Email','$Username','$Password')";
        $result = mysqli_query($db, $query2);

    // b. Buat lagi perkondisian atau percabangan ketika query insert berhasil dilakukan
    //    Buat di dalamnya variabel session dengan key message untuk menampilkan pesan penadftaran berhasil
        if($result) {
            $_SESSION['message'] = 'Pendaftaran sukses, silahkan login';
            $_SESSION['color'] = 'succes';
            header('Location: ../views/login.php');
        }else{
            $_Session['message'] = 'Pendaftaran Gagal';

        }
    }
// 

// (5) Buat juga kondisi else
//     Buat di dalamnya variabel session dengan key message untuk menampilkan pesan error karena data email sudah terdaftar
else {
    $_Session['message'] = 'Email sudah terdaftar';
    header('Location: ../views/register.php');
}
//

?>