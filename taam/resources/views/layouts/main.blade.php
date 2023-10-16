<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="../img/taam.png" />
    <title>{{ $title }}</title>

    <!-- My Style -->
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="../css/academic.css" />
    <link rel="stylesheet" href="../css/profil.css" />
    <link rel="stylesheet" href="../css/data.css" />
    <link rel="stylesheet" href="../css/fasilitas.css" />

    <!-- Feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>

    <!-- Font Awesome -->
    <script
      src="https://kit.fontawesome.com/f69b4f09d5.js"
      crossorigin="anonymous"
    ></script>
    <script src="https://unpkg.com/feather-icons"></script>
  </head>
  <body>
    <!-- Navbar Start -->
    <nav class="navbar">
      <a href="index.html" class="navbar-logo">
        <img src="../img/taam.png" class="logo" />
      </a>

      <ul class="ul-nav">
        <li class="drop">
          <a href="/" class="drop-nav">Home</a>
        </li>

        <li class="drop">
          <a href="#about" class="drop-nav"
            >Tentang Kami <i class="fa-solid fa-chevron-down"></i
          ></a>
          <ul class="isi-drop">
            <li><a href="/tentang/profile">Profil</a></li>
            <li><a href="/tentang/profile">Visi Misi</a></li>
            <li><a href="/tentang/profile">Sejarah</a></li>
            <li><a href="/tentang/Data_siswa">Data Siswa</a></li>
          </ul>
        </li>

        <li class="drop">
          <a href="#" class="drop-nav"
            >Pembelajaran <i class="fa-solid fa-chevron-down"></i>
          </a>

          <ul class="isi-drop">
            <li><a href="/fasilitas">Fasilitas</a></li>
            <li><a href="/kalender">Kalender Akademik</a></li>
          </ul>
        </li>

        <li class="drop">
          <a href="#contact" class="drop-nav">Hubungi Kami</a>
        </li>
      </ul>

      <div class="icon">
        <div class="search-form">
          <label for="search-box"><i class="fa-brands fa-whatsapp"></i></label>
          <p>{{ $sekolah->telepone_sekolah }}</p>
        </div>
        <a id="menu"><i class="fa-solid fa-bars"></i></a>
      </div>
    </nav>
    <!-- Navbar End -->
    @yield('container')

    <!-- Footer Start -->
    <footer id="footer">
      <div class="socials">
        <a href="#"><i data-feather="instagram"></i></a>
        <a href="#"><i data-feather="twitter"></i></a>
        <a href="#"><i data-feather="facebook"></i></a>
      </div>

      <div class="links">
        <a href="#home">Home</a>
        <a href="#about">Tentang Kami</a>
        <a href="#footer">Pembelajaran</a>
        <a href="#contact">Hubungi Kami</a>
      </div>

      <div class="credit">
        <p>Created by <a href="#">fauzanrahmani</a> & <a href="#">rmunggaran</a> | &copy; 2023.</p>
      </div>
    </footer>
    <!-- Footer End -->

    <!-- Feather Icons -->
    <script>
      feather.replace();
    </script>

    <!-- My Javascript -->
    <script src="../js/script.js"></script>
  </body>
</html>