<!-- Pada file ini kalian membuat coding untuk logika update / meng-edit data mobil pada showroom sesuai id-->
<?php
// (1) Jangan lupa sertakan koneksi database dari yang sudah kalian buat yaa
include "connect.php";
// (2) Tangkap nilai "id" mobil (CLUE: gunakan GET)
$id=$_GET['id'];
    // (3) Buatkan fungsi "update" yang menerima data sebagai parameter
function update ($id,$nama_mobil,$brand_mobil,$warna_mobil,$tipe_mobil,$harga_mobil){
    global $conn;
        // Dapatkan data yang dikirim sebagai parameter dan simpan dalam variabel yang sesuai.
        $nama_mobil = mysqli_real_escape_string($conn, $nama_mobil);
        $brand_mobil = mysqli_real_escape_string($conn, $brand_mobil);
        $warna_mobil = mysqli_real_escape_string($conn, $warna_mobil);
        $tipe_mobil = mysqli_real_escape_string($conn, $tipe_mobil);
        $harga_mobil = mysqli_real_escape_string($conn, $harga_mobil);


        // Buatkan perintah SQL UPDATE untuk mengubah data di tabel, berdasarkan id mobil
        $query = "UPDATE showroom_mobil 
              SET nama_mobil = '$nama_mobil', 
                  brand_mobil = '$brand_mobil', 
                  warna_mobil = '$warna_mobil', 
                  tipe_mobil = '$tipe_mobil', 
                  harga_mobil = '$harga_mobil' 
              WHERE id = $id";

         // Eksekusi perintah SQL
         if (mysqli_query($conn, $query)) {
        // Buatkan kondisi jika eksekusi query berhasil
        echo"
        <script>
        alert ('data mobil berhasil di update');
        document.location.href = 'list_mobil.php';
        </script>";
        } else {
        // Jika terdapat kesalahan, buatkan eksekusi query gagalnya
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }
}

// Panggil fungsi update dengan data yang sesuai
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    update($id, $nama_mobil, $brand_mobil, $warna_mobil, $tipe_mobil, $harga_mobil);
}

// Tutup koneksi ke database setelah selesai menggunakan database
mysqli_close($conn);
?>
