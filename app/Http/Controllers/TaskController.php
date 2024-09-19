<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function create(){
        return view('task.create');
    }

    public function index(){
        return view('task.index');
    }
}
