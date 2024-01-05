<?php
$insert =false;
if(isset($_POST['name'])){
    $server = "localhost";
    $username = "root";
    $password = "";
    $database="trip";
    $con = mysqli_connect($server, $username, $password, $database);
    if(!$con){
        die("connection to this database failed due to". mysqli_connect_error());
    }
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];
$sql="INSERT INTO `trip` (`name`, `age`, `gender`, `email`, `phoneno`, `other`, `date`) VALUES ( '$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";
// echo $sql;
if($con->query($sql)==true){
    // echo "Successfully inserted";
    $insert=true;
}
else{
    echo "ERROR: $sql <br> $con->error";
}
$con->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to travel form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Welcome to ABES Institute Of Technology US Trip form</h1>
        <p>Enter your details and submit this form to confirm your participation in the trip</p>
        <?php
            if($insert == true){
            echo "<p class='submitMsg'>Thanks for submitting your form. We are happy to see you joining us for the US trip</p>";
            }
        ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Name">
            <input type="number" name="age" id="age" placeholder="age">
            <input type="text" name="gender" id="gender" placeholder="Gender">
            <input type="email" name="email" id="email" placeholder="Email">
            <input type="number" name="phone" id="phone" placeholder="Phone No.">
            <textarea name="desc" cols="30" rows="10" placeholder="Information"></textarea>
            <button class="btn">Submit</button>
        </form>
    </div>
</body>
</html>