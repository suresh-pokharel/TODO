![todo](https://user-images.githubusercontent.com/36298335/38063035-c934a6d0-32ff-11e8-8330-ac66219c0f71.png)
## About
This is a basic demo project to provide the knowledge about AJAX, PHP and Other JavaScript Libraries for beginners. It basically keeps the records of todo list using Bootstrap-3, PHP, MySql, AJAX, JQuery, Alertify JS. Mysql database is used to keep records. Scripting language PHP is used for database CRUD operation. Alertify JS is used to alert messages with nice UI. AJAX has been used for background processing.

## Screenshots
![Todo List Screenshot](https://image.ibb.co/eNRPOv/img1.jpg)
![Todo List Screenshot](https://image.ibb.co/kViSbF/img2.jpg)

## Installation

### Step1:
Make sure you have installed local server (WAMPP, XAMPP, LAMPP or other if you know) is installed on your computer.

### Step2:
Clone the project and copy to the htdocs folder(for Xampp, Lampp) or www folder(Wampp). 

### Step3:
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
### Step4:
Run the project on your browser.. http://localhost/TODO

### DEMO
http://projects.psuresh.com.np/TODO/

