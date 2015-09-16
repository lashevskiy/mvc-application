<?php
/**
 * Created by PhpStorm.
 * User: lashevskiy
 * Date: 15.09.2015
 * Time: 13:45
 */

namespace MainAppSpace;


class SignUpModel extends Model
{
    public function setUserInfo()
    {
        $user = array();
        $user['username'] = $user['firstname'] = $user['lastname'] = $user['email'] = "";
        if(isset($_POST['username']))
            $user['username'] = $_POST['username'];
        if(isset($_POST['firstname']))
            $user['firstname'] = $_POST['firstname'];
        if(isset($_POST['lastname']))
            $user['lastname'] = $_POST['lastname'];
        if(isset($_POST['email']))
            $user['email'] = $_POST['email'];

        return $user;
    }

    function SignUpUser()
    {
        $message = '';

        if (!isset($_POST['username'], $_POST['email'], $_POST['password']))
            return '<p class="error">Что-то пошло не так. Попробуйте повторно зарегистрироваться.</p>';

        // Sanitize and validate the data passed in
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
        $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING);
        $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $email = filter_var($email, FILTER_VALIDATE_EMAIL);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
            $message .= '<p class="error">The email address you entered is not valid.</p>';

        /*if (strlen($password) != 128)
            $message .= '<p class="error">Invalid password configuration.</p>';*/

        if ($stmt = $this->_dbConnection->prepare("SELECT
                    id
                  FROM
                    users
                  WHERE
                    username = ? OR email = ?")
        )
        {
            $stmt->bind_param('ss', $username, $email);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows > 0)
            {

                $message .= '<p class="error">A user with this username or email address already exists.</p>';
            }
        }
        else
            $message .= '<p class="error">Database error</p>';

        if (empty($message))
        {
            /*$random_salt = hash('sha512', uniqid(openssl_random_pseudo_bytes(16), TRUE));*/
            /*$password = hash('sha512', $password . $random_salt);*/
            $hash = password_hash($password, PASSWORD_DEFAULT);

            if ($insert_stmt = $this->_dbConnection->prepare("
                        INSERT INTO
                          users(username, password, email, firstName, lastName)
                        VALUES
                          (?, ?, ?, ?, ?)")
            )
            {
                $params = array(&$username, &$hash, &$email, &$firstname, &$lastname);
                call_user_func_array(array($insert_stmt, "bind_param"), array_merge(array('sssss'), $params));

                if (!$insert_stmt->execute())
                {
                    return '<p class="error">Insertion failed.</p>';
                }
                else
                {
                    $message = '<p class="error">Поздравлем! Вы успешно зарегистрировались.</p>' .
                        '<p class="error">Осталось только залогиниться.</p>';
                }
            }
        }
        return $message;

    }
}