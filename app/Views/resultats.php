<!doctype html>
<html lang="fr-Fr">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>Gestion de Session du CEPE</title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
    name='viewport' />
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
          <li>
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
          <li class="active">
            <a href="index.php?page=matiere">
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
            <a class="navbar-brand">Résultats de l'examen</a>
          </div>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <form method="post" action="index.php?page=searchresult">
              <div class="input-group no-border">
                <input type="text" name="search" class="form-control" placeholder="Rechercher...">
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
            <form method="post">
              <div class="input-group">
                <input type="text" name="delib" class="form-control col-11 pr-0" placeholder="Entrer le paramètre de délibération">
                <div class="input-group-append col-1 p-0">
                  <div class="input-group-text container-fluid p-0">
                    <button type="submit" class="btn btn-primary container-fluid w-100 h-100">Lister</button>
                  </div>
                </div>
              </div>
            </form>
            <div class="card">
              <div class="card-title p-3 pt-4 mb-0">
                <h5>Admis après délibération</h5>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-striped table-hover container-fluid">
                    <thead class="text-primary">
                      <th class="col-2">
                        N° Matricule
                      </th>
                      <th>
                        Nom
                      </th>
                      <th>
                        Prénom(s)
                      </th>
                      <th>
                        Établissement
                      </th>
                      <th>
                        Moyenne Générale(sur 20)
                      </th>
                    </thead>
                    <tbody>
                      <?php
                        if ($_SERVER["REQUEST_METHOD"] === "POST") {
                          listDelib(); //affiche les élèves délibérés
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-title p-3 pt-4 mb-0">
                <h5>Recalés</h5>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-striped table-hover container-fluid">
                    <thead class="text-primary">
                      <th class="col-2">
                        N° Matricule
                      </th>
                      <th>
                        Nom
                      </th>
                      <th>
                        Prénom(s)
                      </th>
                      <th>
                        Établissement
                      </th>
                      <th>
                        Moyenne Générale (sur 20)
                      </th>
                    </thead>
                    <tbody>
                      <?php
                        if (($_SERVER["REQUEST_METHOD"] === "POST") || $_SERVER["PHP_SELF"]) {
                          listEchoue();
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-title p-3 pt-4 mb-0">
                <h5>Admis definitives(Moyenne>=10)</h5>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-striped table-hover container-fluid">
                    <thead class="text-primary">
                      <th class="col-2">
                        N° Matricule
                      </th>
                      <th>
                        Nom
                      </th>
                      <th>
                        Prénom(s)
                      </th>
                      <th>
                        Établissement
                      </th>
                      <th>
                        Moyenne Générale(sur 20)
                      </th>
                    </thead>
                    <tbody>
                      <?php
                          listAdmis();
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-title p-3 pt-4 mb-0">
                <h5>Admis en 6ème(Moyenne plus de 12)</h5>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-striped table-hover container-fluid">
                    <thead class="text-primary">
                      <th class="col-2">
                        N° Matricule
                      </th>
                      <th>
                        Nom
                      </th>
                      <th>
                        Prénom(s)
                      </th>
                      <th>
                        Établissement
                      </th>
                      <th>
                        Moyenne Générale(sur 20)
                      </th>
                    </thead>
                    <tbody>
                      <?php
                        listAdm_6();
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-title p-3 pt-4 mb-0">
                <h5>Classement par ordre de mérite</h5>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-striped table-hover container-fluid">
                    <thead class="text-primary">
                      <th class="col-1">
                        N° Matricule
                      </th>
                      <th>
                        Nom
                      </th>
                      <th>
                        Prénom(s)
                      </th>
                      <th>
                        Établissement
                      </th>
                      <th>
                        Mention
                      </th>
                    </thead>
                    <tbody>
                      <?php
                        if ($_SERVER["REQUEST_METHOD"] === "POST" || $_SERVER["PHP_SELF"]) {
                          classement(); //affiche les élèves délibérés
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
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