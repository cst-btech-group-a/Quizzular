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

function addAnswers(id)
{

  var ans = id.substring(10, 11);
  answers = "answers" + ans;
  document.getElementById(answers).innerHTML = "";
  var div = document.createElement("div");
  var answerType = document.getElementById(id).value;

  if (answerType == "Multiple Choice")
  {
    div.innerHTML = "<br><input type='text' name='ans1' placeholder='Answer 1'><br><input type='text' name='ans2' placeholder='Answer 2'><br><input type='text' name='ans3' placeholder='Answer 3'><br><input type='text' name='ans4' placeholder='Answer 4'><br>";
  }

  if (answerType == "True or False")
  {

  }

  document.getElementById(answers).appendChild(div);
}




function removeForm(h) {
  var elem = document.getElementById('main');
  elem.parentNode.removeChild(h);
}

function submitQuiz()
{
  location.href = 'quiz_list.php'
}
