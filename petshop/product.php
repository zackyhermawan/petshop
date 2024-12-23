<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PetShop</title>
    <link rel="stylesheet" href="style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
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

    <div class="product">
      <div class="content-produk">
        <div class="daftar-produk">
          <div class="header">
            <div class="judul">
              <h2>Daftar Produk</h2>
            </div>
            <div class="filter">
              <select id="sort-category" onchange="filterProducts()">
                <option value="all">Semua</option>
                <option value="pakan">Pakan</option>
                <option value="obat">Obat</option>
                <option value="aksesoris">Aksesoris</option>
              </select>
            </div>
          </div>
          
          <div id="product-list" class="box-produk">
            <div class="card border-0" style="width: 16rem;" data-category="pakan">
              <img src="asset/makanan-pasir.png" class="card-img-top bg-body-secondary object-fit-cover" style="height: 13rem">
              <div class="card-body">
                <h5 class="card-title fw-semibold">Pasir Premium</h5>
                <p class="card-text">Pasir kucing menyerap kotoran dan bau, menjaga kebersihan lingkungan kucing.</p>
                <a href="#" class="btn btn-primary">Beli Sekarang</a>
              </div>
            </div>
            <div class="card border-0" style="width: 16rem;" data-category="obat">
              <img src="asset/disinfektan_anjing.png" class="card-img-top bg-body-secondary object-fit-cover" style="height: 13rem">
              <div class="card-body">
                <h5 class="card-title fw-semibold">Super Disinfectan</h5>
                <p class="card-text">Super Disinfectan adalah pembersih yang membunuh kuman dan virus untuk menjaga kebersihan.</p>
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
            <div class="card border-0" style="width: 16rem;" data-category="obat">
              <img src="asset/obat-petguards.png" class="card-img-top bg-body-secondary object-fit-cover" style="height: 13rem">
              <div class="card-body">
                <h5 class="card-title fw-semibold">Petguards</h5>
                <p class="card-text">Petguards adalah produk obat untuk hewan peliharaan yang dirancang untuk melindungi dari parasit seperti kutu dan cacing.</p>
                <a href="#" class="btn btn-primary">Beli Sekarang</a>
              </div>
            </div>
            <div class="card border-0" style="width: 16rem;" data-category="obat">
              <img src="asset/obat-sunspray.png" class="card-img-top bg-body-secondary object-fit-cover" style="height: 13rem">
              <div class="card-body">
                <h5 class="card-title fw-semibold">Sunspray</h5>
                <p class="card-text">Sunspray adalah produk semprot pelindung matahari untuk hewan peliharaan, membantu melindungi kulit mereka dari paparan sinar UV.</p>
                <a href="#" class="btn btn-primary">Beli Sekarang</a>
              </div>
            </div>
            <div class="card border-0" style="width: 16rem;" data-category="pakan">
              <img src="asset/pakan-bunnyBites.png" class="card-img-top bg-body-secondary object-fit-cover" style="height: 13rem">
              <div class="card-body">
                <h5 class="card-title fw-semibold">Bunny Bites</h5>
                <p class="card-text">Bunny Bites adalah makanan ringan khusus untuk kelinci, dirancang untuk memberikan nutrisi tambahan dan camilan yang sehat.</p>
                <a href="#" class="btn btn-primary">Beli Sekarang</a>
              </div>
            </div>
            <div class="card border-0" style="width: 16rem;" data-category="pakan">
              <img src="asset/pasir-pawsitive.png" class="card-img-top bg-body-secondary object-fit-cover" style="height: 13rem">
              <div class="card-body">
                <h5 class="card-title fw-semibold">Paw Sitive</h5>
                <p class="card-text">Paw Sitive adalah produk perawatan untuk kaki hewan peliharaan, seperti salep atau balm yang membantu menjaga kelembapan dan melindungi cakar dari iritasi.</p>
                <a href="#" class="btn btn-primary">Beli Sekarang</a>
              </div>
            </div>
            <div class="card border-0" style="width: 16rem;" data-category="pakan">
              <img src="asset/pasir-tosandHamster.png" class="card-img-top bg-body-secondary object-fit-cover" style="height: 13rem">
              <div class="card-body">
                <h5 class="card-title fw-semibold">To Sand Hamster</h5>
                <p class="card-text">To Sand Hamster adalah pasir mandi khusus untuk hamster, membantu mereka membersihkan bulu dan menjaga kebersihan tubuh.</p>
                <a href="#" class="btn btn-primary">Beli Sekarang</a>
              </div>
            </div>
            <div class="card border-0" style="width: 16rem;" data-category="pakan">
              <img src="asset/pakan-meowMeal.png" class="card-img-top bg-body-secondary object-fit-cover" style="height: 13rem">
              <div class="card-body">
                <h5 class="card-title fw-semibold">Meow Meal</h5>
                <p class="card-text">Meow Meal adalah makanan kucing yang dirancang untuk memberikan nutrisi lengkap dan rasa lezat bagi kucing peliharaan.</p>
                <a href="#" class="btn btn-primary">Beli Sekarang</a>
              </div>
            </div>
          </div>
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
