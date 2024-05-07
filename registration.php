<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>DBQuiz Registration</title>
<style>
  body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
  }
  .container {
    max-width: 600px;
    margin: 50px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }
  h1 {
    text-align: center;
    color: #333;
  }
  input[type="text"], input[type="email"], input[type="submit"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
    font-size: 16px;
  }
  input[type="submit"] {
    background-color: #4CAF50;
    color: white;
    border: none;
    cursor: pointer;
  }
  input[type="submit"]:hover {
    background-color: #45a049;
  }
</style>
</head>
<body>

<div class="container">
  <h1>DBQuiz Registration</h1>
  <!-- <form action="./quiz.php" method="post"> -->
  <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">

    <input type="text" name="name" placeholder="Your Name" required>
    <input type="email" name="email" placeholder="Your Email" required>
    <input type="text" name="city" placeholder="Your City" required>
    <input type="text" name="country" placeholder="Your Country" required>
    <input type="submit" value="Submit">
    <br><br>
  </form>
</div>
<br><br>

</body>
</html>

<?php

$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "quiz";
$conn = "";

try{
    $conn=mysqli_connect($db_server,
                        $db_user,
                        $db_pass,
                        $db_name);
}
catch(mysqli_sql_exception)
{
    echo"Error Connecting";
}
if($conn)
{
    echo"";
}

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $name = filter_input(INPUT_POST,"name",FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST,"email",FILTER_SANITIZE_SPECIAL_CHARS);
    $city = filter_input(INPUT_POST,"city",FILTER_SANITIZE_SPECIAL_CHARS);
    $country = filter_input(INPUT_POST,"country",FILTER_SANITIZE_SPECIAL_CHARS);



    if(empty($name))
    {
        echo "<p><center>please enter a name.</center></p>";
    }
    else if(empty($email))
    {
        echo "<p><center>please enter email.</center></p>";
        
    }
    else if(empty($city))
    {
        echo "<p><center>please enter city.</center></p>";
        
    }
    else if(empty($country))
    {
        echo "<p><center>please enter country.</center></p>";
        
    }
    else
    {

      $sql_check = "SELECT COUNT(*) AS count FROM register_data WHERE name = '$name' AND email = '$email'";
      $result_check = mysqli_query($conn, $sql_check);
      $row_check = mysqli_fetch_assoc($result_check);
      $count = $row_check['count'];
      if($count > 0)
      {
        echo"<p><center>Other registration is already been done on this name and email ! </center></p>";

      }
      else
      {
        $sql = "INSERT INTO register_data (name, email, city, country)
        VALUES ('$name','$email', '$city', '$country')";

        try
        {
            mysqli_query($conn,$sql);
            echo "<p><center>You have registered successfully</center></p>";
            // Redirect to quiz.php
            header("Location: quiz.php");
            exit(); // Ensure subsequent code is not executed after redirection
        }
        catch(mysqli_sql_exception)
        {

            echo "<p><center>Candidate with this name and email has already is taken !</center></p>";

        }
    }
      }
  }

mysqli_close($conn);

?>