BEGIN;
          SET FOREIGN_KEY_CHECKS = 0;
          Insert into Student (StudentID) values(99);

          SET FOREIGN_KEY_CHECKS = 1;
COMMIT;
