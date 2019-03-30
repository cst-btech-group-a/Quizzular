<?php

$conn = mysqli_connect('127.0.0.1', 'root', '1234') or
	die(mysqli_connect_error());
mysqli_select_db($conn, 'quizzular') or
	die(mysqli_error($conn));

mysqli_query($conn, "
CREATE TABLE IF NOT EXISTS quizzes (
  id int not null primary key,
  quiz_name VARCHAR(250) not null
  )
")or die(mysqli_error($conn));

?>

<!doctype html>
<html>

<head>
  <link href='//fonts.googleapis.com/css?family=Lato:300' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="css/style.css">
  <script src="js/scripts.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <title>
    Quizzular
  </title>
</head>

<body>
  <div id="nav">
    <div id="nav_wrapper">
      <ul>
        <li><a href="index.html">Home</a></li>
        <li><a href="new_quiz.php">New Quiz</a></li>
        <li><a href="quiz_list.php">Quiz List</a></li>
        <li><a href="quiz_results.php">View Results</a></li>
      </ul>
    </div>
  </div>
  <h1>Quiz Creation</h1>
  <div id="main">
  <div class="sectionbox box">
      Quiz Title<br><textarea type='text' name='title' placeholder='Enter Quiz Title'></textarea><br><br>
      Question<br><textarea type='text' name='question0' placeholder='Enter Question'></textarea><br><br>
      Answer<br><textarea type='text' name='answer0' placeholder='Enter Answer'></textarea><br><br>
      Answer Type
      <select id="answerType0" name='answer_type0' onchange="addAnswers(this.id)" value="Add Forms">
        <option>Enter Answer Type</option>
        <option>Multiple Choice</option>
        <option>True or False</option>
      <select>
        <div id="answers0"></div>
  </div>
</div>

<div style="margin-top: 20px; text-align:center;">
  <button type="button" class="btn btn-success" onclick="addQuestion()">Add Question</button>
  <button type="button" class="btn btn-success" onclick="submitQuiz()">Submit Quiz</button>
</div>


</body>

</html>
