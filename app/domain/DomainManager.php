<?php

namespace App\domain;

use App\Models\Todos;

class DomainManager
{
    public static function getAll()
    {
       // $todo_list = Todos::all();
        $todo_list = Todos::orderby('id')->get();
        return response()->json(['data' => $todo_list]);
    }
}
