<?php
include "database.php";
if(isset($_POST['kirim'])){
    $add_barang = $_POST['add_barang'];
    $qty = $_POST['qty'];

    $cekstok = mysqli_query($db, "SELECT * from produk where id_produk = '$add_barang'");
    $ambildata = mysqli_fetch_array($cekstok);

    $stoksekarang = $ambildata['stok'];
    $tambahstok = $stoksekarang - $qty;

    $addtokeluar = mysqli_query($db, "insert into keluar (id_produk, qty) values ('$add_barang', '$qty')");
    $updatestokeluar = mysqli_query($db, "update produk set stok='$tambahstok' where id_produk='$add_barang'");
    if($addtokeluar&&$updatestokeluar){
    }
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

    @media (max-width: 425px){
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

      .content {
        margin: 0 !important;
      }
    }
  </style>
</head>
<body>
  <!-- Sidebar + Content -->
  <div class="main d-flex">
    <div id="sidebar">
      <div class="logo p-3 mt-2 d-flex align-items-center">
        <img src="asset/logo.png" style="height: 30px" alt="">
        <span class="ms-2 fw-semibold fs-4">Onie Petshop</span>
      </div>
      <ul class="nav flex-column p-3 mt-2">
        <li class="nav-item">
          <a href="dashboard.php" class="nav-link rounded mb-2" href="#"><i class="bi bi-house-fill me-2"></i>Dashboard</a>
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
        <h3 class="mb-4">Barang Keluar</h3>
        <div class="card p-3 bg-light border-0">
            <table class="table table-bordered border-secondary">
              <h5>Data Barang</h5>
              <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal" class="text-decoration-none text-center text-white p-2 mt-2 mb-4 bg-primary rounded" style="width: fit-content">Add Data</a>
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Nama Produk</th>
                  <th scope="col">Jumlah</th>
                  <th scope="col">Tanggal</th>
                </tr>
              </thead>
              <tbody>
                  <?php
                      $datakeluar = mysqli_query($db, "SELECT * from keluar m, produk s where s.id_produk = m.id_produk");
                      $i = 1;
  
                      while($data=mysqli_fetch_array($datakeluar)){
                          $nama_produk = $data['nama_produk'];
                          $qty = $data['qty'];
                          $tanggal = $data['tanggal'];
                          ?>
                      <tr>
                          <th scope="row"><?=$i++;?></th>
                          <td><?=$nama_produk;?></td>
                          <td><?=$qty;?></td>
                          <td><?=$tanggal;?></td>
                      </tr>
                          <?php
                      }
                  ?>
              </tbody>
            </table>
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
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Produk</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post">
          <select name="add_barang" class="form-control" required>
              <option value="">-- Pilih Produk --</option>
              <?php
                $ambilsemuadata = mysqli_query($db, "SELECT * FROM produk");
                while($fetcharray = mysqli_fetch_array($ambilsemuadata)){
                  $nama_produk = $fetcharray['nama_produk'];
                  $id_produk = $fetcharray['id_produk'];
                  ?>
                <option value="<?=$id_produk;?>"><?=$nama_produk;?></option>
                <?php
                }
              ?>
            </select>
          <br>
          <input type="number" name="qty" placeholder="Jumlah" class="form-control" required>
          <br>
          <button type="submit" name="kirim" class="btn btn-primary">Kirim</button>
        </form>
      </div>
    </div>
  </div>
</div>

</html>
