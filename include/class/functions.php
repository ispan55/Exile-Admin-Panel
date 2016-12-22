<?php
/**
 * Checks that the user is logged in.
 *
 * @return Returns the row of the logged in user
 */

    function check_user($db_panel)
    {
        $user = null;

        if (!isset($_SESSION['user_id']) && isset($_COOKIE['identifier']) && isset($_COOKIE['securitytoken'])) {
            $identifier = $_COOKIE['identifier'];
            $securitytoken = $_COOKIE['securitytoken'];

            $securitytoken_row = $db_panel->getToken($identifier);

            if (sha1($securitytoken) !== $securitytoken_row['securitytoken']) {
                //Vermutlich wurde der Security Token gestohlen
                //Hier ggf. eine Warnung o.ä. anzeigen
            } else { //Token war korrekt
                //Setze neuen Token
                $neuer_securitytoken = random_string();
                $db_panel->updateToken(sha1($neuer_securitytoken), $identifier);
                setcookie("identifier", $identifier, time() + (3600 * 24 * 365)); //1 Jahr Gültigkeit
                setcookie("securitytoken", $neuer_securitytoken, time() + (3600 * 24 * 365)); //1 Jahr Gültigkeit

                //Logge den Benutzer ein
                $_SESSION['user_id'] = $securitytoken_row['user_id'];
            }
        }

        if (isset($_SESSION['user_id'])) {
            $user = $db_panel->getLoginByID($_SESSION['user_id']);
        }



        return $user;
    }

    /**
     * Returns true when the user is checked in, else false
     */
    function is_checked_in()
    {
        return isset($_SESSION['user_id']);
    }

    /**
     * Returns a random string
     */
    function random_string()
    {
        if (function_exists('openssl_random_pseudo_bytes')) {
            $bytes = openssl_random_pseudo_bytes(16);
            $str = bin2hex($bytes);
        } else if (function_exists('mcrypt_create_iv')) {
            /** @noinspection PhpDeprecationInspection */
            $bytes = mcrypt_create_iv(16, MCRYPT_DEV_URANDOM);
            $str = bin2hex($bytes);
        } else {
            //Replace your_secret_string with a string of your choice (>12 characters)
            $str = md5(uniqid('your_secret_string', true));
        }
        return $str;
    }

    /**
     * Returns the URL to the site without the script name
     */
    function getSiteURL()
    {
        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
        return $protocol . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/';
    }