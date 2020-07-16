# Task 1
### Create a folder and call it `Task1`
1. Initialize the folder as composer project and configure `autoload` property of `composer.json`. 
   The project root folder should have namespace `app`;
1. Prepare the database.
     - Create a file `database.php`. 
     - Write code which will connect to Mysql database and create database `practical4`.
     - Create `albums` table in `practical4` database with 3 columns: `id`, `name`, `photos` 
       (`photos` must be integer, which will contain how many photos album has).
     - Create `photos` table in `practical4` database with 4 columns: `id`, `title`, `url`, `album_id`.
     - Access `database.php` from command line (by executing `php database.php`) or from the browser to apply the changes
       into mysql database
1. Implement `CurlInterface` and `MysqlInterface` in `BaseApplication` class, but don't implement methods.
1. Create `Application` class which extends from `BaseApplication` and implement abstract methods.
1. Create `index.php` and inside `index.php` create an instance of `Application` class and call `run` method.

# Task 2
### Create a folder and call it `Task2`
You can write task 2 using your custom framework or plain PHP. As you want.
1. Create a page and on this page display all albums fetched in `Task 1` as a table. 
    Include Bootstrap as well and add CSS classes to Albums table. 
    (You can show all the fields) of the albums: `id`, `name`, `photos`. 
1. Add `Actions` as the last column and put "Photos" button for each album, which will open new page
    and displays photos for given album in this page.