<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // SQL
    public function select($sql, $parameters = array())
    {
        return DB::select($sql, $parameters);
    }

    public function update($sql, $parameters = array())
    {
        return DB::update($sql, $parameters);
    }

    public function insert($table, $parameters = array())
    {
        return DB::table($table)->insertGetId($parameters);
    }

    public function isExist($table, $column, $data)
    {
        $sql = 'select ? from ? where ? = ? ';
        $this->select($sql, array($column, $table, $column, $data));
    }

    public function getLastInsertID()
    {
        return DB::getPdo()->lastInsertId();
    }

    public function isEmptyResult($result)
    {
        return is_null($result) || 0 == sizeof($result);
    }
}
