<?php
include "database.php";

// Tambah Produk
if(isset($_POST['kirim'])){
  $nama_produk = $_POST['nama_produk'];
  $kategori = $_POST['add_kategori'];
  $harga = $_POST['harga'];

  $tambahproduk = mysqli_query($db, "insert into produk (nama_produk, id_kategori, harga) values ('$nama_produk', '$kategori', '$harga')");
}

// Edit Produk
if (isset($_POST['edit'])) {
  // Ambil data dari form
  $id_produk =$_POST['id_produk'];
  $nama_produk =$_POST['nama_produk'];
  $id_kategori =  $_POST['select_kategori'];
  $harga =$_POST['harga'];

  $query = "UPDATE produk SET nama_produk = '$nama_produk', id_kategori = '$id_kategori', harga = '$harga' WHERE id_produk = '$id_produk'";

  if (mysqli_query($db, $query)) {
      header('location:dashboard.php');
  } else {
      echo "<script>alert('Gagal memperbarui data produk: " . mysqli_error($db) . "');</script>";
  }
}

// Hapus Produk
if(isset($_POST['delete'])){
  $id_produk = $_POST['id_produk'];
  $nama_produk = $_POST['nama_produk'];

  $hapus = mysqli_query($db, "DELETE from produk where id_produk = '$id_produk'");

  if($hapus){
    header('location:dashboard.php');
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
  <div class="d-flex">
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
        <h3 class="mb-4">Produk</h3>
        <div class="card p-3 bg-light border-0">
          <table class="table table-bordered border-secondary">
            <h5>List Produk</h5>
            <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal" class="text-decoration-none text-center text-white p-2 mt-2 mb-4 bg-primary rounded" style="width: fit-content">Add Data</a>
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Produk</th>
                <th scope="col">Kategori</th>
                <th scope="col">Stok</th>
                <th scope="col">Harga</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
            <?php
              $ambilsemuadataproduk = mysqli_query($db, "SELECT * FROM produk m, kategori s where m.id_kategori = s.id_kategori");
              $i = 1;
              while($data=mysqli_fetch_array($ambilsemuadataproduk)){
                $id_produk = $data['id_produk'];
                $nama_produk = $data['nama_produk'];
                $id_kategori = $data['id_kategori'];
                $nama_kategori = $data['nama_kategori'];
                $stok = $data['stok'];
                $harga = $data['harga'];
                ?>
                <tr>
                <th scope="row"><?=$i++;?></th>
                <td><?=$nama_produk;?></td>
                <td><?=$nama_kategori;?></td>
                <td><?=$stok;?></td>
                <td><?=$harga;?></td>
                <td>
                  <a href="" data-bs-toggle="modal" data-bs-target="#edit<?=$id_produk;?>" class="d-inline-block text-decoration-none text-white" ><i class="d-flex bi bi-pencil-square bg-primary align-items-center justify-content-center rounded" style="width: 27px; height:27px"></i></a>
                  <a href="" data-bs-toggle="modal" data-bs-target="#delete<?=$id_produk;?>" class="d-inline-block text-decoration-none  text-white"><i class="d-flex bi bi-trash-fill bg-danger align-items-center justify-content-center rounded" style="width: 27px; height: 27px"></i></a>
                </td>
              </tr>
              <!-- Modal Edit -->
              <div id="edit<?=$id_produk;?>" class="modal fade" id="edit<?=$id_produk;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Produk</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form method="post">
                        <input type="hidden" name="id_produk" value="<?=$id_produk;?>">

                        <input type="text" name="nama_produk" value="<?=$nama_produk;?>" class="form-control" required>
                        <br>
                        <select name="select_kategori" class="form-control" required>
                        <option value="">Pilih Kategori</option>
                                      <?php
                                      $ambilkategori = mysqli_query($db, "SELECT * FROM kategori");
                                      while ($kategori = mysqli_fetch_assoc($ambilkategori)) {
                                        $selected = ($kategori['id_kategori'] == $id_kategori) ? "selected" : "";
                                        echo "<option value='{$kategori['id_kategori']}' $selected>{$kategori['nama_kategori']}</option>";
                                    }
                                      ?>
                        </select>

                        <br>
                        <input type="number" name="harga" value="<?=$harga;?>" class="form-control" required>
                        <br>
                        <button type="submit" name="edit" class="btn btn-primary">Edit</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Hapus Produk -->
              <div id="delete<?=$id_produk;?>" class="modal fade" id="edit<?=$id_produk;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Produk</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form method="post">
                        <input type="hidden" name="id_produk" value="<?=$id_produk;?>">
                        <input type="hidden" name="id_kategori" value="<?=$id_kategori;?>">
                        <input type="hidden" name="nama_produk" value="<?=$nama_produk;?>">
                        <p class="fw-semibold">Apakah anda yakin ingini menghapus <?=$nama_produk;?>?</p>
                        <button type="submit" name="delete" class="btn btn-danger">Hapus</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
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
          <input type="text" name="nama_produk" placeholder="Nama Produk" class="form-control" required>
          <br>
          <select name="add_kategori" class="form-control" required>
              <option value="">-- Pilih Kategori --</option>
              <?php
                $ambilsemuadata = mysqli_query($db, "SELECT * FROM kategori");
                while($fetcharray = mysqli_fetch_array($ambilsemuadata)){
                  $nama_kategori = $fetcharray['nama_kategori'];
                  $id_kategori = $fetcharray['id_kategori'];
                  ?>
                <option value="<?=$id_kategori;?>"><?=$nama_kategori;?></option>
                <?php
                }
              ?>
            </select>
          <br>
          <input type="number" name="harga" placeholder="Harga" class="form-control" required>
          <br>
          <button type="submit" name="kirim" class="btn btn-primary">Kirim</button>
        </form>
      </div>
    </div>
  </div>
</div>

</html>
