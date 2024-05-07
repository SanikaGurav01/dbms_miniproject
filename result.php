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

$sql = "SELECT output FROM result_data WHERE output = 'CORRECT'";
$result1= mysqli_query($conn,$sql);
$marks = 0;

while($row = mysqli_fetch_assoc($result1)) {
  $marks=$marks+2;
}
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>DBQuiz - Result</title>
<style>
  body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
    color: #333;
  }
  .container {
    max-width: 800px;
    margin: 50px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }
  h1 {
    text-align: center;
    color: #333;
    margin-bottom: 20px;
  }
  table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
  }
  th, td {
    border: 1px solid #ccc;
    padding: 10px;
    text-align: left;
  }
  th {
    background-color: #f2f2f2;
  }
  .marks {
    text-align: center;
    margin-bottom: 20px;
  }
  .passed {
    color: green;
    font-weight: bold;
  }
  .failed {
    color: red;
    font-weight: bold;
  }

</style>
</head>
<body>

<div class="container">
  <h1>DBQuiz - Result</h1>

  <?php
    // PHP code for processing quiz answers
    $db_server = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "quiz";
    $conn = "";

    try {
      $conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);
    } catch (mysqli_sql_exception $e) {
      echo "Error Connecting";
    }

    if ($conn) {
      echo "";
    }


   
  ?>

  <h2>Quiz Result</h2>
  
    <!-- Display marks and pass/fail status -->
  <div class="marks">
    <h2>
      <?php 
      echo"You have scored $marks/10 ";
      ?>
     </h2>
    <table>
    <?php

      $sql= "SELECT * FROM result_data";
      $result = mysqli_query($conn, $sql);
      if(mysqli_num_rows($result)>0)
  {
      echo "<table border='1'>";
      echo "<tr><th></th><th>Your Answer</th><th>Correct Answer</th><th>Output</th></tr>";
      
      while($row = mysqli_fetch_assoc($result)) {
          echo "<tr>";
          echo "<td>" . $row['question'] . "</td>";
          echo "<td>" . $row['your_answer'] . "</td>";
          echo "<td>" . $row['correct_answer'] . "</td>";
          echo "<td>" . $row['output'] . "</td>";
          echo "</tr>";
      }
    }

    
    ?>
    </table>
    <!-- echo "</table>"; -->
    <!-- <p>Your marks are $marks.</p> -->
  </div>


  <h2><center>
      <?php 
      if($marks>=6)
      {
      echo"Congratulation , You have passed !";
      }
      else{
      echo"Unfortunately,you have failed please try again ! ";
      }
      

      $sql_max_reg_id = "SELECT MAX(reg_id) AS max_reg_id FROM register_data";
      $result_max_reg_id = mysqli_query($conn, $sql_max_reg_id);
      $row_max_reg_id = mysqli_fetch_assoc($result_max_reg_id);
      $max_reg_id = $row_max_reg_id['max_reg_id'];

      if ($max_reg_id !== null) {
        $sql_insert_marks = "UPDATE register_data SET marks = $marks WHERE reg_id = $max_reg_id";
      } else {
        $sql_insert_marks = "INSERT INTO register_data (marks) VALUES ($marks)";
      }

      mysqli_query($conn, $sql_insert_marks);

      ?>
      </center>
     </h2>

</div>

</body>
</html>



<?php




mysqli_close($conn);

?>