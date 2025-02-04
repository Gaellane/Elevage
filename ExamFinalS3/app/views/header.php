<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Index - AgriCulture Bootstrap Template</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">

  <link href="assets/css/main.css" rel="stylesheet">
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center position-relative">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <!-- Left Navigation -->
      <nav id="navmenu-left" class="navmenu">
        <ul>
        <li class="dropdown"><a href="#"><span>Animal</span><i class="bi bi-chevron-down toggle-dropdown"></i></a>
          <ul>
              <li><a href="achatAnimal">Ajout</a></li>
              <li><a href="./">Liste</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="#"><span>Alimentation</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="alimentation?action=add">Ajout</a></li>
              <li><a href="alimentation">Liste</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="#"><span>Vente</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="gestionVente?action=new">Ajout</a></li>
            </ul>
          </li>
        </ul>
      </nav>

      <!-- Centered Logo -->
      <a href="./" class="logo d-flex align-items-center mx-auto">
        <img src="assets/img/logo.jpg" alt="AgriCulture" style=" height: 150px;">
      </a>

      <!-- Right Navigation -->
      <nav id="navmenu-right" class="navmenu">
        <ul>
          <li class="dropdown"><a href="#"><span>Categorie</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="gestionCategorie?action=new">Ajout</a></li>
              <li><a href="gestionCategorie">Liste</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="#"><span>AChat Alimentation</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="gestionAchatAlimentation?action=new">Ajout/Achat</a></li>
              <li><a href="gestionAchatAlimentation">Liste</a></li>
            </ul>
          </li>
        </ul>
      </nav>

      <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
    </div>
  </header>

</body>

</html>