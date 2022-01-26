<?php 

declare(strict_types = 1);

namespace App\Helpers;
use Exception;
class Url
{
    public static function redirect(string $url)
    {
        if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']) {
            $protocol = 'https';
        } else 
        {
            $protocol = 'http';
        }
      
       // For production
       
      // header("Location: $protocol/" . $_SERVER['HTTP_HOST']. $url );

       // For localhost
     header('Location: ' . $url);
        
    }
    /**
  * Redirect with POST data.
  *
  * @param string $url URL.
  * @param array $post_data POST data. Example: ['foo' => 'var', 'id' => 123]
  * @param array $headers Optional. Extra headers to send.
  */
public static function redirect_post($url, array $data, array $headers = null) {
    $params = [
      'https' => [
        'method' => 'POST',
        'content' => http_build_query($data)
      ]
    ];
  
    if (!is_null($headers)) {
      $params['https']['header'] = '';
      foreach ($headers as $k => $v) {
        $params['https']['header'] .= "$k: $v\n";
      }
    }
  
    $ctx = stream_context_create($params);
    $fp = @fopen($url, 'rb', false, $ctx);
  
    if ($fp) {
      echo @stream_get_contents($fp);
      die();
    } else {
      // Error
      throw new Exception("Error loading '$url', $php_errormsg");
    }
  }
}