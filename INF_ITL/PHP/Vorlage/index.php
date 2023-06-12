<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>base</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="myStyle.css">
</head>

<body>

  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="?seite=tabelleadresse">Fixed navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link" href="?seite=tabelleadresse">Auf Adresse anzeigen</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?seite=strasseinsert">Neue Straße erfassen</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?seite=strassenname">Straßenname ändern</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?seite=neuerort">Neuen Ort einfügen</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <main class="container">
    <div class="bg-light p-5 rounded">
      <?php
      include 'functions.php';
      dbConnect();
      if (isset($_GET['seite'])) {
        switch ($_GET['seite']) {
          case 'tabelleadresse':
            include 'page/tabelleadresse.php';
            break;
          case 'strasseinsert':
            include 'page/strasseinsert.php';
            break;
          case 'strassenname':
            include 'page/strassenname.php';
            break;
          case 'neuerort':
            include 'page/neuerort.php';
            break;
        }
      }
      ?>
    </div>
  </main>
  <script src="functions.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>