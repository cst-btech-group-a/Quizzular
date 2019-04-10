<?php
$conn = mysqli_connect('127.0.0.1', 'root', '1234') or
	die(mysqli_connect_error());
mysqli_select_db($conn, 'quizzular') or
	die(mysqli_error($conn));

if(isset($_POST['data1']))
{
    $data = $_POST['data1'];
    $questionCount = $data[0][0];
    $quiz_id = $data[0][1];
    //echo $questionCount;
    print_r($data);
    //echo $data[1][0];

    for ($i = 1; $i <= $questionCount; $i++)
    {
      $id = $data[$i][0];
      //echo $id;
      $sql2 = "SELECT answer_text FROM answers where questions_id = '$id' AND score = 100";
    	$result2 = mysqli_query($conn, $sql2);
    	$row2 = mysqli_fetch_assoc($result2);
      if ($data[$i][1] == $row2['answer_text'])
      {
        $score++;
      }
    }

    $resultText = (($score / $questionCount) * 100) . "%";

    echo $resultText;

    // mysqli_query($conn, "
    // UPDATE results
    // SET result_text = '$resultText'
    // WHERE quiz_id = '$quiz_id'
    // ")or die(mysqli_error($conn));

// mysqli_query($conn, "
//   INSERT INTO results(quiz_id, result_text)
//   VALUES ('$quiz_id', '$resultText')
//   WHERE NOT EXISTS (SELECT * FROM results WHERE quiz_id = '$quiz_id')
//   ")or die(mysqli_error($conn));

    // mysqli_query($conn, "
    // INSERT IGNORE INTO results (quiz_id, result_text) VALUES ('$quiz_id', '$resultText')
    // ")or die(mysqli_error($conn));

    mysqli_query($conn, "
    REPLACE INTO results (quiz_id, result_text) VALUES ('$quiz_id', '$resultText')
    ")or die(mysqli_error($conn));


}
?>
