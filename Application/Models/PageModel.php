<?php
/**
 * Created by PhpStorm.
 * User: lashevskiy
 * Date: 11.09.2015
 * Time: 21:14
 */

namespace MainAppSpace;
use mysqli;

class PageModel
{
    private function Connection()
    {
        require BASE_PATH . D_CORE . 'Credentials.php';

        // Database connections
        $_db = new mysqli($_dbHost, $_dbUser, $_dbPass, $_dbName);

        // Check connection
        if ($_db->connect_error) {
            die("Connection failed: " . $_db->connect_error);
        }

        $_db->query("SET NAMES 'utf8'");
        /*$_db->query("SET CHARACTER SET 'utf8'");*/
        /*$_db->query("SET SESSION collation_connection = 'utf8_general_ci'");*/

        return $_db;
    }

    function GetMenuFromDatabase()
    {
        $dbConnection = $this->Connection();

        $sql = "SELECT sName FROM CategoryName";
        $result = $dbConnection->query($sql);
        $titleArray = array();

        if ($result->num_rows > 0)
            while ($data = $result->fetch_array()) {
                array_push($titleArray, $data);
                /*var_dump($data);*/
            }
        else $titleArray = 'Error';

        $dbConnection->close();

        return $titleArray;
    }
}