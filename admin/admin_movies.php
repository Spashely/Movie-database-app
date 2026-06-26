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

<?php include("../primary_pages/connection/connection.php");
if(isset($_POST['update'])) /* Update function */
{
    $UpdateQuery = "UPDATE Movies2 SET Title='$_POST[Title]', Stock='$_POST[Stock]', Age_rating='$_POST[Age_rating]', Description='$_POST[Description]' WHERE ID='$_POST[hidden]'";
    mysqli_query($connection, $UpdateQuery);
}

if(isset($_POST['delete'])) /* Delete function */
{
    $DeleteQuery = "DELETE FROM Movies2 WHERE ID='$_POST[hidden]'";
    mysqli_query($connection, $DeleteQuery);
}

if(isset($_POST['add'])) /* Add function */
{
  $title = $_POST['ID'];
  $pic = $_FILES['Photo']['name'];
    $AddQuery = "INSERT INTO Movies2 (Title,Stock,Age_rating,Description, Image) VALUES ('$_POST[AddTitle]', '$_POST[AddStock]', '$_POST[AddAge]', '$_POST[AddDescription]', '$pic')";
    mysqli_query($connection, $AddQuery);
    if (move_uploaded_file($_FILES['Photo']['tmp_name'], "../images/" . $_FILES['Photo']['name'])) {
      echo "Uploaded";
    } else {
      echo "Not uploaded";
    }
}



$result = mysqli_query($connection, "SELECT * FROM Movies2");

/* Dynamic table from DB */

echo "<table border=1 class='admin-table'> 
<tr>
<th>Title</th>
<th>Stock</th>
<th>Age rating</th>
<th>Description</th>
</tr>";

while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    echo "<tr>";
    echo "<form action='admin_movies.php' method='post'>";
    echo "<td><input type='text' name='Title' value='" . $row['Title'] . "'></td>";
    echo "<td><input type='text' name='Stock' value ='" . $row['Stock'] . "'></td>";
    echo "<td><input type='text' name='Age_rating' value ='" . $row['Age_rating'] . "'></td>";
    echo "<td><textarea name='Description' class='admin-table-textarea' rows='3'>" . htmlspecialchars($row['Description']) . "</textarea></td>";
    echo "<input type='hidden' name='hidden' value ='" . $row['ID'] . "'>";
    echo "<td><input type='submit' name='update' value='update' class='btn button1'></td>"; /* Update execution */
    echo "<td>";
echo "<button type='button' class='btn button1' data-bs-toggle='modal' data-bs-target='#deleteModal-".$row['ID']."'>Delete</button>"; /* Delete execution */    
echo "</td>";
echo "</form>";
    echo "</tr>";

        /* Pop up message confirmation */
    echo "
    <div class='modal fade' id='deleteModal-".$row['ID']."' tabindex='-1' aria-labelledby='deleteModalLabel-".$row['Title']."' aria-hidden='true'>
      <div class='modal-dialog'>
        <div class='modal-content'>
          <div class='modal-header'>
            <h5 class='modal-title' id='deleteModalLabel-".$row['ID']."'>Confirm</h5>
            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
          </div>
          <div class='modal-body'>
            Are you sure you want to delete <strong>".$row['Title']."</strong>?
          </div>
          <div class='modal-footer'>
            <button type='button' class='btn button1' data-bs-dismiss='modal'>Cancel</button>
            <form action='admin_movies.php' method='post'>
              <input type='hidden' name='hidden' value='".$row['ID']."'>
              <button type='submit' name='delete' class='btn button3'>Delete</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    ";
}

echo "<tr>";
echo "<form action='admin_movies.php' method='post' enctype='multipart/form-data'>"; /*Add execution */
echo "<td><input type='text' name='AddTitle' required></td>";
echo "<td><input type='text' name='AddStock' required></td>";
echo "<td><input type='text' name='AddAge' required></td>";
echo "<td><textarea name='AddDescription' required rows='3' class='admin-table-textarea'></textarea></td>";
/* File upload */
echo "<td>
  <div style='display:flex; flex-direction:column; align-items:flex-start;'>
    <input type='file' name='Photo' id='Photo' style='width:150px;' onchange='document.getElementById(\"file-name\").textContent=this.files[0]?.name || \"No file chosen\"'>
    <div id='file-name' style='margin-top:5px; font-size:14px; color:#333;'></div>
  </div>
</td>";
echo "<td><input type='submit' name='add' value='add' class='btn button3'></td>";
echo "</form>";
echo "</tr>";

echo "</table>";

mysqli_close($connection);

?>

</body>