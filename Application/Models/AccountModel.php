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

    function UpdatePassword()
    {
        /*if (!$this->CheckLogin()) return 'U better login first';*/

        $message = '';

        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

        /*if (strlen($password) != 128)
            $message .= '<p class="error">Invalid password configuration. Make sure Javascript execution is allowed in your browser.</p>';*/

        if ($stmt = $this->_dbConnection->prepare("SELECT
                    id
                  FROM
                    users
                  WHERE
                    username = ?")
        ) {
            $stmt->bind_param('s', $_SESSION['username']);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows > 1) {
                $message .= '<p class="error">Two much users with such username. Call to admin.</p>';
            } else if ($stmt->num_rows == 1) {
                $stmt->bind_result($user_id);
                $stmt->fetch();
            } else
                $message .= '<p class="error">Что-то пошло не так.. Похоже, мы потеряли вас в своей базу :(</p>';
        } else
            $message .= '<p class="error">Database error</p>';

        if (empty($message)) {
            /*$random_salt = hash('sha512', uniqid(openssl_random_pseudo_bytes(16), TRUE));*/
            /*$password = hash('sha512', $password . $random_salt);*/

            $hash = password_hash($password, PASSWORD_DEFAULT);

            if ($insert_stmt = $this->_dbConnection ->prepare("UPDATE
                          users
                        SET
                          password = ?
                        WHERE
                          id = $user_id")
            ) {
                $params = array(&$hash);
                call_user_func_array(array($insert_stmt, "bind_param"), array_merge(array('s'), $params));

                if (!$insert_stmt->execute()) {
                    return '<p class="error">Insertion failed</p>';
                } else{
                    $message = '<p class="error">Пароль успешно изменен</p>';
                    $user_browser = $_SERVER['HTTP_USER_AGENT'];
                    $_SESSION['login_string'] = hash('sha512', $password . $user_browser);
                }
            }
        }

        return $message;
    }

    function UpdateUser()
    {
        /*if (!$this->CheckLogin()) return 'U better login first';*/

        $message = '';

        if ($stmt = $this->_dbConnection->prepare("SELECT
                    id
                  FROM
                    users
                  WHERE
                    username = ?")
        ) {
            $stmt->bind_param('s', $_SESSION['username']);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows > 1) {
                $message .= '<p class="error">Two much users with such username. Call to admin.</p>';
            } else if ($stmt->num_rows == 1) {
                $stmt->bind_result($user_id);
                $stmt->fetch();
            } else
                $message .= '<p class="error">Что-то пошло не так.. Похоже, мы потеряли вас в своей базу :(</p>';
        } else
            $message .= '<p class="error">Database error</p>';

        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING);
        $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $email = filter_var($email, FILTER_VALIDATE_EMAIL);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
            $message .= '<p class="error">The email address you entered is not valid</p>';

        if ($stmt = $this->_dbConnection->prepare("SELECT
                    id
                  FROM
                    users
                  WHERE
                    username = ? OR email = ?")
        ) {
            $stmt->bind_param('ss', $username, $email);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows > 1) {
                $message .= '<p class="error">A user with this username or email address already exists.</p>';
            }
        } else
            $message .= '<p class="error">Database error</p>';

        if (empty($message)) {
            if ($update_stmt = $this->_dbConnection->prepare("UPDATE
                          users SET
                            username = ?,
                            email = ?,
                            firstname = ?,
                            lastname = ?
                        WHERE
                          id = $user_id")
            ) {
                $message = '<p class="error">Изменения сохранены.</p>';
                $params = array(&$username, &$email, &$firstname, &$lastname);
                call_user_func_array(array($update_stmt, "bind_param"), array_merge(array('ssss'), $params));
                if (!$update_stmt->execute()) {
                    $message .= '<p class="error">Insertion failed.</p>';
                } else {
                    $_SESSION['username'] = $username;
                    $_SESSION['firstname'] = $firstname;
                    $_SESSION['lastname'] = $lastname;
                }
            } else {
                $message = '<p class="error">Ошибка, видимо, у нас. Свяжитесь с админом :(</p>';
            }
        }
        return $message;
    }
}