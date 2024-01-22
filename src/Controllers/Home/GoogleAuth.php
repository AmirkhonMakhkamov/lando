<?php
namespace Lando\App\Controllers\Home;
use Lando\App\Models\Home\AuthModel;
require_once('vendor/google-auth/vendor/autoload.php');

class GoogleAuth {
    private $conn;
    private $client;
    private $model;
    private $provider;

    function __construct($conn){
        $this->conn = $conn;
        $this->model = new AuthModel($conn);

        $this->provider = "google";

        $this->client = new \Google_Client();
        $this->client->setClientId(
            getenv('GOOGLE_CLIENT_ID')
        );
        $this->client->setClientSecret(
            getenv('GOOGLE_CLIENT_SECRET')
        );
        $this->client->setRedirectUri(
            getenv('GOOGLE_RETURN_URL')
        );
        $this->client->addScope("email");
        $this->client->addScope("profile");
        $this->client->setPrompt('select_account');
    }

    public function get_link(){
        return $this->client->createAuthUrl();
    }

    public function auth_user(){
        $gToken = $this->client->fetchAccessTokenWithAuthCode($_GET['code']);

        if (!isset($gToken["error"])) {
            $this->client->setAccessToken($gToken['access_token']);
            $oauth = new \Google_Service_Oauth2($this->client);
            $account_info = $oauth->userinfo->get();

            $provider_id = $account_info->id;

            $full_name = trim($account_info->name);
            $email = $account_info->email;
            $avatar = $account_info->picture;

            $name_parts = explode(" ", $full_name);
            $first_name = $name_parts[0];
            $last_name = end($name_parts);

            $user_id = $this->model->get_user($email, $this->provider, $provider_id);

            if (intval($user_id) > 0) {
                return $this->model->login_user(
                    $user_id,
                );
            }else{
                return $this->model->signup_user(
                    $first_name,
                    $last_name,
                    $email,
                    $this->provider,
                    $provider_id,
                    '',
                    $avatar
                );
            }
        }else{
            header("location: ./");
            exit;
        }
    }
}
