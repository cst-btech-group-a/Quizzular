<?php

$conn = mysqli_connect('127.0.0.1', 'root', '1234') or
	die(mysqli_connect_error());
mysqli_select_db($conn, 'quizzular') or
	die(mysqli_error($conn));

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
var count = 0;

function addQuestion() {
  count++;
  var div = document.createElement("div");
      div.innerHTML = "<div class='sectionbox box'>" +
        " Question<br><textarea type='text' name='question"+count+"' placeholder='Enter Question'></textarea><br><br> " +
        " Answer<br><textarea type='text' name='answer"+count+"' placeholder='Enter Answer'></textarea><br><br>" +
        " Answer Type <select id='answerType"+count+"' name='answer_type"+count+"' onchange='addAnswers(this.id);' value='Add Forms'> " +
        " <option>Enter Answer Type</option><option>Multiple Choice</option><option>True or False</option>" +
        " <select><div id='answers"+count+"'></div></div>";
  document.getElementById("main").appendChild(div);
}

var sendData = function() {


var data = [
[],[],[],[],[],[],[],[],[],[],[],[],[],[],[]
];


var qTitle = document.getElementsByName("title")[0].value;
data[0].push(qTitle);

var question;
var answer;
var answer_type;

for (var i = 0; i <= count; i++)
{
	question = document.getElementsByName("question"+i)[0].value;
	answer = document.getElementsByName("answer"+i)[0].value;
	answer_type = document.getElementsByName("answer_type"+i)[0].value;
	data[i+1].push(question,answer);
	if ((answer_type) == "Multiple Choice")
	{
		choice1 = document.getElementsByName("ans"+i+"1")[0].value;
		choice2 = document.getElementsByName("ans"+i+"2")[0].value;
		choice3 = document.getElementsByName("ans"+i+"3")[0].value;
		choice4 = document.getElementsByName("ans"+i+"4")[0].value;
		data[i+1].push(choice1, choice2, choice3, choice4);
	}
	else
	{
		data[i+1].push('True','False');
	}
}


  $.post('submit_quiz.php', {
    data: {data, counts:count}
  }, function(response) {
    console.log(response);
	  //location.href = 'quiz_list.php';
  });
}

</script>
</body>
</html>
