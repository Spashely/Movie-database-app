<html>
  <?php
session_start();
if (!isset($_SESSION["admin"])) {
    header("Location: ../primary_pages/no_access.php");
    exit;
}
?>
    <head> <!-- Head -->
        <title>LimeLight Cinema</title>
        
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/stylesheet.css?v=<?= time() ?>">
        <meta charset="UTF-8">
        <meta name="description" content="Greatest movies to find ...">
        <meta name="author" content="Ivan Kompaniiets">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body> <!-- Body -->
      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
      <nav class="navbar navbar-expand-lg "> <!-- Navbar -->
  <div class="container-fluid">
       <a class="navbar-brand" href="../primary_pages/index.php">
      <img src="/docs/5.3/assets/brand/bootstrap-logo.svg" alt="Logo" width="30" height="24">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" href="../primary_pages/index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../primary_pages/movies.php">Movies</a>
        </li>
                <li class="nav-item">
        <a class="nav-link" href="../primary_pages/quiz.php">Quiz</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="../primary_pages/about.php" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            About
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="../primary_pages/cinemas.php">Cinemas</a></li>
            <li><a class="dropdown-item" href="../primary_pages/team.php#">Team</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="../primary_pages/faq.php">FAQ</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="../primary_pages/contact.php">Contact</a>
        </li>
      </ul>
      <form class="d-flex justify-content-center">
        <div class="nav-buttons">
        <?php if (isset($_SESSION['admin'])) { /* Dynamic buttons */
    echo '<a href="../admin/admin.php" class="btn button4">Admin Panel</a> '; 
    echo '<a href="../primary_pages/logout.php" class="btn button3">Logout</a>';
}
elseif (isset($_SESSION['login'])) {
    echo '<a href="../primary_pages/logout.php" class="btn button3">Logout</a>';
}
else {
    echo '<a href="../login/login.php" class="btn button4">Log in</a> ';
    echo '<a href="../register/register.php" class="btn button3">Register</a>';
}
?>
      </div>
      </form>
    </div>
  </div>
</nav>
<body>
  <div class="reglog-body"> <!-- Choice where to go for panel -->
    <div class="my-form admin-select">
    <div class="form-content" style="margin:auto">
            <a href="admin_users.php" class="btn button1" style="width:250px; height:50px;" type="button">Users</a>
            <a href="admin_movies.php" class="btn button1" style="width:250px; height:50px;" type="button">Movies</a>
</div>
</div>
</div>
</body>
</html> 
