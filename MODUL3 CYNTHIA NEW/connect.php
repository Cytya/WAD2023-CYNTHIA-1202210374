<!-- File ini berisi koneksi dengan database yang telah di import ke phpMyAdmin kalian -->


<?php
// Buatlah variable untuk connect ke database yang telah di import ke phpMyAdmin
 $Host = "localhost:3308" ;
 $Username = "root" ;
 $Password = "" ;
 $Database = "modul3_wad" ;

// 
$conn = new mysqli($Host, $Username, $Password, $Database);
// Buatlah perkondisian jika tidak bisa terkoneksi ke database maka akan mengeluarkan errornya
if ($conn ->connect_error) {
    die("Connection failed: " . $conn ->connect_error);

}

// 
?>