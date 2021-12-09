<?php


// database connection
$db = mysqli_connect('localhost','root', '', 'mydb');

$message = $subject = '';
if(isset($_POST['submit'])){
    $from = "Mauricejahwizwid@gmail.com";
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $output_form = false;


    if((empty($subject)) && (empty($message))){
        echo "You forgot the Subject and Message form <br>";
        $output_form = true;
    }

    if(!empty($subject) && empty($message)){
        echo "You forgot the Message form <br>";
        $output_form = true;
    }

    if(empty($subject) && !empty($message)){
        echo "You forgot the Subject form <br>";
        $output_form = true;
    }

    $sql = 'SELECT * FROM email_list';
    $query = mysqli_query($db, $sql);

  while($row = mysqli_fetch_array($query)){
    $firstname = $row['firstname'];
    $lastname = $row['lastname'];
    $to = $row['email'];

    $msg = "Dear $firstname $lastname, \n $message";

    if(!empty($subject) && !empty($message)){
           $send = mail($to,$subject,$msg, "From:" . $from);
    }
    // if($send){
    //     echo "Sent";
    // } else{
    //     echo "Not sent";
    // }

}  

}else{
    $output_form = true;
}




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

    input, textarea{
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

<h1>Lattest News</h1>

<?php if($output_form){

?>
 <form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
    <label for="subject">Subject:</label> <br>
    <input type="text" name="subject" id="subject" value="<?php echo $subject;?>">
    <br><br>
    <label for="message">Message:</label> <br>
      <textarea name="message" id="message" cols="30" rows="10"><?php echo $message;?></textarea>
    <br><br>
    <button type="submit" name="submit">Send</button>
</form>
<?php
  }

  
?>
    
</body>
</html>