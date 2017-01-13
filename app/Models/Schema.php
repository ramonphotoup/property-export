<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\MyParent;

class Schema extends MyParent
{
    //
    public $timestamps = false;
    protected $table = 'schema';

    public function get_schema(){
        return DB::select(
            "SELECT
                `schema`.`id`,
                `schema`.`version`,
                `entities`.`name` AS entity,
                `partners`.`name` AS partner
            FROM `schema`
            INNER JOIN `entities` ON `entities`.`id` = `schema`.`entities_id`
            INNER JOIN `partners` ON `partners`.`id` = `entities`.`partners_id`
            "
        );
    }

    public function delete_schema_n_dependencies($schema_id){

        $param = array('schema_id'=>$schema_id);

        $sql = "CALL sp_attribute_delete(
            :schema_id,
            @message,
            @return_id
        )";

        $this->exec($sql, $param, true);
    }
}
