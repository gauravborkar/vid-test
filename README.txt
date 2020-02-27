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

**To implment new feature**
---------------------------------------
1) Create a database table
2) Generate class for the new table under src\class.
3) Create a public page for the feature under public folder.
4) For the public page, include these lines
    <?php $page_title = "home"; ?>                      -- Based on page title controller will be included. Check src\route.php.
    <?php require_once('../src/intialize.inc.php'); ?>  -- This will initialize all the files and variables.
    <?php include_once('layout/head.layout.php'); ?>    -- Head layout of the page.
5) Generate a controller under src\controller and include that in src\route.php.
6) Generate a layout page under public\layout folder.

**Task implemented**
----------------------------------------
1) Index page displays product cataloge, delivery charges and offers.
2) "Add to Basket" button which take Product code and other details as parameter.
3) "Go to Cart" link at the top of the page to get the details and the total of the basket.
