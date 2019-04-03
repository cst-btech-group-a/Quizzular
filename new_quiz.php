<?php

$conn = mysqli_connect('127.0.0.1', 'root', '1234') or
	die(mysqli_connect_error());
mysqli_select_db($conn, 'quizzular') or
	die(mysqli_error($conn));

mysqli_query($conn, "
CREATE TABLE IF NOT EXISTS quizzes (
  id int not null auto_increment,
 	quiz_name VARCHAR(250) not null,
	PRIMARY KEY (id)
  )
")or die(mysqli_error($conn));


// mysqli_query($conn, "
// DROP TABLE questions
// ")or die(mysqli_error($conn));
//
// mysqli_query($conn, "
// CREATE TABLE IF NOT EXISTS questions (
//   id int not null auto_increment,
//   quiz_id int not null,
// 	question_text VARCHAR(250) not null,
// 	PRIMARY KEY (id)
//   )
// ")or die(mysqli_error($conn));
//
// mysqli_query($conn, "
// CREATE TABLE IF NOT EXISTS answers (
//   id int not null auto_increment,
//   questions_id int not null,
// 	answer_text VARCHAR(250) not null,
// 	score int not null,
// 	PRIMARY KEY (id)
//   )
// ")or die(mysqli_error($conn));
//
// mysqli_query($conn, "
// INSERT INTO questions (Quiz_id,Question_text) VALUES(1,'Best Colour?')
// ")or die(mysqli_error($conn));
//
// mysqli_query($conn, "
// INSERT INTO questions (Quiz_id,Question_text) VALUES(1,'Worst Colour?')
// ")or die(mysqli_error($conn));
//
// mysqli_query($conn, "
// INSERT INTO answers (questions_id,answer_text,score) VALUES(1,'Red', 100)
// ")or die(mysqli_error($conn));
//
// mysqli_query($conn, "
// INSERT INTO answers (questions_id,answer_text,score) VALUES(1, 'Yellow', 0)
// ")or die(mysqli_error($conn));
//
// mysqli_query($conn, "
// INSERT INTO answers (questions_id,answer_text,score) VALUES(2, 'Red', 0)
// ")or die(mysqli_error($conn));
//
// mysqli_query($conn, "
// INSERT INTO answers (questions_id,answer_text,score) VALUES(2, 'Yellow', 100)
// ")or die(mysqli_error($conn));

?>

<!doctype html>
<html>

<head>
  <link href='//fonts.googleapis.com/css?family=Lato:300' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="css/style.css">
  <script src="js/scripts.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
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
  <h1>Quiz Title</h1>
	<div style='text-align: center;'><textarea type='text' name='title' placeholder='Enter Quiz Title'></textarea></div>
  <div id="main">
  <div class="sectionbox box">
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
  <button type="button" class="btn btn-success" onclick="sendData()">Submit Quiz</button>
</div>


<script>


var sendData = function() {


var data = [
[],[],[]
];


var qTitle = document.getElementsByName("title")[0].value;
data[0].push(qTitle);

var question0 = document.getElementsByName("question0")[0].value;
var answer1 = document.getElementsByName("answer0")[0].value;
var answer_type0 = document.getElementsByName("answer_type0")[0].value;

data[1].push(question0,answer1);
if (answer_type0 == "Multiple Choice")
{
	choice1 = document.getElementsByName("ans01")[0].value;
	choice2 = document.getElementsByName("ans02")[0].value;
	choice3 = document.getElementsByName("ans03")[0].value;
	choice4 = document.getElementsByName("ans04")[0].value;

	data[1].push(choice1, choice2, choice3, choice4);
}
else
{
	data[1].push('True','False');
}


// var question1 = document.getElementsByName("question1")[0].value;
// var answer1 = document.getElementsByName("answer1")[0].value;
// data[2].push(question1,answer1);

// var i = 0;
// element = document.getElementsByName("question"+i)[0].value;
// while (typeof(element) != 'undefined' && element != null)
// {
// 	i++;
// 	element = document.getElementsByName("question"+i)[0].value;
// 	console.log(i);
// }


  $.post('submit_quiz.php', {
    data: data
  }, function(response) {
    console.log(response);
	  location.href = 'quiz_list.php';
  });
}

</script>

</body>

</html>
