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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
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
    echo "<div id='test' style='margin-left:50px;'>";
    echo "<h1>" . $quiz_name . "</h1>";
		$answerCount = 0;
		$questionCount = 0;
    $sql = "SELECT quiz_id, question_text, id FROM questions where quiz_id='$quiz_id'";
    $result = mysqli_query($conn, $sql);
    //$count = 1;
    while ($row = mysqli_fetch_assoc($result)) {

        echo "Question: " . $row["question_text"];
				$questionCount++;
        $question_id = $row["id"];
        $sql1 = "SELECT * FROM answers where questions_id = $question_id";
        $result1 = mysqli_query($conn, $sql1);
        while ($row1 = mysqli_fetch_assoc($result1)) {
                echo "<br>";
								if ($row1["answer_text"] != "")
								{
									echo "<input type='radio' name='" . $row1["questions_id"] . "' value='" . $row1["answer_text"] . "'>" . " " . $row1["answer_text"];
									$answerCount++;
								}
        }
      //  $count++;
      echo "<br>";
      echo "<br>";
    }
    echo "<script>function goBack() {	location.href = 'quiz_list.php'	} </script>";
	?>

		<script>

		function process() {
			var answersVal = document.getElementsByTagName('input');
			var data1 = [
			[],[],[],[],[],[],[],[],[],[],[],[],[],[],[]
			];
			data1[0].push(<?php echo $questionCount ?>,<?php echo $quiz_id ?>);

			var j = 1;
			for (var i = 0; i < <?php echo $answerCount ?>; i++)
			{
				if (answersVal[i].checked)
				{
					var answersID = answersVal[i].getAttribute('name');
					data1[j].push(answersID, answersVal[i].value);
					j++;
					}
			}

			$.post('updateResults.php', {
				data1: data1
			}, function(response) {
				 //console.log(response);
				 location.href = 'quiz_results.php';
			});
		}

		</script>

 <?php
  	echo "<button type='button' class='btn btn-success' onclick='process()'>Submit Quiz</button>";
    echo "</div>";

 ?>

<script>

function getCheckedBoxes(chkboxName) {
  var checkboxes = document.getElementsByName(chkboxName);
  var checkboxesChecked = [];
  // loop over them all
  for (var i=0; i<checkboxes.length; i++) {
     // And stick the checked ones onto an array...
     if (checkboxes[i].checked) {
        checkboxesChecked.push(checkboxes[i]);
     }
  }
  // Return the array if it is non-empty, or null
  return checkboxesChecked.length > 0 ? checkboxesChecked : null;
}

var checkedBoxes = getCheckedBoxes("mycheckboxes");

</script>

</body>
</html>
