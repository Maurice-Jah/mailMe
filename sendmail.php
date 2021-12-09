<?php



$subject = $emailbody = '';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
        $from = 'Enyems Limited';
        $subject = $_POST['subject'];
        $emailbody = $_POST['emailbody'];
        $email_name = 'mauricejahwizwid@gmail.com';



            $msg = "Dear Reader, \n $emailbody";

            mail($email_name, $subject, $msg, "From:" . $from);

            echo "Your Email was sent to $email_name" . "<br>";
        
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

<label for="subject">Subject of the Email</label> <br>
<input type="text" name="subject" id="subject" size="60"> <br> <br>
<label for="emailbody">Body of the mail</label> <br> 
 <textarea name="emailbody" id="emailbody" cols="60" rows="8"></textarea> <br> <br>

<input type="submit" value="Submit">
</form>
    
</body>
</html>