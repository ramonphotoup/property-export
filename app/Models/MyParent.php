<?php

namespace App\Models;

use Doctrine\Instantiator\Exception\UnexpectedValueException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MyParent extends Model
{
    //

    private $query;

    public function exec($sql, $param = array(), $sp = false){

        $pdo = DB::connection()->getPdo();

        $this->query = $pdo->prepare($sql);

        $return = $this->query->execute($param);

        if($sp){
            $result = DB::select('SELECT @message AS alert');
            if($result[0]->alert !== 'Success'){
                throw new UnexpectedValueException($result[0]->alert);
            }
        }

        return $return;
    }

    public function get(){
        return $this->query->fetchObject(__CLASS__);
    }

    public function p($arr){
        echo '<pre>';
        print_r($arr);
        echo '</pre>';
    }

}
