<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function list(){
        $list = array(
            array('name' =>"Abc",
            'age' =>"Abc",
            'department' =>"Abc"),
            array('name' =>"Abc",
            'age' =>"Abc",
            'department' =>"Abc"),
            array('name' =>"Abc",
            'age' =>"Abc",
            'department' =>"Abc"),
             array('name' =>"Abc",
            'age' =>"Abc",
            'department' =>"Abc"),
            array('name' =>"Abc",
            'age' =>"Abc",
            'department' =>"Abc"), 
            array('name' =>"Abc",
            'age' =>"Abc",
            'department' =>"Abc"),
             array('name' =>"Abc",
            'age' =>"Abc",
            'department' =>"Abc"),
             array('name' =>"Abc",
            'age' =>"Abc",
            'department' =>"Abc"), 
            array('name' =>"Abc",
            'age' =>"Abc",
            'department' =>"Abc"),
        );

        return response()->json($list);
    }

}
