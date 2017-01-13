<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\MyParent;
use Illuminate\Support\Facades\DB;

class Endpoint extends MyParent
{
    //
    public $timestamps = false;

    public function get_endpoints(){
        $sql = "
            SELECT
                `endpoints`.*,
                `entities`.`name` AS entity,
                `partners`.`name` AS partner
            FROM endpoints
            LEFT JOIN entities ON entities.id = endpoints.entities_id
            LEFT JOIN partners ON partners.id = entities.partners_id
            ORDER BY `partners`.`name`;
        ";

        return DB::select($sql);
    }
}
