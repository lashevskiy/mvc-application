<?php
/**
 * Created by PhpStorm.
 * User: lashevskiy
 * Date: 14.09.2015
 * Time: 22:14
 */

namespace MainAppSpace;


class SearchModel extends Model
{
    private function bind_result_array($stmt)
    {
        $meta = $stmt->result_metadata();
        $result = array();
        while ($field = $meta->fetch_field())
        {
            $result[$field->name] = NULL;
            $params[] = &$result[$field->name];
        }

        call_user_func_array(array($stmt, 'bind_result'), $params);
        return $result;
    }

    private function getCopy($row)
    {
        return array_map(create_function('$a', 'return $a;'), $row);
    }

    private function GetSpecResult($sql){

        $tag = filter_input(INPUT_POST, 'search', FILTER_SANITIZE_STRING);
        $tag = filter_var($tag, FILTER_SANITIZE_STRING);
        if(empty($tag) or mb_strlen($tag, 'utf-8') < 2)
        {
            return false;
        }

        $param = "%{$tag}%";

        if ($stmt = $this->_dbConnection->prepare($sql))
        {
            $stmt->bind_param('sss', $param, $param, $param);
            $stmt->execute();
            $row = $this->bind_result_array($stmt);

            $result = array();
            if(!$stmt->error)
            {
                while($stmt->fetch())
                {
                    $result[$row['isbn']] = $this->getCopy($row);
                }
            }
            return $result;
        }
        return false;
    }

    public function searchBooks()
    {
        $sql = "SELECT
                        t.isbn,
                        t.title,
                        t.price,
                        t.description,
                        (SELECT author FROM authors a WHERE a.isbn = t.isbn LIMIT 1) as author
                    FROM
                        books t
                    WHERE
                        t.title LIKE ?
                        or t.isbn LIKE ?
                        or (SELECT author FROM authors a WHERE a.isbn = t.isbn LIMIT 1) LIKE ?";

        return $this->GetSpecResult($sql);
    }
}