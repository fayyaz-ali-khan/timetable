<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfessorController extends Controller
{
    public function index()
    {
        // Your dashboard logic goes here
        return view('admin.professors.index');
    }
}
