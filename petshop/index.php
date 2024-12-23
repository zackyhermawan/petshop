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
    <nav id="nav">
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

    <div class="about">
      <div class="content">
        <h2 class="content-header">Tentang Kami</h2>
        <div class="main-content">
          <div class="text">
            <p>
              Selamat datang di Onie Petshop, solusi terbaik untuk semua kebutuhan hewan peliharaan Anda! Kami hadir dengan misi memberikan layanan dan produk berkualitas untuk memastikan kebahagiaan dan kesehatan hewan kesayangan Anda. Di
              Onie Petshop, Anda dapat menemukan berbagai produk, mulai dari pakan, aksesoris, obat-obatan, hingga pasir berkualitas tinggi.
            </p>
            <p>
              Selain itu, kami juga menyediakan layanan grooming profesional untuk menjaga kebersihan dan penampilan hewan peliharaan Anda. Kami percaya bahwa setiap hewan adalah bagian dari keluarga, dan kami berkomitmen untuk membantu
              Anda merawat mereka dengan sepenuh hati. Dengan pelayanan ramah, produk terpercaya, dan solusi yang lengkap, kami siap mendampingi perjalanan Anda merawat sahabat kecil Anda.
            </p>
          </div>
          <img src="asset/kucing.png" alt="" />
        </div>
      </div>
    </div>

    <div id="product-list" class="box-produk justify-content-center py-5 px-2">
      <div class="card border-0" style="width: 16rem;" data-category="pakan">
        <img src="asset/makanan-pasir.png" class="card-img-top bg-body-secondary object-fit-cover" style="height: 13rem">
        <div class="card-body">
          <h5 class="card-title fw-semibold">Pasir Premium</h5>
          <p class="card-text">Pasir kucing menyerap kotoran dan bau, menjaga kebersihan lingkungan kucing.</p>
          <a href="#" class="btn btn-primary">Beli Sekarang</a>
        </div>
      </div>
      <div class="card border-0" style="width: 16rem;" data-category="aksesoris">
        <img src="asset/penutup mulut anjing.png" class="card-img-top bg-body-secondary object-fit-cover" style="height: 13rem">
        <div class="card-body">
          <h5 class="card-title fw-semibold">Adjustable Dog</h5>
          <p class="card-text">Adjustable Dog adalah harness atau tali yang dapat disesuaikan agar pas dan nyaman untuk anjing berbagai ukuran.</p>
          <a href="#" class="btn btn-primary">Beli Sekarang</a>
        </div>
      </div>
      <div class="card border-0" style="width: 16rem;" data-category="pakan">
        <img src="asset/pasir-orifilcatliter.png" class="card-img-top bg-body-secondary object-fit-cover" style="height: 13rem">
        <div class="card-body">
          <h5 class="card-title fw-semibold">Orifil Cat Liter</h5>
          <p class="card-text">Orifil Cat Litter adalah pasir kucing yang efektif menyerap urin dan bau, menjaga kebersihan kotak pasir kucing.</p>
          <a href="#" class="btn btn-primary">Beli Sekarang</a>
        </div>
      </div>
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

    <script src="script.js"></script>
  </body>
</html>
