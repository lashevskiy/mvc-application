<?php
/**
 * Created by PhpStorm.
 * User: lashevskiy
 * Date: 17.07.2015
 * Time: 22:21
 */

namespace MainAppSpace;
    use mysqli;
    use Exception;


class Model
{
    protected $_dbConnection;
    protected $_dbSqlQuery;

    public function __construct()
    {
        require BASE_PATH . D_CORE . 'Credentials.php';
        $this->_dbConnection = new mysqli($_dbHost, $_dbUser, $_dbPass, $_dbName);

        if($this->_dbConnection->connect_error)
            die("Connection failed: " . $this->_dbConnection->connect_error);

        $this->queryMysql("SET NAMES 'utf8'");
        $this->queryMysql("SET CHARACTER SET 'utf8'");
        $this->queryMysql("SET SESSION collation_connection = 'utf8_general_ci'");
    }

    public function queryMysql($query)
    {
        $result = $this->_dbConnection->query($query);
        if (!$result)
            die("Failed: " . $this->_dbConnection->error);
        return $result;
    }

	public function getData()
	{
		// todo
	}

    function GetMenuFromDatabase()
    {
        $sql = "SELECT sName FROM CategoryName";
        $this->setSqlQuery($sql);
        $titleArray = array();

        $titleArray = $this->getAll();

        if (empty($titleArray)) {
            return false;
        }
        return $titleArray;
    }

    public function getRandomBook($count)
    {
        $sql = "SELECT
                        t.isbn,
                        t.title,
                        t.price,
                        (SELECT author FROM authors a WHERE a.isbn = t.isbn LIMIT 1) as author
                    FROM
                        books t
                    ORDER BY
                        RAND()
                    LIMIT $count";

        $this->setSqlQuery($sql);

        $books = $this->getAll();

        if(empty($books))
        {
            return false;
        }

        return $books;
    }

    protected function setSqlQuery($query)
    {
        $this->_dbSqlQuery = $query;
    }

    public function getAll()
    {
        if(!$this->_dbSqlQuery)
        {
            throw new Exception("Error: sql query not set!");
        }

        $contentArray = array();
        $result = $this->_dbConnection->query($this->_dbSqlQuery);

        if($result->num_rows > 0)
        {
            while($data = $result->fetch_array())
            {
                array_push($contentArray, $data);
            }

            $result->close();
        }
        else $contentArray = false;

        return $contentArray;
    }

    public function cleanInput($data)
    {
        $data = trim($data);
        $data = strip_tags($data);
        $data = htmlentities($data);
        $data = htmlspecialchars($data);
        $data = stripslashes($data);
        $data = nl2br($data);
        $data = trim($data);

        return $data;
    }

}