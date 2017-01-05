<?php

namespace App\Models;

use App\Models\MyParent;
use Illuminate\Support\Facades\DB;

class Entity extends MyParent
{
    //

    protected $table = 'entities';
    public $timestamps = false;

    public function save_entity_per_partner($partner_id, $entity_name, $schema = ''){

        $param = array(
            ':partner_id' => $partner_id,
            ':entity_name' => $entity_name,
            ':schema' => $schema
        );

        $sql = "CALL sp_partner_entity_create(
            :partner_id,
            :entity_name,
            :schema,
            @message,
            @return_id
        );";

        $result = $this->exec($sql, $param, true);

        return $result;
    }

    public function getEntities(){
        $rec = DB::table('entities')
            ->select('entities.id', 'entities.name AS entity','partners.name AS partner')
            ->join('partners', 'partners.id', '=', 'entities.partners_id')
            ->get();

        return $rec;
    }
}
