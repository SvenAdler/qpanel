<?php

namespace app\controller;

use app\system\Base;

class Quiz extends Base
{

    public const QUESTION_TYPES = ['content', 'singlechoice', 'numeric', 'multiplechoice', 'topic_eval', 'set_eval'];

    public function __construct()
    {
        $this->checkSession();
    }
}