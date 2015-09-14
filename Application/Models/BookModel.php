<?php
/**
 * Created by PhpStorm.
 * User: lashevskiy
 * Date: 13.09.2015
 * Time: 14:55
 */

namespace MainAppSpace;


class BookModel extends Model
{
    public function getData($isbn = null)
    {
        $sql = "SELECT DISTINCT
                    t.isbn,
                    t.title,
                    t.price,
                    t.year,
                    t.pages,
                    t.description,
                    (SELECT author FROM authors a WHERE a.isbn = t.isbn LIMIT 1) as author
                FROM
                    books t
             	WHERE t.isbn = '$isbn'";


        $this->setSqlQuery($sql);

        $book = $this->getAll();

        if(empty($book))
        {
            return false;
        }

        return $book;
    }
}