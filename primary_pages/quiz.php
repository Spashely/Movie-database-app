<!DOCTYPE html>
<html>
      <?php
session_start();
?>
    <head>
        <title>Quiz</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/stylesheet.css?v=<?= time() ?>">
        <meta charset="UTF-8">
        <meta name="description" content="Greatest movies to find ...">
        <meta name="author" content="Ivan Kompaniiets">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style> /* Style */

.app  {
    background: #fff;
    width: 90%;
    max-width: 600px;
    margin: 100px auto 0;
    border-radius: 10px;
    padding: 30px;
}

.app h1  {
     font-size: 25px;
     color: #001e4d;
     font-weight: 600;
     border-bottom: 1px solid #333;
     padding-bottom: 30px;     
}

.quiz  {
    padding: 20px 0;

}

.quiz h2  {
    font-size: 18px;
    color: #001e4d;
    font-weight: 600;
}

#next-btn  {
    background-color:white;
    border-color:#EF8600;
    border-radius: 10px;
    border-width:1.5px;
    padding: 8px 20px;
    transition: 0.3s ease;
    color:#016394;
    font-size: clamp(0.9rem, 2vw, 1.2rem); 
}

#next-btn:hover {
    background-color:#EF8600;
    border-color:#EF8600;
    border-radius: 10px;
    padding: 8px 20px;
    transition: 0.3s ease;
    color:white;
    font-size: clamp(0.9rem, 2vw, 1.2rem); 
}

.btn {
  background-color:white;
  border-color:#016394;
    border-radius: 10px;
    border-width:1.5px;
    padding: 8px 20px;
    transition: 0.3s ease;
    color:black;
    font-size: clamp(0.9rem, 2vw, 1.2rem); 
}

.btn:hover {
    background-color:#016394;
    border-color:#016394;
    border-width:1.5px;
    border-radius: 10px;
    padding: 8px 20px;
    transition: 0.3s ease;
    color:white;
    font-size: clamp(0.9rem, 2vw, 1.2rem);  
}

.button1:hover:not([disabled])  {
    background: #222;
    color: #fff;
}

.button1:disabled {
    cursor: no-drop;
}

.correct {
    background: #9aeabc !important; 

}

.incorrect {
    background: #ff9393 !important;

}

            </style>
    </head>
    <body>
              <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
                      <?php
          if(isset($_SESSION['Age']) && $_SESSION['Age'] < 18){
    echo "<nav class='navbar navbar-expand-lg' style='background-color: #FF7F50!important;'>";
} 
else { 
  echo "<nav class='navbar navbar-expand-lg'>";
 } 
 ?>
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
    echo '<a href="logout.php" class="btn button3">Logout</a>';
}
elseif (isset($_SESSION['login'])) {
    echo '<a href="logout.php" class="btn button3">Logout</a>';
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
        <div class="app"> 
            <h1>Simple Quiz</h1>
            <div class="quiz">
                <h2 id="question">Question goes here</h2>
                <div id="answer-buttons">
                    <button class="btn">Answer 1</button>
                    <button class="btn">Answer 2</button>
                    <button class="btn">Answer 3</button>
                    <button class="btn">Answer 4</button>
                </div>
                <button id="next-btn">Next</button>
            </div>
        </div>

        <script src="script.js"></script>


    </body>
</html>