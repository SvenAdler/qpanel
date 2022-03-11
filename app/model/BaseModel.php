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
        for ($i = 0; $i < count($args); ++$i) {
            if (gettype($args[$i]) === "integer") {
                $stm->bindParam($i + 1, $args[$i], PDO::PARAM_INT);
            } elseif (gettype($args[$i]) === "string") {
                $stm->bindParam($i + 1, $args[$i], PDO::PARAM_STR);
            } elseif (gettype($args[$i]) === "NULL") {
                $stm->bindParam($i + 1, $args[$i], PDO::PARAM_NULL);
            }
        }
        return $stm;
    }
}