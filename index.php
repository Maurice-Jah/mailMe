<?php

$name = $email = $spotted = '';




if($_SERVER['REQUEST_METHOD']== 'POST')
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $spotted = $_POST['spotted']; 



    $msg = "$name\r\n" . '<br>' .
    "$email\r\n" .  '<br>' .
    "$spotted\n" ;


    $to = "mauricejahwizwid@gmail.com";
    $subject = "My Abduction";

    mail($to, $subject, $msg, 'From:' . $email);

    echo "Message Sent Yes!";



    // $db = mysqli_connect('localhost','root', '',"mydb");

    // if($db){
    //    echo "Thanks for submitting" . "<br>";
    // } else{
        
    //  die('Error connecting to the db');
    // }


    // insert query

    // $sql = "INSERT INTO alienabduction(firstname, email, spotted) VALUES ('$name', '$email', '$spotted')";

    // $query = mysqli_query($db, $sql);

    //  echo ($query) ?  "wron": "e";

    //  $sql = "SELECT * FROM alienabduction WHERE spotted = 'yes' ";
    //  var_dump($sql);
   

    //  mysqli_close($db);



   
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report Abduction</title>
</head>
<body>

<h2>My dog was abducted!</h2>

<form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">

   <label for="firstname">Firstname:</label>
   <input type="text" name="name" id="firstname"> <br> <br>
   <label for="email">Email:</label>
   <input type="email" name="email" id="email">  <br> <br>
   <label for="seen">Have you seen my dog</label>
  Yes <input type="radio" name="spotted" id="seen" value="yes">
  No <input type="radio" name="spotted" id="seen" value="no"> <br> <br>

  <input type="submit" value="Report" name="submit">

</form>
    
</body>
</html>