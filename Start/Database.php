<?php
/**
 * Created by PhpStorm.
 * User: lashevskiy
 * Date: 11.09.2015
 * Time: 17:59
 */

namespace MainAppSpace;
use mysqli;

class Database
{
    private $_dbhost;
    private $_dbuser;
    private $_dbpass;
    private $_dbname;
    private $_dbconnection;


    public function queryMysql($query)
    {
        $result = $this->_dbconnection->query($query);
        if (!$result)
            die("Failed: " . $this->_dbconnection->error);
        return $result;
    }

    public function __construct($dbhost, $dbuser, $dbpass)
    {
        $this->_dbhost = $dbhost;
        $this->_dbuser = $dbuser;
        $this->_dbpass = $dbpass;

        $this->_dbconnection = new mysqli($this->_dbhost, $this->_dbuser, $this->_dbpass);

        if($this->_dbconnection->connect_error)
            die("Connection failed: " . $this->_dbconnection->connect_error);

        $this->queryMysql("SET NAMES 'utf8'");
        $this->queryMysql("SET CHARACTER SET 'utf8'");
        $this->queryMysql("SET SESSION collation_connection = 'utf8_general_ci'");
    }

    public function createDatabase($name)
    {
        $this->_dbname = $name;
        $query = "CREATE DATABASE IF NOT EXISTS $name";
        $this->queryMysql($query);
        echo "Database '$name' created or already exists.<br>";
    }

    public function useDatabase($dbname)
    {
        $query = "USE $dbname";
        $this->queryMysql($query);
        echo "Database '$dbname' selected and use.<br>";
    }

    public function createTable($name, $query, $engine)
    {
        $query = "CREATE TABLE IF NOT EXISTS $name ($query) ENGINE $engine COLLATE utf8_general_ci DEFAULT CHARSET utf8;";
        $this->queryMysql($query);
        echo "Table '$name' created or already exists.<br>";
    }

    public function deleteDatabase($name)
    {
        $this->_dbname = $name;
        $query = "DROP DATABASE IF EXISTS $name";
        $this->queryMysql($query);
        echo "Database '$name' deleted.<br>";
    }
}