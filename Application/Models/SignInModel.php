<?php
/**
 * Created by PhpStorm.
 * User: lashevskiy
 * Date: 15.09.2015
 * Time: 13:46
 */

namespace MainAppSpace;


class SignInModel extends Model
{
    function Login($username, $password)
    {
        if ($stmt = $this->_dbConnection->prepare("SELECT
                  id,
                  password,
                  firstname,
                  lastname
                FROM
                  users
                WHERE
                  username = ? LIMIT 1")
        )
        {
            $stmt->bind_param('s', $username);
            $stmt->execute();
            $stmt->store_result();

            // get variables from result.
            $stmt->bind_result($user_id, $db_password, $firstname, $lastname);
            $stmt->fetch();

            // hash the password with the unique salt.
            /*$newpassword = hash('sha512', $password . $salt);*/

            if ($stmt->num_rows == 1)
            {
                // Check if the password in the database matches
                // the password the user submitted.
                if (password_verify($password, $db_password))
                {
                    // Get the user-agent string of the user.
                    $user_browser = $_SERVER['HTTP_USER_AGENT'];

                    // XSS protection as we might print this value
                    $user_id = preg_replace("/[^0-9]+/", "", $user_id);
                    $username = preg_replace("/[^a-zA-Z0-9_-]+/", "", $username);

                    /*$random_salt = hash('sha512', uniqid(openssl_random_pseudo_bytes(16), TRUE));*/
                    /*$password = hash('sha512', $password . $random_salt);*/
                    $hash = password_hash($password, PASSWORD_DEFAULT);

                    if ($insert_stmt = $this->_dbConnection->prepare("UPDATE
                                  users
                                SET
                                  password = ?
                                WHERE
                                  id = $user_id")
                    ) {

                        $params = array(&$hash);
                        call_user_func_array(array($insert_stmt, "bind_param"), array_merge(array('s'), $params));

                        if (!$insert_stmt->execute()) {
                            return false;
                        }
                    }

                    $_SESSION['user_id'] = $user_id;
                    $_SESSION['username'] = $username;
                    $_SESSION['firstname'] = $firstname;
                    $_SESSION['lastname'] = $lastname;
                    $_SESSION['login_string'] = hash('sha512', $password . $user_browser);

                    return true;
                }
                else
                {
                    return false;
                }

            }
            else
            {
                // No user exists.
                return false;
            }
        }
        else
        {
            // Could not create a prepared statement
            return false;
            /*header("Location: ../error.php?err=Database error: cannot prepare statement");
            exit();*/
        }
    }
}