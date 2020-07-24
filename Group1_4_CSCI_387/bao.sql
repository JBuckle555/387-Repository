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
-- Created by Vertabelo (http://vertabelo.com)
-- Last modification date: 2020-04-16 20:27:53.711

-- tables
-- Table: Class
CREATE TABLE Class (
    ClassID int NOT NULL AUTO_INCREMENT,
    Department_code varchar(10) NOT NULL,
    CourseID int NOT NULL,
    SectionID int NOT NULL,
    InstructorID int NOT NULL,
    Total_Seat int NOT NULL,
    Wait_List int NOT NULL,
    Location varchar(20) NOT NULL,
    Time varchar(20) NOT NULL,
    Day varchar(10) NOT NULL,
    CONSTRAINT Class_pk PRIMARY KEY (ClassID)
);

-- Table: Course
CREATE TABLE Course (
    CourseID int NOT NULL AUTO_INCREMENT,
    Department_code varchar(10) NOT NULL,
    Course_Name varchar(50) NOT NULL,
    Credit int NOT NULL,
    CONSTRAINT Course_pk PRIMARY KEY (CourseID,Department_code)
);

-- Table: Department
CREATE TABLE Department (
    Department_code varchar(10) NOT NULL,
    Department_Name varchar(15) NOT NULL,
    Main_Building varchar(15) NOT NULL,
    CONSTRAINT Department_pk PRIMARY KEY (Department_code)
);

-- Table: Enrollment
CREATE TABLE Enrollment (
    StudentID int NOT NULL,
    ClassID int NOT NULL,
    CONSTRAINT Enrollment_pk PRIMARY KEY (StudentID,ClassID)
);

-- Table: Favorite
CREATE TABLE Favorite (
    StudentID int NOT NULL,
    ClassID int NOT NULL,
    CONSTRAINT Favorite_pk PRIMARY KEY (StudentID,ClassID)
);

-- Table: Instructor
CREATE TABLE Instructor (
    InstructorID int NOT NULL,
    First_Name varchar(30) NOT NULL,
    Last_Name varchar(30) NOT NULL,
    Department_code varchar(10) NOT NULL,
    Title varchar(10) NOT NULL,
    Email varchar(30) NOT NULL,
    Office_Hour varchar(30) NOT NULL,
    CONSTRAINT Instructor_pk PRIMARY KEY (InstructorID)
);

-- Table: Student
CREATE TABLE Student (
    StudentID int NOT NULL,
    First_Name varchar(30) ,
    Last_Name varchar(20) ,
    Status_year varchar(10) ,
    Credits_taken int ,
    Academic_hold bool ,
    Degree varchar(20) ,
    GPA double ,
    Email varchar(50),
    advisorID int ,
    Birthday date ,
    CONSTRAINT Student_pk PRIMARY KEY (StudentID)
);

-- Table: Users
CREATE TABLE Users (
    userID int NOT NULL AUTO_INCREMENT,
    userName varchar(20) NOT NULL,
    hashed_password varchar(60) NOT NULL,
    userType character(1) NOT NULL,
    CONSTRAINT Users_pk PRIMARY KEY (userID)
);

-- foreign keys
-- Reference: Class_Course (table: Class)
ALTER TABLE Class ADD CONSTRAINT Class_Course FOREIGN KEY Class_Course (CourseID,Department_code)
    REFERENCES Course (CourseID,Department_code);

-- Reference: Class_Enrollment (table: Enrollment)
ALTER TABLE Enrollment ADD CONSTRAINT Class_Enrollment FOREIGN KEY Class_Enrollment (ClassID)
    REFERENCES Class (ClassID);

-- Reference: Class_Favorite (table: Favorite)
ALTER TABLE Favorite ADD CONSTRAINT Class_Favorite FOREIGN KEY Class_Favorite (ClassID)
    REFERENCES Class (ClassID);

-- Reference: Department_Course (table: Course)
ALTER TABLE Course ADD CONSTRAINT Department_Course FOREIGN KEY Department_Course (Department_code)
    REFERENCES Department (Department_code);

-- Reference: Department_Instructor (table: Instructor)
ALTER TABLE Instructor ADD CONSTRAINT Department_Instructor FOREIGN KEY Department_Instructor (Department_code)
    REFERENCES Department (Department_code);

-- Reference: Enrollment_Student (table: Student)
ALTER TABLE Student ADD CONSTRAINT Enrollment_Student FOREIGN KEY Enrollment_Student (StudentID)
    REFERENCES Enrollment (StudentID);

-- Reference: Favorite_Student (table: Student)
ALTER TABLE Student ADD CONSTRAINT Favorite_Student FOREIGN KEY Favorite_Student (StudentID)
    REFERENCES Favorite (StudentID);

-- Reference: Instructor_Class (table: Class)
ALTER TABLE Class ADD CONSTRAINT Instructor_Class FOREIGN KEY Instructor_Class (InstructorID)
    REFERENCES Instructor (InstructorID);

-- Reference: Instructor_User (table: Users)
ALTER TABLE Users ADD CONSTRAINT Instructor_User FOREIGN KEY Instructor_User (userID)
    REFERENCES Instructor (InstructorID);

-- Reference: Student_Instructor (table: Student)
ALTER TABLE Student ADD CONSTRAINT Student_Instructor FOREIGN KEY Student_Instructor (advisorID)
    REFERENCES Instructor (InstructorID);

-- Reference: Student_User (table: Users)
ALTER TABLE Users ADD CONSTRAINT Student_User FOREIGN KEY Student_User (userID)
    REFERENCES Student (StudentID);

-- End of file.
SET FOREIGN_KEY_CHECKS = 0;

INSERT INTO Student (StudentID, First_Name, Last_Name, Birthday, Status_year, Credits_taken, Academic_hold, Degree, GPA, email, advisorID)
      values ("1","Lena","Oxton","1990-1-1","Senior","50",FALSE, "B.S.C.S","3.5","lena@go.olemiss.edu","5");
INSERT INTO Student (StudentID, First_Name, Last_Name,Birthday, Status_year, Credits_taken, Academic_hold, Degree, GPA, email, advisorID)
      values ("2","Jame","Smith","2000-12-20","Freshman","50",FALSE,"Math","3.4","JS232@go.olemiss.edu","5");
INSERT INTO Student (StudentID, First_Name, Last_Name,Birthday, Status_year, Credits_taken, Academic_hold, Degree, GPA, email, advisorID)
      values ("3","Leo","William","2000-1-5","Freshman","50",FALSE,"Math","3.4","JS232@go.olemiss.edu","6");
INSERT INTO Student (StudentID, First_Name, Last_Name,Birthday, Status_year, Credits_taken, Academic_hold, Degree, GPA, email, advisorID)
      values ("4","Jason","Something","1994-5-3","Freshman","50",FALSE,"Math","3.4","JS232@go.olemiss.edu","6");



INSERT INTO Instructor(InstructorID, First_Name, Last_Name, Department_code, Title, Email, Office_Hour)
      VALUES("5","Rhode", "Philip", "CS","Dr.", "Rhode@go.olemiss.edu", "N/A");
INSERT INTO Instructor(InstructorID, First_Name, Last_Name, Department_code, Title, Email, Office_Hour)
      VALUES("6","Joshep", "Carlisle", "CS","Professor", "Joshep@go.olemiss.edu", "N/A");

INSERT INTO Users (userName, hashed_password, userType) VALUES ("student1", "$2y$10$NDQ5MDc2NWJhNmZkZTYzN.0wBVit79p573loozoHUbFfO4JuvF/eW", "S");
INSERT INTO Users (userName, hashed_password, userType) VALUES ("student2", "$2y$10$OGY4Yjk4NzE2NTVlNzg2ZeoK705WipVkTay8EXnHuxieAiXMEBavu", "S");
INSERT INTO Users (userName, hashed_password, userType) VALUES ("student3", "$2y$10$YTRkZmMyMjZhNDQ5OGZmMenDlveibtXBusssw9hFeal1s4rUzMB6u", "S");
INSERT INTO Users (userName, hashed_password, userType) VALUES ("student4", "$2y$10$MDM3ZTI5N2UyMjExNTUxZOaFfEusK07T4q.YhK.am8p6eG3RZfVUO", "S");

INSERT INTO Users (userName, hashed_password, userType) VALUES ("instructor1","$2y$10$ODkwYTUwYzIyM2RmMTg0OON2LmjVtzyLfaGYw6krl72wzBNxWYnM2", "I");
INSERT INTO Users (userName, hashed_password, userType) VALUES ("instructor2","$2y$10$NGU3OTNjZmVlMzFiMjRlZ.kXBrz9n5xZOJSJJOwLBVx6wZdLBLjXm", "I");





INSERT INTO Class(Department_code, CourseID, SectionID, InstructorID, Total_Seat, Wait_List, Location, Time, Day)
    VALUES ("CSCI","387","1","5","40","5","Main Building","11:00am - 12:15pm","T Th");
INSERT INTO Class(Department_code, CourseID, SectionID, InstructorID, Total_Seat, Wait_List, Location, Time, Day)
    VALUES ("CSCI","387","2","6","30","10","Jackson","1:00pm - 2:15pm","M W F");

INSERT INTO Class(Department_code, CourseID, SectionID, InstructorID, Total_Seat, Wait_List, Location, Time, Day)
    VALUES ("CSCI","402","1","5","40","5","Main Building","11:00am - 12:15pm","T Th");
INSERT INTO Class(Department_code, CourseID, SectionID, InstructorID, Total_Seat, Wait_List, Location, Time, Day)
    VALUES ("CSCI","402","2","6","30","10","Jackson","1:00pm - 2:15pm","M W F");

INSERT INTO Class(Department_code, CourseID, SectionID, InstructorID, Total_Seat, Wait_List, Location, Time, Day)
    VALUES ("Eng","311","1","5","40","5","Main Building","11:00am - 12:15pm","T Th");
INSERT INTO Class(Department_code, CourseID, SectionID, InstructorID, Total_Seat, Wait_List, Location, Time, Day)
    VALUES ("Eng","311","2","6","30","10","Jackson","1:00pm - 2:15pm","M W F");

INSERT INTO Class(Department_code, CourseID, SectionID, InstructorID, Total_Seat, Wait_List, Location, Time, Day)
    VALUES ("Eng","100","1","5","40","5","Main Building","11:00am - 12:15pm","T Th");
INSERT INTO Class(Department_code, CourseID, SectionID, InstructorID, Total_Seat, Wait_List, Location, Time, Day)
    VALUES ("Eng","100","2","6","30","10","Jackson","1:00pm - 2:15pm","M W F");

INSERT INTO Class(Department_code, CourseID, SectionID, InstructorID, Total_Seat, Wait_List, Location, Time, Day)
    VALUES ("Geo","100","1","5","40","5","Main Building","11:00am - 12:15pm","T Th");
INSERT INTO Class(Department_code, CourseID, SectionID, InstructorID, Total_Seat, Wait_List, Location, Time, Day)
    VALUES ("Geo","100","2","6","30","10","Jackson","1:00pm - 2:15pm","M W F");

INSERT INTO Class(Department_code, CourseID, SectionID, InstructorID, Total_Seat, Wait_List, Location, Time, Day)
    VALUES ("Geo","101","1","5","40","5","Main Building","11:00am - 12:15pm","T Th");
INSERT INTO Class(Department_code, CourseID, SectionID, InstructorID, Total_Seat, Wait_List, Location, Time, Day)
    VALUES ("Geo","101","2","6","30","10","Jackson","1:00pm - 2:15pm","M W F");

INSERT INTO Class(Department_code, CourseID, SectionID, InstructorID, Total_Seat, Wait_List, Location, Time, Day)
    VALUES ("CSCI","400","1","5","40","5","Main Building","11:00am - 12:15pm","T Th");
INSERT INTO Class(Department_code, CourseID, SectionID, InstructorID, Total_Seat, Wait_List, Location, Time, Day)
    VALUES ("CSCI","400","2","6","30","10","Jackson","1:00pm - 2:15pm","M W F");

INSERT INTO Class(Department_code, CourseID, SectionID, InstructorID, Total_Seat, Wait_List, Location, Time, Day)
    VALUES ("CSCI","427","1","5","40","5","Main Building","11:00am - 12:15pm","T Th");
INSERT INTO Class(Department_code, CourseID, SectionID, InstructorID, Total_Seat, Wait_List, Location, Time, Day)
    VALUES ("CSCI","427","2","6","30","10","Jackson","1:00pm - 2:15pm","M W F");

INSERT INTO Class(Department_code, CourseID, SectionID, InstructorID, Total_Seat, Wait_List, Location, Time, Day)
    VALUES ("CSCI","999","1","5","1","10","Jackson","1:00pm - 2:15pm","M W F");

INSERT INTO Course(Department_code, CourseID, Course_Name, Credit)
    VALUES ("CSCI", "999", "Honor System","5");

INSERT INTO Course(Department_code, CourseID, Course_Name, Credit)
      VALUES ("CSCI", "387", "Software Deverlopment","3");
INSERT INTO Course(Department_code, CourseID, Course_Name, Credit)
      VALUES ("CSCI", "400", "Database Management","3");
INSERT INTO Course(Department_code, CourseID, Course_Name, Credit)
      VALUES ("CSCI", "427", "Computer Security","3");
INSERT INTO Course(Department_code, CourseID, Course_Name, Credit)
      VALUES ("CSCI", "402", "Senior Project","3");
INSERT INTO Course(Department_code, CourseID, Course_Name, Credit)
      VALUES ("Eng", "311", "Critical Thinking","3");
INSERT INTO Course(Department_code, CourseID, Course_Name, Credit)
      VALUES ("Eng", "100", "Introduction to Writting Essay","3");
INSERT INTO Course(Department_code, CourseID, Course_Name, Credit)
      VALUES ("Geo", "100", "Introduction to Geology","3");
INSERT INTO Course(Department_code, CourseID, Course_Name, Credit)
      VALUES ("Geo", "101", "History of Earth","3");

INSERT INTO Enrollment(StudentID, ClassID)
              values("1","1");
INSERT INTO Favorite(StudentID, ClassID)
              values("1","1");
INSERT INTO Enrollment(StudentID, ClassID)
              values("1","2");


INSERT INTO Enrollment(StudentID, ClassID)
      VALUES (3,1);
INSERT INTO Enrollment(StudentID, ClassID)
      VALUES (2,1);
INSERT INTO Enrollment(StudentID, ClassID)
      VALUES (3,2);
INSERT INTO Enrollment(StudentID, ClassID)
      VALUES (4,2);

SET FOREIGN_KEY_CHECKS = 1;
