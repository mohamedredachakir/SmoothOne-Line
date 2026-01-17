--  USERS
-- USERS (password = email, hashed)
INSERT INTO users (id,name,email,password,role) VALUES
(1,'Admin User','admin@mailinator.com','$2a$12$ocOKUjKpWrEmfz3MA2fpL.YSwdFpEv6BaR0hvvg5zTqM8IfWRnw5C','ADMIN'),
(2,'Teacher One','teacher@mailinator.com','$2a$12$D6RJt58RzMPCM16Achvz3.aMdP.oAi3JGtceet97D1NRioJbFZ3fC','TEACHER'),
(3,'Student One','student@mailinator.com','$2a$12$qSAR3nLBnGJJiay6vB0PUOAvOcBG9dL/qiyQtZBfpiGwWgTNQJiMG','STUDENT');


-- CLASSES
INSERT INTO classes (id,name) VALUES (1,'Class 1');

--  STUDENTS
INSERT INTO students (user_id,class_id) VALUES (3,1);

--  TEACHERS
INSERT INTO teachers (user_id) VALUES (2);

--  CLASS_TEACHER
INSERT INTO class_teacher (class_id, teacher_id) VALUES (1,2);

--  SPRINTS
INSERT INTO sprints (id,name,duration,sprint_order) VALUES (1,'Sprint 1',10,1);

--  CLASS_SPRINT
INSERT INTO class_sprint (class_id,sprint_id) VALUES (1,1);

--  COMPETENCES
INSERT INTO competences (id,code,label) VALUES
(1,'C1','Competence 1'),
(2,'C2','Competence 2'),
(3,'C3','Competence 3');

--  SPRINT_COMPETENCE
INSERT INTO sprint_competence (sprint_id,competence_id) VALUES
(1,1),
(1,2),
(1,3);

--  BRIEFS
INSERT INTO briefs (id,title,description,estimated_duration,type,sprint_id,class_id,teacher_id) VALUES
(1,'Brief 1','Description du brief',7,'INDIVIDUAL',1,1,2);

--  SUBMISSIONS
INSERT INTO submissions (id,student_id,brief_id,content) VALUES
(1,3,1,'My submission content');

--  EVALUATIONS
INSERT INTO evaluations (id,student_id,brief_id,competence_id,teacher_id,level,comment) VALUES
(1,3,1,1,2,'IMITER','Good work'),
(2,3,1,2,2,'S_ADAPTER','Needs improvement'),
(3,3,1,3,2,'TRANSPOSER','Excellent');
