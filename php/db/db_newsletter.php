<?php
session_start();

require_once 'db_connect.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $surname = mysqli_real_escape_string($conn, $_POST['surname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);

    $checkEmail = "SELECT * FROM NewsletterSubscriptions WHERE email = '$email'";
    $checkResult = mysqli_query($conn, $checkEmail);

    if(mysqli_num_rows($checkResult) > 0) {
        $_SESSION['message'] = 'Uz šo epastu jau tiek sūtīti jaunumi';
    } else {
        $sql = "INSERT INTO NewsletterSubscriptions (name, surname, email, phone) VALUES ('$name', '$surname', '$email', '$phone')";
        if(mysqli_query($conn, $sql)) {
            $_SESSION['message'] = 'Pieteikšanās veiksmīga';
        } else {
            $_SESSION['message'] = "Kļūda: " . $sql . "<br>" . mysqli_error($conn);
        }
    }

    mysqli_close($conn);
    header("Location: ../../index.php");
}

?>