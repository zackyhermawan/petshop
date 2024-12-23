<?php
include "database.php";

if (isset($_POST['kirim'])) {
  // Ambil data dari form
  $nama_penitip = $_POST['nama_penitip'];
  $nama_kucing = $_POST['nama_kucing'];
  $tanggal_penitipan = $_POST['tanggal_penitipan'];
  $tanggal_pengambilan = $_POST['tanggal_pengambilan'];

  // Query untuk memasukkan data ke dalam tabel
  $sql = "INSERT INTO grooming (nama_penitip, nama_kucing, tanggal_penitipan, tanggal_pengambilan) 
          VALUES ('$nama_penitip', '$nama_kucing', '$tanggal_penitipan', '$tanggal_pengambilan')";
  if ($db->query($sql) === TRUE) {
    echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: 'berhasil dikirim!.',
                        showConfirmButton: false,
                        timer: 2000
                    });
                });
              </script>";
  } 
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PetShop</title>
    <link rel="stylesheet" href="style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet" />
  </head>
  <body>
    <nav>
      <div class="logo">
        <img src="asset/logo.png" alt="" />
        <h3>Onie Petshop</h3>
      </div>
      <div id="list-menu" class="list-menu">
          <a class="text-decoration-none" href="index.php">Home</a>
          <a class="text-decoration-none" href="product.php">Product</a>
          <a class="text-decoration-none" href="grooming.php">Grooming</a>
          <a href="login.php" class="login text-decoration-none">Login</a>
      </div>

      <div class="toggle">
      <a id="hamburger-menu"><i class="bi bi-list"></i></a>
      </div>
    </nav>

    <div class="grooming">
      <div class="content-grooming">
        <h2>Layanan Grooming</h2>
        <form method="post">
          <div class="form-content">
            <div class="form-input">
              <div class="mb-3">
                <label >Nama Penitip</label>
                <input type="text" name="nama_penitip" required/>
              </div>
  
              <div class="mb-3">
              <label >Nama Kucing</label>
              <input type="text" name="nama_kucing" required/>
              </div>

              <div class="mb-3">
              <label>Tanggal Penitipan</label>
              <input type="date" name="tanggal_penitipan" required/>
              </div>    

              <div class="mb-3">
              <label>Tanggal Pengambilan</label>
              <input type="date" name="tanggal_pengambilan" required/>
              </div>
            </div>
          </div>

          <button class="rounded" type="submit" name="kirim">Kirim</button>
        </form>
      </div>
    </div>

    <div id="product-list" class="box-produk justify-content-center">
      
    </div>

    <footer>
      <div class="footer-content">
        <div class="footer-about">
          <h3 class="fs-5">Onie Petshop</h3>
          <span>Penyedia kebutuhan hewan terbaik</span>
        </div>

        <div class="footer-menu">
          <h3 class="fs-5">Menu</h3>
          <div class="links">
            <a href="index.php">Home</a>
            <a href="product.php">Product</a>
            <a href="grooming.php">Grooming</a>
          </div>
        </div>

        <div class="footer-contact">
          <h3 class="fs-5">Hubungi Kami</h3>
          <div class="text">
            <span>Alamat: Jombor Lor, Sinduadi, Kec. Mlati, Kabupaten Sleman, DIY</span>
            <span>Telepon: 0896-0222-0754</span>
            <span>Email: Onie.petshop@gmail.com</span>
          </div>
        </div>
      </div>

      <div class="footer-border"></div>

      <div class="footer-bottom">
        <p>&copy; 2024 Onie petshop. Semua Hak Dilindungi.</p>
      </div>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="script.js"></script>
  </body>
</html>
