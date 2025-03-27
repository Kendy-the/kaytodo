<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class idController extends Controller
{
    public static $id = 0 ;

    public function getId()
    {
        return self::increment();
    }

    public static function increment()
    {
        return ++ self::$id;
    }
}