<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\MyParent;
use Illuminate\Support\Facades\DB;

class Attribute extends MyParent
{
    public $timestamps = false;

    public function save_attribute($schema_id, $data){

        /**
         * `sp_attribute_create`(
        IN schema_id INT,
        IN attribute_name VARCHAR(255) CHARSET utf8,
        IN label VARCHAR(255) CHARSET utf8,
        IN description TEXT CHARSET utf8,
        IN access VARCHAR(255) CHARSET utf8,
        IN input_type VARCHAR(255) CHARSET utf8,
        IN data_type VARCHAR(255) CHARSET utf8,
        IN field_validation TEXT CHARSET utf8,
        IN attribute_option TEXT CHARSET utf8,
        IN default_value VARCHAR(255) CHARSET utf8,
        OUT alert_message TEXT CHARSET utf8,
        OUT return_id INT
        )
         */

        foreach($data as $index => $value){
            $param = array(
                ':schema_id' => $schema_id,
                ':attribute_name' => $value->attribute_name,
                ':label' => $value->label,
                ':description' => $value->Description,
                ':access' => $value->access,
                ':input_type' => $value->input_type,
                ':data_type' => $value->data_type,
                ':field_validation' => $value->validation,
                ':attribute_option' => $value->option,
                ':default_value' => $value->default
            );

            $sql = "CALL sp_attribute_create(
                :schema_id,
                :attribute_name,
                :label,
                :description,
                :access,
                :input_type,
                :data_type,
                :field_validation,
                :attribute_option,
                :default_value,
                @message,
                @return_id
            );";

            //sp_attribute_create(9,'email-address','EEmail','create|update|delete','email address of client','email','string','required','[8,2,5,4]','wau',@message, @id);
            //$this->p($param);
            $this->exec($sql, $param, true);
        }

    }

    public function get_attribute_detail($schema_id){
        $schema_id = (int)$schema_id;
        $sql = "SELECT
                    partners.name AS partner,
                    entities.name AS entity,
                    `schema`.`id` AS schema_id,
                    `schema`.`version`,
                    `attributes`.`name` AS attribute,
                    label,
                    description,
                    `attributes`.`id` AS attributes_id,
                    `input_types`.`name` AS input_type,
                    `data_types`.`name` AS data_type,
                    `permissions`.`access` AS access,
                    `validation`,
                    attribute_options.value AS options,
                    attribute_default_values.value AS default_value
                FROM attributes
                INNER JOIN input_types ON input_types.id = attributes.input_types_id
                INNER JOIN data_types ON data_types.id = attributes.data_types_id
                LEFT JOIN permissions ON permissions.id = attributes.permissions_id
                LEFT JOIN attribute_options ON attribute_options.attributes_id = attributes.id
                LEFT JOIN attribute_default_values ON attribute_default_values.attributes_id = attributes.id
                INNER JOIN `schema` ON `schema`.`id` = attributes.schema_id
                INNER JOIN entities ON entities.id = `schema`.`entities_id`
                INNER JOIN partners ON partners.id = entities.partners_id

                WHERE `schema`.`id` = {$schema_id}

                ORDER BY partners.id, entities.id, `schema`.`id`, attributes.id";

        return DB::select($sql);
    }
}
