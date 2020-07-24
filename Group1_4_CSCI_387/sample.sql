SET FOREIGN_KEY_CHECKS = 0;

SET FOREIGN_KEY_CHECKS = 0;

INSERT INTO Student (StudentID, First_Name, Last_Name, Birthday, Status_year, Credits_taken, Academic_hold, Degree, GPA, email, advisorID)
      values ("1","Lena","Oxton","1/1/1990","Senior","50",FALSE, "B.S.C.S","3.5","lena@go.olemiss.edu","5");
INSERT INTO Student (StudentID, First_Name, Last_Name,Birthday, Status_year, Credits_taken, Academic_hold, Degree, GPA, email, advisorID)
      values ("2","Jame","Smith","30/12/2000","Freshman","50",FALSE,"Math","3.4","JS232@go.olemiss.edu","5");
INSERT INTO Student (StudentID, First_Name, Last_Name,Birthday, Status_year, Credits_taken, Academic_hold, Degree, GPA, email, advisorID)
      values ("3","Leo","William","30/12/2000","Freshman","50",FALSE,"Math","3.4","JS232@go.olemiss.edu","6");
INSERT INTO Student (StudentID, First_Name, Last_Name,Birthday, Status_year, Credits_taken, Academic_hold, Degree, GPA, email, advisorID)
      values ("4","Jason","Something","30/12/2000","Freshman","50",FALSE,"Math","3.4","JS232@go.olemiss.edu","6");




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
      VALUES ("CSCI","387","1","3","40","5","Main Building","11:00am - 12:15pm","T Th");
INSERT INTO Class(Department_code, CourseID, SectionID, InstructorID, Total_Seat, Wait_List, Location, Time, Day)
      VALUES ("CSCI","387","2","4","30","10","Jackson","1:00pm - 2:15pm","M W F");


INSERT INTO Course(Department_code, CourseID, Course_Name, Credit)
      VALUES ("CSCI", "387", "Software Deverlopment","3");
INSERT INTO Course(Department_code, CourseID, Course_Name, Credit)
      VALUES ("CSCI", "112", "Computer Science II","3");
INSERT INTO Course(Department_code, CourseID, Course_Name, Credit)
      VALUES ("CSCI", "211", "Computer Science III","3");
INSERT INTO Course(Department_code, CourseID, Course_Name, Credit)
      VALUES ("CSCI", "343", "Fundamentals of Data Science","3");
INSERT INTO Course(Department_code, CourseID, Course_Name, Credit)
      VALUES ("CSCI", "111", "Computer Science I","3");

INSERT INTO Enrollment(StudentID, ClassID)
              values("1","1");
INSERT INTO Favorite(StudentID, ClassID)
              values("1","1");



INSERT INTO Enrollment(StudentID, ClassID)
      VALUES (3,1);
INSERT INTO Enrollment(StudentID, ClassID)
      VALUES (2,1);
INSERT INTO Enrollment(StudentID, ClassID)
      VALUES (3,2);
INSERT INTO Enrollment(StudentID, ClassID)
      VALUES (4,2);

SET FOREIGN_KEY_CHECKS = 1;
