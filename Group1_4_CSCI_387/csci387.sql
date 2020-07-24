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
    First_Name varchar(30) NOT NULL,
    Last_Name varchar(20) NOT NULL,
    Status_year varchar(10) NOT NULL,
    Credits_taken int NOT NULL,
    Academic_hold bool NOT NULL,
    Degree varchar(20) NOT NULL,
    GPA double NOT NULL,
    Email varchar(50) NULL,
    advisorID int NOT NULL,
    Birthday varchar(10) NOT NULL,
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
