<?php 

namespace App\Services;

use App\App;
use App\Helpers\Dump;
use App\Contracts\HandlingFormInterface;
class SecurityService
{
    public static function login($formData)
    {
        if ($formData['email'] == "user@user.com" && $formData['password'] = '123456') {
            session_regenerate_id();
            $_SESSION['is_logged_in'] = true;
         
        }
        $query = App::$app->db->select("SELECT * FROM todo_mvc")->getAll();
        Dump::dump($query);
    }
    public static function logout()
    {

        // Unset all of the session variables.
        $_SESSION = array();

        // If it's desired to kill the session, also delete the session cookie.
        // Note: This will destroy the session, and not just the session data!
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params["path"],
                $params["domain"],
                $params["secure"],
                $params["httponly"]
            );
        }
        session_destroy();
    }

}