###DEMO
http://psuresh.com.np/TODO

##About
This is a demo project to keep records of todo list using Bootstrap-3, PHP, MySql, AJAX, JQuery, Alertify JS. Mysql database is used to keep records. Scripting language PHP is used for database CRUD operation. Alertify JS is used to alert messages with nice UI. AJAX has been used for background processing.

##Installation

###Step1:
Make sure you have installed local server (WAMPP, XAMPP, LAMPP or other if you know) is installed on your computer.

###Step2:
Clone the project and copy to the htdocs folder(for Xampp, Lampp) or www folder(Wampp). 

###Step3:
Make a database name 'dm' and import table 'todo.sql'. If you want to change database in process.php and list.php
```
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'dm';//change database name as yours
Global $dbconfig;
$dbconfig = mysqli_connect($host,$username,$password,$database) or die("An Error occured while connecting to the database");
```
If you want to change table name ,replace the text todo in both process.php and list.php
```
$result=mysqli_query($dbconfig,"SELECT * FROM todo");
```
###Step4:
Run the project on your browser.. localhost/TODO

