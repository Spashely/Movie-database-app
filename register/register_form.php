<?php include("../primary_pages/connection/connection.php");

/* Data collection */
$name = $_POST["Name"];
$password = $_POST["Password"];
$confirm_password = $_POST["Confirm_password"];
$email = $_POST["Email"];
$dob = $_POST["DoB"];
$checkem = mysqli_query($connection, "SELECT * FROM Login2 WHERE Email='$email'");

$insert = mysqli_query($connection, "SELECT * FROM Login2 WHERE Name='$name'"); /* If username exists */
if(mysqli_num_rows($insert) > 0) {
                        echo "<script>
        alert('Username already exists');
        window.history.back();
    </script>";
    }
else{        
    if($password==$confirm_password) {
        if (mysqli_num_rows($checkem) == 0) { /*If everything is fine */
        mysqli_query($connection, "INSERT INTO Login2 (Name, Password, Email, DoB) VALUES ('$name', '$password', '$email', '$dob')");
        header("Location: success.php");
        exit;
        }
        else { /* If email exists */
                echo "<script>
        alert('Stated email already exists');
        window.history.back();
    </script>";
        }
        }
        else { /* If passwords do not match */
                echo "<script>
        alert('Passwords do not match');
        window.history.back();
    </script>";
        }
    }
