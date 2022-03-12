<?php

namespace app\system;

class Base
{
    private const SESSION_FIELDS = ['set_id', 'topic_id', 'question_id', 'possible_answers'];

    public function checkSession(): void
    {
        $this->sessionInit();
        $_SESSION['ip'] ??= $_SERVER['REMOTE_ADDR'];
        $_SESSION['useragent'] ??= $_SERVER['HTTP_USER_AGENT'];
        if (($_SERVER['REMOTE_ADDR'] !== $_SESSION['ip']) || ($_SERVER['HTTP_USER_AGENT'] !== $_SESSION['useragent'])) {
            session_unset();
            session_destroy();
        }
        $this->updateSession();
    }

    protected function sessionInit(): void
    {
        if (!isset($_SESSION)) {
            session_start(["gc_maxlifetime" => 3600]);
        }

        foreach (self::SESSION_FIELDS as $sessionField) {
            if (!isset($_SESSION[$sessionField])) {
                $_SESSION[$sessionField] = null;
            }
        }
    }

    protected function updateSession(): void
    {
        if (isset($_GET['set_id'], $_SESSION['set_id']) && $_GET['set_id'] !== $_SESSION['set_id']) { // GET und SESSION sind verschiedene Bereiche und werden nur dadruch verglichen, dass wir set_id nutzen
            unset($_SESSION['set_id'], $_SESSION['topic_id'], $_SESSION['question_id']);
        }

        if (isset($_GET['topic_id'], $_SESSION['topic_id']) && $_GET['topic_id'] !== $_SESSION['topic_id']) {
            unset($_SESSION['topic_id'], $_SESSION['question_id']);
        }

        foreach (self::SESSION_FIELDS as $sessionField) {
            // Prüfen auf GET oder POST
            // das würde dazu führen, dass nur parameter aus den sessionFields akzeptiert werden
            if (isset($_GET[$sessionField])) {
                $_SESSION[$sessionField] = $_GET[$sessionField];
            }
        }
    }

    public function getSession($param)
    {
        if (!in_array($param, self::SESSION_FIELDS)) {
            return null;
        }
        return $_SESSION[$param];
    }

    public function setSession($sessionField, $param)
    {
        return $_SESSION[$sessionField] = $param;
    }
}