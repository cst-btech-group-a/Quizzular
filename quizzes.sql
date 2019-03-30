CREATE DATABASE IF NOT EXISTS quizzular;

USE quizzular;

CREATE TABLE IF NOT EXISTS quizzes (
	id int not null primary key,
	quiz_name VARCHAR(250) not null,
);
