<?php
include "database.php";

// Jumlah Produk
$cekdataproduk = mysqli_query($db, "SELECT * from produk");
$jumlah_produk = mysqli_num_rows($cekdataproduk);

// Total Stok
$cekstok = mysqli_query($db, "SELECT sum(stok) as totalstok from produk");
$data = mysqli_fetch_array($cekstok);
$totalstok = $data['totalstok'] ?? 0;

// Laba
$sql_jumlah_laba = "SELECT IFNULL(SUM(produk.harga * keluar.qty), 0) AS laba
                    FROM produk
                    LEFT JOIN keluar ON keluar.id_produk = produk.id_produk";
$result_jumlah_laba = mysqli_query($db, $sql_jumlah_laba);
if ($result_jumlah_laba) {
  $jumlah = mysqli_fetch_assoc($result_jumlah_laba);
  $jumlah_laba = $jumlah['laba'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link rel="stylesheet" href="dashboard.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* Sidebar */
    #sidebar {
    position: fixed;
    top: 0;
    left: 0;
    height: 100vh;
    width: 250px;
    background-color: #343a40;
    color: white;
    transition: all 0.3s;
    z-index: 100;

    }

    #sidebar .nav-link {
      color: white;
    }

    nav {
      padding: 10px 20px;
      transition: all 0.3s;
    }

    .content {
      margin-left: 250px;
      padding: 20px;
      transition: all 0.3s;
    }

    #sidebar.hide {
      width: 0;
      padding: 0;
    }

    #sidebar.hide h4,
    #sidebar.hide ul li {
      display: none;
    }

    #sidebar.hide .logo {
      display: none !important;
    }

    .content.show-sidebar {
      margin-left: 0;
      padding-left: 20px;
    }

    .main-content {
      max-height: calc(100vh - 100px);
      overflow-y: auto;
    }

    .nav-item a:hover {
      color: #ffc107 !important;
    }

    .nav-item a.login-aside:hover {
      color: red !important;
    }

    .table > :not(caption) > * > * {
      background-color: transparent !important;
      border-collapse: collapse !important;
    }

   
    @media (max-width: 468px){
      html {
        font-size: 65%;
      }

      #sidebar {
        position: absolute;
        left: -100%;
        top: 4rem;
        width: 60% !important;
        height: 100vh;
      }

      #sidebar.hide {
        left: 0; 
      }

      #sidebar.hide h4,
      #sidebar.hide ul li {
        display: block;
      }

      #sidebar.hide .logo {
      display: block !important;
    }

    .cards {
      /* display: flex; */
      flex-direction: column;
    }

    .content {
      margin: 0 !important;
    }
    }
  </style>
</head>
<body>
  <!-- Sidebar + Content -->
<div class="d-flex">
    <div id="sidebar">
        <div class="logo p-3 mt-2 d-flex align-items-center">
        <img src="asset/logo.png" style="height: 30px" alt="">
        <span class="ms-2 fw-semibold fs-4">Onie Petshop</span>
        </div>
        <ul class="nav flex-column p-3 mt-2">
        <li class="nav-item">
          <a href="data-product.php" class="nav-link rounded mb-2" href="#"><i class="bi bi-house-fill me-2"></i>Dashboard</a>
          <a href="data-product.php" class="nav-link rounded mb-2" href="#"><i class="bi bi-house-fill me-2"></i>Produk</a>
          <a href="data-grooming.php" class="nav-link rounded mb-2" href="#"><i class="bi bi-box-fill me-2"></i>Data Grooming</a>
          <a href="barangMasuk.php" class="nav-link rounded mb-2" href="#"><i class="bi bi-box-fill me-2"></i>Barang Masuk</a>
          <a href="barangKeluar.php" class="nav-link rounded mb-2" href="#"><i class="bi bi-box-fill me-2"></i>Barang Keluar</a>
          <a href="logout.php" class="login-aside mt-5 nav-link rounded mb-2 text-danger"><i class="bi bi-box-arrow-in-left me-2"></i>Logout</a>
        </li>
        </ul>
    </div>

    <div class="content d-flex p-0 container-fluid flex-column">
      <nav class="d-flex align-items-center">
        <a class="" id="toggleSidebarBtn">
          <i class="bi bi-list mx-2 p-1 px-2 text-dark fs-4 "></i>
        </a>
        <h3>Hallo, Admin!</h3>
      </nav>

      <div class="main-content container-fluid px-4 py-3">
        <h3>Dashboard</h3>
        <div class="cards d-flex gap-4">
            <div class="card border-0 col shadow-sm bg-body-tertiary mt-3">
                <div class="card-body">
                    <h6 class="card-subtitle mb-2 text-body-secondary">Jumlah Produk</h6>
                    <h3 class="card-title"><?=$jumlah_produk;?></h3>
                </div>
            </div>
            <div class="card border-0 col shadow-sm bg-body-tertiary mt-3">
                <div class="card-body">
                    <h6 class="card-subtitle mb-2 text-body-secondary">Total Stok</h6>
                    <h3 class="card-title"><?=$totalstok;?></h3>
                </div>
            </div>
            <div class="card border-0 col shadow-sm bg-body-tertiary mt-3">
                <div class="card-body">
                    <h6 class="card-subtitle mb-2 text-body-secondary">Laba</h6>
                    <h3 class="card-title">Rp <?=number_format("$jumlah_laba", 0, ",", ".");?></h3>
                </div>
            </div>
        </div>
      </div>
    </div>
</div>
  <!-- Bootstrap 5 JS and Icons -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.js"></script>

  <script>
    // Toggle sidebar visibility
    const sidebar = document.getElementById('sidebar');
    const toggleSidebarBtn = document.getElementById('toggleSidebarBtn');
    const content = document.querySelector('.content');
    const navbar = document.querySelector('nav');

    toggleSidebarBtn.addEventListener('click', function() {
      sidebar.classList.toggle('hide');
      content.classList.toggle('show-sidebar');
      navbar.classList.toggle('show-navbar');
    });
  </script>
</body>
</html>
