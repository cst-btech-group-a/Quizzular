<?php

$conn = mysqli_connect('127.0.0.1', 'root', '1234') or
	die(mysqli_connect_error());
mysqli_select_db($conn, 'quizzular') or
	die(mysqli_error($conn));

if(isset($_POST)){
    if(isset($_POST['data'])){
    $data = $_POST['data'];
		$count = $data[counts];
	  $data = $data[data];

		print_r($data);

		$quiz_name = $data[0][0];

    // Adds Quiz
    mysqli_query($conn, "
    INSERT INTO quizzes (quiz_name) VALUES ('$quiz_name')
    ")or die(mysqli_error($conn));

		$quiz_id = mysqli_insert_id($conn);

		for ($i = 1; $i <= $count+1; $i++)
		{
			$question = $data[$i][0];
	    $answer = $data[$i][1];
	    $choice1 = $data[$i][2];
	    $choice2 = $data[$i][3];
	    $choice3 = $data[$i][4];
	    $choice4 = $data[$i][5];

			mysqli_query($conn, "
			INSERT INTO questions (quiz_id, question_text) VALUES($quiz_id, '$question')
			")or die(mysqli_error($conn));


			if ($choice1 == $answer)
			{
				mysqli_query($conn, "
				INSERT INTO answers (questions_id,answer_text,score) VALUES($i, '$choice1', 100)
				")or die(mysqli_error($conn));
			}
			else
			{
				mysqli_query($conn, "
				INSERT INTO answers (questions_id,answer_text,score) VALUES($i, '$choice1', 0)
				")or die(mysqli_error($conn));
			}

			if ($choice2 == $answer)
			{
				mysqli_query($conn, "
				INSERT INTO answers (questions_id,answer_text,score) VALUES($i, '$choice2', 100)
				")or die(mysqli_error($conn));
			}
			else
			{
				mysqli_query($conn, "
				INSERT INTO answers (questions_id,answer_text,score) VALUES($i, '$choice2', 0)
				")or die(mysqli_error($conn));
			}

			if ($choice3 != " ")
			{
				if ($choice3 == $answer)
				{
					mysqli_query($conn, "
					INSERT INTO answers (questions_id,answer_text,score) VALUES($i, '$choice3', 100)
					")or die(mysqli_error($conn));
				}
				else
				{
					mysqli_query($conn, "
					INSERT INTO answers (questions_id,answer_text,score) VALUES($i, '$choice3', 0)
					")or die(mysqli_error($conn));
				}
			}

			if ($choice4 != " ")
			{
				if ($choice4 == $answer)
				{
					mysqli_query($conn, "
					INSERT INTO answers (questions_id,answer_text,score) VALUES($i, '$choice4', 100)
					")or die(mysqli_error($conn));
				}
				else
				{
					mysqli_query($conn, "
					INSERT INTO answers (questions_id,answer_text,score) VALUES($i, '$choice4', 0)
					")or die(mysqli_error($conn));
				}
			}
		}
	}
}

?>
