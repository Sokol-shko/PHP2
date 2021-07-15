<?php


namespace app\engine;


class Session
{
    public function destroySession()
    {
        session_destroy();
    }

    public function regenerateSession()
    {
        session_regenerate_id();
    }

    /**
     * @return mixed
     */
    public function getSessionId()
    {
        return session_id();
    }

    public function setSessionParams($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public function getSessionParams($key)
    {
        return $_SESSION[$key];
    }


}