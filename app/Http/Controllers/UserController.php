<?php
/**
 * Created by PhpStorm.
 * User: ramon
 * Date: 12/23/16
 * Time: 8:12 AM
 */

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\User;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $result = DB::select('select * from partners');

        //$this->p($result,1);

        return view('form', ['name' => 'Ramonito']);
    }


    private function p($arr,$exit = false){
        echo '<pre>';
        print_r($arr);
        echo '</pre>';
        if($exit){
            die;
        }
    }
}