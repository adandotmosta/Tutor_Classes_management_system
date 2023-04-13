
CREATE TABLE School
(
 School_Id        integer NOT NULL AUTO_INCREMENT,
 School_Name      varchar(45) NOT NULL ,
 School_Mail      varchar(45) NOT NULL ,
 Owner_FirstName  varchar(45) NOT NULL ,
 Owner_LastName   varchar(45) NOT NULL ,
 Password_Manager varchar(45) NOT NULL ,
 School_Address   varchar(45) NOT NULL ,
 Session_System   boolean NOT NULL ,
PRIMARY KEY (School_Id)
);

CREATE TABLE Teacher
(
 Teacher_Id        integer NOT NULL AUTO_INCREMENT,
 Teacher_FirstName varchar(45) NOT NULL ,
 Teacher_LastName  varchar(45) NOT NULL ,
 Teacher_Mail      varchar(45) NOT NULL ,

PRIMARY KEY (Teacher_Id)
);

CREATE TABLE Module
(
 Module_Id   integer NOT NULL AUTO_INCREMENT,
 Module_Name varchar(45) NOT NULL ,
 School_Id   integer NOT NULL ,

PRIMARY KEY (Module_Id),
CONSTRAINT FK_1 FOREIGN KEY (School_Id) REFERENCES School (School_Id)
);


CREATE TABLE Class
(
 Class_Id           integer NOT NULL AUTO_INCREMENT ,
 Class_Price        float NOT NULL ,
 Module_Id          integer NOT NULL ,
 School_Id          integer NOT NULL ,
 Teacher_Id         integer NOT NULL ,
 Starting_Date      date NOT NULL ,
 Finishing_Date     date NOT NULL ,
 Class_Capacity     float NOT NULL ,
 Class_Ability      boolean NOT NULL ,
 Number_Of_Sections float NOT NULL ,
 class_name VARCHAR(45) NOT NULL,

PRIMARY KEY (Class_Id),
CONSTRAINT FK_2 FOREIGN KEY (Teacher_Id) REFERENCES Teacher (Teacher_Id),
CONSTRAINT FK_3 FOREIGN KEY (School_Id) REFERENCES School (School_Id),
CONSTRAINT FK_4 FOREIGN KEY (Module_Id) REFERENCES Module (Module_Id)
);


CREATE TABLE Supervisor
(
 Supervisor_Id          integer NOT NULL AUTO_INCREMENT,
 Supervisor_FirstName   varchar(45) NOT NULL ,
 Supervisor_LastName    varchar(45) NOT NULL ,
 School_Id              integer NOT NULL ,
 Supervisor_Mail        varchar(45) NOT NULL ,
 Password_User          varchar(45) NOT NULL ,

PRIMARY KEY (Supervisor_Id),
CONSTRAINT FK_5 FOREIGN KEY (School_Id) REFERENCES School (School_Id)
);


CREATE TABLE Student
(
 Student_Id        integer NOT NULL AUTO_INCREMENT,
 Supervisor_Id     integer NOT NULL ,
 Student_FirstName varchar(45) NOT NULL ,
 Student_LastName  varchar(45) NOT NULL ,
 Student_Mail      varchar(45) NOT NULL ,
 Student_Birthday  date NOT NULL ,

PRIMARY KEY (Student_Id),
CONSTRAINT FK_6 FOREIGN KEY (Supervisor_Id) REFERENCES Supervisor (Supervisor_Id)
);

CREATE TABLE Resource
(
 Resource_Id      integer NOT NULL AUTO_INCREMENT,
 Resource_Text    text NOT NULL ,
 Class_Id         integer NOT NULL ,
 Resource_Link    text   ,
 Resource_DueTime datetime  ,

PRIMARY KEY (Resource_Id),
CONSTRAINT FK_7 FOREIGN KEY (Class_Id) REFERENCES Class (Class_Id)
);


CREATE TABLE Study
(
 Class_Id     integer  NOT NULL ,
 Student_Id    integer  NOT NULL ,
 Student_Starting_Date date NOT NULL ,
 Student_Absence       integer NOT NULL ,

PRIMARY KEY (Class_Id, Student_Id),
CONSTRAINT FK_8 FOREIGN KEY (Student_Id) REFERENCES Student (Student_Id),
CONSTRAINT FK_9 FOREIGN KEY (Class_Id) REFERENCES Class (Class_Id)
);

CREATE TABLE Session
(
 Session_Id   integer NOT NULL AUTO_INCREMENT ,
 Session_Time datetime NOT NULL ,
 Class_Id     integer NOT NULL ,

PRIMARY KEY (Session_Id),
CONSTRAINT FK_10 FOREIGN KEY (Class_Id) REFERENCES Class (Class_Id)
);


CREATE TABLE Fees
(
 Fees_Id     integer NOT NULL AUTO_INCREMENT ,
 Fees_Amount float NOT NULL ,
 Student_Id  integer NOT NULL ,
 Class_Id    integer NOT NULL ,
 Fees_Status integer NOT NULL ,

PRIMARY KEY (Fees_Id),

CONSTRAINT FK_11 FOREIGN KEY (Class_Id) REFERENCES Class (Class_Id),
CONSTRAINT FK_12 FOREIGN KEY (Student_Id) REFERENCES Student (Student_Id)
);
CREATE TABLE IF NOT EXISTS fees(ID_F INT,ID_S INT,ID_C INT,Amount FLOAT(10,2),Status INT, FOREIGN KEY (ID_S) REFERENCES student(Student_Id),FOREIGN KEY (ID_C) REFERENCES class(Class_Id));
ALTER TABLE fees ADD CONSTRAINT fees_primary_key PRIMARY KEY(ID_F);
CREATE TABLE Absence ( Student_Id INT(11), Session_Id INT(11), absent BOOLEAN, PRIMARY KEY(Student_Id, Session_Id), CONSTRAINT FK_13 FOREIGN KEY (Student_Id) REFERENCES student (Student_Id) ON DELETE CASCADE ON UPDATE CASCADE, CONSTRAINT FK_14 FOREIGN KEY (Session_Id) REFERENCES session (Session_Id) ON DELETE CASCADE ON UPDATE CASCADE );
