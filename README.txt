**README**
==========

**Technical test - Viddyoze**
--------------------------------------
The test has been developed in a custom PHP code. It is implemented using MVC architecture. The project includes 2 folders 
1) Public-- It contains all the public related files which will be viewed by users.
2) src-- It includes all the server-side code needed for the website.


**How it works**
---------------------------------------
1) Create a database under your MySQL client and import the database test.sql attached in the code.
2) Move to src\config folder and update the database details under config.php file.
3) Redirect to http://SERVERNAME/public. This will take you to the home page of the website.

I have tried to implement MVC architecture in the code sepearting Models (src\class folder), Controllers (src\controllers) and Views (public folder).