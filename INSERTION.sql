insert into School values(null,"Omar El Mokhetar","omar.mokhetar@gmail.com","Zahra","Moredj","6448921","Alger",TRUE);
insert into School values(null,"Mays School","mays.school@gmail.com","Brahim","Gharbi","1845646","Batna",FALSE);
insert into Module values(null,"MATH",1);
insert into Module values(null,"PHYSIQUE",2) ;
insert into Module values(null,"ENGLISH",1) ;
insert into Module values(null,"FRENCH",2) ;
insert into Teacher values (null,"Mohamed","Labael","mohamed@gmail.com");
insert into Teacher values (null,"Ghilas","Aitmarboh","ghilas@gmail.com");
insert into Teacher values (null,"Mebarak","Baka","mebarak@gmail.com");
insert into Class values (null,1000,1,1,1,"2023-03-29","2023-04-29",30,TRUE,4,"MATH12"); 
insert into Class values (null,2000,2,2,2,"2023-02-14","2023-07-12",30,TRUE,18,"PHSYCOLOGY15");
insert into Supervisor values (null , "Larbi" , "Benmezay" , 1 , "amin@gmail.com","1973546") ;
insert into Supervisor values (null , "Mokhetar" , "Bendado" , 2 , "mokhetar@gmail.com","1973546") ;
insert into Student values (null ,1 , "Tayb" , "Benmezay" , "tayb@gmail.com",'2000-12-3') ;
insert into Student values (null ,1 , "Kerimo" , "Benmezay" , "kerimo@gmail.com",'2004-12-4') ;
insert into Student values (null ,2 , "Khaled" , "Mahrez" ,  "khaled@gmail.com",'2006-1-3') ;
insert into Student values (null ,2 , "Mokhetar" , "Bendado" ,  "mokhetar@gmail.com",'1998-1-23') ;
insert into Resource values (null,'the Quiz 1 spreadsheet were I seize this opportunity to send you the quiz1 questions with answers SaHHa Syaamkoum',1
,'https://drive.google.com/file/d/1flUS_t2lQKbfzBFSqsxEdoQcWgajFPpk/view','2023-02-04 00:00:00');
insert into Resource values (null,'Quiz 6 is out!  I am releasing it early this time. It is due tomorrow midnight.Sa7a ftourkoum. Sincerely ',1," ",null);
insert into Study values(1,1,"2023-03-29",0);
insert into Study values(1,2,"2023-07-24",0);
insert into Session values(null,"2023-12-12 13:30:00",1);
insert into Fees values(null,17000,1,1,0);
insert into absence values(1,1,1);





----------------------------------------------------------------------------------------------------------------------------------


-- Here i will explain to you how to insert every datatype we have used : 
-- integer ---> insert into Table values(12);
-- integer AUTO_INCREMENT ---> insert into Table values(NULL);
-- varchar(45) ---> insert into Table values('#####'); or insert into Table values("####"); 
-- date ---> insert into Table values('YYYY−MM−DD');
-- datetime ---> insert into Table values('YYYY−MM−DD HH:MM:SS');
-- text ---> insert into Table values('#############################');
-- boolean ---> insert into Table values(TRUE); or insert into Table values(FALSE);
-- float ---> insert into Table values(12.12);
-- THANK YOU ! 


----------------------------------------------------------------------------------------------------------------------------------
