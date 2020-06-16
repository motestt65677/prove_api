<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class IssueSqlModel extends Model
{
    //
    protected $table = "issues";
    public function queryDataById($search){

        $WHERE = "`issues`.`id` = :id";
        $params["id"] = $search["id"];

        
        $sql = "SELECT 
                `issues`.*,
                `columns`.`name`,
                `columns`.`value`
                FROM `issues`
                LEFT JOIN `columns` ON `issues`.`id` = `columns`.`issue_id`
        ";
        $users = DB::select($sql, $params);

        return $users;
    }
}
