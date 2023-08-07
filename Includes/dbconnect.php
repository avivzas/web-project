
<head>
    <link rel="stylesheet" href="/CSS/style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fmilux Hotel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="icon" href="/pic's/Gold Royal Crown Logo Vector Template.png">
</head>

<?php
$servername = "localhost";
$username = "avivsm_test";
$password = "12345";
$dbname = "avivsm_web_p";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['submit'])) {
    $full_name = $_POST['full_name'];
    $pas_num = $_POST['pas_num'];
    $email = $_POST['email'];
    $arrival_date = $_POST['arrival_date'];
    $leaving_date = $_POST['leaving_date'];
    $num_guests = $_POST['num_guests'];
    $room_type = $_POST['room_type'];

    // Validate form data
    if (empty($full_name) || empty($pas_num) || empty($email) || empty($arrival_date) || empty($leaving_date) || empty($num_guests) || empty($room_type)) {
        echo "Please fill in all fields.";
    } else {
        // Insert form data into the database
        $sql = "INSERT INTO reservetions (pas_num, full_name, email, arrival_date, leaving_date, num_guests, room_type) 
    VALUES ('$pas_num','$full_name', '$email', '$arrival_date', '$leaving_date', '$num_guests', '$room_type')";

        if ($conn->query($sql) === TRUE) {
            echo '<div class="container-fluid h-100 d-flex justify-content-center align-items-center fs-5 text-warning">';
            echo 'Thank you for submitting the form,' . $_POST['full_name'] . '. We will be in touch at ' . $_POST['email'] . '.  ';
            echo '<button class="btn bg-gradient text-warning" onclick="location.href=\'/index.html\'">Back to the home page</button>';
            echo '</div>';
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
$conn->close();
?>

</html>