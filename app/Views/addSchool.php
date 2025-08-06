<!doctype html>
<html lang="fr-Fr">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>Gestion de Session du CEPE</title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!-- CSS Files -->
  <link href="./public/css/bootstrap.min.css" rel="stylesheet" />
  <link href="./public/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="white" data-active-color="danger">
      <div class="logo">
        <a href="#" class="simple-text logo-mini">
        <a href="#" class="simple-text logo-normal">
          Session de CEPE
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li>
            <a href="index.php?page=home">
              <i class="nc-icon nc-bank"></i>
              <p>Tous les élèves</p>
            </a>
          </li>
          <li class="active">
            <a href="index.php?page=school">
              <i class="nc-icon nc-diamond"></i>
              <p>Etablissements</p>
            </a>
          </li>
          <li>
            <a href="index.php?page=matiere">
              <i class="nc-icon nc-pin-3"></i>
              <p>Matières</p>
            </a>
          </li>
          <li>
            <a href="index.php?page=resultats">
              <i class="nc-icon nc-pin-3"></i>
              <p>Résultats</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel" style="height: 100vh;">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand">Liste des Établissements</a>
          </div>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <form>
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <i class="nc-icon nc-zoom-split"></i>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-body">
              <?php
              if($_SERVER["REQUEST_METHOD"] === "POST"){
                createSchool();
                }
            ?>
                <form method="post">
                    <label>ID</label>
                    <input type="text" class="form-control" name="id" placeholder="ID de l'établissment">
                    <label>Désignation</label>
                    <input type="text" class="form-control" name="design" placeholder="Nom de l'établissement">
                    <label>Adresse</label>
                    <input type="text" class="form-control" name="adresse" placeholder="Adresse de l'établissement">
                    <button class="btn btn-primary btn-round" type="submit">Enregistrer</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer" style="position: absolute; bottom: 0; width: -webkit-fill-available;">
        <div class="container-fluid">
          <div class="row">
            <nav class="footer-nav">
              <ul>
                <li><a href="#" target="_blank">Informatique Generale</a></li>
                <li><a href="#" target="_blank">Blog</a></li>
                <li><a href="#" target="_blank">Licenses</a></li>
              </ul>
            </nav>
            <div class="credits ml-auto">
              <span class="copyright">
                © 2025, made with <i class="fa fa-heart heart"></i> by ENI Fianarantsoa
              </span>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="./public/js/core/jquery.min.js"></script>
  <script src="./public/js/core/popper.min.js"></script>
  <script src="./public/js/core/bootstrap.min.js"></script>
  <script src="./public/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="./public/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script>
</body>

</html>
