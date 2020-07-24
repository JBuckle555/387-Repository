-- Created by Vertabelo (http://vertabelo.com)
-- Last modification date: 2020-04-16 20:27:53.711

-- foreign keys
ALTER TABLE Class
    DROP FOREIGN KEY Class_Course;

ALTER TABLE Enrollment
    DROP FOREIGN KEY Class_Enrollment;

ALTER TABLE Favorite
    DROP FOREIGN KEY Class_Favorite;

ALTER TABLE Course
    DROP FOREIGN KEY Department_Course;

ALTER TABLE Instructor
    DROP FOREIGN KEY Department_Instructor;

ALTER TABLE Student
    DROP FOREIGN KEY Enrollment_Student;

ALTER TABLE Student
    DROP FOREIGN KEY Favorite_Student;

ALTER TABLE Class
    DROP FOREIGN KEY Instructor_Class;

ALTER TABLE Users
    DROP FOREIGN KEY Instructor_User;

ALTER TABLE Student
    DROP FOREIGN KEY Student_Instructor;

ALTER TABLE Users
    DROP FOREIGN KEY Student_User;

-- tables
DROP TABLE Class;

DROP TABLE Course;

DROP TABLE Department;

DROP TABLE Enrollment;

DROP TABLE Favorite;

DROP TABLE Instructor;

DROP TABLE Student;

DROP TABLE Users;

-- End of file.
