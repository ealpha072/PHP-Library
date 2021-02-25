/*inserting books into database*/

INSERT INTO `books`(`id`, `book_name`, `book_author`, `subject`) VALUES 
(1,'Management Accounting','R.J.Reddy','Accounting')
(2,'Financial Accounting','Ashok Banerjee','Accounting'),
(3,'Fundamentals of Accounting','Donatila Agtarap-San Juan','Accounting'),
(4,'Financial Accounting for BBA','S.N. Maheshwari ','Accounting'),
(5,'Intermediate Accounting'.'Donald E. Kieso','Accounting'),
(6,'BASIC FINANCIAL ACCOUNTING','Toye Adelaja','Accounting'),
(7,'Accounting All-in-One For Dummies','Kenneth Boyd','Accounting'),
(8,'Corporate Accounting, 6th Edition','Maheshwari S.N. & Maheshwari S.K.','Accounting'),
(9,'Accounting For Management','Vijayakumar','Accounting');

/* code for adding image column*/

ALTER TABLE `users` ADD `user_image` VARCHAR(255) NOT NULL AFTER `password`;

/*borrowed books table*/
CREATE TABLE `library`. ( `book_id` INT NULL , `user_name` VARCHAR(255) NOT NULL ) ENGINE = InnoDB;