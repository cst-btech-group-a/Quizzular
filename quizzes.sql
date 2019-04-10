CREATE DATABASE IF NOT EXISTS quizzular;

USE quizzular;

CREATE TABLE IF NOT EXISTS quizzes (
  id int not null auto_increment,
 	quiz_name VARCHAR(250) not null,
	PRIMARY KEY (id)
  );

CREATE TABLE IF NOT EXISTS questions (
  id int not null auto_increment,
  quiz_id int not null,
 	question_text VARCHAR(250) not null,
	PRIMARY KEY (id)
	);

CREATE TABLE IF NOT EXISTS answers (
  id int not null auto_increment,
  questions_id int not null,
 	answer_text VARCHAR(250) not null,
  score int not null,
	PRIMARY KEY (id)
  );

CREATE TABLE IF NOT EXISTS results (
  id int not null auto_increment,
  quiz_id int not null,
 	result_text VARCHAR(250) not null,
  UNIQUE INDEX (quiz_id),
	PRIMARY KEY (id)
  );
