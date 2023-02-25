<?php
  $insert = false;
if(isset($_POST['name'])){
   //set connection variables
   $server = "localhost";
   $username = "root";
   $password = "";
  //create a connection
   $con = mysqli_connect($server,$username,$password);
//    check for connection success
   if(!$con)
   {
    die("connection to this database failed due to ".mysqli_connect_error());
   }
//    echo "Success connecting to the db";
// collect post variables
$name = $_POST['name'];
$gender = $_POST['gender'];
$age = $_POST['age'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$desc = $_POST['desc'];
       $sql= "INSERT INTO `trip`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES
       ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());
      ";
    //   echo $sql;
    //   execute the query
      if($con->query($sql) == true){
        // echo "successfully inserted";
        // flag for sucessful insertion
        $insert = true;
      }
      else{
        echo "ERROR: $sql <br> $con->error";
       

      }
    //   close the db connection
      $con->close();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;500&family=Poppins:ital,wght@0,200;1,500&family=Shantell+Sans:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="SJCET" src="https://images.unsplash.com/photo-1527142879-95b61a0b8226?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxleHBsb3JlLWZlZWR8Nzd8fHxlbnwwfHx8fA%3D%3D&auto=format&fit=crop&w=500&q=60" alt="SJCET PALAI" srcset="">
    <div class="container">
        <h1>WANDERLUST</h1>
        <p>Enter your details and submit this form to confirm your participation in trip</p>
        <?php
        if($insert == true)
        {
        echo "<p class='submitMsg'>Thank You for your response</p>";
        }
       ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="age" id="age" placeholder="Enter your age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone no.">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other info here"></textarea>
            <button class="btn">Submit</button>
           
         </form>
    </div>
    <script src="index.js"></script>
    
</body>
</html>