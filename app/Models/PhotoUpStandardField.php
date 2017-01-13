<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\MyParent;
use Illuminate\Support\Facades\DB;

class PhotoUpStandardField extends MyParent
{
    //
    protected $table = 'photoup_standard_fields';
    public $timestamps = false;


    public function batch_insert($object){
        foreach($object as $value){
            $this->sp_photo_up_standard_field_create($value->table, $value->name, $value->data_type, 0);
        }
    }

    public function sp_photo_up_standard_field_create($table, $name, $data_type, $data_types_id){
        $param = array(':p_table' => $table,':p_name' => $name,':p_data_type'=>$data_type,'p_data_types_id' => $data_types_id);

        $sql = "CALL sp_photo_up_standard_field_create(
            :p_table,
            :p_name,
            :p_data_type,
            :p_data_types_id,
            @message,
            @return_id
        );";

        $this->exec($sql, $param, true);
    }
}
