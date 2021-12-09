<?php


// database connection
$db = mysqli_connect('localhost','root', '', 'mydb');

if(!$db){
    echo "no connection";
}



$firstname = $lastname = $email = '';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];


    if (!empty($firstname) && !empty($lastname) && !empty($email)) {

 // To inset into the db
        $insert = "INSERT INTO email_list (firstname, lastname, email) VALUES ('$firstname', '$lastname', '$email')";
        $sql = mysqli_query($db, $insert);

        echo $sql ? "$firstname \n  $lastname \n with email $email was inserted" : "No Insertion";


        // To delete from php
// $delete = "DELETE FROM email_list WHERE firstname = '' AND lastname = ''";
// $statement = mysqli_query($db, $delete);

// if($statement){
//     echo "Name Deleted!";
// } else{
//     echo "Name not found";
// }
    } else{
        echo "There are some missing Fields";
    }
mysqli_close($db);

}



?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subcribe</title>
</head>
<style>

    h1{
        text-align: center;
    }

    form{
        border: 2px solid #ddd;
        border-radius: 1rem;
        width: 40%;
        margin: 20px auto;
        padding: 3rem;
    }

    input{
        width: 80%;
        padding: 0.5rem;
    }

    button{
        padding: 1rem 2rem;
        border-radius: 8px;
        outline: unset;
        border: unset;
        cursor: pointer;
        background-color: #345;
        position: relative;
        bottom: -3rem;
        left: 50%;
       transform: translate(-50%, -50%);
       z-index: 130;
       color:white;
       font-size: 1rem;
    }

    

    button::before{
        position: absolute;
        content: "";
        background-color: #360732;
        width: 0%;
        height: 100%;
        top:0;
        left: 0;
        z-index: -2;
        transition: width .2s;
        border-radius: 8px;
    }

     button:hover:before{
     width: 100%;
   
    }


</style>

<body>

<h1>Subscribe to our Email List</h1>
 <form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
    <label for="firstname">FirstName:</label> <br>
    <input type="text" name="firstname" id="firstname">
    <br><br>
    <label for="lastname">Lastname:</label> <br>
    <input type="text" name="lastname" id="lastname">
    <br><br>
    <label for="email">Email Address:</label> <br>
    <input type="email" name="email" id="email">
    <br><br>

    <button type="submit">Subscribe</button>
    

</form>
    
</body>
</html>