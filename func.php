<?php

class Func {
    public static function isLoginAvailable($login) {
        if (file_exists("users.txt")) {
            if ($fd = fopen("users.txt", 'r')) {
                while(!feof($fd))
                {
                    $str = htmlentities(fgets($fd));
                    $str = explode(':',$str)[0];
    
                    if ($login == $str) {
                        fclose($fd);
                        return false;
                    }
                }
    
                fclose($fd);
            }
        }

        return true;
    }

    public static function addUser($login, $password, $email) {
        $fd = fopen("users.txt", 'a');
        $str = $login . ':' . $password . ':' . $email . PHP_EOL;
        fwrite($fd, $str);
        fclose($fd);
    }

    public static function getUserCount() {
        $count = 0;

        if (!file_exists("users.txt")) {
            return $count;
        }

        if ($fd = fopen("users.txt", 'r')) {
            while(!feof($fd))
            {
                fgets($fd);
                $count++;
            }

            $count--;

            fclose($fd);
        }

        return $count;
    }

    public static function loadAllUsers() {
        $users = [];

        if (!file_exists("users.txt")) {
            return null;
        }

        if ($fd = fopen("users.txt", 'r')) {
            while(!feof($fd))
            {
                $str = htmlentities(fgets($fd));
                $str = explode(':',$str);

                $user = [
                    'login' => $str[0],
                    'password' => $str[1],
                    'email' => $str[2],
                ];

                $users[] = $user;
            }

            array_pop($users);

            fclose($fd);
            return $users;
        }

        return null;
    }
}

?>