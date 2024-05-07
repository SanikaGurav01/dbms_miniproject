<?php

$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "quiz";
$conn = "";

//$sql = "SELECT question FROM quiz_table WHERE keyanswer = '$question1'";

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

$sql = "DELETE FROM result_data WHERE result_id>0";
mysqli_query($conn,$sql);

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $question1 = filter_input(INPUT_POST,"question1",FILTER_SANITIZE_SPECIAL_CHARS);
    $question2 = filter_input(INPUT_POST,"question2",FILTER_SANITIZE_SPECIAL_CHARS);
    $question3 = filter_input(INPUT_POST,"question3",FILTER_SANITIZE_SPECIAL_CHARS);
    $question4 = filter_input(INPUT_POST,"question4",FILTER_SANITIZE_SPECIAL_CHARS);
    $question5 = filter_input(INPUT_POST,"question5",FILTER_SANITIZE_SPECIAL_CHARS);

        $sql = "SELECT question FROM quiz_table WHERE keyanswer = '$question1'";
        $result1= mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result1);
        $question = $row['question'];
        $your_answer = $question1;
        $sql = "SELECT keyanswer FROM quiz_table WHERE question='$question' AND correct = 1 ";
        $result2= mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result2);
        $correct_answer = $row['keyanswer'];
        if($correct_answer== $question1)
        {
          $output="CORRECT";
        }
        else{
          $output="WRONG";
        }
        
        $sql = "INSERT INTO result_data (question, your_answer, correct_answer, output)
        VALUES ('$question','$your_answer', '$correct_answer', '$output')";
        mysqli_query($conn,$sql);


        //******************************* */

        $sql = "SELECT question FROM quiz_table WHERE keyanswer = '$question2'";
        $result1= mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result1);
        $question = $row['question'];
        $your_answer = $question2;
        $sql = "SELECT keyanswer FROM quiz_table WHERE question='$question' AND correct = 1 ";
        $result2= mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result2);
        $correct_answer = $row['keyanswer'];
        if($correct_answer== $question2)
        {
          $output="CORRECT";
        }
        else{
          $output="WRONG";
        }
        
        $sql = "INSERT INTO result_data (question, your_answer, correct_answer, output)
        VALUES ('$question','$your_answer', '$correct_answer', '$output')";
        mysqli_query($conn,$sql);


        $sql = "SELECT question FROM quiz_table WHERE keyanswer = '$question3'";
        $result1= mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result1);
        $question = $row['question'];
        $your_answer = $question3;
        $sql = "SELECT keyanswer FROM quiz_table WHERE question='$question' AND correct = 1 ";
        $result2= mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result2);
        $correct_answer = $row['keyanswer'];
        if($correct_answer== $question3)
        {
          $output="CORRECT";
        }
        else{
          $output="WRONG";
        }
        
        $sql = "INSERT INTO result_data (question, your_answer, correct_answer, output)
        VALUES ('$question','$your_answer', '$correct_answer', '$output')";
        mysqli_query($conn,$sql);


        $sql = "SELECT question FROM quiz_table WHERE keyanswer = '$question4'";
        $result1= mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result1);
        $question = $row['question'];
        $your_answer = $question4;
        $sql = "SELECT keyanswer FROM quiz_table WHERE question='$question' AND correct = 1 ";
        $result2= mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result2);
        $correct_answer = $row['keyanswer'];
        if($correct_answer== $question4)
        {
          $output="CORRECT";
        }
        else{
          $output="WRONG";
        }
        
        $sql = "INSERT INTO result_data (question, your_answer, correct_answer, output)
        VALUES ('$question','$your_answer', '$correct_answer', '$output')";
        mysqli_query($conn,$sql);
            

        $sql = "SELECT question FROM quiz_table WHERE keyanswer = '$question5'";
        $result1= mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result1);
        $question = $row['question'];
        $your_answer = $question5;
        $sql = "SELECT keyanswer FROM quiz_table WHERE question='$question' AND correct = 1 ";
        $result2= mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result2);
        $correct_answer = $row['keyanswer'];
        if($correct_answer== $question5)
        {
          $output="CORRECT";
        }
        else{
          $output="WRONG";
        }
        
        $sql = "INSERT INTO result_data (question, your_answer, correct_answer, output)
        VALUES ('$question','$your_answer', '$correct_answer', '$output')";
        mysqli_query($conn,$sql);
        header("Location: result.php");
        exit(); // Ensure subsequent code is not executed after redirection

        
  
}

mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>DBQuiz - Quiz</title>
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
  .question {
    margin-bottom: 20px;
  }
  .options {
    display: flex;
    flex-direction: column;
  }
  .option {
    margin-bottom: 10px;
  }
  input[type="submit"] {
    width: 100%;
    padding: 10px;
    border: none;
    border-radius: 5px;
    background-color: #4CAF50;
    color: white;
    font-size: 16px;
    cursor: pointer;
  }
  input[type="submit"]:hover {
    background-color: #45a049;
  }
</style>
</head>
<body>

<div class="container">
  <h1>DBQuiz</h1>

  <br><br>
  <form action="" method="post">
    <div class="question">
      <p>1. What is the function of the SQL command "DELETE"?</p>
      <div class="options">
        <label class="option"><input type="radio" name="question1" value="Modify" required> Modify</label>
        <label class="option"><input type="radio" name="question1" value="Add"> Add</label>
        <label class="option"><input type="radio" name="question1" value="Remove"> Remove</label>
        <label class="option"><input type="radio" name="question1" value="Retrieve"> Retrieve</label>
      </div>
    </div>
    <div class="question">
      <p>2. Which type of key uniquely identifies a record within a table?</p>
      <div class="options">
        <label class="option"><input type="radio" name="question2" value="Primary" required> Primary</label>
        <label class="option"><input type="radio" name="question2" value="Index"> Index</label>
        <label class="option"><input type="radio" name="question2" value="Foreign"> Foreign</label>
        <label class="option"><input type="radio" name="question2" value="Unique"> Unique</label>
      </div>
    </div>
    <div class="question">
      <p>3. Which of the following is not a property of ACID in database management?</p>
      <div class="options">
        <label class="option"><input type="radio" name="question3" value="Atomicity" required> Atomicity</label>
        <label class="option"><input type="radio" name="question3" value="Consistency"> Consistency</label>
        <label class="option"><input type="radio" name="question3" value="Independence"> Isolation</label>
        <label class="option"><input type="radio" name="question3" value="Durability"> Durability</label>
      </div>
    </div>
    <div class="question">
      <p>4. What type of database model organizes data in form of tables?</p>
      <div class="options">
        <label class="option"><input type="radio" name="question4" value="Network" required> Network</label>
        <label class="option"><input type="radio" name="question4" value="Relational"> Relational</label>
        <label class="option"><input type="radio" name="question4" value="Hierarchical"> Hierarchical</label>
        <label class="option"><input type="radio" name="question4" value="Object-oriented"> Object-oriented</label>
      </div>
    </div>
    <div class="question">
      <p>5. Which command is used to retrieve data from a database table in SQL?</p>
      <div class="options">
        <label class="option"><input type="radio" name="question5" value="SELECT" required> SELECT</label>
        <label class="option"><input type="radio" name="question5" value="UPDATE"> UPDATE</label>
        <label class="option"><input type="radio" name="question5" value="INSERT"> INSERT</label>
        <label class="option"><input type="radio" name="question5" value="DELETE"> DELETE</label>
      </div>
    </div>
    <input type="submit" value="Submit">
  </form>
</div>

</body>
</html>




