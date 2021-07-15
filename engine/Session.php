<?php


namespace app\engine;


class Session
{

    protected $sessionId;

    function __construct()
    {
       $this->parseSession();
    }

    protected function parseSession()
    {
        $this->sessionId = session_id();
    }

    public function destroySession()
    {
        session_regenerate_id();
        session_destroy();
    }

    /**
     * @return mixed
     */
    public function getSessionId()
    {
        return $this->sessionId;
    }


}