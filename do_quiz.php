<?php
$conn = mysqli_connect('127.0.0.1', 'root', '1234') or
	die(mysqli_connect_error());
mysqli_select_db($conn, 'quizzular') or
	die(mysqli_error($conn));
	$quiz_id = $_GET['quiz_id'];

	$sql = "SELECT quiz_name FROM quizzes where id= $quiz_id";
	$result = mysqli_query($conn, $sql);
	while ($row = mysqli_fetch_assoc($result)) {
		$quiz_name = $row['quiz_name'];
	}
?>

<!doctype html>
<html>

<head>
  <link href='//fonts.googleapis.com/css?family=Lato:300' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="css/style.css">
  <script src="js/scripts.js"></script>
  <link rel="stylesheet" href="styles/jquery-ui.css">
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
    <!-- Nav wrapper end -->
  </div>
  <!-- Nav end -->

	<?php
 	echo "<div style='margin-left:50px;'>";
	echo "<h1>" . $quiz_name . "</h1>";


	$sql = "SELECT quiz_id, question_text FROM questions where quiz_id='$quiz_id'";

	$result = mysqli_query($conn, $sql);
	$count = 1;
	while ($row = mysqli_fetch_assoc($result)) {

		echo "Question: " . $row["question_text"];
		$sql1 = "SELECT * FROM answers where questions_id = $count";
		$result1 = mysqli_query($conn, $sql1);
		while ($row1 = mysqli_fetch_assoc($result1)) {
				echo "<br>";
				echo "<input type='radio' name='" . $row1["questions_id"] . "'>" . " " . $row1["answer_text"];

		}
		$count++;

	  echo "<br>";
		echo "<br>";
	}
	echo "<script>function goBack() { location.href = 'quiz_list.php' } </script>";
  echo "<button type='button' class='btn btn-success' onclick='goBack()'>Submit Quiz</button>";
	echo "</div>";

 ?>
</body>

</html>
