<?php 

namespace App\Models;

use App\App;
use App\Helpers\Dump;
use App\Helpers\Url;

class Authorisation
{
    public static bool $emailError = false;
    public static bool $passwordError = false;
    public static bool $wrongCredentials = false;
    public static function login($formData)
    {
        
        $email = trim($formData['email']);
        $password = $formData['password'];

            if (empty($email) || (!filter_var($email, FILTER_VALIDATE_EMAIL))) {
                self::$emailError = true;
                return;
            }

        if ($password == '') {
            self::$passwordError = true;
            return;
        }
        $DBUser = App::$app->db->getUserByEmail($email);
        if ($DBUser) {
           if ($DBUser->email == $email && $DBUser->password == $password)
            App::$app->user->setEmail($DBUser->email);
            App::$app->user->setRole($DBUser->role);
            App::$app->user->setId($DBUser->id);
          $_SESSION['is_logged_in_as'] = "USER";
         header("Location: /");
        } else {
            self::$wrongCredentials = true;
           // self::$passwordError = true;
           // App::$app->router->callRoute('login', 'login', ['errors' => ['errorTest', 'error2']]);
        }
       
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
    public static function isLoggedInAs(): string
    {
        $isLoggedIn = isset($_SESSION['is_logged_in_as']) && $_SESSION['is_logged_in_as'];
        return ($isLoggedIn == 'ADMIN') ? 'ADMIN' : 'USER';
    } 
   
    public static function isLoggedInAsEither(): bool
    {
        return isset($_SESSION['is_logged_in_as']) && $_SESSION['is_logged_in_as'];
    }
   

}