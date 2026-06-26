<?php include("../primary_pages/connection/connection.php");

$name = $_POST["Name"];
$password = $_POST["Password"];
$error = "Wrong credentials, please try again.";
/* Functionality */
$checklog = mysqli_query($connection, "SELECT * FROM Login2 WHERE Name='$name' && Password = '$password'");
$checkadmin = mysqli_query($connection, "SELECT * FROM Admin WHERE Name='$name' && Password = '$password'");

if (mysqli_num_rows($checkadmin) ==1){ /* If user is admin */
    session_start();
    $_SESSION["admin"]=$name;
    header("Location:../admin/admin.php");
    exit;
}

if(mysqli_num_rows($checklog) == 1){ /* If details are correct */
    session_start();
	$_SESSION["login"]=$name;
    $check=mysqli_query($connection, "SELECT * FROM Login2 WHERE Name = '$name'");
$age_check = mysqli_fetch_array($check, MYSQLI_ASSOC);
$birthday = $age_check['DoB'];
list($year, $month, $day) = explode("-", $birthday);
$birthday = mktime(0, 0, 0, $month, $day, $year);
$difference = time() - $birthday;
$_SESSION['Age'] = (int)floor($difference / 31556926);
	header("Location:../primary_pages/index.php");
    exit;
}
else { /* If details are incorrect */
    echo "<script>
        alert('Wrong credentials, please try again.');
        window.history.back();
    </script>";
}
