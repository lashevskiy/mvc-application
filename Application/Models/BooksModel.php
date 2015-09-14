<?php
/**
 * Created by PhpStorm.
 * User: lashevskiy
 * Date: 11.09.2015
 * Time: 16:07
 */

namespace MainAppSpace;


class BooksModel extends Model
{
    public function getData($type = null)
    {
        if(isset($type) and $type != null)
        {
            $sql = "SELECT DISTINCT
                        t.isbn,
                        t.title,
                        t.price,
                        (SELECT author FROM authors a WHERE a.isbn = t.isbn LIMIT 1) as author
                    FROM
                        books t
                    INNER JOIN
                        bookcategory c
                    ON
                        t.isbn = c.isbn
                    WHERE
                        c.idcategory = $type";

            $this->setSqlQuery($sql);

            $books = $this->getAll();

            if (empty($books)) {
                return false;
            }
            return $books;
        }
        else
        {
            return false;
        }
    }
}