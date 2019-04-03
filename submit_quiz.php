<?php

$conn = mysqli_connect('127.0.0.1', 'root', '1234') or
	die(mysqli_connect_error());
mysqli_select_db($conn, 'quizzular') or
	die(mysqli_error($conn));

if(isset($_POST)){
    if(isset($_POST['data'])){
    $data = $_POST['data'];
    print_r($data);
    $quiz_name = $data[0][0];

    // Adds Quiz
    mysqli_query($conn, "
    INSERT INTO quizzes (quiz_name) VALUES ('$quiz_name')
    ")or die(mysqli_error($conn));

    //Adds Questions to Quiz
    $question = $data[1][0];
    $answer = $data[1][1];
    $choice1 = $data[1][2];
    $choice2 = $data[1][3];
    $choice3 = $data[1][4];
    $choice4 = $data[1][5];

    mysqli_query($conn, "
    INSERT INTO questions (Quiz_id,Question_text) VALUES(1,'$question')
    ")or die(mysqli_error($conn));


    if ($choice1 == $answer)
    {
      mysqli_query($conn, "
      INSERT INTO answers (questions_id,answer_text,score) VALUES(1, '$choice1', 100)
      ")or die(mysqli_error($conn));
    }
    else
    {
      mysqli_query($conn, "
      INSERT INTO answers (questions_id,answer_text,score) VALUES(1, '$choice1', 0)
      ")or die(mysqli_error($conn));
    }

    if ($choice2 == $answer)
    {
      mysqli_query($conn, "
      INSERT INTO answers (questions_id,answer_text,score) VALUES(1, '$choice2', 100)
      ")or die(mysqli_error($conn));
    }
    else
    {
      mysqli_query($conn, "
      INSERT INTO answers (questions_id,answer_text,score) VALUES(1, '$choice2', 0)
      ")or die(mysqli_error($conn));
    }

    if ($choice3 != " ")
    {
      if ($choice3 == $answer)
      {
        mysqli_query($conn, "
        INSERT INTO answers (questions_id,answer_text,score) VALUES(1, '$choice3', 100)
        ")or die(mysqli_error($conn));
      }
      else
      {
        mysqli_query($conn, "
        INSERT INTO answers (questions_id,answer_text,score) VALUES(1, '$choice3', 0)
        ")or die(mysqli_error($conn));
      }
    }

    if ($choice4 != " ")
    {
      if ($choice4 == $answer)
      {
        mysqli_query($conn, "
        INSERT INTO answers (questions_id,answer_text,score) VALUES(1, '$choice4', 100)
        ")or die(mysqli_error($conn));
      }
      else
      {
        mysqli_query($conn, "
        INSERT INTO answers (questions_id,answer_text,score) VALUES(1, '$choice4', 0)
        ")or die(mysqli_error($conn));
      }
    }

    //Adds Answers to Quiz

}}


?>
