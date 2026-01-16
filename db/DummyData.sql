-- USERS (password = same as email, hashed)
INSERT INTO users (name,email,password,role) VALUES
('Admin User','admin@mailinator.com', '$2y$10$tr0pzYK6hXg0Dqp0jq0tAuVv7JbgAZeHa1oHk8XGx6jv3pIu3DPyW', 'ADMIN'),
('Teacher One','teacher@mailinator.com','$2y$10$T5.QtY0TtVrO9V0F3U2HLOl2iP1HtGxwzS6YlQl/jCz5M./VfG3PS','TEACHER'),
('Student One','student@mailinator.com','$2y$10$kG1qXrF2t9DZ4b1gYh5IzuuHxd0u7HbYlMvTzE1c9gH5qP4/8RtR6','STUDENT');

-- CLASSES
INSERT INTO classes (name) VALUES ('Class 1');

-- STUDENTS
INSERT INTO students (user_id,class_id) VALUES (3,1);

-- TEACHERS
INSERT INTO teachers (user_id) VALUES (2);

-- CLASS_TEACHER
INSERT INTO class_teacher (class_id, teacher_id) VALUES (1,2);

-- SPRINTS
INSERT INTO sprints (name,duration,sprint_order) VALUES ('Sprint 1',10,1);

-- CLASS_SPRINT
INSERT INTO class_sprint (class_id,sprint_id) VALUES (1,1);

-- COMPETENCES
INSERT INTO competences (code,label) VALUES
('C1','Competence 1'),
('C2','Competence 2'),
('C3','Competence 3');

-- SPRINT_COMPETENCE
INSERT INTO sprint_competence (sprint_id,competence_id) VALUES
(1,1),
(1,2),
(1,3);

-- BRIEFS
INSERT INTO briefs (title,description,estimated_duration,type,sprint_id,class_id,teacher_id) VALUES
('Brief 1','Description du brief',7,'INDIVIDUAL',1,1,2);

-- SUBMISSIONS
INSERT INTO submissions (student_id,brief_id,content) VALUES
(3,1,'My submission content');

-- EVALUATIONS
INSERT INTO evaluations (student_id,brief_id,competence_id,teacher_id,level,comment) VALUES
(3,1,1,2,'IMITER','Good work'),
(3,1,2,2,'S_ADAPTER','Needs improvement'),
(3,1,3,2,'TRANSPOSER','Excellent');
