<?php
namespace Lando\App\Configs;

class User
{
    public $ip;
    public $user_agent;
    public $token;

    public function __construct()
    {
        $this->setIP();
        $this->setUserAgent();
        $this->setToken();
    }

    private function setIP()
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $this->ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $this->ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $this->ip = $_SERVER['REMOTE_ADDR'];
        }
    }

    private function setUserAgent()
    {
        $this->user_agent = $_SERVER['HTTP_USER_AGENT'];
    }

    private function setToken()
    {
        $this->token = hash('ripemd160', getenv('TOKEN_SEED') . $this->ip);
    }
}
