<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class DashboardController extends Controller
{
    public function dashboard()
    {
        // Your dashboard logic goes here
        return view('admin.dashboard');
    }

}
