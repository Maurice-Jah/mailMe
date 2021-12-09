<?php


// database connection
$db = mysqli_connect('localhost','root', '', 'mydb');

?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Newsletter Page</title>
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

    input:not([type='checkbox']), textarea{
        width: 80%;
        padding: 0.5rem;
    }

    button{
        padding: 1rem 2rem;
        border-radius: 2rem;
        outline: unset;
        border: unset;
        cursor: pointer;
        background-color: #345;
        color:white;
        font-size: 1rem;
        position: relative;
        bottom: -3rem;
        left: 50%;
       transform: translate(-50%, -50%);
    }

   

</style>

<body>

<h1>Please Select the Email to be reomved</h1>

 <form action="<?php $_SERVER['PHP_SELF'];?>" method="post">

 <?php
 
    
    $sql = 'SELECT * FROM email_list';
    $query = mysqli_query($db, $sql);

  while($row = mysqli_fetch_array($query)){
    $firstname = $row['firstname'];
    $lastname = $row['lastname'];
    $email = $row['email'];
    $id = $row['id'];

    echo "<input type = 'checkbox' name = 'toDelete[]' value = '$id'>";
    echo "$firstname $lastname $email ";
    echo "<br>";
}  

if(isset($_POST['submit'])){
    foreach($_POST['toDelete'] as $deleteId){
       $query = "DELETE FROM email_list WHERE id = $deleteId";
       mysqli_query($db, $query);
    }
    echo "Customer Removed";
    }



?>
    <button type="submit" name="submit">Remove</button>
</form>
    
</body>
</html>