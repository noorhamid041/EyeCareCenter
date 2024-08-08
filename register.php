<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "EyeCareCenter";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $birthday = $_POST['birthday'];
    $email = $_POST['email'];
    $city = $_POST['city'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $registration_date = date("Y-m-d");

    $sql = "INSERT INTO Users (first_name, last_name, birthday, email, city, gender, age, registration_date, username, password) 
            VALUES ('$first_name', '$last_name', '$birthday', '$email', '$city', '$gender', '$age', '$registration_date', '$username', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
