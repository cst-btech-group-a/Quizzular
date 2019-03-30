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
  <h1>Quiz Results</h1>
  <?php
	$sql = "SELECT quiz_name FROM quizzes";
	$result = mysqli_query($conn, $sql);
	echo "<br>";
	while ($row = mysqli_fetch_assoc($result)) {
	    foreach ($row as $field => $value) {
					echo "<button type='button' style='width:300px; position:absolute; left:50%; transform: translateX(-50%);
					' class='btn btn-success' onclick='addQuestion()'>$value</button>";
					echo "<br>";
					echo "<br>";
	    }
	}
 ?>
</body>

</html>
