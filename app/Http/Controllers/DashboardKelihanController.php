<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardKelihanController extends Controller
{
    public function index()
    {
        return view('pages.kelihan.dashboard_kelihan');
    }
}
