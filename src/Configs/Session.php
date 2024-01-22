<?php
namespace Lando\App\Configs;

class Session
{
    public function __construct()
    {
        $this->startSession();
    }

    private function startSession()
    {
        if (!session_id()) {
            session_start();
        }
    }
}