<?php 

require_once('../vendor/autoload.php');

class Google_Auth extends Controller {
  public function __construct()
	{	
		if(isset($_SESSION['customer_login'])) {
			header('location: '. BASEURL);
			exit;
		} else if (isset($_SESSION['admin_login'])) {
      header('location: '. ADMINURL);
			exit;
    }
	} 

  public function index()
  {
    $call_client = $this->googleLoginConfig();
    
    $url = $_SERVER['REQUEST_URI'];
    $query_str = parse_url($url, PHP_URL_QUERY);
    parse_str($query_str, $query_params);

    if (isset($query_params['code'])) {
      $token = $call_client->fetchAccessTokenWithAuthCode($query_params['code']);
      $call_client->setAccessToken($token);
      
      $google_oauthv2 = new Google\Service\Oauth2($call_client);
      $google_userinfo = $google_oauthv2->userinfo->get();
    
      $nama = $google_userinfo['given_name']." ".$google_userinfo['family_name'];
      $email = $google_userinfo['email']; 
      $pic = $google_userinfo['picture'];
      
      $row = $this->model('Google_Auth_model')->checkGoogleEmail($email);

      if ($row['email'] == $email) {
        session_start();
        $_SESSION['customer'] = $row;
        $_SESSION['customer']['picture'] = $pic;
        $_SESSION['customer_login'] = "customer_is_logged_in";
        header('Location: ' . filter_var(BASEURL, FILTER_SANITIZE_URL));
      } else {
        $email_explode = explode('@', $email);
        $username = $email_explode[0];

        $registerData = [
          'name' => $nama,
          'username' => $username,
          'email' => $email,
          'picture' => $pic,
        ];

				if ($this->model('Google_Auth_model')->doGoogleEmailRegister($registerData) > 0) {
          session_start();         
          $_SESSION['customer'] = $registerData;
          $_SESSION['customer_login'] = "customer_is_logged_in";
          header('Location: ' . filter_var(BASEURL, FILTER_SANITIZE_URL));
        } else {
          Flasher::setFlash('Error.','Unable to authenticate with Google Account','danger');
					header('location: '. BASEURL . '/register');
					exit;	
        }     
      }
    } else {
      $auth_url = $call_client->createAuthUrl();
      header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));
    }
  }

  public function googleLoginConfig()
  {
    $redirect_url = BASEURL . '/google_auth';

    $client = new Google\Client();
    $client->setAuthConfig('../app/google/google_key.json');
    $client->setRedirectUri($redirect_url);
    $client->addScope('profile');
    $client->addScope('email');

    return $client;
  }
}
?>