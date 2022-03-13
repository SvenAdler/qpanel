<?php

namespace app\Model;

use PDO;
use app\system\DB;

class BaseModel
{
    protected ?PDO $db;

    public function __construct()
    {
        $this->db = DB::getConnection();
    }

    public function bind($query_template, ...$args): bool|\PDOStatement
    {
        $stm = $this->db->prepare($query_template);
        for ($i = 0, $iMax = count($args); $i < $iMax; ++$i) {
            if (is_int($args[$i])) {
                $stm->bindParam($i + 1, $args[$i], PDO::PARAM_INT);
            } elseif (is_string($args[$i])) {
                $stm->bindParam($i + 1, $args[$i], PDO::PARAM_STR);
            } elseif (is_null($args[$i])) {
                $stm->bindParam($i + 1, $args[$i], PDO::PARAM_NULL);
            }
        }
        return $stm;
    }
}