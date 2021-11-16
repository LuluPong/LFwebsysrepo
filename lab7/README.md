Lab 7
_____________________________
Individual Lab: The Gradebook
_____________________________

**Part 1**
-----------


**Part 2**
-----------
1)	ALTER TABLE students
	ADD COLUMN street varchar(255),
	ADD COLUMN city varchar(255),
	ADD COLUMN state char(2),
	ADD COLUMN zip_code int(5);

2)	ALTER TABLE courses
	ADD COLUMN section int(3),
	ADD COLUMN year int(4);

3)	CREATE TABLE grades (
    	   id int AUTO_INCREMENT,
	       crn int(11),
 	       RIN int(9),
    	   grade int(3) NOT NULL,
    	   PRIMARY KEY(id),
    	   FOREIGN KEY(crn) REFERENCES courses(crn),
    	   FOREIGN KEY(RIN) REFERENCES students(RIN)
	);

4)	INSERT INTO courses(crn, prefix, number, title, section, year)
	  VALUES (63958, 'IHSS', 1200, 'Principles of Economics', 1, 2022),
	  (63670, 'ITWS', 2210, 'Introduction to Human Computer Interaction', 1, 2022),
	  (63430, 'CSCI', 1200, 'Data Structures', 14, 2022),
	  (62788, 'ITWS', 4500, 'Web Science Systems Development', 1, 2022);

5) 	INSERT INTO students(RIN, RCSID, first_name, last_name, alias, phone, street, city, state, zip_code)
	  VALUES(662049587, 'djohn22', 'John', 'Doe', '', 206173343, '14 Main Street', 'Grand Rapids', 'MI', 49501),
  	(661935834, 'doejua3', 'Juan', 'Noe', '', 9173628888, '674 Nowhere Boulevard', 'Bancroft', 'NB', 68004),
  	(662094001, 'doeja98', 'Jane', 'Boe', '', 2016022001, '1 Potato Avenue', 'Sparta', 'NJ', 07871),
	  (662001008, 'doebj24', 'Bjorn', 'Doe', 'Bob', 5189306712, '313 76th Street', 'New York', 'NY', 10001);

6)	
	INSERT INTO `grades`(`crn`, `RIN`, `grade`) VALUES (63430,662001008,34);
	INSERT INTO `grades`(`crn`, `RIN`, `grade`) VALUES (62788,662001008,79);
	INSERT INTO `grades`(`crn`, `RIN`, `grade`) VALUES (63958,662001008,99);
	INSERT INTO `grades`(`crn`, `RIN`, `grade`) VALUES (63670,662001008,84);

	INSERT INTO `grades`(`crn`, `RIN`, `grade`) VALUES (62788,661935834,92);
	INSERT INTO `grades`(`crn`, `RIN`, `grade`) VALUES (63958,661935834,93);
	INSERT INTO `grades`(`crn`, `RIN`, `grade`) VALUES (63670,661935834,98);
	INSERT INTO `grades`(`crn`, `RIN`, `grade`) VALUES (63430,661935834,82);

	INSERT INTO `grades`(`crn`, `RIN`, `grade`) VALUES (62788,662049587,100);
	INSERT INTO `grades`(`crn`, `RIN`, `grade`) VALUES (63958,662049587,62);
	INSERT INTO `grades`(`crn`, `RIN`, `grade`) VALUES (63670,662049587,73);
	INSERT INTO `grades`(`crn`, `RIN`, `grade`) VALUES (63430,662049587,54);

	INSERT INTO `grades`(`crn`, `RIN`, `grade`) VALUES (62788,662094001,94);
	INSERT INTO `grades`(`crn`, `RIN`, `grade`) VALUES (63670,662094001,92);
	INSERT INTO `grades`(`crn`, `RIN`, `grade`) VALUES (63958,662094001,90);
	INSERT INTO `grades`(`crn`, `RIN`, `grade`) VALUES (63430,662094001,93);

7)	SELECT * FROM `students` WHERE 1
	  ORDER BY RIN, last_name, RCSID, first_name;


8)	SELECT grades.RIN, grades.grade, students.first_name, students.last_name, students.street, students.city, students.state, students.zip_code
	  FROM grades
	  INNER JOIN students ON grades.RIN = students.RIN
  	WHERE grade > 90

9)	SELECT crn, AVG(grade) 'Average Grade'
  	FROM grades
  	GROUP BY crn

10)	SELECT courses.title, grades.crn, COUNT(grades.RIN) AS Number_of_Students_in_Class 
	  FROM grades
  	INNER JOIN courses ON grades.crn = courses.crn
  	GROUP BY courses.title
    
**Part 3**
-----------
