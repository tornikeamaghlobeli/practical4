<?php


namespace app;
use PDO;

class Application extends BaseApplication
{

    public function fetchAlbums()
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'https://jsonplaceholder.typicode.com/albums');

        return json_decode($response->getBody(),true);

    }

    public function fetchPhotos(int $albumId)
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', "https://jsonplaceholder.typicode.com/albums/$albumId/photos");

        return json_decode($response->getBody(),true);

    }

    public function saveAlbums(array $albums)
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "aa";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // begin the transaction
            $conn->beginTransaction();
            // our SQL statements
            foreach ($albums as $album) {
                $albumTitle=$album['title'];
                $conn->exec("INSERT INTO albums (title)  VALUES ('$albumTitle')");
            }
            // commit the transaction
            $conn->commit();
            echo "New records created successfully";
        } catch(PDOException $e) {
            // roll back the transaction if something failed
            $conn->rollback();
            echo "Error: " . $e->getMessage();
        }

        $conn = null;
    }

    public function savePhotos(array $photos)
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "aa";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // begin the transaction
            $conn->beginTransaction();
            // our SQL statements
            foreach ($photos as $photo) {
                $PhotoTitle=$photo['title'];
                $PhotoUrl=$photo['url'];
                $Id=$photo['albumId'];
                $conn->exec("INSERT INTO photos (title, url, album_id)  VALUES ('$PhotoTitle', '$PhotoUrl', '$Id')");
            }
            // commit the transaction
            $conn->commit();
            echo "New records created successfully";
        } catch(PDOException $e) {
            // roll back the transaction if something failed
            $conn->rollback();
            echo "Error: " . $e->getMessage();
        }

        $conn = null;
    }

    public function updatePhotoCount(int $albumId, int $photoCount)
    {
        $servername = "localhost";
        $username = "username";
        $password = "password";
        $dbname = "myDBPDO";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "UPDATE albums SET '$albumId' WHERE id='$photoCount'";

            // Prepare statement
            $stmt = $conn->prepare($sql);

            // execute the query
            $stmt->execute();

            // echo a message to say the UPDATE succeeded
            echo $stmt->rowCount() . " records UPDATED successfully";
        } catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }

        $conn = null;
    }
}