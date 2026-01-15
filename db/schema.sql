

CREATE TYPE competence_level AS ENUM (
  'IMITER',
  'S_ADAPTER',
  'TRANSPOSER'
);


CREATE TABLE users (
  id SERIAL PRIMARY KEY,
  name VARCHAR(100),
  email VARCHAR(150) UNIQUE,
  password TEXT,
  role VARCHAR(20) CHECK (role IN ('ADMIN','TEACHER','STUDENT'))
);


CREATE TABLE classes (
  id SERIAL PRIMARY KEY,
  name VARCHAR(100)
);


CREATE TABLE students (
  user_id INT PRIMARY KEY REFERENCES users(id),
  class_id INT REFERENCES classes(id)
);


CREATE TABLE teachers (
  user_id INT PRIMARY KEY REFERENCES users(id)
);


CREATE TABLE class_teacher (
  class_id INT REFERENCES classes(id),
  teacher_id INT REFERENCES teachers(user_id),
  PRIMARY KEY (class_id, teacher_id)
);


CREATE TABLE sprints (
  id SERIAL PRIMARY KEY,
  name VARCHAR(100),
  duration INT,
  sprint_order INT
);


CREATE TABLE class_sprint (
  class_id INT REFERENCES classes(id),
  sprint_id INT REFERENCES sprints(id),
  PRIMARY KEY (class_id, sprint_id)
);


CREATE TABLE competences (
  id SERIAL PRIMARY KEY,
  code VARCHAR(10),
  label VARCHAR(150)
);


CREATE TABLE sprint_competence (
  sprint_id INT REFERENCES sprints(id),
  competence_id INT REFERENCES competences(id),
  PRIMARY KEY (sprint_id, competence_id)
);


CREATE TABLE briefs (
  id SERIAL PRIMARY KEY,
  title VARCHAR(150),
  description TEXT,
  estimated_duration INT,
  type VARCHAR(20),
  sprint_id INT REFERENCES sprints(id),
  class_id INT REFERENCES classes(id),
  teacher_id INT REFERENCES teachers(user_id)
);


CREATE TABLE submissions (
  id SERIAL PRIMARY KEY,
  student_id INT REFERENCES students(user_id),
  brief_id INT REFERENCES briefs(id),
  content TEXT,
  submitted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


CREATE TABLE evaluations (
  id SERIAL PRIMARY KEY,
  student_id INT REFERENCES students(user_id),
  brief_id INT REFERENCES briefs(id),
  competence_id INT REFERENCES competences(id),
  teacher_id INT REFERENCES teachers(user_id),
  level competence_level,
  comment TEXT,
  evaluated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
