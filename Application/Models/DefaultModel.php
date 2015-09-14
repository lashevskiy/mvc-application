<?php
/**
 * Created by PhpStorm.
 * User: lashevskiy
 * Date: 13.09.2015
 * Time: 20:43
 */

namespace MainAppSpace;


class DefaultModel extends Model
{
    public function getData($orderBy = null)
    {
        $sql = "SELECT DISTINCT
                        t.isbn,
                        t.title,
                        t.price,
                        (SELECT author FROM authors a WHERE a.isbn = t.isbn LIMIT 1) as author
                    FROM
                        books t
                    ORDER BY "
                        . $orderBy .
                    " LIMIT 3";

        $this->setSqlQuery($sql);

        $books = $this->getAll();

        if(empty($books))
        {
            return false;
        }

        return $books;
    }

    public function getDataRandom($count)
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
}