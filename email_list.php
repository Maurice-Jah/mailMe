<?php


$db = mysqli_connect('localhost','root', '', 'mydb');
echo $db ? "Connected" : die("Connection Lost");


$firstname = $lastname = $email = '';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];


    $sql = "INSERT INTO email_list(firstname, lastname, email) VALUES ('$firstname', '$lastname', '$email')";

    $query = mysqli_query($db, $sql);


   

    mysqli_close($db);


   
}



?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Store</title>
</head>
<body>


<h1>Subscribe to our Channel</h1>
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">

<label for="firstname">Firstname</label> <br>
<input type="text" name="firstname" id="firstname"> <br> <br>
<label for="lastname">Lastname</label> <br> 
<input type="text" name="lastname" id="lastname"> <br> <br>
<label for="email">Email Address </label> <br>
<input type="email" name="email" id="email"> <br> <br>
<input type="submit" value="Submit">
</form>
    
</body>
</html>