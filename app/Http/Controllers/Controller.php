<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function resetId($table){
        DB::statement('ALTER TABLE' . $table . 'DROP COLUMN id;');
        DB::statement('ALTER TABLE' . $table . 'ADD id INT AUTO_INCREMENT PRIMARY KEY FIRST;');
    }
}
