CREATE TABLE  IF NOT EXISTS Teacher
(
 Teacher_Id        integer NOT NULL AUTO_INCREMENT,
 Teacher_FirstName varchar(45) NOT NULL ,
 Teacher_LastName  varchar(45) NOT NULL ,
 Teacher_Mail      varchar(45) NOT NULL ,

PRIMARY KEY (Teacher_Id)
);