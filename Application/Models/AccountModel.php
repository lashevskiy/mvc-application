<?php
/**
 * Created by PhpStorm.
 * User: lashevskiy
 * Date: 15.09.2015
 * Time: 19:41
 */

namespace MainAppSpace;


class AccountModel extends Model
{
    function GetUserInfo()
    {
        /*if (!$this->CheckLogin()) return 'U better login first';*/

        if ($stmt = $this->_dbConnection->prepare("SELECT
                    username,
                    firstname,
                    lastname,
                    email
                  FROM
                    users
                  WHERE
                    username = ?")
        ) {
            $params = array();
            $result = array();

            $stmt->bind_param('s', $_SESSION['username']);
            $stmt->execute();

            $meta = $stmt->result_metadata();
            while ($field = $meta->fetch_field()) {
                $params[] = &$result[$field->name];
            }
            call_user_func_array(array($stmt, 'bind_result'), $params);
            if ($stmt->error) return false;

            while ($stmt->fetch()) {
                foreach ($result as $key => $val)
                    $c[$key] = $val;
                $params = $c;
            }

            return $params;
        }
        return false;
    }
}